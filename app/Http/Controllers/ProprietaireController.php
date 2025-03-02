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

    //afficher formulaire de creer nouvel annonce
    public function create()
    {
        return view('annonces.create');
    }
}
