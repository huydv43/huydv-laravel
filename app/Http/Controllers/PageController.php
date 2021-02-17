<?php

namespace App\Http\Controllers;
use App\Models\Slide;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        /* return view('pages.home',['slide'=>$slide]); */
        return view('pages.home',compact('slide'));
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
