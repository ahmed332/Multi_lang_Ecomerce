<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\models\Product;

class CategoryController extends Controller
{
    public function categoryByslug($slug){
         $data['category'] = category::where('slug',$slug)->first();
             $data['products'] =  $data['category']->products;


         return view('front.products',$data);
    }
}
