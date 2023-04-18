<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie; 
use App\Models\Souscategorie;

use Session;

class CategoriesController extends Controller
{


// Afficher le formulaire d'enregistrement des catégories

    public function addCategorie(){
        return view('layouts.layouts_admin.categories.addCategorie');
    }



// Enregistrer des categories dans la bd

    public function saveCategorie(Request $request)
    {
        $request->validate([
          
            'imageCategorie' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nomCategorie' => 'required|max:255',
        ]);

        // $nomCategorie = $request->input('nomCategorie');

        $Categorie = new Categorie();

        $Categorie->categorie_name = $request->input('nomCategorie');

        $Categorie->slug = strtolower(str_replace('','-',$Categorie->categorie_name));


        // Vérifier si le slug crée existe déjà dans la bb

        $slugExist = Categorie::where('slug',$Categorie->slug)->first();

    
       if($slugExist==true){

        session()->flash('erreur', 'La catégorie saisie exite déjà !');
     
        return redirect('admin/dashboard/categories/addCategorie');

       }

       else {

         // Gestion de l'image
         $image = $request->file('imageCategorie');
         $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('images/categories'), $imageName);
     

         $Categorie->categorie_image = $imageName;
         
     
         $Categorie->save();
 
         session()->flash('success', 'Categorie enregistrée avec succès !');
     
         return redirect('admin/dashboard/categories/addCategorie');
       }




    }



// Afficher toutes les categories présentes dans la bd

    public function allCategorie(){

        $Categorie = Categorie::latest()->get();

        return view('layouts.layouts_admin.categories.allCategorie')->with('Categorie', $Categorie);
    }


// Afficher le formulaire pour la modification des données de la bd

    public function showEditCategorie($id) {
            // dd($id);   
            $Categorie = Categorie::find($id);
           
        
            return view('layouts.layouts_admin.categories.showEditCategorie')->with('Categorie', $Categorie);
        
   
   }


       
// Enregistrer les données modifiées dans la bd

    public function  updateCategorie(Request $request, $id){

    $request->validate([
        'imageCategorie' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'nomCategorie' => 'required|max:255',
    ]);



        // Vérifier si le slug crée existe déjà dans la bb

        $slugCategorieExist = Categorie::where('slug',strtolower(str_replace('','-',$request->input('nomCategorie'))))
                                ->where('id', '!=', $id)
                                ->first();

    
       if($slugCategorieExist==true){

        $Categorie = Categorie::find($id);
        session()->flash('erreur', 'La catégorie saisie exite déjà !');
     
        return redirect()->route('showEditCategorie', ['id'=>$id])->with('Categorie', $Categorie);

       }

       else{

        $Categorie = Categorie::find($id);



            if($request->file('imageCategorie')){

                        // Gestion de l'image
                $image = $request->file('imageCategorie');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);

                $Categorie->categorie_name = $request->input('nomCategorie');
                $Categorie->categorie_image = $imageName;
                $Categorie->slug = strtolower(str_replace('','-',$request->input('nomCategorie')));
                $Categorie->update();

                // Passer les paramètres nécessaire à l'affichage de la page allsouscategorie

                $categorie = Categorie::get();
                session()->flash('success', 'Catégorie modifiée avec succès !');

                return redirect()->route('allCategorie')->with('Categorie', $categorie);

            }else{

                $Categorie->categorie_name = $request->input('nomCategorie');
                $Categorie->slug = strtolower(str_replace('','-',$request->input('nomCategorie')));
                $Categorie->update();

                 // Passer les paramètres nécessaire à l'affichage de la page allsouscategorie

                $categorie = Categorie::get();
                session()->flash('success', 'Catégorie modifiée avec succès !');

                return redirect()->route('allCategorie')->with('Categorie', $categorie);
            }
            


       }


    }
            
        
            

// Supprimer une catégorie

    // public function deleteCategorie($id)
    //  {
         
        // Récupérer la catégorie à supprimer
        //  $Categorie = Categorie::findOrFail($id);

        // Récupérer les sous-catégories liées à cette catégorie
        //  $sousCategories = Souscategorie::where('id_categorie', $Categorie->id)->get();
         

        // Supprimer les sous-catégories
        //     foreach ($sousCategories as $sousCategorie) {
        //         $sousCategorie->delete();
        //     }
        // // Supprimer la catégorie
        //  $Categorie->delete();

        // Passer les paramètres nécessaire à l'affichage de la page allsouscategorie

    //      $categorie = Categorie::get();

    //      session()->flash('success', 'Catégorie supprimée avec succès !');
 
    //     return redirect()->route('allCategorie')->with('Categorie', $categorie);


    //  }

     // Suppression d'une catégorie spécifique
public function deleteCategorie($id)
{
//    try{
        $categorie = Categorie::findOrFail($id);

        $sousCategories = $categorie->sousCategorie;

        // avec sous categorie
        // dd($sousCategories!=[]); 
        // sans sous categorie
        // dd($sousCategories==[]); 

        // Si le tableau contient quelque chose, exécute le if
        if($sousCategories!=[]){ 

            // Parcourir les sous-catégories et supprimer les produits associés
            foreach ($sousCategories as $sousCategorie) {

                $produits = $sousCategorie->produits;

                foreach ($produits as $produit) {
                    
                    $produit->delete();
                }
            }

                    // Supprimer les sous-catégories
            $categorie->sousCategorie()->delete();
            
            // Supprimer la catégorie
            $categorie->delete();

            session()->flash('success', 'Catégorie supprimée avec succès !');

        // Retourner une réponse réussie
             return redirect()->route('allCategorie');

        }else{
      // Sinon,  exécute le else

            // Supprimer les produits associés
            $produits = $categorie->produits;

                foreach ($produits as $produit) {
                        
                    $produit->delete();
                }

            // Supprimer la catégorie
            $categorie->delete();

            session()->flash('success', 'ECHEC !');

            // Retourner une réponse réussie
            return redirect()->route('allCategorie');

        }

    // }  catch (\Exception $e) {
    //     Retourner une réponse d'erreur
    //     return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la catégorie. Veuillez contacter l\'administrateur du site svp ! ' );
    // }

 

}





}
