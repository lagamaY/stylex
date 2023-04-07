<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
    public function viewLoginPage(){

        return view('admin.auth.login');
    }

    
    public function viewRegisterPage(){

        return view('admin.auth.register');
    }

    
    public function viewForgotPasswordPage(){

        return view('admin.auth.forgotpassword');
    }
}
