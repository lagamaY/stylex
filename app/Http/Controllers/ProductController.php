<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produit;

use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Couleur;
use App\Models\Taille;





class ProductController extends Controller
{
    // Afficher le formulaire pour la création d'un nouveau produit
    public function addProduct(){

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();
        return view('layouts.layouts_admin.produits.addProduct')->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
    }




    // Enregistrer un produit dans la bd


    public function saveProduct(Request $request) {
            // Valider les données du formulaire
            $request->validate([
                'nom_produit' => '',
                'prix_produit' => '',
                'quantite_produit' => '',
                'tailles_produit' => 'array',
                'couleurs_produit' => 'array',
                'short_description' => '',
                'long_description' => '',
                'categories' => 'array',
                'sousCategories' => 'array',
                'image_produit' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);


            if($request->input('nom_produit')==null){

                $Categorie = Categorie::latest()->get();
                $Souscategorie = Souscategorie::latest()->get();
                $Couleur = Couleur::latest()->get();
                $Taille = Taille::latest()->get();
    
                session()->flash('erreur', 'Indiquez le nom du produit svp !');
    
                return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);

            }

            if($request->input('prix_produit')==null){

                $Categorie = Categorie::latest()->get();
                $Souscategorie = Souscategorie::latest()->get();
                $Couleur = Couleur::latest()->get();
                $Taille = Taille::latest()->get();
    
                session()->flash('erreur', 'Indiquez le prix du produit svp !');
    
                return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);
                
            }

            if( $request->input('quantite_produit')==null){

                $Categorie = Categorie::latest()->get();
                $Souscategorie = Souscategorie::latest()->get();
                $Couleur = Couleur::latest()->get();
                $Taille = Taille::latest()->get();
    
                session()->flash('erreur', 'Indiquez la quantité du produit svp !');
    
                return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);
                
            }

            if($request->file('image_produit')==null){

                $Categorie = Categorie::latest()->get();
                $Souscategorie = Souscategorie::latest()->get();
                $Couleur = Couleur::latest()->get();
                $Taille = Taille::latest()->get();
    
                session()->flash('erreur', 'Veuillez charger une image pour le produit svp !');
    
                return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);
                
            }


            if($request->input('categories')==null){

                $Categorie = Categorie::latest()->get();
                $Souscategorie = Souscategorie::latest()->get();
                $Couleur = Couleur::latest()->get();
                $Taille = Taille::latest()->get();
    
                session()->flash('erreur',  'Veuillez sélectionner au moins une catégorie svp !' );
    
                return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);
                
            }

            // Créer un nouvel objet Produit
            $produit = new Produit();

            $produit->nom_produit = $request->input('nom_produit');
            $produit->prix_produit = $request->input('prix_produit');
            $produit->quantite_produit = $request->input('quantite_produit');
            $produit->short_description = $request->input('short_description');
            $produit->long_description = $request->input('long_description');

            //gestion de l'image
            
            $image = $request->file('image_produit');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/produits'), $imageName);

            //Inserer l'image dans la table produit
            $produit->image_produit = $imageName;

            // Sauvegarder le produit
            $produit->save();

            // Ajouter les catégories associées au produit
            $produit->categories()->attach($request->input('categories'));

            // Ajouter les sous-catégories associées au produit
            $produit->souscategories()->attach($request->input('sousCategories'));

            // Ajouter les tailles associées au produit
             $produit->tailles()->attach($request->input('tailles_produit'));

             // Ajouter les couleurs associées au produit
             $produit->couleurs()->attach($request->input('couleurs_produit'));

            // Rediriger vers la vue d'enregistrement des produits avec un message de succès

            $Categorie = Categorie::latest()->get();
            $Souscategorie = Souscategorie::latest()->get();
            $Couleur = Couleur::latest()->get();
            $Taille = Taille::latest()->get();

            session()->flash('success', 'Le produit a été ajouté avec succès.');

            return redirect()->route('addProduct')->with('Categorie', $Categorie)
                                                                    ->with('Souscategorie', $Souscategorie)
                                                                    ->with('Couleur', $Couleur)
                                                                    ->with('Taille', $Taille);
        }





    //  Afficher tous les produits enregistrés

       public function allProduct(){

        $Produit = Produit::latest()->get();

        return view('layouts.layouts_admin.produits.allProduct')->with('Produit', $Produit);
    }



// Afficher le formulaire pour la modification des données saisies

    public function showEditProduct($id)
        {
    
            $Produit = Produit::find($id);

            $Categorie = Categorie::latest()->get();
            $Souscategorie = Souscategorie::latest()->get();
            $Couleur = Couleur::latest()->get();
            $Taille = Taille::latest()->get();
    
            return view('layouts.layouts_admin.produits.showEditProduct')->with('Produit', $Produit)
                                                                        ->with('Categorie', $Categorie)
                                                                        ->with('Souscategorie', $Souscategorie)
                                                                        ->with('Couleur', $Couleur)
                                                                        ->with('Taille', $Taille);
    
            
        }


// Enregistrer un produit dans la bd


