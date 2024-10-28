<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\CustomFileTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use CustomFileTrait;
    protected $path = '';

    public function __construct() {
        $this->path = public_path(config('constant.file_path.store'));
    }

    public function index(Request $request) {

      $data = Setting::select('key','value')->whereStoreId(1)->pluck('value','key')->toArray();

      $currentSetting = request()->segment(count(request()->segments()));
      if($currentSetting == 'general-setting') {
        return view('admin.setting.general',[
            'data' => $data,
        ]);
      }
      else if($currentSetting == 'email-setting') {
        return view('admin.setting.email',[
            'data' => $data,
        ]);
      }
      else if($currentSetting == 'seo-setting') {
        return view('admin.setting.seo',[
            'data' => $data,
        ]);
      }
      else if($currentSetting == 'socialmedia-setting') {
        return view('admin.setting.social',[
            'data' => $data,
        ]);
      }
    }

    public function add() {
        return view('admin.setting.add',[]);
    }

    protected function validateData ($request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255']
        ]);
    }

    protected function saveAndGetStoreImageArray($imageArray) {
        $image = null;

        foreach($imageArray as $key => $value) {

           $image = null;
           $image = $this->saveCustomFileAndGetImageName($value,$this->path);

           // $dataArray[] = Setting::setKeyValueArray($key,$image);
           //
           // $dataArray[] = ['key' => $key,
           // 'value' => $image];
        }

        return $image;
    }

    protected function getRequestData () {
        return request()->except(array_merge(['_token','_method',Setting::ConfigAlertMail],  Setting::$imageArray));
    }

    public function store(Request $request) {

        $requestData = $this->getRequestData();
        $requestDataArray = [];

        $imageArray = $this->saveAndGetStoreImageArray($request->only(Setting::$imageArray));

        $maxStoreId = Setting::getMaxRowNumber();

        $configAlertMail = $request->only(Setting::ConfigAlertMail);
        $configAlertMailArray = Setting::getconfigAlertMailArray ($configAlertMail, $maxStoreId);

        foreach($requestData as $key => $val) {
            $requestDataArray[] = Setting::setKeyValueArray($key,$val);
        }

        $storingDataArray = array_merge($requestDataArray,$imageArray);
        data_set($storingDataArray,'*.store_id',$maxStoreId);
        $storingDataArray[] = $configAlertMailArray;

        Setting::insert($storingDataArray);

        return redirect('/setting')->with('success','Setting Updated Successfully');
    }

    public function edit($id) {


        $data = Setting::select('key','value')->whereStoreId($id)->pluck('value','key')->toArray();

        return view('admin.setting.edit',[
            'data' => $data,
        ]);
    }

    public function update(Request $request,$id) {

        if($request->hasFile('config_store_image')) {
           $images = Setting::select('value')->where('store_id', $id)->where('key',['config_store_image'])->pluck('value')->toArray();
           $this->deleteImages($images);
           $storeimage = $this->saveAndGetStoreImageArray($request->only(Setting::$imageArray));
           Setting::where('key','config_store_image')->update(['value' => $storeimage]);
        }
        else if($request->hasFile('config_icon_image')) {
           $images = Setting::select('value')->where('store_id', $id)->where('key',['config_icon_image'])->pluck('value')->toArray();
           $this->deleteImages($images);
           $storeimage = $this->saveAndGetStoreImageArray($request->only(Setting::$imageArray));
           Setting::where('key','config_icon_image')->update(['value' => $storeimage]);
        }
        $requestData = $this->getRequestData();
        $requestDataArray = [];

        $maxStoreId = $id;

        $configAlertMail = $request->only(Setting::ConfigAlertMail);
        $configAlertMailArray = Setting::getconfigAlertMailArray ($configAlertMail, $maxStoreId);

        foreach($requestData as $key => $val) {
            Setting::where('key',$key)->update(['value' => $val]);
        }

        if($request->setting_type == 'email'){

          $this->writeEnvironmentFile('MAIL_MAILER', $request->config_mail_engine);
          $this->writeEnvironmentFile('MAIL_HOST', $request->config_smtp_hostname);
          $this->writeEnvironmentFile('MAIL_PORT', $request->config_smtp_port);
          $this->writeEnvironmentFile('MAIL_USERNAME', $request->config_smtp_username);
          $this->writeEnvironmentFile('MAIL_PASSWORD', $request->config_smtp_password);
          $this->writeEnvironmentFile('MAIL_ENCRYPTION', $request->config_encryption);
          $this->writeEnvironmentFile('MAIL_FROM_ADDRESS', $request->config_from);
          $this->writeEnvironmentFile('MAIL_FROM_NAME', $request->config_from_name);
        }

        $getSetting   = Setting::all();
        $val  =		"<?php \n";
        $val  .= 	"return [\n";
        foreach ($getSetting as $key => $value) {
            $val  .= " '".$value->key."' => '".addslashes ($value->value)."'  ,\n";
        }
        $val  .= 	"];\n";
        			$filename = base_path().'/config/settingConfig.php';
        			$fp=fopen($filename,"w+");
        			fwrite($fp,$val);
        			fclose($fp);

       return redirect()->back()->with('success','store Updated Successfully');

    }

    protected function deleteImages($images) {

        foreach($images as $key => $val) {
            $this->removeOldImage($val,$this->path);
        }

    }

    public function delete($id) {
        if(! $data = Order::whereId($id)->first()) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        OrderProduct::whereOrderId($data->id)->delete();
        OrderHistory::whereOrderId($data->id)->delete();
        $data->delete();
        return redirect(route('order'))->with('success', 'Order  Deleted Successfully');
    }

    public function writeEnvironmentFile($type, $val)
    {
      $path = base_path('.env');
      if (file_exists($path)) {
        $val = '"' . trim($val) . '"';
        file_put_contents(
          $path,
          str_replace(
            $type . '="' . env($type) . '"', $type . '=' . $val,
            file_get_contents($path)
          )
        );
      }
    }
}
