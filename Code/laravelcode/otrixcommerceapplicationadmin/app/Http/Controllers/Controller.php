<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR
use Artesaos\SEOTools\Facades\SEOTools;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $defaultPaginate = 10;
    public $defaultPaginateFrontend = 15;

    //cat parent child function
    function buildTree( $elements, $parentId = 0,$limit = 100) {
         $branch = array();
         $i= 1;
         foreach ($elements as $element) {
             if ($element['parent_id'] == $parentId) {
                if($i < $limit) {
                  $children =$this->buildTree($elements, $element['category_id']);

                  if ($children) {
                      $element['children'] = $children;
                  }
                  $branch[] = $element;
                }
                $i++;
             }
         }

         return $branch;
     }

     public function buildProductObj($data){
       $productObj = [];
       if(isset($data)) {
         foreach ($data as $key => $value) {
          $productObj[] = ['id' => $value->id,
              'image' => $value->image,
              'category_id' => $value->category_id,
              'model' => $value->model,
              'price' => $value->price,
              'quantity' => $value->quantity,
              'sort_order' => $value->sort_order,
              'status' => $value->status,
              'date_available' => $value->date_available,
              'created_at' => $value->created_at,
              'viewed' => $value->viewed,
              'review_avg' => $value->review_avg,
              'productDescription' => $value->productDescription,
              'category' => $value->category,
              'special' => $value->special
          ];
         }
       }
       return $productObj;
     }
     
     function getChatGPTConfig() {
         return DB::table('chatgpt_config')->first();
     }

     //build Seo
     function buildSeo($title,$keywordArr = [],$url,$desc) {
       SEOMeta::setTitle($title);
       SEOMeta::setDescription($desc);
       SEOMeta::addKeyword($keywordArr);
       OpenGraph::setDescription($desc);
       OpenGraph::setTitle($title);
       OpenGraph::setUrl($url);
       TwitterCard::setTitle($title);
     }

}
