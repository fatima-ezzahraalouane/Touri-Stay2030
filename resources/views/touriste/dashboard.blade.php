@extends('layouts.touriste')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="worldcup-gradient rounded-xl shadow-lg p-8 mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-futbol mr-3"></i>
                    Bienvenue sur TouriStay 2030
                </h1>
                <p class="text-white text-lg mb-6">
                    Trouvez votre hébergement idéal pour la Coupe du Monde 2030 au Maroc, en Espagne et au Portugal
                </p>
            </div>
        </div>
        
        <!-- Search Bar -->
        <div class="bg-white p-6 rounded-lg shadow-md backdrop-blur-sm">
            <form action="{{ route('touriste.search') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4">
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full md:w-1/3">
                        <label class="block text-[#862633] text-sm font-medium mb-2">Ville hôte</label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-[#862633]"></i>
                            <input type="text" name="city" placeholder="Choisir une ville" 
                                   class="w-full rounded-md border-[#862633] shadow-sm p-3 pl-10 border focus:outline-none focus:ring-2 focus:ring-[#862633]">
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label class="block text-[#862633] text-sm font-medium mb-2">Date d'arrivée</label>
                        <div class="relative">
                            <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-[#862633]"></i>
                            <input type="date" name="date_from" 
                                   class="w-full rounded-md border-[#862633] shadow-sm p-3 pl-10 border focus:outline-none focus:ring-2 focus:ring-[#862633]">
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label class="block text-[#862633] text-sm font-medium mb-2">Date de départ</label>
                        <div class="relative">
                            <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-[#862633]"></i>
                            <input type="date" name="date_to" 
                                   class="w-full rounded-md border-[#862633] shadow-sm p-3 pl-10 border focus:outline-none focus:ring-2 focus:ring-[#862633]">
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-auto">
                    <button type="submit" class="w-full md:w-auto worldcup-gradient hover:bg-[#007A34] text-white font-bold py-3 px-6 rounded-md transition duration-300 flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i>
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Listings Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#862633] flex items-center">
                <i class="fas fa-building mr-3"></i>
                Hébergements disponibles
            </h2>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="text-[#862633]">Afficher:</span>
                    <form id="perPageForm" action="{{ route('touriste.dashboard') }}" method="GET">
                        <select id="perPage" name="perPage" 
                                onchange="document.getElementById('perPageForm').submit()" 
                                class="rounded-md border-[#862633] shadow-sm p-2 border focus:ring-2 focus:ring-[#862633]">
                            <option value="4" {{ request('perPage') == 4 ? 'selected' : '' }}>4</option>
                            <option value="10" {{ request('perPage') == 10 || !request('perPage') ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        </select>
                    </form>
                    <span class="text-[#862633]">par page</span>
                </div>
            </div>
        </div>

        <!-- Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($annonces as $annonce)
                <!-- Listing Item -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-t-4 border-[#862633]">
                    <div class="relative">
                        <img src="{{ $annonce->images }}" 
                             alt="{{ $annonce->titre }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <button class="favorite-btn bg-white/90 rounded-full p-2 shadow-md hover:bg-[#862633] transition-colors duration-300" 
                                    data-annonce-id="{{ $annonce->id }}"
                                    data-is-favorite="{{ $favorites->contains($annonce->id) ? 'true' : 'false' }}">
                                <i class="fa-heart {{ $favorites->contains($annonce->id) ? 'fas text-[#862633]' : 'far text-gray-600' }}"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-[#862633] mb-2">{{ $annonce->titre }}</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-[#009A44]"></i>
                                {{ $annonce->pays }} , {{ $annonce->ville }}
                            </p>
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-[#009A44]"></i>
                                {{ \Carbon\Carbon::parse($annonce->disponible_du)->translatedFormat('d F Y') }} - 
                                {{ \Carbon\Carbon::parse($annonce->disponible_au)->translatedFormat('d F Y') }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-bold text-[#009A44]">{{ $annonce->prix }} DH/nuit</span>
                                <a href="{{ route('touriste.annonce.show', $annonce->id) }}" 
                                   class="worldcup-gradient hover:bg-[#6E1F2A] text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 py-8 text-center bg-white rounded-xl shadow-md">
                    <i class="fas fa-home text-[#862633] text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Aucune annonce disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $annonces->appends(['perPage' => request('perPage')])->links() }}
        </div>
    </div>
        <!-- Featured Cities Section -->
        <div>
        <h2 class="text-2xl font-bold text-[#862633] mb-6 flex items-center">
            <i class="fas fa-globe-africa mr-3"></i>
            Villes hôtes du Mondial 2030
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($popularCities as $city)
                <a href="{{ route('touriste.search', ['city' => $city['name']]) }}" 
                   class="relative rounded-xl overflow-hidden shadow-lg group h-64">
                    <img src="{{ $city['image'] }}" 
                         alt="{{ $city['name'] }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#862633]/90 to-transparent flex items-end">
                        <div class="p-2 text-white w-full">
                            <div class="flex justify-between items-end">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $city['name'] }}</h3>
                                    <p class="flex items-center">
                                        <i class="fas fa-flag mr-2 text-[#009A44]"></i>
                                        {{ $city['country'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle favorites with animation
        const favoriteButtons = document.querySelectorAll('.favorite-btn');
        favoriteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const annonceId = this.getAttribute('data-annonce-id');
                const isFavorite = this.getAttribute('data-is-favorite') === 'true';
                
                // Animation de clic
                this.classList.add('scale-110');
                setTimeout(() => this.classList.remove('scale-110'), 200);
                
                fetch('{{ route('touriste.toggle-favorite') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        annonce_id: annonceId,
                        is_favorite: isFavorite
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const heartIcon = this.querySelector('i');
                        heartIcon.classList.toggle('far');
                        heartIcon.classList.toggle('fas');
                        heartIcon.classList.toggle('text-[#862633]');
                        heartIcon.classList.toggle('text-gray-600');
                        
                        this.setAttribute('data-is-favorite', isFavorite ? 'false' : 'true');
                        
                        // Feedback visuel
                        const toast = document.createElement('div');
                        toast.className = 'fixed bottom-4 right-4 bg-[#009A44] text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in';
                        toast.textContent = isFavorite ? 'Retiré des favoris' : 'Ajouté aux favoris';
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 3000);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
    
    .worldcup-gradient {
        background: linear-gradient(135deg, #862633 0%, #009A44 100%);
    }
</style>
@endsection