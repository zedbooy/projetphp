<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class AnnanceController extends Controller
{
    public function index()
    {
        
        $comments = Comment::with('user')->get();

        
        return view('annance', compact('comments'));
    }
}