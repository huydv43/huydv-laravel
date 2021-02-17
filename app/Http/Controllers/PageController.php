<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        return view('pages.home');
    }


    public function getProductType()
    {
        return view('pages.product_type');
    }



    public function getDetailProduct()
    {
        return view('pages.detail_product');
    }
}
