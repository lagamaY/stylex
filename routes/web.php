<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController; 
use App\Http\Controllers\EspaceClientController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route pour l'affichage de la page d'accueil principal du site

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

Route::prefix('espace/client')->group(function () {

    Route::get('/accueil', [EspaceClientController::class, 'getAccueil'])->name('compte_client_accueil');

});


// Routes Categories

Route::prefix('admin/dashboard')->group(function () {

    Route::get('/addCategorie',  [CategoriesController::class, 'addCategorie'])->name("ajoutCategorie");
    Route::post('/saveCategorie',  [CategoriesController::class, 'saveCategorie'])->name("saveCategorie");
    Route::get('/allCategorie',  [CategoriesController::class, 'allCategorie'])->name("allCategorie");

});

