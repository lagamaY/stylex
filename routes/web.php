<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController; 
use App\Http\Controllers\EspaceClientController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route pour l'affichage de la page d'accueil

Route::get('/',  [ClientController::class, 'viewIndex'])->name('accueil');

Route::get('/boutique',  [ClientController::class, 'viewBoutiquePage'])->name('boutique');

Route::get('/panier',  [ClientController::class, 'viewPanierPage'])->name('panier');

Route::get('/checkout',  [ClientController::class, 'viewCheckoutPage'])->name('panier');

Route::get('/detailProduit',  [ClientController::class, 'viewProductDetailPage'])->name('detail_produit');



// Route pour l'affichage de la page static Contact
Route::get('/contact',  [ClientController::class, 'viewContactPage'])->name('contact');

// Authentification compte client
Route::get('/login',  [ClientController::class, 'viewLoginPage'])->name('login_client');
Route::get('/register',  [ClientController::class, 'viewRegisterPage'])->name('register_client');








// Routes du compte client

Route::prefix('compte/client')->group(function () {

    Route::get('/accueil', [EspaceClientController::class, 'getAccueil'])->name('compte_client_accueil');

        // Matches The "/admin/login" URL
    
});