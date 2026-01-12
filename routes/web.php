<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\produitcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartenairePdfController;
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

Route::get('/', [produitcontroller::class, 'index'])->name('index');

Route::get('/produit/{id}/{slug}', [produitcontroller::class,'plus'])->name('produit');

// Route pour le PDF des partenaires
Route::get('/partenaires/{partenaire}/pdf', [PartenairePdfController::class, 'generate'])
    ->name('partenaire.pdf')->middleware('auth');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/produit', [produitcontroller::class, 'produit'])->name('produit');

Route::get('/faq', [produitcontroller::class, 'faq'])->name('faq');

Route::post('/partenaires/engagement', [produitcontroller::class,'storePartenaire'])->name('devenir.partenaire');

Route::get('/partenaires/engagement',[produitcontroller::class,'angagement'])->name('partner.engagement');
