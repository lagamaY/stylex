<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspaceClientController extends Controller
{
    //
    public function getAccueil(){
        return view('client.espace_client.accueil');
    }
}