public function updateProduct(Request $request, $id) {
    try {
    // Valider les données du formulaire
    $request->validate([
        'nom_produit' => '',
        'prix_produit' => '',
        'quantite_produit' => '',
        'tailles_produit' => 'array',
        'couleurs_produit' => 'array',
        'short_description' => '',
        'long_description' => '',
        'categories' => 'array',
        'sousCategories' => 'array',
        'image_produit' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ]);


    if($request->input('nom_produit')==null){

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('erreur', 'Indiquez le nom du produit svp !');

        return redirect()->route('showEditProduct', ['id'=>$id])->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);

    }

    if($request->input('prix_produit')==null){

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('erreur', 'Indiquez le prix du produit svp !');

        return redirect()->route('showEditProduct', ['id'=>$id])->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
        
    }

    if( $request->input('quantite_produit')==null){

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('erreur', 'Indiquez la quantité du produit svp !');

        return redirect()->route('showEditProduct', ['id'=>$id])->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
        
    }



    if($request->input('categories')==null){

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('erreur',  'Veuillez sélectionner au moins une catégorie svp !' );

        return redirect()->route('showEditProduct', ['id'=>$id])->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
        
    }


    if($request->file('image_produit')){

            //gestion de l'image
    
        $image = $request->file('image_produit');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/produits'), $imageName);

        $produit = Produit::find($id);

        //Inserer l'image dans la table produit
        $produit->image_produit = $imageName;
        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix_produit = $request->input('prix_produit');
        $produit->quantite_produit = $request->input('quantite_produit');
        $produit->short_description = $request->input('short_description');
        $produit->long_description = $request->input('long_description');


        // Mettre à jour  le produit
        $produit->update();

        // Ajouter les catégories associées au produit
        $produit->categories()->attach($request->input('categories'));

        // Ajouter les sous-catégories associées au produit
        $produit->souscategories()->attach($request->input('sousCategories'));

        // Ajouter les tailles associées au produit
        $produit->tailles()->attach($request->input('tailles_produit'));

        // Ajouter les couleurs associées au produit
        $produit->couleurs()->attach($request->input('couleurs_produit'));

        // Rediriger vers la vue d'enregistrement des produits avec un message de succès

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('success', 'Le produit a été modifié avec succès.');

        return redirect()->route('allProduct')->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);
        
    }

    // Recupérer le produit
    $produit = Produit::find($id);

    $produit->nom_produit = $request->input('nom_produit');
    $produit->prix_produit = $request->input('prix_produit');
    $produit->quantite_produit = $request->input('quantite_produit');
    $produit->short_description = $request->input('short_description');
    $produit->long_description = $request->input('long_description');


    // Sauvegarder le produit
    $produit->update();

    // Ajouter les catégories associées au produit
    $produit->categories()->attach($request->input('categories'));

    // Ajouter les sous-catégories associées au produit
    $produit->souscategories()->attach($request->input('sousCategories'));

    // Ajouter les tailles associées au produit
     $produit->tailles()->attach($request->input('tailles_produit'));

     // Ajouter les couleurs associées au produit
     $produit->couleurs()->attach($request->input('couleurs_produit'));

    // Rediriger vers la vue d'enregistrement des produits avec un message de succès

    $Categorie = Categorie::latest()->get();
    $Souscategorie = Souscategorie::latest()->get();
    $Couleur = Couleur::latest()->get();
    $Taille = Taille::latest()->get();

    session()->flash('success', 'Le produit a été modifié avec succès.');

    return redirect()->route('allProduct')->with('Categorie', $Categorie)
                                                            ->with('Souscategorie', $Souscategorie)
                                                            ->with('Couleur', $Couleur)
                                                            ->with('Taille', $Taille);

} catch (\Exception $e) {
    // Retourner une réponse d'erreur
    return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du produit. Veuillez contacter l\'administrateur du site svp ! ' );
}

}





// Supprimer un produit enregistré

    public function deleteProduct($id){

        try {

        $produit = Produit::find($id);


        // Supprimer les catégories associées au produit
        $produit->categories()->detach();

        // Supprimer les sous-catégories associées au produit
        $produit->souscategories()->detach();

        // Supprimer les tailles associées au produit
        $produit->tailles()->detach();

        // Supprimer les couleurs associées au produit
        $produit->couleurs()->detach();
        // Supprimer le produit en question
        $produit->delete();



        // Rediriger vers la vue d'enregistrement des produits avec un message de succès

        $Categorie = Categorie::latest()->get();
        $Souscategorie = Souscategorie::latest()->get();
        $Couleur = Couleur::latest()->get();
        $Taille = Taille::latest()->get();

        session()->flash('success', 'Produit supprimé avec succès.');

        return redirect()->route('allProduct')->with('Categorie', $Categorie)
                                                                ->with('Souscategorie', $Souscategorie)
                                                                ->with('Couleur', $Couleur)
                                                                ->with('Taille', $Taille);

        
        } catch (\Exception $e) {
            // Retourner une réponse d'erreur
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression du produit. Veuillez contacter l\'administrateur du site svp ! ' );
        }
    


    }
}
