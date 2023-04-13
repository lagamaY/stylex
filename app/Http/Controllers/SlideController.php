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
           
             'imageSlide' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         
         ]);
     
         // Gestion de l'image
         $image = $request->file('imageSlide');
         $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('images/slides'), $imageName);
     
         $Slide = new Slide();
 
 
         $Slide->Slide_image = $imageName;
         
     
         $Slide->save();
 
         session()->flash('success', 'Slide enregistrée avec succès !'); 
     
         return redirect('admin/dashboard/slide/addSlide');
     }


 
     //
     public function allSlide(){
 
         $Slide = Slide::get();
 
         return view('layouts.layouts_admin.slides.allSlide')->with('Slide', $Slide);
     }
 
 

    public function showEditSlide($id) {
        // dd($id);   
        $Slide = Slide::find($id);
       
    
        return view('layouts.layouts_admin.slides.showEditSlide')->with('Slide', $Slide);
    
            
    }


  //
  public function  updateSlide(Request $request, $id){

    $request->validate([
        'imageSlide' => 'image|mimes:jpeg,png,jpg,gif,svg',
       
    ]);

    $Slide = Slide::findOrFail($id);


    

        if ($request->hasFile('imageSlide')) {
            $image = $request->file('imageSlide');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/slides'), $imageName);
            $Slide->slide_image = $imageName;
        }

        $Slide->save();

        session()->flash('success', 'slide modifiée avec succès !');

        return redirect()->route('allSlide');

    }

   
     //

     public function deleteSlide($id)
     {
         
         $Slide = Slide::findOrFail($id);
         $Slide->delete();

        
 
        return redirect()->route('allSlide');
     }


}
