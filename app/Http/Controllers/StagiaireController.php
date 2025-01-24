<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StagiaireController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('formateur', compact('users')); // Pass the data to the 'formateur' view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'groupe' => 'required|string|max:255',
            'jury_name' => 'required|string|max:255',
            'stage' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'groupe' => $validated['groupe'],
            'jury_name' => $validated['jury_name'],
            'stage' => $validated['stage'],
            'major' => $validated['major'],
            'password' => bcrypt('password'), // Default password, you may want to handle this differently
        ]);

        return redirect()->back()->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'groupe' => 'required|string|max:255',
            'jury_name' => 'required|string|max:255',
            'stage' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('formateur.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}