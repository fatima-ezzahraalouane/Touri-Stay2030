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
            'images' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);
    }
}
