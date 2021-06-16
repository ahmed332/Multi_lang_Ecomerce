<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
            $date=[];

             $data['sliders']=Slider::get(['photo']);
             $data['categories'] = Category::parent()->select('id', 'slug')->with(['children' => function ($q) {
                $q->select('id', 'parent_id', 'slug');
                $q->with(['children' => function ($qq) {
                    $qq->select('id', 'parent_id', 'slug');
                }]);
            }])->get();
        
            return view('front.home', $data);
    }
}
