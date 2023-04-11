<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

use Session;

class CategoriesController extends Controller
{
    //

    public function addCategorie(){
        return view('layouts.layouts_admin.categories.addCategorie');
    }

    //

    public function saveCategorie(Request $request)
    {
        $request->validate([
          
            'imageCategorie' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nomCategorie' => 'required|max:255',
        ]);
    
        // Gestion de l'image
        $image = $request->file('imageCategorie');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/categories'), $imageName);
    
        $Categorie = new Categorie();


        $Categorie->categorie_image = $imageName;
        $Categorie->categorie_name = $request->input('nomCategorie');
        
    
        $Categorie->save();

        session()->flash('success', 'Categorie enregistrée avec succès !');
    
        return redirect('admin/dashboard/addCategorie');
    }



     //

    public function allCategorie(){

        $Categorie = Categorie::get();

        return view('layouts.layouts_admin.categories.allCategorie')->with('Categorie', $Categorie);
    }


        //

    public function showEditCategorie($id) {
            // dd($id);   
            $Categorie = Categorie::find($id);
           
        
            return view('layouts.layouts_admin.categories.showEditCategorie')->with('Categorie', $Categorie);
        
                
   }

       
   //
    public function  updateCategorie(Request $request, $id){

    $request->validate([
        'imageCategorie' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'nomCategorie' => 'required|max:255',
    ]);

    $Categorie = Categorie::findOrFail($id);


    $Categorie->categorie_name = $request->input('nomCategorie');

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
            
        
            

     //

    public function deleteCategorie($id)
     {
         
         $Categorie = Categorie::findOrFail($id);
         $Categorie->delete();

        
 
        return redirect()->route('allCategorie');
     }
}
