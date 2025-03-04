<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use App\Models\Favorite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TouristeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:touriste');
    }

    public function dashboard(Request $request)
    {
        $perPage = $request->perPage ?? 10;

        // recuperer tous les annonces
        $annonces = Annonce::whereDate('disponible_au', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        // recuperer les favoris 
        $favorites = Favorite::where('user_id', Auth::id())
            ->pluck('annonce_id');

        // populair ville
        $popularCities = [
            ['name' => 'Casablanca', 'country' => 'Maroc', 'image' => 'https://s3.hosteur.io/gazette-prod-public/gazetteWeb/662f4295514c09a4288b5117/articles/67c5d891fe6ef18fdffb6efc/files/1168612/a-mosque-assan-2-asablanca.webp'],
            ['name' => 'Madrid', 'country' => 'Espagne', 'image' => 'https://a.travel-assets.com/findyours-php/viewfinder/images/res70/348000/348698-Madrid.jpg'],
            ['name' => 'Lisbonne', 'country' => 'Portugal', 'image' => 'https://lisboacard.fr/wp-content/uploads/2022/08/lisboa-card.jpg'],
        ];

        return view('touriste.dashboard', compact('annonces', 'favorites', 'popularCities'));
    }

    public function search(Request $request)
    {
        $query = Annonce::query();
        
        //rechercher par ville et date
        if ($request->filled('city')) {
            $query->where('ville', 'like', '%' . $request->city . '%');
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('disponible_du', '<=', $request->date_from)
                  ->whereDate('disponible_au', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('disponible_au', '>=', $request->date_to);
        }
        

        $perPage = $request->perPage ?? 10;
        
        $annonces = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        //recuperer les favoris
        $favorites = Favorite::where('user_id', Auth::id())
                          ->pluck('annonce_id');
        
        //populair ville 
        $popularCities = [
            ['name' => 'Casablanca', 'country' => 'Maroc', 'image' => 'https://s3.hosteur.io/gazette-prod-public/gazetteWeb/662f4295514c09a4288b5117/articles/67c5d891fe6ef18fdffb6efc/files/1168612/a-mosque-assan-2-asablanca.webp'],
            ['name' => 'Madrid', 'country' => 'Espagne', 'image' => 'https://a.travel-assets.com/findyours-php/viewfinder/images/res70/348000/348698-Madrid.jpg'],
            ['name' => 'Lisbonne', 'country' => 'Portugal', 'image' => 'https://lisboacard.fr/wp-content/uploads/2022/08/lisboa-card.jpg'],
        ];
        
        return view('touriste.dashboard', compact('annonces', 'favorites', 'popularCities'));
    }
    
    public function showAnnonce($id)
    {
        $annonce = Annonce::findOrFail($id);
        $isFavorite = Favorite::where('user_id', Auth::id())
                            ->where('annonce_id', $id)
                            ->exists();
        
        return view('annonces.show', compact('annonce', 'isFavorite'));
    }
    
    public function toggleFavorite(Request $request)
    {
        $request->validate([
            'annonce_id' => 'required|exists:annonces,id',
            'is_favorite' => 'required|boolean'
        ]);
        
        if ($request->is_favorite) {
            //supprimer de favoris
            Favorite::where('user_id', Auth::id())
                  ->where('annonce_id', $request->annonce_id)
                  ->delete();
        } else {
            //ajouter a favoris
            Favorite::create([
                'user_id' => Auth::id(),
                'annonce_id' => $request->annonce_id
            ]);
        }
        
        return response()->json(['success' => true]);
    }
    
    public function favorites()
    {
        $favorisIds = Favorite::where('user_id', Auth::id())->pluck('annonce_id');
        $annonces = Annonce::whereIn('id', $favorisIds)->paginate(10);
        $favorites = $favorisIds; //afficher annonces favoris
        
        return view('touriste.favorites', compact('annonces', 'favorites'));
    }
}
