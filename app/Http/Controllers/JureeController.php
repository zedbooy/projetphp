<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JureeController extends Controller
{
    public function showJuree()
    {
        $files = File::all();
        return view('juree', ['files' => $files]);
    }

    public function show()
    {
        $files = File::all();
        return view('files', ['files' => $files]);
    }

    public function validateTask($id)
    {
        $file = File::find($id);
        $file->status= "valid"; // Assuming there's a 'validated' attribute
        $file->save();

        return response()->json(['message' => 'Task validated successfully.']);
    }
        public function refuseTask($id)
    {
        $file = File::find($id);
        $file->status= "refuse"; // Assuming there's a 'validated' attribute
        $file->save();

        return response()->json(['message' => 'Task validated successfully.']);
    }
    }