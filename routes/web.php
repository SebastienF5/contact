<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddContactController;

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
//     return view('contact');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/',[ContactController::class,'show'])->middleware('auth')->name('contact');
Route::get('/addcontact',[AddContactController::class,'show'])->middleware('auth')->name('addcontact');
Route::get('/singlecontact/{id}',[ContactController::class,'showContact'])->middleware('auth')->name('getContact');

Route::post('/addcontact',[AddContactController::class,'add'])->middleware('auth')->name('addcontact.add');

require __DIR__.'/auth.php';
