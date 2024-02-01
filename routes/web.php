<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('homePage');
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('showCategory');


Route::get('/create-announcement', [AnnouncementController::class, 'create'])->middleware('auth')->name('createAnnouncement');
Route::get('/detail-announcement/{announcement}', [AnnouncementController::class, 'showAnnouncements'])->name('showAnnouncements');
Route::get('/all-announcements', [AnnouncementController::class, 'indexAnnouncements'])->name('indexAnnouncements');
Route::get('/work-with-us', [PublicController::class, 'workWithUs'])->name('workWithUs');

//Home revisore
Route::get('/revisor-home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisorIndex');
//Accetta annuncio
Route::patch('/accetta-annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisorAcceptAnnouncement');
//Rifiuta annuncio
Route::patch('/rifiuta-annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisorRejectAnnouncement');
// Richiesta diventa revisore
Route::get('/revisor-request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('becomeRevisor');
// Rendi utente revisore
Route::get('/make-revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');
// Annulla revisione
Route::patch('/undo-revision', [RevisorController::class, 'undoRev'])->name('revisorUndo');
// ricerca annuncio
Route::get('/search-announcement', [PublicController::class, 'searchAnnouncements'])->name('searchAnnouncements');

//Rotta per lingua
Route::post('/lang/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');