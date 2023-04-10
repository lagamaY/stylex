<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;



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





}
