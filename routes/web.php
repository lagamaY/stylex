<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController; 
use App\Http\Controllers\EspaceClientController;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TailleController; 
use App\Http\Controllers\CouleurClientController;
use App\Http\Controllers\ProductController;

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

Route::prefix('admin/dashboard/categorie')->group(function () {

    Route::get('/addCategorie',  [CategoriesController::class, 'addCategorie'])->name("ajoutCategorie");
    Route::post('/saveCategorie',  [CategoriesController::class, 'saveCategorie'])->name("saveCategorie");
    Route::get('/allCategorie',  [CategoriesController::class, 'allCategorie'])->name("allCategorie");
    Route::get('/showEditCategorie/{id}',  [CategoriesController::class, 'showEditCategorie'])->name("showEditCategorie");
    Route::post('/updateCategorie/{id}',  [CategoriesController::class, 'updateCategorie'])->name("updateCategorie");
    Route::get('/deleteCategorie/{id}',  [CategoriesController::class, 'deleteCategorie'])->name("deleteCategorie");

});

// Routes Taille

Route::prefix('admin/dashboard/taille')->group(function () {

    Route::get('/addTaille',  [TailleController::class, 'addTaille'])->name("ajoutTaille");
    Route::post('/saveTaille',  [TailleController::class, 'saveTaille'])->name("saveTaille");
    // Route::get('/allTaille',  [TailleController::class, 'allTaille'])->name("allTaille");
    // Route::get('/showEditTaille/{id}',  [TailleController::class, 'showEditTaille'])->name("showEditTaille");
    // Route::post('/updateTaille/{id}',  [TailleController::class, 'updateTaille'])->name("updateTaille");
    // Route::get('/deleteTaille/{id}',  [TailleController::class, 'deleteTaille'])->name("deleteTaille");

});


// Routes Couleur

// Route::prefix('admin/dashboard/couleur')->group(function () {

//     Route::get('/addCouleur',  [CouleurController::class, 'addCouleur'])->name("ajoutCouleur");
//     Route::post('/saveCouleur',  [CouleurController::class, 'saveCouleur'])->name("saveCouleur");
//     Route::get('/allCouleur',  [CouleurController::class, 'allCouleur'])->name("allCouleur");
//     Route::get('/showEditCouleur/{id}',  [CouleurController::class, 'showEditCouleur'])->name("showEditCouleur");
//     Route::post('/updateCouleur/{id}',  [CouleurController::class, 'updateCouleur'])->name("updateCouleur");
//     Route::get('/deleteCouleur/{id}',  [CouleurController::class, 'deleteCouleur'])->name("deleteCouleur");

// });

// Routes Product

// Route::prefix('admin/dashboard/product')->group(function () {

//     Route::get('/addProduct',  [ProductController::class, 'addProduct'])->name("ajoutProduct");
//     Route::post('/saveProduct',  [ProductController::class, 'saveProduct'])->name("saveProduct");
//     Route::get('/allProduct',  [ProductController::class, 'allProduct'])->name("allProduct");
//     Route::get('/showEditProduct/{id}',  [ProductController::class, 'showEditProduct'])->name("showEditProduct");
//     Route::post('/updateProduct/{id}',  [ProductController::class, 'updateProduct'])->name("updateProduct");
//     Route::get('/deleteProduct/{id}',  [ProductController::class, 'deleteProduct'])->name("deleteProduct");

// });



