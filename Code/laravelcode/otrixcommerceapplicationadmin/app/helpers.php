<?php
use App\Models\Language;
use App\Models\Product;


    function setPermissionValue($val1,$val2) {

         return $val1 == $val2 ? $val1 : "$val1.$val2";
    }

    function getPermissionGroupName($value) {
        $array = explode('.',$value);
         return $array[0];
    }

    function getLanguages() {
         return Language::where('status',1)->orderBy('created_at','ASC')->get();
    }

    function getCartCount() {
        return \App\Models\Cart::where('customer_id',\Illuminate\Support\Facades\Auth::guard('customer')->user()->id)->count();
    }

    function getWishlist() {
          return  DB::table("wishlist")->where('customer_id',Auth::guard('customer')->user()->id)->pluck('product_id')->toArray();
    }

    function getCategories() {
      $categoryArray =file_get_contents(base_path().'/storage/app/categoryArray.json');
      $categories = json_decode($categoryArray);
      return $categories;
    }

    function getProductOptions($id) {

      $getProduct = Product::select('product.id','product.model','order_product.options')
      ->join('order_product','order_product.product_id','=','product.id')
      ->where('product.id',$id)
      ->first();

      $decodeOptions = null;
      if($getProduct && $getProduct->options){
        $decodeOptions = unserialize($getProduct->options);
      }

      $rArry = ['model' => $getProduct ? $getProduct->model : 'N/A','options' =>  $decodeOptions];

      return $rArry;

    }

    function calculatePercentage($basePrice,$special) {
        $off = 0;
        $diff = $basePrice - $special;
        if($diff > 0) {
          $off = number_format($diff / $basePrice * 100,0);
        }
        return $off.'% Off';
    }

?>
