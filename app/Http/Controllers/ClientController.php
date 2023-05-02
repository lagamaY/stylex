<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Slide;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Produit;




class ClientController extends Controller
{
    // Affichage de la page d'accueil
    public function viewIndex(){

         $slides = Slide::latest()->get();

         $Categorie = Categorie::latest()->get();

         $Produit = Produit::latest()->get();

        return view("client.index")->with('Slide', $slides)
                                    ->with('Categorie', $Categorie) 
                                    ->with('Produit', $Produit);  
    

    }


    // Afficher les produits présents dans une catégorie

    // public function viewCategorieProducts($nom){

    //     $Categorie_id = Categorie::where('categorie_name',$nom )->get('id');

    //     $Categorie = Categorie::findOrFail($Categorie_id);

    //     $produitsCategorieId = $Categorie->produits;

    //     foreach ($user->roles as $role) {
    //         echo $role->pivot->created_at;
    //     }

    //     dd($Categorie);

    //     return view("client.produitParCategorie")->with('Categorie', $Categorie);
    // }

    

    // Affichage de la page boutique
    public function viewBoutiquePage(){

        $Produit = Produit::latest()->get();
        
        return view("client.boutique")->with('Produit', $Produit);
    }


    // Affichage de la page view product detail

    public function viewProductDetailPage($id){

        $Produit = Produit::findorfail($id);

        return view("client.detail_produit")->with('Produit',$Produit );
    }
    



    // Affichage de la page view panier page
    public function viewPanierPage(){
        return view("client.panier");
    }

    // Affichage de la page view checkout page
    public function viewCheckoutPage(){
        return view("client.checkout");
    }

    // Affichage de la page view login page
    public function viewLoginPage(){
        return view("client.authentification.login");
    }
    
    // Affichage de la page view register page
    public function viewRegisterPage(){
        return view("client.authentification.register");
    }
 

    
    // Affichage de la page contact
    public function viewContactPage(){
        return view("client.contact");
    }


}
