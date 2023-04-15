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
            $Souscategorie->id_categorie = $request->input('sousCategorie_categorie_id');
            $sousCategorie_categorie_id = $Souscategorie->id_categorie;

            $Souscategorie->slug = strtolower(str_replace('','-',$Souscategorie->nomSousCategorie));



            // Vérifier si le slug et l'id de la catégorie sélectionnée existent déjà dans la bb
    
            $slugExist = Souscategorie::where('slug',$Souscategorie->slug)->first();

            $idCategorieExist = Souscategorie::where('id_categorie',$sousCategorie_categorie_id)->first();
    
            // dd($idCategorieExist);
        
           if($slugExist==true){

             if($idCategorieExist==true){

              $Categorie = Categorie::latest()->get();

              session()->flash('erreur', 'Cette sous catégorie existe déjà dans la catégorie choisie');
  
              return redirect('admin/dashboard/sous-categorie/addSousCategorie')->with('Categorie', $Categorie);

             }
             else{

              $Souscategorie->save();


              $Categorie = Categorie::latest()->get();

              session()->flash('success', 'Sous Categorie enregistrée avec succès !');

              return redirect('admin/dashboard/sous-categorie/addSousCategorie')->with('Categorie', $Categorie);

             }


    
           }
           else{

              $Souscategorie->save();


              $Categorie = Categorie::latest()->get();

              session()->flash('success', 'Sous Categorie enregistrée avec succès !');

              return redirect('admin/dashboard/sous-categorie/addSousCategorie')->with('Categorie', $Categorie);

           }
            


      }



   // Affichage de toutes les sous catégories


    public function allSousCategorie(){

        $Categorie = Categorie::latest()->get();  

        $Souscategorie = Souscategorie::get();
        // return view('layouts.layouts_admin.categories.allCategorie')->with('Categorie', $Categorie);

        return view('layouts.layouts_admin.souscategories.allSousCategorie')->with('Categorie', $Categorie)
                                                                            ->with('Souscategorie', $Souscategorie);

    }
}
