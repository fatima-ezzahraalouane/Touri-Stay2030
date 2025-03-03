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

        // décoder les équipements depuis le JSON
    $equipements = json_decode($annonce->equipements) ?: [];

        return view('annonces.edit', compact('annonce'));
    }

    //modifier annonce dans database
    public function update(Request $request, Annonce $annonce)
    {
        // verifier que l'utilisateur est le propriétaire de l'annonce
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }

        //validation des donnees
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

        // Conversion des équipements en chaîne JSON
        $equipements = $request->has('equipements') ? json_encode($request->equipements) : json_encode([]);

        // mise à jour de l'annonce
        $annonce->titre = $validated['titre'];
        $annonce->description = $validated['description'];
        $annonce->pays = $validated['pays'];
        $annonce->ville = $validated['ville'];
        $annonce->prix = $validated['prix'];
        $annonce->equipements = $equipements;
        $annonce->disponible_du = $validated['disponible_du'];
        $annonce->disponible_au = $validated['disponible_au'];
        $annonce->images = $validated['images'];
        $annonce->save();

        return redirect()->route('proprietaire.dashboard')->with('success', 'Votre annonce a été mise à jour avec succès!');
    }

    //supprimer l'annonce de database
    public function destroy(Annonce $annonce)
    {
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\étes pas autorisé à supprimer cette annonce.');
        }

        $annonce->delete();

        return redirect()->route('proprietaire.dashboard')->with('succes', 'L\'annonce a été suprimée avec succès!');
    }
}
