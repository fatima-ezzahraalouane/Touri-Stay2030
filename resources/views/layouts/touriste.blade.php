<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - @yield('title', 'Accueil')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }
        .hover-worldcup:hover {
            background-color: #862633;
            color: white;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="worldcup-gradient bg-[#862633] shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('touriste.dashboard') }}" class="flex items-center">
                        <span class="text-2xl font-bold text-white">TouriStay 2030
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-6">

                    <a href="{{ route('touriste.favorites') }}" class="text-white hover:text-[#009A44] transition-colors duration-300">
                        <i class="far fa-heart text-xl"></i>
                    </a>
                    <a href="{{ route('profile.userprofile') }}" class="text-white hover:text-[#009A44] transition-colors duration-300">
                        <i class="far fa-user-circle text-xl"></i>
                    </a>
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
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#862633] text-white mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <span>TouriStay 2030</span>
                    </h3>
                    <p class="text-gray-300">La plateforme officielle d'hébergement pour la Coupe du Monde 2030.</p>
                </div>

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
                                <i class="fas fa-futbol mr-2 text-[#009A44]"></i>
                                Mondial 2030
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors duration-300">
                                <i class="fas fa-info-circle mr-2 text-[#009A44]"></i>
                                À propos
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

            <div class="border-t border-white/20 mt-8 pt-6 text-center text-gray-300">
                <p>&copy; TouriStay 2030. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>