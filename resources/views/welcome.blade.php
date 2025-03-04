<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TouriStay 2030 - Hébergement Officiel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }
        .hero-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23862633' fill-opacity='0.06'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative min-h-screen hero-pattern">
        <!-- Header Navigation -->
        <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="#" class="flex items-center space-x-2">
                            <i class="fas fa-futbol text-[#862633] text-2xl"></i>
                            <span class="font-bold text-xl">TouriStay <span class="text-[#009A44]">2030</span></span>
                        </a>
                    </div>

                    <!-- Authentication Links -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            <div class="flex space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" 
                                       class="text-[#862633] hover:text-[#009A44] transition-colors duration-300">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" 
                                       class="worldcup-gradient text-white rounded-xl p-2">
                                        Connexion
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" 
                                           class="worldcup-gradient text-white rounded-xl p-2">
                                            Inscription
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Hero Section -->
        <div class="relative pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
                <div class="worldcup-gradient rounded-3xl shadow-2xl overflow-hidden">
                    <div class="relative z-10 p-12 text-white">
                        <h1 class="text-5xl font-bold mb-6">
                            Coupe du Monde 2030
                            <span class="block text-2xl mt-2 text-[#009A44]">Trouvez votre hébergement idéal</span>
                        </h1>
                        <p class="text-lg mb-8 max-w-2xl">
                            Découvrez des hébergements exceptionnels dans les villes hôtes de la Coupe du Monde 2030.
                            Réservez tôt pour vivre l'expérience unique du plus grand événement sportif mondial.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#explore" class="bg-[#009A44] hover:bg-[#862633] px-8 py-3 rounded-full text-white font-semibold transition-colors duration-300 flex items-center">
                                <i class="fas fa-search mr-2"></i>
                                Explorer les hébergements
                            </a>
                            <a href="#contact" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm px-8 py-3 rounded-full text-white font-semibold transition-colors duration-300 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Featured Cities Section -->
                <div class="mt-20">
                    <h2 class="text-3xl font-bold text-[#862633] mb-8 flex items-center">
                        <i class="fas fa-globe-americas mr-3"></i>
                        Villes hôtes 2030
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- City Card 1 -->
                        <div class="group relative rounded-xl overflow-hidden shadow-lg h-80">
                            <img src="https://pohcdn.com/guide/sites/default/files/styles/paragraph__live_banner__lb_image__1880bp/public/live_banner/Casablanca-1_0.jpg" alt="Casablanca" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent">
                                <div class="absolute bottom-0 p-6 w-full">
                                    <h3 class="text-2xl font-bold text-white mb-2">Casablanca</h3>
                                    <p class="text-white/90 flex items-center mb-4">
                                        <i class="fas fa-map-marker-alt text-[#009A44] mr-2"></i>
                                        Maroc
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span class="bg-[#009A44] px-3 py-1 rounded-full text-sm text-white">
                                            Ville hôte officielle
                                        </span>
                                        <a href="#" class="text-white hover:text-[#009A44] transition-colors duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- City Card 2 -->
                        <div class="group relative rounded-xl overflow-hidden shadow-lg h-80">
                            <img src="https://a.travel-assets.com/findyours-php/viewfinder/images/res70/348000/348698-Madrid.jpg" alt="Madrid" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent">
                                <div class="absolute bottom-0 p-6 w-full">
                                    <h3 class="text-2xl font-bold text-white mb-2">Madrid</h3>
                                    <p class="text-white/90 flex items-center mb-4">
                                        <i class="fas fa-map-marker-alt text-[#009A44] mr-2"></i>
                                        Espagne
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span class="bg-[#009A44] px-3 py-1 rounded-full text-sm text-white">
                                            Ville hôte officielle
                                        </span>
                                        <a href="#" class="text-white hover:text-[#009A44] transition-colors duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- City Card 3 -->
                        <div class="group relative rounded-xl overflow-hidden shadow-lg h-80">
                            <img src="https://lisboacard.fr/wp-content/uploads/2022/08/lisboa-card.jpg" alt="Lisbonne" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent">
                                <div class="absolute bottom-0 p-6 w-full">
                                    <h3 class="text-2xl font-bold text-white mb-2">Lisbonne</h3>
                                    <p class="text-white/90 flex items-center mb-4">
                                        <i class="fas fa-map-marker-alt text-[#009A44] mr-2"></i>
                                        Portugal
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span class="bg-[#009A44] px-3 py-1 rounded-full text-sm text-white">
                                            Ville hôte officielle
                                        </span>
                                        <a href="#" class="text-white hover:text-[#009A44] transition-colors duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- Features Section -->
                                <div class="mt-20">
                    <h2 class="text-3xl font-bold text-[#862633] mb-12 flex items-center">
                        <i class="fas fa-star mr-3"></i>
                        Services pour la Coupe du Monde 2030
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Feature 1 -->
                        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-[#862633]/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-bed text-2xl text-[#862633]"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Hébergements certifiés</h3>
                            <p class="text-gray-600">Logements vérifiés et approuvés pour les supporters de la Coupe du Monde.</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-[#009A44]/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-shield-alt text-2xl text-[#009A44]"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Réservation sécurisée</h3>
                            <p class="text-gray-600">Paiements sécurisés et garantie de remboursement pour votre tranquillité.</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-[#862633]/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-map-marked-alt text-2xl text-[#862633]"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Proximité des stades</h3>
                            <p class="text-gray-600">Hébergements stratégiquement situés près des stades de la compétition.</p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="bg-[#009A44]/10 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-headset text-2xl text-[#009A44]"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Support 24/7</h3>
                            <p class="text-gray-600">Assistance multilingue disponible à tout moment pendant votre séjour.</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="mt-20 border-t border-gray-200 pt-8 pb-12">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="flex items-center space-x-2 mb-4 md:mb-0">
                            <i class="fas fa-futbol text-[#862633] text-2xl"></i>
                            <span class="font-bold text-xl">TouriStay <span class="text-[#009A44]">2030</span></span>
                        </div>

                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <a href="#" class="text-[#862633] hover:text-[#009A44] transition-colors duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-[#862633] hover:text-[#009A44] transition-colors duration-300">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="text-[#862633] hover:text-[#009A44] transition-colors duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
