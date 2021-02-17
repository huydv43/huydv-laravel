<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->get();
        /* return view('pages.home',['slide'=>$slide]); */
        return view('pages.home',compact('slide','new_product'));
    }


    public function getProductType()
    {
        return view('pages.product_type');
    }



    public function getDetailProduct()
    {
        return view('pages.detail_product');
    }
    public function getContact()
    {
        return view('pages.contact');
    }
}
