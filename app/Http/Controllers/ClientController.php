<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Affichage de la page d'accueil

    public function viewIndex(){
        return view("client.index");
    }



    public function viewBoutiquePage(){
        return view("client.boutique");
    }


    public function viewContactPage(){
        return view("client.contact");
    }

    
    public function viewProductDetailPage(){
        return view("client.detail_produit");
    }
    

    public function viewPanierPage(){
        return view("client.panier");
    }


    public function viewCheckoutPage(){
        return view("client.checkout");
    }


    public function viewLoginPage(){
        return view("client.authentification.login");
    }
    

    public function viewRegisterPage(){
        return view("client.authentification.register");
    }
 

}
