<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewDashboardPage(){
        return view ('admin.espace_admin.dashboard');
    }
}
