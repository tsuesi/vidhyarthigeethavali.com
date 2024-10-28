<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Customer;
use App\Models\SongBookUser;
use App\Models\UserAccess;
use App\Models\GiftAmount;
use App\Models\Product;
use Validator;
use Carbon\Carbon;
use File;
use Response;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Mail;

class ApiAuthController extends Controller
{
    private $apiToken;
    // public function __construct()
    // {
    //     $this->apiToken = uniqid(base64_encode(Str::random(10)));
    // }

    public function __construct()
    {

    }

    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|unique:customer,email',
                'telephone' => 'required|max:10',
                'password' => 'required|min:4',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $data = new Customer($request->only('firstname', 'lastname', 'email', 'telephone', 'creation','device_id','device_name'));
            $data->password_no_encrypt = $request->password;
            $data->isRelogin = '1';
            $data->password = bcrypt($request->password);

            if ($data->save()) {

                $getAlertEmails = config('settingConfig.config_alert_mail');

                /*************************************************************
                    email configuration uncomment this code after setting up mail port ,username and password in .env file
                ******************************************************************/
                // if (strpos($getAlertEmails, 'Register') !== false) {
                //   Mail::send('admin.emails.registration', [], function ($m) use($request) {
                //       $m->from(config('settingConfig.config_email'), config('settingConfig.config_store_name'));
                //       $m->to($request->email, $request->firstname)->subject('Welcome To '.config('settingConfig.config_store_name'));
                //     });
                // }

                $isFlutter = $request->get('is_flutter', null);

                if ($isFlutter) {
                    if (Auth::guard('customer')->attempt(['email' => $data->email, 'password' => $request->password])) {
                        //$updateToken = $data->update(['firebase_token' => $request->firebase_token]);
                        $updateToken = DB::table("customer")->where('email',$request->email)->update(['firebase_token'=>$request->firebase_token]);
                        return ['status' => 1, 'wishlistData' => [], 'cartCount' => '0', 'message' => "Customer created!", 'data' => $data];
                    }
                } else {
                    return ['status' => 1, 'message' => "Customer created!", 'data' => $data];
                }
            } else {
                return ['status' => 0, 'message' => "Error When create"];
            }

        }
    }

    public function login(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation')->where(['email'=>$request->email,'status'=>'1'])->first();
            if ($customer) {
                $data = array('email' => $request->email, 'password' => $request->password);
                //$tempCustomer = $customer;
                //$tempCustomer->password = $request->password;
                $credentials = $request->only('email', 'password');
                $token = auth('api')->attempt($credentials);

                if ($token) {
                    $wishlistData = DB::table("wishlist")->where('customer_id', $customer->id)->pluck('product_id');
                    $cartCount = DB::table("cart")->where('customer_id', $customer->id)->sum('quantity');
                   
                    $updated = DB::table("customer")->where('email',$request->email)->update(['firebase_token'=>$request->firebase_token,'isRelogin'=>'1','device_name'=>$request->device_name,'device_id'=>$request->device_id]);
                   // $customer->update(['firebase_token' => $request->firebase_token]);
                    
                    $userAccess = DB::table("user_access")->where('user_id', $customer->id)->get();
                   // $userAccess = DB::table("song_book_users")->where('email', $customer->email)->get();
                    return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'userAccess' => $userAccess, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $customer];
                } else {
                    return ['status' => 0, 'message' => 'Email/Password Wrong', 'data' => json_decode('{}')];
                }
            } else {
                return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
        }
    }
    
     public function relogin(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation','isRelogin')->where(['email'=>$request->email,'status'=>'1'])->first();
            if ($customer) {
                $data = array('email' => $request->email, 'password' => $request->password);
                //$tempCustomer = $customer;
                //$tempCustomer->password = $request->password;
                $credentials = $request->only('email', 'password');
                $token = auth('api')->attempt($credentials);

                if ($token) {
                    $wishlistData = DB::table("wishlist")->where('customer_id', $customer->id)->pluck('product_id');
                    $cartCount = DB::table("cart")->where('customer_id', $customer->id)->sum('quantity');
                    //$customer->update(['firebase_token' => $request->firebase_token]);
                    $updated = DB::table("customer")->where('email',$request->email)->update(['firebase_token'=>$request->firebase_token, 'isRelogin'=>'1','device_name'=>$request->device_name,'device_id'=>$request->device_id]);
                    $customer->isRelogin = '1';
                    $userAccess = DB::table("user_access")->where('user_id', $customer->id)->get();
                   // $userAccess = DB::table("song_book_users")->where('email', $customer->email)->get();
                    return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'userAccess' => $userAccess, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $customer];
                } else {
                    return ['status' => 0, 'message' => 'Email/Password Wrong', 'data' => json_decode('{}')];
                }
            } else {
                return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
        }
    }
    
    public function getPassword(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w\w+)+$/'
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 2, 'message' => $message];
        } else {
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation','isRelogin','password','password_no_encrypt')->where(['email'=>$request->email,'status'=>'1'])->first();
            if ($customer) {
                   return ['status' => 1, 'message' => "Customer successfully login", 'data' => $customer];
            } else {
                    return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
        }
    }

