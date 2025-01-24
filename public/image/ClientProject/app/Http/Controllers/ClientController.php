<?php
   namespace App\Http\Controllers;

   use App\Models\Stagiaire;
   use Illuminate\Http\Request;
   
   class StagiaireController extends Controller
   {
       public function index()
       {
           $stagiaires = Stagiaire::all();
           return view('stagiaires.index', compact('stagiaires'));
       }
   
       // Autres méthodes du contrôleur
   }
   