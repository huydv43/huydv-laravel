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
        return redirect()->route('index');
    }

    public function getCreate()
    {
        return view('admin.create');
    }
    public function postCreate(Request $request)
    {
        $nameImage =  $request->file('fimage')->getClientOriginalName();//lấy tên ảnh

        /* $request->validate([
            'nameImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]); */

        

        $product = new Product;
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->image = $nameImage;
        $request->file('fimage')->move('source/image/product', $nameImage);// 
        $product->save();
        return view('admin.index');
    }
}
