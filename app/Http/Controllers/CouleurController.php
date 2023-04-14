<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Couleur;

class CouleurController extends Controller
{
    // Afficher la page du formulaire

    public function addCouleur(){

        return view("layouts.layouts_admin.couleurs.addCouleur");
    }


    // Enregistrer une couleur dans la bd
    public function saveCouleur(Request $request)
    {
        $request->validate([
            'nomCouleur' => 'required|max:255',
        ]);
    
        // Récupérer les noms de taille soumis dans le formulaire
        $couleurs = explode(',', $request->input('nomCouleur'));
    
        // Parcourir les noms des tailles et les enregistrer dans la base de données
        foreach ($couleurs as $couleurs) {
            $Couleur = new Couleur();
            $Couleur->nomCouleur = trim($couleurs);
            $Couleur->save();
           }
        


        session()->flash('success', 'couleur(s) enregistrée(s) avec succès !');
    
        return redirect('admin/dashboard/couleur/addCouleur');


    }

    //
    public function allCouleur(){

        $Couleur = Couleur::get();

        return view('layouts.layouts_admin.couleurs.allCouleur')->with('Couleur', $Couleur);
    }


    //

    public function showEditCouleur($id) {
            // dd($id);   
            $Couleur = Couleur::find($id);
           
        
            return view('layouts.layouts_admin.couleurs.showEditCouleur')->with('Couleur', $Couleur);
        
                
   }


      //
      public function  updateCouleur(Request $request, $id){

        $request->validate([
            'nomCouleur' => 'required|max:255',
        ]);
    
        $Couleur = Couleur::findOrFail($id);
    
    
        $Couleur->nomCouleur = $request->input('nomCouleur');
    
            $Couleur->save();
    
            session()->flash('success', 'Couleur modifiée avec succès !');
    
            return redirect()->route('allCouleur');
    
        }


     //

    public function deleteCouleur($id)
     {
         
         $Couleur = Couleur::findOrFail($id);
         $Couleur->delete();

        
 
        return redirect()->route('allCouleur');
     }

}
