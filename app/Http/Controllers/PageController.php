<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(8);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
        /* return view('pages.home',['slide'=>$slide]); */
        return view('pages.home',compact('slide','new_product','sale_product'));
    }


    public function getProductType($type = null)
    {
       /*  if($type==null){
            dd("Toan bo san pham");
        } */
        $type_product = Product::where('id_type',$type)->paginate(6);
        $other_product = Product::where('id_type','<>',$type)->paginate(3);
        $product = ProductType::all();
        return view('pages.product_type',compact('type_product','other_product','product'));
    }



    public function getDetailProduct()
    {
        return view('pages.detail_product');
    }
    public function getContact()
    {
        return view('pages.contact');
    }
    public function getAbout()
    {
        return view('pages.about');
    }
}
