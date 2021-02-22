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
        return view('pages.home',[
            'slide' => $slide,
            'new_product' => $new_product,
            'sale_product' => $sale_product
            ]);
    }


    public function getProductType($type = null)
    {
       /*  if($type==null){
            dd("Toan bo san pham");
        } */
        $type_product = Product::where('id_type',$type)->paginate(6);
        $other_product = Product::where('id_type','<>',$type)->paginate(3);
        $product = ProductType::all();
        return view('pages.product_type',[
            'type_product' => $type_product,
            'other_product' => $other_product,
            'product' => $product,
        ]);
    }



    public function getDetailProduct(Request $request)
    {
        $product = Product::where('id',$request->id)->first();
        $product_related = Product::where('id_type',$product->id_type)->paginate(3);
        return view('pages.detail_product',[
            'product' => $product,
            'product_related' => $product_related
        ]);
    }
    public function getContact()
    {
        return view('pages.contact');
    }
    public function getAbout()
    {
        return view('pages.about');
    }
    public function search(Request $request)
    {   
       
        $search = Product::where('name','=',$request->key)
                                ->orwhere('unit_price','=',$request->key)
                                ->get();
        
        return view('pages.search',['search' => $search]);

    }

}
