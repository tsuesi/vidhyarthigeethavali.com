<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Customer;
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
            $data = new Customer($request->only('firstname', 'lastname', 'email', 'telephone', 'creation'));
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
                        $updateToken = $data->update(['firebase_token' => $request->firebase_token]);
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
            $customer = Customer::select('id', 'email', 'image', 'image', 'firstname', 'lastname', 'telephone', 'creation')->where('email', $request->email)->first();
            if ($customer) {
                $data = array('email' => $request->email, 'password' => $request->password);

                $credentials = $request->only('email', 'password');
                $token = auth('api')->attempt($credentials);

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
                    return ['status' => 0, 'message' => $message, 'new' => 0];
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
                return ['status' => 0, 'message' => 'Customer already exist with other social mail', 'new' => 0];
            }

        } else {
            return ['status' => 0, 'message' => 'New customer', 'new' => 1];
        }

    }

    public function socialRegister(Request $request)
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
                    $m->from('support@infuzehydration.com', 'Reset Password');
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
            $find->update(['code_sendon' => date('y-m-d H:i:s'), 'code' => $otp]);
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
            $user->update(['otp_token' => $otpTOKEN]);
            return ['status' => 1, 'message' => 'You can change your password.', 'otpToken' => $otpTOKEN];
        } else {
            return ['status' => 0, 'message' => 'Invalid OTP'];
        }

    }

    //resett password
    public function resetPassword(Request $request)
    {
        $find = Customer::where('email', $request->email)->first();

        if ($find) {
            if ($find->otp_token == $request->otpToken) {
                $find->update(['password' => Hash::make($request->new_password)]);
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


}