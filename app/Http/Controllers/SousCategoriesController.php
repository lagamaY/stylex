<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Souscategorie;

use App\Models\Categorie;



class SousCategoriesController extends Controller
{
    // Affichage du formulaire d'enregistrement des sous catégories

      public function addSousCategorie(){

        $Categorie = Categorie::latest()->get();

        return view('layouts.layouts_admin.souscategories.addSousCategorie')->with('Categorie', $Categorie);
    }


    // Enregistrer les sous catégories dans la bd

      public function saveSousCategorie(Request $request){

            $request -> validate([

                'nomSousCategorie' => 'required | Max:225',
                'sousCategorie_categorie_id' => 'required'
            ]);

            $Souscategorie = new Souscategorie();


            $Souscategorie->nomSousCategorie = $request->input('nomSousCategorie');
            $Souscategorie->slug = strtolower(str_replace('','-',$request->input('nomSousCategorie')));
            $Souscategorie->id_categorie = $request->input('sousCategorie_categorie_id');

            $Souscategorie->nom_categorie = Categorie::where('id', $Souscategorie->id_categorie )->value('categorie_name');

            $Souscategorie->save();
            

            $Categorie = Categorie::latest()->get();

            return view('layouts.layouts_admin.souscategories.addSousCategorie')->with('Categorie', $Categorie);


      }







    public function allSousCategorie(){

        // $Categorie = Categorie::get();

        // return view('layouts.layouts_admin.categories.allCategorie')->with('Categorie', $Categorie);

        return view('layouts.layouts_admin.souscategories.allSousCategorie');

    }
}
