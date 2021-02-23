<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $credentials = $request->only( 'admin_name','admin_email','admin_phone', 'admin_password');
       
        if (Auth::guard('admin')->attempt($credentials) && Auth::admin()->role == 1 ) {
            // Authentication passed...
            /* return redirect()->route('get.create.product'); */
            dd(1);
        }
        else 
        return redirect()->route('get.login.admin');
        /* return redirect()->route('index'); */
    }

    public function Logout()
    {
        Auth::logout();
       
        return redirect()->route('get.login.admin');
    }

    public function getCreateProduct()
    {
        return view('admin.create-product');
    }
    public function postCreateproduct()
    {

    }
}
