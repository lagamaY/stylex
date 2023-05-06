<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Slide;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Produit;
use App\Models\Cart;




class ClientController extends Controller
{
    // Affichage de la page d'accueil
    public function viewIndex(){

         $slide1 = Slide::where('id',1)->first();
         $slide2 = Slide::where('id',2)->first();

         $Categorie = Categorie::latest()->get();

         $Produit = Produit::latest()->take(8)->get();

         $ProduitPetitPrix = Produit::orderBy('prix_produit','asc')->take(8)->get();;

        return view("client.index")->with('slide1', $slide1)
                                    ->with('slide2', $slide2)
                                    ->with('Categorie', $Categorie) 
                                    ->with('Produit', $Produit)  
                                    ->with('ProduitPetitPrix', $ProduitPetitPrix);
    

    }




    

    // Affichage de la page boutique
    public function viewBoutiquePage(){

        $Produit = Produit::latest()->paginate(6);
        $couleurs = Couleur::latest()->get();
        $taille = Taille::latest()->get();
        
        return view("client.boutique")->with(['Produit'=> $Produit, 'couleurs'=> $couleurs, 'tailles'=> $taille]);
    }


    // Affichage de la page view product detail

    public function viewProductDetailPage($id){

        $Produit = Produit::findorfail($id);

        $categories_prod_id = $Produit->categories->first()->id;

        
        $category = Categorie::with('produits')->find($categories_prod_id)->first(); 

        
       
        $produits_de_meme_categorie = $category->produits;
    


        return view("client.detail_produit")->with(['Produit'=>$Produit, 'produits_de_meme_categorie' => $produits_de_meme_categorie] );
    }
    



    // Affichage de la page view panier page
    public function viewPanierPage(){
        return view("client.panier");
    }

    // Affichage de la page view checkout page
    public function viewCheckoutPage(){
        return view("client.checkout");
    }

    // Affichage de la page view login page
    public function viewLoginPage(){
        return view("client.authentification.login");
    }
    
    // Affichage de la page view register page
    public function viewRegisterPage(){
        return view("client.authentification.register");
    }
 

    
    // Affichage de la page contact
    public function viewContactPage(){
        return view("client.contact");
    }


    //pour la creation de mon panier
    public function addToCart(Request $request, $id){

        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($id,$request->nom_produit,$request->image_produit,$request->prix_produit,$request->quantite_produit, $request->taille_produit,$request->couleur_produit, $request->quantite_max );
        Session::put('cart', $cart);
        // Session::put('topCart', $cart->items);
        return back();
    }


    public function removeToCart(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if ($cart->totalQty == 0) {
            $request->session()->forget('cart');
        } else {
            $request->session()->put('cart', $cart);
        }
        

        return redirect()->back()->with('success', 'Produit rétiré du panier avec succèes.');
    }

}
