<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController; 
use App\Http\Controllers\EspaceClientController;

use App\Http\Controllers\SlideController;  
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\TailleController; 
use App\Http\Controllers\CouleurController;
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


// Routes slide

Route::prefix('admin/dashboard/slide')->group(function () {

    Route::get('/addSlide',  [SlideController::class, 'addSlide'])->name("ajoutSlide");
    Route::post('/saveSlide',  [SlideController::class, 'saveSlide'])->name("saveSlide");
    Route::get('/allSlide',  [SlideController::class, 'allSlide'])->name("allSlide");
    Route::get('/showEditSlide/{id}',  [SlideController::class, 'showEditSlide'])->name("showEditSlide");
    Route::post('/updateSlide/{id}',  [SlideController::class, 'updateSlide'])->name("updateSlide");
    Route::get('/deleteSlide/{id}',  [SlideController::class, 'deleteSlide'])->name("deleteSlide");

});



// Routes Categories

Route::prefix('admin/dashboard/categories')->group(function () {

    Route::get('/addCategorie',  [CategoriesController::class, 'addCategorie'])->name("ajoutCategorie");
    Route::post('/saveCategorie',  [CategoriesController::class, 'saveCategorie'])->name("saveCategorie");
    Route::get('/allCategorie',  [CategoriesController::class, 'allCategorie'])->name("allCategorie");
    Route::get('/showEditCategorie/{id}',  [CategoriesController::class, 'showEditCategorie'])->name("showEditCategorie");
    Route::post('/updateCategorie/{id}',  [CategoriesController::class, 'updateCategorie'])->name("updateCategorie");
    Route::get('/deleteCategorie/{id}',  [CategoriesController::class, 'deleteCategorie'])->name("deleteCategorie");

});


// Routes Sous Categories

Route::prefix('admin/dashboard/sous-categorie')->group(function () {

    Route::get('/addSousCategorie',  [SousCategoriesController::class, 'addSousCategorie'])->name("ajoutSousCategorie");
    Route::post('/saveSousCategorie',  [SousCategoriesController::class, 'saveSousCategorie'])->name("saveSousCategorie");
    Route::get('/allSousCategorie',  [SousCategoriesController::class, 'allSousCategorie'])->name("allSousCategorie");
    Route::get('/showEditSousCategorie/{id}',  [SousCategoriesController::class, 'showEditSousCategorie'])->name("showEditSousCategorie");
    Route::post('/updateSousCategorie/{id}',  [SousCategoriesController::class, 'updateSousCategorie'])->name("updateSousCategorie");
    Route::get('/deleteSousCategorie/{id}',  [SousCategoriesController::class, 'deleteSousCategorie'])->name("deleteSousCategorie");

});

// Routes Taille

Route::controller(TailleController::class)->prefix('admin/dashboard/taille')->group(function () {

    Route::get('/addTaille',  'addTaille')->name("ajoutTaille");
    Route::post('/saveTaille',  'saveTaille')->name("saveTaille");
    Route::get('/allTaille',   'allTaille')->name("allTaille");
    Route::get('/showEditTaille/{id}',   'showEditTaille')->name("showEditTaille");
    Route::post('/updateTaille/{id}', 'updateTaille')->name("updateTaille");
    Route::get('/deleteTaille/{id}', 'deleteTaille')->name("deleteTaille");

});


// Routes Couleur

Route::controller(CouleurController::class)->prefix('admin/dashboard/couleur')->group(function () {

    Route::get('/addCouleur',  'addCouleur')->name("ajoutCouleur");
    Route::post('/saveCouleur',   'saveCouleur')->name("saveCouleur");
    Route::get('/allCouleur', 'allCouleur')->name("allCouleur");
    Route::get('/showEditCouleur/{id}',  'showEditCouleur')->name("showEditCouleur");
    Route::post('/updateCouleur/{id}','updateCouleur')->name("updateCouleur");
    Route::get('/deleteCouleur/{id}', 'deleteCouleur')->name("deleteCouleur");

});




// Routes Product

Route::controller(ProductController::class)->prefix('admin/dashboard/product')->group(function () {

    Route::get('/addProduct', 'addProduct')->name("addProduct");
    // Route::post('/saveProduct',  'saveProduct')->name("saveProduct");
    Route::get('/allProduct',  'allProduct')->name("allProduct");
    // Route::get('/showEditProduct/{id}',  'showEditProduct')->name("showEditProduct");
    // Route::post('/updateProduct/{id}', 'updateProduct')->name("updateProduct");
    // Route::get('/deleteProduct/{id}',  'deleteProduct')->name("deleteProduct");

});






