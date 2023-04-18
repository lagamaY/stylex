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

    $request->validate([
        'nomSousCategorie' => 'required | Max:225',
        'sousCategorie_categorie_id' => 'required'
    ]);


    $nomSousCategorie = $request->input('nomSousCategorie');
    $sousCategorie_categorie_id = $request->input('sousCategorie_categorie_id');

    $sousCategorie = new Souscategorie();
    $sousCategorie->nomSousCategorie = $nomSousCategorie;
    $sousCategorie->id_categorie = $sousCategorie_categorie_id;
    $sousCategorie->slug = strtolower(str_replace('','-',$nomSousCategorie));



    // Vérifier si le slug de la sous-catégorie existe déjà dans la même catégorie
    $sousCategorieSlugExist = Souscategorie::where('slug', $sousCategorie->slug)
                                      ->where('id_categorie', $sousCategorie_categorie_id)
                                      ->first();

    if ($sousCategorieSlugExist) {
        $categories = Categorie::latest()->get();
        session()->flash('erreur', 'Cette sous-catégorie existe déjà dans la catégorie choisie');
        return redirect('admin/dashboard/sous-categorie/addSousCategorie')->with('Categorie', $categories);
    }

    // Enregistrer la sous-catégorie

    $sousCategorie->save();

    // Remplir la colonne nb_sous_categorie de la table Categorie à chaque fois q'une sous categorie est enregistrée
    Categorie::where('id',$request->input('sousCategorie_categorie_id') )->increment('nb_sous_categorie', 1);

    // Recuperer toutes les catégories enregistrées de la plus récente à la plus ancienne
    $categories = Categorie::latest()->get();

    session()->flash('success', 'Sous-catégorie enregistrée avec succès !');
    return redirect('admin/dashboard/sous-categorie/addSousCategorie')->with('Categorie', $categories);
}




// Affichage de toutes les sous catégories


    public function allSousCategorie(){

        $Categorie = Categorie::latest()->get();  

        $Souscategorie = Souscategorie::get();
        

        return view('layouts.layouts_admin.souscategories.allSousCategorie')->with('Categorie', $Categorie)
                                                                            ->with('Souscategorie', $Souscategorie);

    }



// Afficher le formulaire pour la modification des données saisies

    public function showEditSousCategorie($id)
        {

            $Souscategorie = Souscategorie::find($id);
    
            $Categorie = Categorie::latest()->get();
    
            return view('layouts.layouts_admin.souscategories.showEditSousCategorie')->with('Categorie', $Categorie)
                                                                              ->with('Souscategorie', $Souscategorie);
    
            
        }

// Envoie du formulaire de modification des données du formulaire

     public function updateSousCategorie(Request $request, $id)
        {

          $request->validate([
            'nomSousCategorie' => 'required | Max:225',
            'sousCategorie_categorie_id' => 'required'
        ]);
    
    
        $nomSousCategorie = $request->input('nomSousCategorie');
        $sousCategorie_categorie_id = $request->input('sousCategorie_categorie_id');
    

        // Vérifier si la sous-catégorie existe déjà dans la même catégorie
        $sousCategorieSlugExist = Souscategorie::where('slug', strtolower(str_replace('','-',$nomSousCategorie)))
                                          ->where('id_categorie', $sousCategorie_categorie_id)
                                          ->where('id', '!=', $id) // Exclure la sous-catégorie en cours de modification
                                          ->first();

    
        if ($sousCategorieSlugExist) {
            $categories = Categorie::latest()->get();
            session()->flash('erreur', 'Cette sous-catégorie existe déjà dans la catégorie choisie');
            return redirect()->route('showEditSousCategorie', ['id'=>$id])->with('Categorie', $categories);
        }
    
          // Mettre à jour la sous-catégorie
          $sousCategorie = Souscategorie::find($id);

          $sousCategorie->nomSousCategorie = $nomSousCategorie;
          $sousCategorie->id_categorie = $sousCategorie_categorie_id;
          $sousCategorie->slug = strtolower(str_replace('','-',$nomSousCategorie));
      
          $sousCategorie->update();

          // Passer les paramètres nécessaire à l'affichage de la page allsouscategorie
          $categories = Categorie::latest()->get();
          $SousCategorie = Souscategorie::get();

          session()->flash('success', 'Sous-catégorie modifiée avec succès !');
          return redirect()->route('allSousCategorie')->with('Categorie', $categories)
                                                      ->with('SousCategorie', $SousCategorie);



        }



// Supprimer une sous catégorie de la bd

     public function deleteSousCategorie($id)
        {

        try {
        // Récupérer l'id_categorie dans la table sous catégorie afin de pouvoir decrémenter 
         $recupIdCategorie = Souscategorie::where('id',$id)->value('id_categorie');


        // Récupérer la sous catégorie correspondant à l'id reçu
          $Souscategorie = Souscategorie::findOrFail($id);

              // Rechercher les produits liés à la sous-catégorie 
                $produits = $Souscategorie->produits;

              // Supprimer les produits associés à la sous catégorie
                foreach ($produits as $produit) {
                    
                    $produit->delete();
                }
            
                // Supprimer la sous catégorie
                $Souscategorie->delete();


          // Décrémenter la colonne de 1 dans la table des catégories
          Categorie::where('id',$recupIdCategorie)->decrement('nb_sous_categorie', 1);

          // récuperer les catégories pour l'affichage correcte de la page allSousCategorie
          $Categorie = Categorie::latest()->get();

          session()->flash('success', 'La sous Categorie a été supprimé avec succès !');

          return redirect()->route('allSousCategorie')->with('Categorie', $Categorie)
                                                      ->with('Souscategorie', $Souscategorie);
        


      }

      catch (\Exception $e) {
        // Retourner une réponse d'erreur
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la sous catégorie. Veuillez contacter l\'administrateur du site svp ! ' );
    }


    }




}
