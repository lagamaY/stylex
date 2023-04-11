<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taille;

class TailleController extends Controller
{
    //
    public function addTaille(){

        return view("layouts.layouts_admin.tailles.addTaille");
    }


    //
    public function saveTaille(Request $request)
    {
        $request->validate([
            'nomTaille' => 'required|max:255',
        ]);
    
        // Récupérer les noms de taille soumis dans le formulaire
        $tailles = explode(',', $request->input('nomTaille'));
    
        // Parcourir les noms des tailles et les enregistrer dans la base de données
        foreach ($tailles as $tailles) {
            $Taille = new Taille();
            $Taille->taille = trim($tailles);
            $Taille->save();
           }
        


        session()->flash('success', 'Taille(s) enregistrée(s) avec succès !');
    
        return redirect('admin/dashboard/taille/addTaille');
    }

    
    public function allTaille(){

        $Taille = Taille::get();

        return view('layouts.layouts_admin.tailles.allTaille')->with('Taille', $Taille);
    }


    //

    public function showEditTaille($id) {
             
            $Taille = Taille::find($id);
           
        
            return view('layouts.layouts_admin.tailles.showEditTaille')->with('Taille', $Taille);
        
                
   }
    

         //
    public function  updateTaille(Request $request, $id){

            $request->validate([
                'nomTaille' => 'required|max:255',
            ]);
        
            // dd($request);

            $Taille = Taille::findOrFail($id);
        
        
            $Taille->taille = $request->input('nomTaille');
        
                $Taille->save();
        
                session()->flash('success', 'Taille modifiée avec succès !');
        
                return redirect()->route('allTaille');
        
     }
    
     //

     public function deleteTaille($id)
     {
         
         $Taille = Taille::findOrFail($id);
         $Taille->delete();

        
 
        return redirect()->route('allTaille');
     }





}


