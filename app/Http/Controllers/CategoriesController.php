<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

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
        'nomCategorie' => 'required|unique:categories|max:255',
    ]);

    $Categorie = Categorie::findOrFail($id);


    $Categorie->categorie_name = $request->input('nomCategorie');
    $Categorie->slug = strtolower(str_replace('','-',$request->input('nomCategorie')));


        if ($request->hasFile('imageCategorie')) {
            $image = $request->file('imageCategorie');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $Categorie->categorie_image = $imageName;
        }

        $Categorie->save();

        session()->flash('success', 'Catégorie modifiée avec succès !');

        return redirect()->route('allCategorie');

    }
            
        
            

    // Supprimer une catégorie

    public function deleteCategorie($id)
     {
         
         $Categorie = Categorie::findOrFail($id);
         $Categorie->delete();

        
 
        return redirect()->route('allCategorie');
     }
}
