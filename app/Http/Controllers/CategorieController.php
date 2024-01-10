<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function list()
{
    $categories = Categorie::all();
    return view('pages.categories.list', compact('categories'));
}

public function formulaire()
{
    return view('pages.categories.formulaire');
}

public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string',
        'description' => 'required|string',
    ]);

    Categorie::create($request->all());
    return redirect()->route('categories.list')->with('success', 'Type ajouté avec succès');
       

}

public function show(Categorie $categorie)
{
    return view('pages.categories.detail', compact('categorie'));
}

public function edit(Categorie $categorie)
{
    return view('pages.categories.edit', compact('categorie'));
}

public function update(Request $request, Categorie $categorie)
{
    $request->validate([
        'type' => 'required|string',
        'description' => 'required|string',
    ]);

    // Utiliser la méthode fill pour définir explicitement le champ à mettre à jour
    $categorie->fill(['type' => $request->input('type')]);
    $categorie->fill(['description' => $request->input('description')]);
    $categorie->save();

    return redirect()->route('categories.list')
        ->with('success', 'Type modifié avec succès');
}

public function destroy(Categorie $categorie)
{
    $categorie->delete();

    return redirect()->route('categories.list')
        ->with('success', 'type supprimé avec succès');
}

}