public function updateFirebaseToken(Request $request)
    {


        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'email' => 'required',
        //         'password' => 'required',
        //     ]
        // );

        // if ($validator->fails()) {
        //     $message = $this->one_validation_message($validator);
        //     return ['status' => 0, 'message' => $message];
        // } else {
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation')->where(['email'=>$request->email,'status'=>'1'])->first();
            if ($customer) {
                    $updated = DB::table("customer")->where('email',$request->email)->update(['firebase_token'=>$request->firebase_token]);
                    //$customer->update(['firebase_token' => $request->firebase_token]);
                    return ['status' => 1, 'message' => "Firebase tocken successfully updated", 'data' => $customer];
            } else {
                return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
       // }
    }
    
    public function loginUsingMobile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mobileNumber' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation')
                ->where('telephone', $request->mobileNumber)->first();
            if ($customer) {

                $token = auth('api')->login($customer);

                if ($token) {
                    $wishlistData = DB::table("wishlist")->where('customer_id', $customer->id)->pluck('product_id');
                    $cartCount = DB::table("cart")->where('customer_id', $customer->id)->sum('quantity');
                    $customer->update(['firebase_token' => $request->firebase_token]);
                    return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $customer];
                } else {
                    return ['status' => 0, 'message' => 'Email/Password Wrong', 'data' => json_decode('{}')];
                }
            } else {
                return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
        }
    }

    public function checkcustomer(Request $request)
    {
        $find = Customer::where('telephone', $request->mobileNumber)->first();

        $status = 0;
        if ($find) {
            $status = 1;
        }
        return ['status' => $status];
    }

    public function socialLogin(Request $request)
    {

        //check exist
        $findCustomer = Customer::where('email', $request->email)->first();

        //login customer
        if ($findCustomer) {
            if ($findCustomer->creation == $request->creation) {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'email' => 'required',
                        'password' => 'required',
                    ]
                );

                if ($validator->fails()) {
                    $message = $this->one_validation_message($validator);
                    return ['status' => 0, 'message' => $request, 'new' => 0];
                } else {
                    $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation')->where('email', $request->email)->first();
                    if ($customer) {
                        $data = array('email' => $request->email, 'password' => $request->password);

                        $token = auth('api')->attempt($data);

                        if ($token) {
                            $wishlistData = DB::table("wishlist")->where('customer_id', $customer->id)->pluck('product_id');
                            $cartCount = DB::table("cart")->where('customer_id', $customer->id)->sum('quantity');
                            $customer->update(['firebase_token' => $request->firebase_token]);
                            return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $customer];
                        } else {
                            return ['status' => 0, 'message' => 'Email/Password Wrong', 'data' => json_decode('{}')];
                        }

                    } else {
                        return ['status' => 0, 'message' => 'Customer not found', 'data' => json_decode('{}'), 'code' => '401', 'new' => 0];
                    }
                }
            } else {
                $wishlistData = DB::table("wishlist")->where('customer_id', $findCustomer->id)->pluck('product_id');
                $cartCount = DB::table("cart")->where('customer_id', $findCustomer->id)->sum('quantity');
                   $data = array('email' => $request->email, 'password' => $request->password);
                   $token = auth('api')->attempt($data);
                    $updated = DB::table("customer")->where('email',$request->email)->update(['device_name'=>$request->device_name,'device_id'=>$request->device_id]);
                   // $customer->update(['firebase_token' => $request->firebase_token]);
                    
                    $userAccess = DB::table("user_access")->where('user_id', $findCustomer->id)->get();
                   // $userAccess = DB::table("song_book_users")->where('email', $customer->email)->get();
                    return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'userAccess' => $userAccess, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $findCustomer];
            }

        } else {
            // new User registration
            
            
            
            $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required',
                'email' => 'required|unique:customer,email',
                'telephone' => 'required|max:10',
                'password' => 'required|min:4',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $data = new Customer($request->only('firstname', 'lastname', 'email', 'telephone', 'creation', 'social_id', 'image'));
            $data->password_no_encrypt = '123456789';
            $data->password = bcrypt($request->password);
            //$data = array('email' => $request->email, 'password' => $request->password);
            //$token = auth('api')->attempt($data);
            if ($data->save()) {
                $sdata = array('email' => $request->email, 'password' => $request->password);
                $token = auth('api')->attempt($data);
                if (Auth::guard('customer')->attempt($sdata)) {
                   $wishlistData = DB::table("wishlist")->where('customer_id', $data->id)->pluck('product_id');
                    $cartCount = DB::table("cart")->where('customer_id', $data->id)->sum('quantity');
                    $updated = DB::table("customer")->where('email',$request->email)->update(['device_name'=>$request->device_name,'device_id'=>$request->device_id]);
                    //$updated = DB::table("customer")->where('email',$request->email)->update(['firebase_token'=>$request->firebase_token,'isRelogin'=>'1','device_name'=>$request->device_name,'device_id'=>$request->device_id]);
                   // $customer->update(['firebase_token' => $request->firebase_token]);
                    
                    $userAccess = DB::table("user_access")->where('user_id', $data->id)->get();
                   // $userAccess = DB::table("song_book_users")->where('email', $customer->email)->get();
                    return ['status' => 1, 'authToken' => $token, 'wishlistData' => $wishlistData, 'userAccess' => $userAccess, 'cartCount' => $cartCount == 0 ? '0' : $cartCount, 'message' => "Customer successfully login", 'data' => $data];
                } else {
                    return ['status' => 0, 'message' => "Error When create"];
                }
            }
        }
        
        
        
        
        }

    }

    public function socialRegister()
    {

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|unique:customer,email',
                'telephone' => 'required|max:10',
                'password' => 'required|min:4',
            ]
        );

        if ($validator->fails()) {
            $message = $this->one_validation_message($validator);
            return ['status' => 0, 'message' => $message];
        } else {
            $data = new Customer($request->only('firstname', 'lastname', 'email', 'telephone', 'creation', 'social_id', 'image'));
            $data->password = bcrypt($request->password);

            if ($data->save()) {
                $sdata = array('email' => $request->email, 'password' => $request->password);
                if (Auth::guard('customer')->attempt($sdata)) {
                    $wishlistData = DB::table("wishlist")->where('customer_id', $data->id)->pluck('product_id');
                    $cartCount = DB::table("cart")->where('customer_id', $data->id)->sum('quantity');
                    return ['status' => 1, 'wishlistData' => $wishlistData, 'cartCount' => $cartCount, 'message' => "Customer successfully login", 'data' => $data];
                } else {
                    return ['status' => 0, 'message' => "Error When create"];
                }
            }
        }
    }

    public function one_validation_message($validator)
    {
        $validation_messages = $validator->getMessageBag()->toArray();
        $validation_messages1 = array_values($validation_messages);
        $new_validation_messages = [];
        for ($i = 0; $i < count($validation_messages1); $i++) {
            $inside_element = count($validation_messages1[$i]);
            for ($j = 0; $j < $inside_element; $j++) {
                array_push($new_validation_messages, $validation_messages1[$i]);
            }
        }
        return implode(' ', $new_validation_messages[0]);
    }

    public function forgotPassword(Request $request, User $user)
    {
        $email = $request->email;
        if ($email) {
            $findUser = $user->where('email', $email)->first();
            if ($findUser && $findUser->creation_mode == 'D') {
                $encrypted = Crypt::encryptString($findUser->id);

                $message = [
                    'title' => 'Forgot Password',
                    'intro' => "Please click forgot link to reset password ",
                    'link' => url('forgotPassword/' . $encrypted),
                    'confirmation_code' => '',
                    'to_email' => $email,
                    'to_name' => $findUser->first_name . ' ' . $findUser->last_name,
                ];

                \Mail::send('email.forgotPassword', $message, function ($m) use ($message) {
                    $m->to($message['to_email'], $message['to_name'])
                        ->subject('Forgot Password');
                    $m->from('srinivasaraouesi@gmail.com', 'Reset Password');
                });
                return ['status' => 1, 'message' => 'Check your mail!'];
            } else {
                return ['status' => 0, 'message' => 'User not found!'];
            }
        } else {
            return ['status' => 0, 'message' => 'Email required'];
        }
    }


    public function getForgotPassword($id, User $user)
    {
        $id = Crypt::decryptString($id);
        $findUser = $user->find($id);
        return view('forgotpassword.index', compact('findUser'));
    }


    //forgot password
    public function forgotPasswordEmail(Request $request)
    {

        //find customer
        $find = Customer::where('email', $request->email)->first();

        if ($find) {
            $otp = rand(1000, 9999);
            Mail::send('admin.emails.forgotPassword', ['otp' => $otp], function ($m) use ($find) {
                $m->from(config('settingConfig.config_email'), config('settingConfig.config_store_name'));
                $m->to($find->email, $find->firstname)->subject('Forgot password OTP');
            });
            //$find->update(['code_sendon' => date('y-m-d H:i:s'), 'code' => $otp]);
            $updated = DB::table("customer")->where('email',$request->email)->update(['code_sendon'=>date('y-m-d H:i:s'), 'code'=>$otp]);
            return ['status' => 1, 'message' => 'Check your email address we send you OTP'];
        } else {
            return ['status' => 0, 'message' => 'User not found!'];
        }
    }


    //verify OTP
    public function verifyOTP(Request $request)
    {
        $user = Customer::where('email', $request->email)->first();

        //check time
        $carbonNow = Carbon::now();
        $diff = $carbonNow->diffInMinutes($user->code_sendon);

        if ($diff > 5) {
            return ['status' => 0, 'message' => 'OTP code expired'];
        }

        //check OTP
        if ($request->otp == $user->code) {
            $otpTOKEN = Str::random(30);
            $updated = DB::table("customer")->where('email',$request->email)->update(['otp_token'=>$otpTOKEN]);
           // $user->update(['otp_token' => $otpTOKEN]);
            return ['status' => 1, 'message' => 'You can change your password.', 'otpToken' => $otpTOKEN];
        } else {
            return ['status' => 0, 'message' => $request->otp];
        }

    }

    //resett password
    public function resetPassword(Request $request)
    {
        $find = Customer::where('email', $request->email)->first();

        if ($find) {
            if ($find->otp_token == $request->otpToken) {
                //$find->update(['password' => Hash::make($request->new_password)]);
                $updated = DB::table("customer")->where('email',$request->email)->update(['password'=> Hash::make($request->new_password),'password_no_encrypt'=>$request->new_password]);
                return ['status' => 1, 'message' => 'Password successfully reset try to login now'];
            } else {
                return ['status' => 0, 'message' => 'Invalid Token'];
            }
        } else {
            return ['status' => 0, 'message' => 'Invalid OTP'];
        }
    }


    public function logout()
    {
        auth('api')->logout();
        return ['status' => 1, 'message' => 'successfully logout!'];
    }
    
    public function verifyDonatedUser(Request $request)
    {
            $songBookUser =  DB::table("song_book_users")->where('email',$request->email)->orWhere('telephone',$request->telephone)->first();
            if ($songBookUser) {
                    return ['status' => 1, 'data' => $songBookUser];
            }else {
                return ['status' => 0, 'message' => 'User not found', 'data' => json_decode('{}'), 'code' => '401'];
            }
    }
    public function updateDonatedUserDetails(Request $request)
    {
            
            $find = DB::table("song_book_users")->where('email', $request->email)->first();

         if ($find) {
                 $updated = DB::table("song_book_users")->where('email',$request->email)->update(['firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'telephone'=>$request->telephone,'password'=>$request->password,'device_id'=>$request->device_id,'device_name'=>$request->device_name]);
                 return ['status' => 1, 'message' => 'Saved successfully'];
         } else {
             return ['status' => 0, 'message' => 'User not found by Email'];
         }
       // return ['status' => 1, 'message' => $find];
    }
    
    public function registerDonatedUserDetails(Request $request)
    {

        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'firstname' => 'required|regex:/^[\pL\s\-]+$/u',
        //         'email' => 'required|unique:customer,email',
        //         'telephone' => 'required|max:10',
        //         'password' => 'required|min:4',
        //     ]
        // );

        // if ($validator->fails()) {
        //     $message = $this->one_validation_message($validator);
        //     return ['status' => 0, 'message' => $message];
        // } else {
            $data = new SongBookUser($request->only('firstname', 'lastname', 'email', 'telephone', 'device_id', 'device_name','amount','status','password'));
            //$data->password = bcrypt($request->password);

            if ($data->save()) {

               // $getAlertEmails = config('settingConfig.config_alert_mail');

                /*************************************************************
                    email configuration uncomment this code after setting up mail port ,username and password in .env file
                ******************************************************************/
                // if (strpos($getAlertEmails, 'Register') !== false) {
                //   Mail::send('admin.emails.registration', [], function ($m) use($request) {
                //       $m->from(config('settingConfig.config_email'), config('settingConfig.config_store_name'));
                //       $m->to($request->email, $request->firstname)->subject('Welcome To '.config('settingConfig.config_store_name'));
                //     });
                // }

                //$isFlutter = $request->get('is_flutter', null);

                // if ($isFlutter) {
                //     if (Auth::guard('customer')->attempt(['email' => $data->email, 'password' => $request->password])) {
                //         $updateToken = $data->update(['firebase_token' => $request->firebase_token]);
                //         return ['status' => 1, 'wishlistData' => [], 'cartCount' => '0', 'message' => "Customer created!", 'data' => $data];
                //     }
                // } else {
                    return ['status' => 1, 'message' => "Customer created!", 'data' => $data];
               // }
            } else {
                return ['status' => 0, 'message' => "Error When create"];
            }

       // }
    }
    
    public function getVideos(Request $request)
    {
            $data = DB::table("conferences")->where(['type'=>$request->type,'status'=>'1'])->get();
            if ($data) {
                return ['status' => 1, 'data' => $data];
            } else {
                return ['status' => 0, 'message' => "No data found"];
            }
    }
    public function getTeachingTrainingVideos(Request $request)
    {
            $data = DB::table("teaching_training")->where(['status'=>'1'])->get();
            if ($data) {
                return ['status' => 1, 'data' => $data];
            } else {
                return ['status' => 0, 'message' => "No data found"];
            }
    }
    
    public function saveUserAccessData(Request $request)
    {
            //Store OrderProduct
            $storeUserAccessArr = [];
            $a = json_decode( $request->module_data, true );
            foreach ($a as $key => $value) {
                $storeUserAccessArr[] = [
                    'user_id' => $request->user_id,
                    'module_type' => $value['module_type'],
                    'module_amount' => $value['amount'],
                    'status' => 1
                ];
            }

           $storeuserAccess = UserAccess::insert($storeUserAccessArr);
            if ($storeuserAccess) {
                    $userAccess = DB::table("user_access")->where('user_id', $request->user_id)->get();
                    return ['status' => 1, 'message' => "Module Added!", 'data' => $userAccess];
            }else{
                    return ['status' => 0, 'message' => "Error When create"];
            }
            //$data = new UserAccess($request->only('user_id', 'module_type', 'module_amount', 'status'));
            // if ($data->save()) {
            //     $userAccess = DB::table("user_access")->where('user_id', $request->user_id)->get();
            //     return ['status' => 1, 'message' => "Module Added!", 'data' => $userAccess];
            // } else {
            //     return ['status' => 0, 'message' => "Error When create"];
            // }
           // return ['status' => 0, 'message' => $storeUserAccessArr];
    }
    
    public function saveGiftAmountData(Request $request)
    {
            $data = new GiftAmount($request->only('user_id', 'amount', 'module_amount', 'status'));
            if ($data->save()) {
               // $userAccess = DB::table("user_access")->where('user_id', $request->user_id)->get();
                return ['status' => 1, 'message' => "successfully donated amount"];
            } else {
                return ['status' => 0, 'message' => "Error When create"];
            }
           // return ['status' => 0, 'message' => $storeUserAccessArr];
    }
    
    public function getUserAccessData(Request $request)
    {
            $data = DB::table("user_access")->where(['user_id'=>$request->user_id,'status'=>'1'])->get();
            if ($data) {
                return ['status' => 1, 'message' => "Success", 'data' => $data];
            } else {
                return ['status' => 0, 'message' => "Error When get"];
            }
    }
    
    public function getUpCommingPrograms(Request $request)
    {
            $data = DB::table("up_comming_programs")->where('status','1')->get();
            if ($data) {
                return ['status' => 1, 'message' => "Success", 'data' => $data];
            } else {
                return ['status' => 0, 'message' => "Error When get"];
            }
    }
    
    public function getUserAccess(Request $request)
    {
        $find = Customer::where('email', $request->email)->first();
        $status = 0;
        if ($find) {
            return ['status' => 1, 'message' => "Customer created!", 'data' =>$find];
        }
        
    }
    
     public function getModulesPurchaseDetails(Request $request)
    {
        try {
            $purchaseDetails = DB::table('modules_purchase_details')->where(['status'=>'1'])->get();
            if($purchaseDetails){
                return ['status' => 1, 'data' => $purchaseDetails];
            }else{
                return ['status' => 0, 'data' => []];
            }
            
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => []];
        }
    }
    
    public function deleteAccount(Request $request){
       try {

           $deleteUser = DB::table('customer')->where('email',$request->email)->update(['status'=>'0']);
           return  ['status'=> 1,'message'=>'Account deleted successfully!', 'email'=>$request->email ];
     } catch (\Exception $e) {
       return  ['status'=> 0,'message'=>'Error', 'email'=> $request->email];
     }
   }
    
    //  public function registerDonatedUserDetails(Request $request)
    //     {
                
    //           // $find = DB::table("song_book_users")->where('email', $request->email)->first();
    
    //          //if ($find) {
    //                  $updated = DB::table("song_book_users")->create(['firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'telephone'=>$request->telephone,'password'=>$request->password,'device_id'=>$request->device_id,'device_name'=>$request->device_name]);
    //          if($updated){
    //                 return ['status' => 1, 'message' => 'Saved successfully'];
    //          } else {
    //              return ['status' => 0, 'message' => 'User not found by Email'];
    //          }
    //       // return ['status' => 1, 'message' => $find];
       // }

}