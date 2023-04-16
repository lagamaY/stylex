<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slide;


class SlideController extends Controller
{
    //

    public function addSlide(){
        return view('layouts.layouts_admin.slides.addSlide');
        
    }



     //

     public function saveSlide(Request $request)
     {
         $request->validate([
           
             'imageSlide' => 'image|mimes:jpeg,png,jpg,gif,svg',
             'urlSlide' => 'Max:255',
         ]);

        //  Vérifier si l'image existe bien
     
         if($request->file('imageSlide') == null){

            session()->flash('alerte', 'Veuillez entrer une image de la slide que vous souhaitez afficher svp !'); 
     
            return redirect('admin/dashboard/slide/addSlide');
         }

        //  Vérifier si l'url existe bien
         if($request->input('urlSlide') == null){

            session()->flash('alerte', 'Veuillez entrer une url de la page que vous souhaitez afficher au clic sur la slide svp !'); 
     
            return redirect('admin/dashboard/slide/addSlide');
         }

         // Gestion de l'image
         $image = $request->file('imageSlide');
         $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('images/slides'), $imageName);
     
        // créer et enregistrer les donnéés dans a table Slide
         $Slide = new Slide();
 
         $Slide->Slide_image = $imageName;
         $Slide->url = $request->input('urlSlide');
         
     
         $Slide->save();
 
         session()->flash('success', 'Slide enregistrée avec succès !'); 
     
         return redirect('admin/dashboard/slide/addSlide');
     }


 
    // Afficher toutes les slides enregistées

     public function allSlide(){
 
         $Slide = Slide::latest()->get();
 
         return view('layouts.layouts_admin.slides.allSlide')->with('Slide', $Slide);
     }
 
 
    // Afficher le formulaire pour la modification des données du formulaire

        public function showEditSlide($id) {
        // dd($id);   
            $Slide = Slide::find($id);
       
    
        return view('layouts.layouts_admin.slides.showEditSlide')->with('Slide', $Slide);
    
            
    }


  //
  public function  updateSlide(Request $request, $id){

    $request->validate([
        'imageSlide' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'urlSlide' => 'Max:255',
    ]);


        //  Modifier l'url uniquement si l'image n'a pas été modifée
     
        if($request->file('imageSlide') == null){

            $Slide = Slide::findOrFail($id);
    
            $Slide->url = $request->input('urlSlide');

            $Slide->update();

            session()->flash('success', ' Url de la slide modifiée avec succès !');

            return redirect()->route('allSlide');
     
    
         }

        //  Modifier l'image uniquement si l'url n'a pas été modifée

         if($request->input('urlSlide') == null){

            $Slide = Slide::findOrFail($id);
    
             // Gestion de l'image
            $image = $request->file('imageSlide');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/slides'), $imageName);

            $Slide->Slide_image = $imageName;

            $Slide->update();

            session()->flash('success', ' Image de la Slide modifiée avec succès !');

            return redirect()->route('allSlide');
         }



        // Gestion de l'image
         $image = $request->file('imageSlide');
         $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('images/slides'), $imageName);

         $Slide = Slide::findOrFail($id);
    
            $Slide->Slide_image = $imageName;
            $Slide->url = $request->input('urlSlide');

            $Slide->update();

        session()->flash('success', 'slide modifiée avec succès !');

        return redirect()->route('allSlide');

    }

   
    // Supprimer la slide de la bd

     public function deleteSlide($id)
     {
         
         $Slide = Slide::findOrFail($id);
         $Slide->delete();

        
 
        return redirect()->route('allSlide');
     }


}
