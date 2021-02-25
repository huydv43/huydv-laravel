<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        //login,logout,register
    public function getLogin()
    {
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name','email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('index');
        }
        else
        return redirect()->route('get.login')->with('message','Đăng Nhập Thất Bại !');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function postRegister(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required|min:3',
            'address' => 'required|',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $result = new User;
        $result->email = $request->email;
        $result->name = $request->name;
        $result->address = $request->address;
        $result->phone = $request ->phone;
        $result->password = Hash::make($request->password);
        $result->save();
        return redirect()->route('index'); 
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');  
    }

}
