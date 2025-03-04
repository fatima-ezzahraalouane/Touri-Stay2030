<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - {{ $annonce->titre }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }

        .worldcup-card {
            border-left: 4px solid #862633;
        }

        @keyframes pulse-soccer {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .soccer-pulse {
            animation: pulse-soccer 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="worldcup-gradient bg-[#862633] shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('proprietaire.dashboard') }}" class="flex items-center">
                        <span class="text-2xl font-bold text-white"><i class="fas fa-futbol mr-2"></i>TouriStay 2030
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4">
                        <button class="text-white hover:text-[#009A44] transition-colors duration-300">
                            <i class="far fa-bell text-xl"></i>
                        </button>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="bg-[#009A44] hover:bg-[#007A34] text-white px-4 py-2 rounded-md font-medium transition duration-300 flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('proprietaire.dashboard') }}"
                class="flex items-center text-[#862633] hover:text-[#6E1F2A] transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                <span class="font-medium">Retour au tableau de bord</span>
            </a>
        </div>

        <!-- Listing Details Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <!-- Image Gallery with World Cup Theme -->
            <div class="h-96 bg-gray-300 relative">
                <img src="{{ $annonce->images }}"
                    alt="{{ $annonce->titre }}"
                    class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="inline-block bg-[#009A44] text-white px-3 py-1 rounded-full text-sm font-medium mb-2">
                                Mondial 2030
                            </span>
                            <h1 class="text-3xl font-bold text-white">{{ $annonce->titre }}</h1>
                        </div>
                        <div class="text-white text-right">
                            <div class="text-3xl font-bold">{{ $annonce->prix }} DH</div>
                            <div class="text-sm">par nuit</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listing Info Section -->
            <div class="p-8">
                <!-- Main Info -->
                <div class="flex justify-between items-start mb-8">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                        <div class="worldcup-gradient px-3 py-1 bg-[#862633] text-white rounded-full text-sm">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $annonce->pays }} , {{ $annonce->ville }}
                            </div>
                            <div class="worldcup-gradient px-3 py-1 bg-[#009A44] text-white rounded-full text-sm">
                                <i class="fas fa-calendar-check mr-1"></i>
                                Disponible
                            </div>
                        </div>
                    </div>

                    <!-- Price and Availability Card -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="text-center mb-4">
                            <p class="text-4xl font-bold text-[#862633]">{{ $annonce->prix }} DH</p>
                            <p class="text-gray-600">par nuit</p>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar-alt text-[#009A44] mr-2"></i>
                                <span>Du:  {{ \Carbon\Carbon::parse($annonce->disponible_du)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar-check text-[#009A44] mr-2"></i>
                                <span>Au:  {{ \Carbon\Carbon::parse($annonce->disponible_au)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-[#862633] mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Description
                    </h2>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <p class="text-gray-700 whitespace-pre-line">{{ $annonce->description }}</p>
                    </div>
                </div>

                <!-- Equipments Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-[#862633] mb-4 flex items-center">
                        <i class="fas fa-concierge-bell mr-2"></i>
                        Équipements disponibles
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @php
                        $equipements = json_decode($annonce->equipements, true) ?? [];
                        $equipementIcons = [
                        'Wifi' => 'fas fa-wifi',
                        'Climatisation' => 'fas fa-snowflake',
                        'Cuisine' => 'fas fa-utensils',
                        'TV' => 'fas fa-tv',
                        'Parking' => 'fas fa-parking',
                        'Piscine' => 'fas fa-swimming-pool'
                        ];
                        @endphp

                        @foreach($equipements as $equipement)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg border border-gray-200">
                            <i class="{{ $equipementIcons[$equipement] ?? 'fas fa-check' }} text-[#009A44] mr-3"></i>
                            <span class="text-gray-700">{{ $equipement }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Statistics Section -->
                <!-- <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h2 class="text-xl font-bold text-[#862633] mb-6 flex items-center">
                        <i class="fas fa-chart-line mr-2"></i>
                        Statistiques de l'annonce
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-white rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#862633] mb-1">24</div>
                            <div class="text-gray-600">
                                <i class="fas fa-eye mr-1"></i>
                                Vues totales
                            </div>
                        </div>
                        <div class="text-center p-4 bg-white rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#009A44] mb-1">4</div>
                            <div class="text-gray-600">
                                <i class="fas fa-calendar-check mr-1"></i>
                                Réservations
                            </div>
                        </div>
                        <div class="text-center p-4 bg-white rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#862633] mb-1">8</div>
                            <div class="text-gray-600">
                                <i class="fas fa-heart mr-1"></i>
                                Favoris
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Footer with World Cup 2030 Theme -->
    <footer class="worldcup-gradient bg-[#862633] text-white mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand Section -->
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <span>TouriStay 2030</span>
                    </h3>
                    <p class="text-gray-300">
                        Votre plateforme officielle d'hébergement pour la Coupe du Monde 2030.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                                <i class="fas fa-home mr-2 text-[#009A44]"></i>
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                                <i class="fas fa-info-circle mr-2 text-[#009A44]"></i>
                                Comment ça marche
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                                <i class="fas fa-question-circle mr-2 text-[#009A44]"></i>
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                                <i class="fas fa-envelope mr-2 text-[#009A44]"></i>
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Nous contacter</h3>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-envelope mr-3 text-[#009A44]"></i>
                            <span>contact@touristay2030.com</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-phone mr-3 text-[#009A44]"></i>
                            <span>+212 5XX XXX XXX</span>
                        </div>
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-map-marker-alt mr-3 text-[#009A44]"></i>
                            <span>Maroc - Espagne - Portugal</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-white/20 mt-8 pt-6 text-center">
                <p class="text-gray-300">
                    &copy; TouriStay 2030. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>