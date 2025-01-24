<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function create()
    {
        $files = File::all();
        return view('etudiant', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
        ]);

        return back()->with('success', 'Fichier téléchargé avec succès.');
    }

    public function upload(Request $request)
    {
        $files = [];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $status = $file->isValid() ? 'Valid' : 'Invalid';
            $files[] = [
                'name' => $file->getClientOriginalName(),
                'status' => $status
            ];
        }

        return redirect()->back()->with('files', $files);
    }
}
