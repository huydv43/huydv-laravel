<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /* public function getLoginAdmin()
    {
        return view('admin.login');
    } */

    public function getIndex()
    {
        return view('admin.index');
    }

    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }

    public function getCreate()
    {
        return view('admin.create');
    }
    public function postCreate(Request $request)
    {
            //  Let's do everything here

                //
                if ($files = $request->file('fileUpload')) {
                    $destinationPath = 'public/image/'; // upload path
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                 }
        
    
       /*  $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('public\source\assets\image\product'), $imageName); */

        $product = new Product;
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image = $request->image;
        $product->unit = $request->unit;
        $product->save();
        dd($product);
    }
}
