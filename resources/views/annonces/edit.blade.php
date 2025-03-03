<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - Modifier l'hébergement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }

        .worldcup-card {
            border-left: 4px solid #862633;
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
                        <span class="text-2xl font-bold text-white">TouriStay 2030</span>
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <!-- Logout Button -->
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="bg-[#009A44] hover:bg-[#007A34] text-white px-4 py-2 rounded-md font-medium transition duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
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
    <div class="bg-green-100 border-l-4 border-[#009A44] text-green-700 p-4 mb-4 mx-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-[#862633] text-red-700 p-4 mb-4 mx-4" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="worldcup-gradient rounded-xl shadow-lg p-8 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                        <i class="fas fa-edit mr-3"></i>
                        Modifier votre hébergement
                    </h1>
                    <p class="text-white text-lg">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Mise à jour pour la Coupe du Monde 2030
                    </p>
                </div>
                <a href="{{ route('proprietaire.dashboard') }}"
                    class="bg-white text-[#862633] hover:bg-gray-100 px-6 py-3 rounded-md font-bold shadow-md transition duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour au tableau de bord
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <form action="{{ route('annonces.update', $annonce->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Basic Information -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Informations de base
                            </h3>

                            <!-- Titre -->
                            <div class="mb-4">
                                <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">
                                    Titre de l'hébergement*
                                </label>
                                <input type="text"
                                    name="titre"
                                    id="titre"
                                    required
                                    value="{{ $annonce->titre }}"
                                    class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                    placeholder="Ex: Appartement moderne proche du stade">
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description*
                                </label>
                                <textarea name="description"
                                    id="description"
                                    rows="6"
                                    required
                                    class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                    placeholder="Décrivez votre hébergement en détail...">{{ $annonce->description }}</textarea>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Localisation
                            </h3>

                            <!-- Pays -->
                            <div class="mb-4">
                                <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pays hôte*
                                </label>
                                <select name="pays"
                                    id="pays"
                                    required
                                    class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                    <option value="">Sélectionnez un pays</option>
                                    <option value="Maroc" {{ $annonce->pays == 'Maroc' ? 'selected' : '' }}>Maroc</option>
                                    <option value="Espagne" {{ $annonce->pays == 'Espagne' ? 'selected' : '' }}>Espagne</option>
                                    <option value="Portugal" {{ $annonce->pays == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                </select>
                            </div>

                            <!-- Ville -->
                            <div class="mb-4">
                                <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">
                                    Ville*
                                </label>
                                <select name="ville"
                                    id="ville"
                                    required
                                    class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                    <option value="">Sélectionnez une ville</option>
                                    <optgroup label="Maroc">
                                        <option value="Casablanca" {{ $annonce->ville == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                                        <option value="Rabat" {{ $annonce->ville == 'Rabat' ? 'selected' : '' }}>Rabat</option>
                                        <option value="Tanger" {{ $annonce->ville == 'Tanger' ? 'selected' : '' }}>Tanger</option>
                                    </optgroup>
                                    <optgroup label="Espagne">
                                        <option value="Madrid" {{ $annonce->ville == 'Madrid' ? 'selected' : '' }}>Madrid</option>
                                        <option value="Barcelone" {{ $annonce->ville == 'Barcelone' ? 'selected' : '' }}>Barcelone</option>
                                    </optgroup>
                                    <optgroup label="Portugal">
                                        <option value="Lisbonne" {{ $annonce->ville == 'Lisbonne' ? 'selected' : '' }}>Lisbonne</option>
                                        <option value="Porto" {{ $annonce->ville == 'Porto' ? 'selected' : '' }}>Porto</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Tarification -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                <i class="fas fa-euro-sign mr-2"></i>
                                Tarification et Disponibilité
                            </h3>

                            <!-- Prix -->
                            <div class="mb-4">
                                <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">
                                    Prix par nuit (DH)*
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">DH</span>
                                    </div>
                                    <input type="number"
                                        name="prix"
                                        id="prix"
                                        required
                                        min="1"
                                        step="0.01"
                                        value="{{ $annonce->prix }}"
                                        class="w-full border border-gray-300 rounded-md pl-7 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                        placeholder="Ex: 85">
                                </div>
                            </div>

                            <!-- Disponibilités -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="disponible_du" class="block text-sm font-medium text-gray-700 mb-2">
                                        Disponible du*
                                    </label>
                                    <input type="date"
                                        name="disponible_du"
                                        id="disponible_du"
                                        required
                                        value="{{ $annonce->disponible_du->format('Y-m-d') }}"
                                        min="2030-06-01"
                                        max="2030-08-31"
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                </div>
                                <div>
                                    <label for="disponible_au" class="block text-sm font-medium text-gray-700 mb-2">
                                        au*
                                    </label>
                                    <input type="date"
                                        name="disponible_au"
                                        id="disponible_au"
                                        required
                                        value="{{ $annonce->disponible_au->format('Y-m-d') }}"
                                        min="2030-06-01"
                                        max="2030-08-31"
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                </div>
                            </div>
                        </div>

                        <!-- Équipements -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                <i class="fas fa-concierge-bell mr-2"></i>
                                Équipements disponibles
                            </h3>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Wifi -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="wifi"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="wifi" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-wifi mr-2 text-[#862633]"></i>Wifi
                                    </label>
                                </div>

                                <!-- Climatisation -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="climatisation"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="climatisation" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-snowflake mr-2 text-[#862633]"></i>Climatisation
                                    </label>
                                </div>

                                <!-- Cuisine -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="cuisine"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="cuisine" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-utensils mr-2 text-[#862633]"></i>Cuisine
                                    </label>
                                </div>

                                <!-- TV -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="tv"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="tv" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-tv mr-2 text-[#862633]"></i>TV
                                    </label>
                                </div>

                                <!-- Parking -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="parking"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="parking" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-parking mr-2 text-[#862633]"></i>Parking
                                    </label>
                                </div>

                                <!-- Piscine -->
                                <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                    <input type="checkbox"
                                        name="equipements[]"
                                        id="piscine"

                                        class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                    <label for="piscine" class="ml-2 text-sm text-gray-700">
                                        <i class="fas fa-swimming-pool mr-2 text-[#862633]"></i>Piscine
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Image URL -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                <i class="fas fa-image mr-2"></i>
                                Image de l'hébergement
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                                        URL de l'image*
                                    </label>
                                    <input type="url"
                                        id="images"
                                        name="images"
                                        value="{{ $annonce->images }}"
                                        required
                                        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                        placeholder="https://exemple.com/votre-image.jpg">
                                    <p class="text-sm text-gray-500 mt-2">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Format accepté: jpg, jpeg, png
                                    </p>
                                </div>

                                <!-- Image actuelle -->
                                @if($annonce->images)
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Image actuelle :</p>
                                    <div class="border rounded-lg overflow-hidden">
                                        <img src="{{ $annonce->images }}"
                                            alt="Image actuelle"
                                            class="w-full h-48 object-cover">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('proprietaire.dashboard') }}"
                        class="px-6 py-3 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 font-medium transition duration-300">
                        <i class="fas fa-times mr-2"></i>
                        Annuler
                    </a>
                    <button type="submit"
                        class="worldcup-gradient bg-[#862633] hover:bg-[#6E1F2A] text-white px-8 py-3 rounded-md font-bold shadow-md transition duration-300">
                        <i class="fas fa-save mr-2"></i>
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="worldcup-gradient bg-[#862633] text-white mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TouriStay 2030</h3>
                    <p class="text-gray-300">Votre plateforme d'hébergement officielle pour la Coupe du Monde 2030.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens utiles</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition"><i class="fas fa-home mr-2"></i>Accueil</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition"><i class="fas fa-info-circle mr-2"></i>Comment ça marche</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition"><i class="fas fa-question-circle mr-2"></i>FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition"><i class="fas fa-envelope mr-2"></i>Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-[#009A44]"></i>
                            <span>contact@touristay2030.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-[#009A44]"></i>
                            <span>+212 5XX XXX XXX</span>
                        </li>
                        <!-- <li class="flex items-center">
                            <i class="fas fa-clock mr-2 text-[#009A44]"></i>
                            <span>2025-03-03 21:45:49</span>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-300">
                <p>&copy; TouriStay 2030. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Validation des dates
        document.addEventListener('DOMContentLoaded', function() {
            const dateDebut = document.getElementById('disponible_du');
            const dateFin = document.getElementById('disponible_au');

            const minDate = '2030-06-01';
            const maxDate = '2030-08-31';

            dateDebut.addEventListener('change', function() {
                if (dateFin.value && this.value > dateFin.value) {
                    alert('La date de début doit être antérieure à la date de fin');
                    this.value = '';
                }
            });

            dateFin.addEventListener('change', function() {
                if (dateDebut.value && this.value < dateDebut.value) {
                    alert('La date de fin doit être postérieure à la date de début');
                    this.value = '';
                }
            });
        });

        // Affichage de l'heure actuelle
        function updateDateTime() {
            const now = new Date();
            const formatted = now.toISOString().slice(0, 19).replace('T', ' ');
            document.querySelector('.far.fa-clock').parentElement.querySelector('span').textContent = formatted;
        }
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>