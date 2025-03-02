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

        $annonces = Annonce::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10);
        
        
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
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'pays' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'equipements' => 'nullable|array',
            'disponible_du' => 'required|date',
            'disponible_au' => 'required|date|after:disponible_du',
            'images' => 'required|max:255',
        ]);

        //conversion des equipements en chaine json
        $equipements = $request->has('equipements') ? json_encode($request->equipements) : json_encode([]);

        //creation d'annonce
        $annonce = Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'pays' =>$validated['pays'],
            'ville' => $validated['ville'],
            'prix' => $validated['prix'],
            'equipements' => $equipements,
            'disponible_du' => $validated['disponible_du'],
            'disponible_au' => $validated['disponible_au'],
            'images' => $validated['images'],
        ]);

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
}
