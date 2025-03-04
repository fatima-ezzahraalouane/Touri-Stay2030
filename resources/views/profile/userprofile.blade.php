<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - Profil Utilisateur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }

        .worldcup-border {
            border-color: #862633;
        }

        .active-menu-item {
            background-color: #862633;
            color: white;
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
                        <span class="text-2xl font-bold text-white">TouriStay 2030
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-white hover:text-[#009A44] transition-colors duration-300">
                        <i class="far fa-bell text-xl"></i>
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

    <!-- Alert Messages -->
    @if (session('success'))
    <div class="bg-[#009A44]/10 border-l-4 border-[#009A44] text-[#009A44] p-4 mb-4 mx-4" role="alert">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-[#862633]/10 border-l-4 border-[#862633] text-[#862633] p-4 mb-4 mx-4" role="alert">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <p>{{ session('error') }}</p>
        </div>
    </div>
    @endif

    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="worldcup-gradient rounded-xl shadow-lg p-8 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                        <i class="fas fa-user-circle mr-3"></i>
                        Mon Profil
                    </h1>
                    <p class="text-white text-lg">
                        <i class="fas fa-futbol mr-2"></i>
                        Gérez vos informations pour le Mondial 2030
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Profile Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#862633]">
                    <div class="flex flex-col items-center">
                        <div class="relative">
                            @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}"
                                alt="Photo de profil"
                                class="w-32 h-32 rounded-full object-cover border-4 border-[#862633]">
                            @else
                            <div class="w-32 h-32 rounded-full bg-gray-200 border-4 border-[#862633] flex items-center justify-center">
                                <i class="fas fa-user-circle text-4xl text-[#862633]"></i>
                            </div>
                            @endif

                            <button type="button"
                                onclick="document.getElementById('photo-upload-modal').classList.remove('hidden')"
                                class="absolute bottom-0 right-0 bg-[#009A44] text-black rounded-full p-2 hover:bg-[#007A34] transition duration-300">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <h2 class="text-2xl font-bold text-[#862633] mt-4">{{ $user->name }}</h2>
                        <p class="text-[#009A44] mb-4">{{ ucfirst($user->role) }}</p>

                        <!-- User Stats -->
                        <div class="w-full border-t border-gray-200 my-4"></div>
                        <div class="w-full space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-[#862633] mr-3 w-5"></i>
                                <span class="text-gray-700">{{ $user->email }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-star text-[#862633] mr-3 w-5"></i>
                                <span class="text-gray-700">Note moyenne: 4.8/5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-[#009A44]">
                    <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                        <i class="fas fa-bars mr-2"></i>
                        Menu Profil
                    </h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#informations"
                                class="flex items-center py-2 px-3 text-gray-700 rounded-md">
                                <i class="fas fa-user-edit mr-3"></i>
                                <span>Informations personnelles</span>
                            </a>
                        </li>
                        <li>
                            <a href="#security"
                                class="flex items-center py-2 px-3 text-gray-700 rounded-md">
                                <i class="fas fa-lock mr-3"></i>
                                <span>Sécurité</span>
                            </a>
                        </li>
                        <li>
                            <a href="#notifications"
                                class="flex items-center py-2 px-3 text-gray-700 rounded-md">
                                <i class="fas fa-bell mr-3"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="#payment"
                                class="flex items-center py-2 px-3 text-gray-700 rounded-md">
                                <i class="fas fa-credit-card mr-3"></i>
                                <span>Méthodes de paiement</span>
                            </a>
                        </li>
                        <li>
                            <a href="#dashboard"
                                class="flex items-center py-2 px-3 text-gray-700 rounded-md">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                <span>Tableau de bord</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right Column - Profile Details -->
            <div class="lg:col-span-2">
                <!-- Personal Information -->
                <div id="informations" class="bg-white rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#862633]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-[#862633] flex items-center">
                            <i class="fas fa-user-edit mr-2"></i>
                            Informations personnelles
                        </h3>
                        <button id="editInfoBtn" class="text-[#009A44] hover:text-[#007A34] flex items-center">
                            <i class="fas fa-pen mr-1"></i> Modifier
                        </button>
                    </div>

                    <!-- View Mode -->
                    <div id="infoViewMode">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-[#862633] mb-1">Nom complet</h4>
                                <p class="text-gray-800">{{ $user->name }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-[#862633] mb-1">Email</h4>
                                <p class="text-gray-800">{{ $user->email }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-[#862633] mb-1">Rôle</h4>
                                <p class="text-gray-800">
                                    <span class="px-2 py-1 rounded-full bg-[#009A44]">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-[#862633] mb-1">Date d'inscription</h4>
                                <p class="text-gray-800">{{ $user->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Mode -->
                    <div id="infoEditMode" class="hidden">
                        <form action="{{ route('profile.userprofile.update') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-[#862633] mb-1">Nom complet</label>
                                    <input type="text"
                                        id="name"
                                        name="name"
                                        value="{{ $user->name }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                    @error('name')
                                    <p class="text-[#862633] text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-[#862633] mb-1">Email</label>
                                    <input type="email"
                                        id="email"
                                        name="email"
                                        value="{{ $user->email }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                    @error('email')
                                    <p class="text-[#862633] text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="role" class="block text-sm font-medium text-[#862633] mb-1">Rôle</label>
                                    <select id="role"
                                        name="role"
                                        disabled
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:outline-none">
                                        <option value="touriste" {{ $user->role == 'touriste' ? 'selected' : '' }}>Touriste</option>
                                        <option value="proprietaire" {{ $user->role == 'proprietaire' ? 'selected' : '' }}>Propriétaire</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Le rôle ne peut être modifié que par un administrateur
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-3">
                                <button type="button"
                                    id="cancelInfoBtn"
                                    class="border border-gray-300 text-gray-700 px-4 py-2 rounded-md font-medium hover:bg-gray-50 transition duration-300">
                                    <i class="fas fa-times mr-1"></i>
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="worldcup-gradient hover:bg-[#6E1F2A] text-white px-4 py-2 rounded-md font-medium transition duration-300">
                                    <i class="fas fa-save mr-1"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Notifications Settings -->
                <div id="notifications" class="bg-white rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#009A44]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-[#862633] flex items-center">
                            <i class="fas fa-bell mr-2"></i>
                            Paramètres de notifications
                        </h3>
                    </div>

                    <form>
                        <div class="space-y-4">
                            <!-- Nouvelles réservations -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div>
                                    <h4 class="font-medium text-[#862633] flex items-center">
                                        <i class="fas fa-calendar-check mr-2"></i>
                                        Nouvelles réservations
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Recevoir une notification pour les nouvelles demandes de réservation
                                    </p>
                                </div>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" checked>
                                        <div class="block bg-gray-300 w-14 h-8 rounded-full"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-6 shadow-sm"></div>
                                    </div>
                                </label>
                            </div>

                            <!-- Matchs de la Coupe du Monde -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div>
                                    <h4 class="font-medium text-[#862633] flex items-center">
                                        <i class="fas fa-futbol mr-2"></i>
                                        Alertes Coupe du Monde 2030
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Recevoir des notifications sur les matchs et événements
                                    </p>
                                </div>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" checked>
                                        <div class="block bg-gray-300 w-14 h-8 rounded-full"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-6 shadow-sm"></div>
                                    </div>
                                </label>
                            </div>

                            <!-- Nouvelles évaluations -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div>
                                    <h4 class="font-medium text-[#862633] flex items-center">
                                        <i class="fas fa-star mr-2"></i>
                                        Nouvelles évaluations
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Recevoir une notification lorsqu'un voyageur laisse une évaluation
                                    </p>
                                </div>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" checked>
                                        <div class="block bg-gray-300 w-14 h-8 rounded-full"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform translate-x-6 shadow-sm"></div>
                                    </div>
                                </label>
                            </div>

                            <!-- Actualités et promotions -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div>
                                    <h4 class="font-medium text-[#862633] flex items-center">
                                        <i class="fas fa-bullhorn mr-2"></i>
                                        Actualités et promotions
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Recevoir des informations sur les nouveautés et offres spéciales
                                    </p>
                                </div>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only">
                                        <div class="block bg-gray-300 w-14 h-8 rounded-full"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition shadow-sm"></div>
                                    </div>
                                </label>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="bg-[#862633] hover:bg-[#6E1F2A] text-white px-6 py-2 rounded-md font-medium transition duration-300 flex items-center">
                                    <i class="fas fa-save mr-2"></i>
                                    Enregistrer les préférences
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pour l'URL de la photo -->
    <div id="photo-upload-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl p-6 max-w-md w-full border-t-4 border-[#862633]">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-[#862633] flex items-center">
                    <i class="fas fa-link mr-2"></i>
                    Ajouter une URL de photo
                </h3>
                <button type="button"
                    onclick="document.getElementById('photo-upload-modal').classList.add('hidden')"
                    class="text-gray-500 hover:text-[#862633] transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{ route('profile.userprofile.photo') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-[#862633] mb-2" for="avatar">
                        URL de la photo de profil
                    </label>
                    <input type="url"
                        name="avatar"
                        id="avatar"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                        placeholder="https://exemple.com/votre-image.jpg"
                        required>
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        Formats acceptés : JPG, PNG, JPEJ
                    </p>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button"
                        onclick="document.getElementById('photo-upload-modal').classList.add('hidden')"
                        class="border border-gray-300 text-gray-700 px-4 py-2 rounded-md font-medium hover:bg-gray-50 transition duration-300">
                        <i class="fas fa-times mr-1"></i>
                        Annuler
                    </button>
                    <button type="submit"
                        class="worldcup-gradient hover:bg-[#6E1F2A] text-white px-4 py-2 rounded-md font-medium transition duration-300">
                        <i class="fas fa-save mr-1"></i>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="worldcup-gradient text-white mt-12 py-8">
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
                                <i class="fas fa-futbol mr-2 text-[#009A44]"></i>
                                Mondial 2030
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

    <script>
        // Toggle edit mode for personal information
        document.getElementById('editInfoBtn').addEventListener('click', function() {
            document.getElementById('infoViewMode').classList.add('hidden');
            document.getElementById('infoEditMode').classList.remove('hidden');
        });

        document.getElementById('cancelInfoBtn').addEventListener('click', function() {
            document.getElementById('infoEditMode').classList.add('hidden');
            document.getElementById('infoViewMode').classList.remove('hidden');
        });

        // Smooth scrolling for in-page links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });

                    // Update active state in menu
                    document.querySelectorAll('a[href^="#"]').forEach(link => {
                        link.classList.remove('bg-[#862633]', 'text-white');
                        link.classList.add('text-gray-700', 'hover:bg-[#862633]', 'hover:text-white');
                    });

                    this.classList.remove('text-gray-700', 'hover:bg-[#862633]', 'hover:text-white');
                    this.classList.add('bg-[#862633]', 'text-white');
                }
            });
        });
    </script>
</body>

</html>