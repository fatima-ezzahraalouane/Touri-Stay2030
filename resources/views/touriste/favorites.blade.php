@extends('layouts.touriste')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-t-4 border-[#862633]">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-[#862633] mb-4 flex items-center">
                        <i class="fas fa-star mr-3"></i>
                        Mes hébergements favoris
                    </h1>
                    <p class="text-gray-600">
                        Hébergements sauvegardés pour la Coupe du Monde 2030
                    </p>
                </div>
            </div>
        </div>

        <!-- Favorites Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($annonces as $annonce)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border-t-4 border-[#009A44]">
                    <div class="relative">
                        <img src="{{ $annonce->images }}" 
                             alt="{{ $annonce->titre }}" 
                             class="w-full h-56 object-cover">
                        <button class="absolute top-4 right-4 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-[#862633] transition-colors duration-300 group">
                            <i class="fas fa-heart text-[#862633] text-xl group-hover:text-white"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-[#862633] mb-3">{{ $annonce->titre }}</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-[#009A44]"></i>
                                {{ $annonce->pays }} , {{ $annonce->ville }}
                            </p>
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-bed mr-2 text-[#009A44]"></i>
                                3 chambres 
                                <span class="mx-2">·</span>
                                <i class="fas fa-bath text-[#009A44]"></i>
                                2 salles de bain
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-bold text-[#009A44]">{{ $annonce->prix }} DH/nuit</span>
                                <a href="#" class="worldcup-gradient bg-[#862633] hover:bg-[#6E1F2A] text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-xl shadow-md p-8 text-center border-t-4 border-[#862633]">
                    <i class="fas fa-heart text-[#862633] text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Vous n'avez pas encore d'hébergements favoris.</p>
                    <p class="text-gray-400 mt-2">Explorez les hébergements disponibles pour le Mondial 2030</p>
                    <a href="{{ route('touriste.dashboard') }}" 
                       class="inline-block mt-4 bg-[#009A44] hover:bg-[#007A34] text-white px-6 py-2 rounded-md transition duration-300">
                        <i class="fas fa-search mr-2"></i>
                        Découvrir les hébergements
                    </a>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation pour retirer des favoris
        document.querySelectorAll('.fa-heart').forEach(heart => {
            heart.addEventListener('click', function() {
                const card = this.closest('.bg-white');
                card.classList.add('scale-0', 'opacity-0', 'transition-all', 'duration-300');
                setTimeout(() => {
                    card.remove();
                    
                    // Vérifier s'il reste des favoris
                    const remainingCards = document.querySelectorAll('.fa-heart').length;
                    if (remainingCards === 0) {
                        location.reload(); // Recharger pour afficher le message "aucun favori"
                    }
                }, 300);

                // Notification
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-4 right-4 bg-[#862633] text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in';
                toast.innerHTML = '<i class="fas fa-check-circle mr-2"></i>Retiré des favoris';
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
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
</style>
@endsection