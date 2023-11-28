<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\nutritionnistecontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\reservationcontroller;
use App\Http\Controllers\notificationcontroller;
use App\Http\Controllers\nutricontroller;


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
    return view('principale');
});
Route::get('welcome', function () {
    return view('welcome');
})/*->middleware('auth:web')*/;

Route::get('/theme', function () {
    return view('theme');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('navbar', function () {
    return view('navbar');
});

Route::get('accueil', function () {
    return view('accueil');
});
Route::get('apropos', function () {
    return view('apropos');
});
Route::get('nutritionniste', function () {
    return view('nutritionniste');
});
Route::get('liste-reserv', function () {
    return view('liste-reserv');
});
Route::get('contact', function () {
    return view('contact');
});



Route::get('/ajouter-admin', function () { 
    return view('ajouter-admin');
});
Route::get('/ajouter-nutritionniste', function () {
    return view('ajouter-nutritionniste');
});


route::get('modifier-admin/{id}',[admincontroller::class, 'getadminid']);
route::get('modifier-nutritionniste/{id}',[nutritionnistecontroller::class, 'getnutritionnisteid']);


route::get('suppadmin/{id}',[admincontroller::class, 'deleteadmin']);
route::get('suppnutritionniste/{id}',[nutritionnistecontroller::class, 'deletenutritionniste']);

Route::get('/liste-admin',[admincontroller::class,'getadmin']);
Route::get('/liste-nutritionniste',[nutritionnistecontroller::class,'getnutritionniste']);
Route::get('/liste-contact',[contactcontroller::class,'getcontact']);

Route::post('/addadmin',[admincontroller::class,'ajoutadmin']);
Route::post('/addnutritionniste',[nutritionnistecontroller::class,'ajoutnutritionniste']);

Route::post('/updateadmin',[admincontroller::class, 'updateadmin']);
Route::post('/updatenutritionniste',[nutritionnistecontroller::class, 'updatenutritionniste']);



Route::get('/details{id}',[reservationcontroller::class,'getviewrdv']);

Route::post('/addreservation',[reservationcontroller::class,'ajoutreservation']);

Route::get('/nutritionniste',[nutricontroller::class,'getnutritionniste']);

Route::get('/liste-reserv',[reservationcontroller::class,'getreservation']);

Route::get('/accueil', [notificationcontroller::class, 'notif']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
