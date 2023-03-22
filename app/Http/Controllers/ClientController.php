<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Affichage de la page d'accueil

    public function index(){
        return view("client.index");
    }

    public function viewBoutiquePage(){
        return view("client.boutique");
    }

    public function viewContactPage(){
        return view("client.contact");
    }
}
