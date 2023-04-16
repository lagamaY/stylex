<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produit;

use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Couleur;
use App\Models\Taille;





class ProductController extends Controller
{
    //
    public function addProduct(){

        $Categorie = Categorie::get();
        $Souscategorie = Souscategorie::get();
        $Couleur = Couleur::get();
        $Taille = Taille::get();
        return view('layouts.layouts_admin.produits.addProduct')->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
    }





       //
       public function allProduct(){
        return view('layouts.layouts_admin.produits.allProduct');
    }
}
