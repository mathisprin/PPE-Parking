<?php

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

Route::get('/', function () {


    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
});




Route::get('/ListeAttente', function () {
    return view('ListeAttente');
});



Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/user', function () {
    if (session('id') != NULL) {
        return view('user');
    } else {
      return redirect('/');
    }
});

Route::post('/login','loginController@login');

Route::get('/deconnexion','deconnexionController@deconnexion');

Route::get('/user','PlaceController@numPlace');

Route::get('/ListeAttente','ListeAttenteController@InsertListeAttente');

Route::post('/reservation', 'PlaceController@Reservation');

Route::post('/Cancelreservation', 'CancelReservationController@CancelReservation');

Route::get('/','ListeAttenteController@CheckPlace');
