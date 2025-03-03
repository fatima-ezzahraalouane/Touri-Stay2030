<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Annonce;

class ProprietaireController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id(); //pour recuperer id du propietaire

        $annonces = Annonce::where('user_id', $userId)->orderBy('created_at', 'asc')->paginate(4);

        return view('proprietaire.dashboard', compact('annonces'));
    }

    //afficher formulaire de creer nouvelle annonce
    public function create()
    {
        return view('annonces.create');
    }

    //enregistrer nouvelle annonce dans database
    public function store(Request $request)
    {
        // dd("methode store() executee!");
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'pays' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'equipements' => 'nullable|array',
            'disponible_du' => 'required|date',
            'disponible_au' => 'required|date|after:disponible_du',
            'images' => 'required|url|max:255',
        ]);

        //conversion des equipements en chaine json
        // $equipements = $request->has('equipements') ? json_encode($request->equipements) : json_encode([]);
        $equipements = json_encode($validated['equipements'] ?? []);

        //creation d'annonce
        $annonce = Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'pays' => $validated['pays'],
            'ville' => $validated['ville'],
            'prix' => $validated['prix'],
            'equipements' => $equipements,
            'disponible_du' => $validated['disponible_du'],
            'disponible_au' => $validated['disponible_au'],
            'images' => $validated['images'],
        ]);

        // if ($annonce) {
        //     dd("Annonce ajoutée avec succès !");
        // } else {
        //     dd("Erreur lors de l'ajout !");
        // }


        return redirect()->route('proprietaire.dashboard')->with('success', 'Votre annonce a été publiée avec succès!');
    }

    //aficher une annonce specifique
    public function show(Annonce $annonce)
    {
        //verifier l'utilisateur est proprietaire de l'annonce
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\étes pas autorisé à accéder à cette annonce.');
        }

        return view('annonces.show', compact('annonce'));
    }

    //affiche formulaire de modifier une annonce
    public function edit(Annonce $annonce)
    {
        //verifier l'utilisateur est proprietaire de l'annonce
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\étes pas autorisé à modifier cette annonce.');
        }

        return view('annonces.edit', compact('annonce'));
    }
}
