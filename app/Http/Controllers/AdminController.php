<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users_count' => User::count() - 1,
            'annonces_count' => Annonce::count(),
            'reservations_count' => 0,
            'signalements_count' => 0,
        ];

        // Récupérer les annonces récentes
        $annonces = Annonce::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'annonces'));
    }

    public function deleteAnnonce($id)
{
    $annonce = Annonce::findOrFail($id);
    $annonce->delete();
    
    return redirect()->route('admin.dashboard')
        ->with('success', 'Annonce supprimée avec succès');
}
}
