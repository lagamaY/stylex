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

    
    
    
    






}


