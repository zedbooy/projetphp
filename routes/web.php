<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\AnnanceController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/annance', [AnnanceController::class, 'index'])->name('annance.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/signin', [AuthController::class, 'showSignInForm'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn'])->name('signin.post');

Route::get('/registre', [AuthController::class, 'showRegistreForm'])->name('registre');
Route::post('/registre', [AuthController::class, 'register'])->name('registre.post');

Route::get('/formateur', [StagiaireController::class, 'index'])->name('formateur.index');
Route::post('/formateur', [StagiaireController::class, 'store'])->name('formateur.store');
Route::put('/formateur/{stagiaire}', [StagiaireController::class, 'update'])->name('formateur.update');
Route::delete('/formateur/{stagiaire}', [StagiaireController::class, 'destroy'])->name('formateur.destroy');
Route::patch('/formateur/{stagiaire}/confirm', [StagiaireController::class, 'confirm'])->name('formateur.confirm');


Route::get('/etudiant', function () {
    return view('etudiant');
})->name('etudiant');

Route::get('/routes', function () {
    return response()->json(Route::getRoutes());
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\FileController;

Route::get('/etudiant', [FileController::class, 'create']);
Route::post('/etudiant', [FileController::class, 'store'])->name('file.upload');



Route::get('/formateur', [StagiaireController::class, 'index'])->name('formateur.index');
Route::post('/formateur', [StagiaireController::class, 'store'])->name('formateur.store');
Route::put('/formateur/{user}', [StagiaireController::class, 'update'])->name('formateur.update');
Route::delete('/formateur/{user}', [StagiaireController::class, 'destroy'])->name('formateur.destroy');
Route::get('/', function () {return view('home');})->name('home');

use App\Http\Controllers\JureeController;
Route::get('/juree', [JureeController::class, 'showJuree'])->name('juree');
Route::post('/validate-task/{id}', [JureeController::class, 'validateTask']);
Route::post('/refuse-task/{id}', [JureeController::class, 'refuseTask']);