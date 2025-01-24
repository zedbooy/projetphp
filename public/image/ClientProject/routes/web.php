<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('home');
});


Route::get('/signin', function () {
    return view('signin');
});

Route::get('/registre', function () {
    return view('registre');
});

Route::get('/register', [ClientController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [ClientController::class, 'register'])->name('register');



    
// });
// Route::get('{n}', function($n) {
//     return 'Je suis la page ' . $n . ' !';
// });
// Route::get('{n}', function($n) {
//     return 'Je suis la page ' . $n . ' !';
// })->where('n', '[1-3]');

// Route::get('{n}', function($n) {
//     return view('testView', ['numPage'=>$n]);
// });

// Route::get('/{n}', function(Request $request) {
//     return view('testView', ['numPage'=>$request->n, 'tabOfNames'=> ['amine', 'ali']]);
// });



