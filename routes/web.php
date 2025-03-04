<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\TouristeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Dashboard pour les touristes
Route::middleware(['auth', 'verified', 'role:touriste'])->group(function () {
    Route::get('/touriste/dashboard', [TouristeController::class, 'dashboard'])->name('touriste.dashboard');

 // Page des favoris
//  Route::get('/touriste/favorites', function () {
//     return view('touriste.favorites');
// })->name('touriste.favorites');



// Routes pour mettre à jour le profil
// Route::put('/touriste/profile/update', [ProfileController::class, 'update'])->name('touriste.profile.update');

// Route::get('/search', [TouristeController::class, 'search'])->name('touriste.search');
// Route::get('/annonces/{id}', [TouristeController::class, 'showAnnonce'])->name('touriste.annonce.show');
// Route::get('/favorites', [TouristeController::class, 'favorites'])->name('touriste.favorites');
// Route::post('/toggle-favorite', [TouristeController::class, 'toggleFavorite'])->name('touriste.toggle-favorite');


});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


 //  propriétaires routes
Route::middleware(['auth', 'role:proprietaire'])->prefix('proprietaire')->group(function () {
    Route::get('/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaire.dashboard');
    
    Route::resource('annonces', ProprietaireController::class);
});

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.userprofile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.userprofile.update');
Route::post('/profile/photo', [ProfileController::class, 'updateProfilePhoto'])->name('profile.userprofile.photo');

// administrateurs routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('admin.dashboard');
    // Route::delete('/annonces/{id}', [AdminController::class, 'deleteAnnonce'])
    //         ->name('admin.annonces.delete');
    });


require __DIR__.'/auth.php';