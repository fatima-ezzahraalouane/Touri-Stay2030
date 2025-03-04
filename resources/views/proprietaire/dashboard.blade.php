<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - Tableau de Bord Propriétaire</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }

        .worldcup-card {
            border-left: 4px solid #862633;
        }

        .worldcup-button {
            background-color: #862633;
        }

        .worldcup-button:hover {
            background-color: #6E1F2A;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="worldcup-gradient bg-[#862633] shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('proprietaire.dashboard') }}" class="text-2xl font-bold text-white">WorldCup<span class="text-[#009A44]">Stay</span><span class="text-white">2030</span></a>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="far fa-bell text-xl text-white"></i>
                    <a href="{{ route('profile.userprofile') }}" class="text-gray-700 hover:text-blue-600">
                        <i class="far fa-user-circle text-white text-xl"></i>
                    </a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="bg-[#009A44] hover:bg-[#007A34] text-white px-4 py-2 rounded-md font-medium transition duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Alert Messages - Gardés identiques -->
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif

    <div class="container mx-auto px-4 py-8">
        <!-- Dashboard Header -->
        <div class="worldcup-gradient rounded-xl shadow-lg p-8 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Tableau de Bord Hébergeur</h1>
                    <p class="text-white text-lg">Accueillez les supporters du Mondial 2030</p>
                </div>
                <a href="#" onclick="openAnnonceModal()"
                    class="bg-white text-[#862633] hover:bg-gray-100 px-6 py-3 rounded-md font-bold shadow-md transition duration-300 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Ajouter un hébergement
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 worldcup-card">
                <div class="flex items-center">
                    <div class="rounded-full bg-[#862633] bg-opacity-10 p-3 mr-4">
                        <i class="fas fa-home text-[#862633] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500">Hébergements actifs</p>
                        <h3 class="text-2xl font-bold text-gray-800">4</h3>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 worldcup-card">
                <div class="flex items-center">
                    <div class="rounded-full bg-[#009A44] bg-opacity-10 p-3 mr-4">
                        <i class="fas fa-calendar-check text-[#009A44] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500">Réservations confirmées</p>
                        <h3 class="text-2xl font-bold text-gray-800">12</h3>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 worldcup-card">
                <div class="flex items-center">
                    <div class="rounded-full bg-[#009A44] bg-opacity-10 p-3 mr-4">
                        <i class="fas fa-star text-[#009A44] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500">Note moyenne</p>
                        <h3 class="text-2xl font-bold text-gray-800">4.8/5</h3>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow-md p-6 worldcup-card">
                <div class="flex items-center">
                    <div class="rounded-full bg-[#009A44] bg-opacity-10 p-3 mr-4">
                        <i class="fas fa-coins text-[#009A44] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500">Revenus estimés</p>
                        <h3 class="text-2xl font-bold text-gray-800">5 892 DH</h3>
                    </div>
                </div>
            </div>
            <!-- Autres cartes avec le même style -->
        </div>

        <!-- Listings Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#862633]">Mes Hébergements</h2>
                <div class="flex items-center">
                    <input type="text" placeholder="Rechercher un hébergement..."
                        class="border border-gray-300 rounded-md p-2 mr-2 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                    <select class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                        <option value="all">Tous les statuts</option>
                        <option value="active">Actifs</option>
                        <option value="inactive">Inactifs</option>
                    </select>
                </div>
            </div>

            <!-- Table avec nouveau style -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full">
                    <thead class="worldcup-gradient bg-[#862633] text-white">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Hébergement</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Pays</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Ville</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Prix</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Disponibilité</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                            <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Annonces -->
                        <tr>
                            @forelse($annonces as $annonce)

                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <img src="{{ $annonce->images }}" alt="appart" class="h-16 w-24 object-cover rounded-md mr-3">
                                    <span class="font-medium text-gray-800">{{ $annonce->titre }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">{{ $annonce->pays }}</td>
                            <td class="py-4 px-4 text-gray-600">{{ $annonce->ville }}</td>
                            <td class="py-4 px-4 text-gray-600">{{ $annonce->prix }} DH/nuit</td>
                            <!-- <td class="py-4 px-4 text-gray-600">Juin - Août 2030</td> -->
                            <td class="py-4 px-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($annonce->disponible_du)->translatedFormat('d F Y') }}
                                <span class="font-bold">à</span>
                                {{ \Carbon\Carbon::parse($annonce->disponible_au)->translatedFormat('d F Y') }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{ route('annonces.show', $annonce->id) }}" class="text-yellow-600 hover:text-yellow-800">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="col-span-4 py-8 text-center">
                            <p class="text-gray-500 text-lg">Aucune annonce disponible pour le moment.</p>
                        </div>
                        @endforelse
                    </tbody>
                    <!-- Contenu de la table inchangé -->
                </table>
            </div>

            <!-- pagination -->
            <div class="mt-6 flex justify-between items-center">
                <div class="text-gray-600">
                    Affichant {{ $annonces->firstItem() ?? 0 }} à {{ $annonces->lastItem() ?? 0 }} sur {{ $annonces->total() }} annonces
                </div>

                @if ($annonces->hasPages())
                <nav class="inline-flex rounded-md shadow-sm">
                    {{-- Previous Page Link --}}
                    @if ($annonces->onFirstPage())
                    <span class="py-2 px-4 bg-gray-100 border border-gray-300 text-sm font-medium rounded-l-md text-gray-400 cursor-not-allowed">
                        Précédent
                    </span>
                    @else
                    <a href="{{ $annonces->previousPageUrl() }}" class="py-2 px-4 bg-white border border-gray-300 text-sm font-medium rounded-l-md text-gray-700 hover:bg-gray-50">
                        Précédent
                    </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($annonces->getUrlRange(1, $annonces->lastPage()) as $page => $url)
                    @if ($page == $annonces->currentPage())
                    <span class="py-2 px-4 bg-[#862633] border border-[#862633] text-sm font-medium text-black">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}" class="py-2 px-4 bg-white border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($annonces->hasMorePages())
                    <a href="{{ $annonces->nextPageUrl() }}" class="py-2 px-4 bg-white border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 hover:bg-gray-50">
                        Suivant
                    </a>
                    @else
                    <span class="py-2 px-4 bg-gray-100 border border-gray-300 text-sm font-medium rounded-r-md text-gray-400 cursor-not-allowed">
                        Suivant
                    </span>
                    @endif
                </nav>
                @endif
            </div>
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

    <!-- Modal Ajouter une annonce -->
    <div id="annonceModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl max-w-5xl w-full max-h-screen overflow-y-auto">
            <!-- En-tête du modal avec le thème Coupe du Monde -->
            <div class="worldcup-gradient p-6 rounded-t-lg">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fas fa-futbol text-white text-2xl mr-3"></i>
                        <h2 class="text-2xl font-bold text-white">Nouvel Hébergement pour le Mondial 2030</h2>
                    </div>
                    <button onclick="closeAnnonceModal()" class="text-white hover:text-gray-200 focus:outline-none">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <p class="text-white mt-2 opacity-90">Proposez votre hébergement aux supporters du monde entier</p>
            </div>

            <div class="p-8">
                <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Colonne gauche -->
                        <div class="space-y-6">
                            <!-- Informations de base -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Informations Principales
                                </h3>

                                <!-- Titre -->
                                <div class="mb-4">
                                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">Titre de l'hébergement*</label>
                                    <input type="text" name="titre" id="titre" required
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                        placeholder="Ex: Appartement moderne à 5min du stade">
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description détaillée*</label>
                                    <textarea name="description" id="description" rows="5" required
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                        placeholder="Décrivez votre hébergement en détail..."></textarea>
                                </div>
                            </div>

                            <!-- Localisation -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    Localisation
                                </h3>

                                <!-- Pays -->
                                <div class="mb-4">
                                    <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">Pays hôte*</label>
                                    <select name="pays" id="pays" required
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                        <option value="">Sélectionnez un pays</option>
                                        <option value="Maroc">Maroc</option>
                                        <option value="Espagne">Espagne</option>
                                        <option value="Portugal">Portugal</option>
                                    </select>
                                </div>

                                <!-- Ville -->
                                <div class="mb-4">
                                    <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">Ville*</label>
                                    <select name="ville" id="ville" required
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                        <option value="">Sélectionnez une ville</option>
                                        <optgroup label="Maroc">
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Tanger">Tanger</option>
                                        </optgroup>
                                        <optgroup label="Espagne">
                                            <option value="Madrid">Madrid</option>
                                            <option value="Barcelone">Barcelone</option>
                                        </optgroup>
                                        <optgroup label="Portugal">
                                            <option value="Lisbonne">Lisbonne</option>
                                            <option value="Porto">Porto</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Photos -->
                            <div class="mt-8 bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                    <i class="fas fa-camera mr-2"></i>
                                    Photos
                                </h3>

                                <!-- Image URL -->
                                <div>
                                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">URL de l'image*</label>
                                    <input type="url"
                                        name="images"
                                        id="images"
                                        required
                                        class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                        placeholder="https://exemple.com/image.jpg">
                                    <p class="mt-1 text-sm text-gray-500">Format accepté: jpg, jpeg, png</p>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite -->
                        <div class="space-y-6">
                            <!-- Tarification -->
                            <!-- Section Tarification et Disponibilité -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-bold text-[#862633] mb-4 flex items-center">
                                    <i class="fas fa-euro-sign mr-2"></i>
                                    Tarification et Disponibilité
                                </h3>

                                <div class="space-y-6">
                                    <!-- Prix -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Prix par nuit*</label>
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
                                                class="w-full border border-gray-300 rounded-md pl-7 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]"
                                                placeholder="Ex: 85">
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Prix minimum recommandé: 100DH/nuit
                                        </p>
                                    </div>

                                    <!-- Période de disponibilité -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-3">Période de disponibilité*</label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <div class="flex items-center space-x-2">
                                                    <i class="fas fa-calendar-alt text-[#862633]"></i>
                                                    <span class="text-sm text-gray-700">Date de début</span>
                                                </div>
                                                <input type="date"
                                                    name="disponible_du"
                                                    id="disponible_du"
                                                    required
                                                    min="2030-06-01"
                                                    max="2030-08-31"
                                                    class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                            </div>
                                            <div>
                                                <div class="flex items-center space-x-2">
                                                    <i class="fas fa-calendar-check text-[#862633]"></i>
                                                    <span class="text-sm text-gray-700">Date de fin</span>
                                                </div>
                                                <input type="date"
                                                    name="disponible_au"
                                                    id="disponible_au"
                                                    required
                                                    min="2030-06-01"
                                                    max="2030-08-31"
                                                    class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#862633]">
                                            </div>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            La période doit être comprise entre le 1er juin et le 31 août 2030
                                        </p>
                                    </div>

                                    <!-- Options supplémentaires -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">Options de réservation</label>
                                        <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                            <input type="checkbox"
                                                name="reservation_instantanee"
                                                id="reservation_instantanee"
                                                class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                            <label for="reservation_instantanee" class="ml-2 text-sm text-gray-700">
                                                <i class="fas fa-bolt mr-2 text-[#862633]"></i>
                                                Autoriser la réservation instantanée
                                            </label>
                                        </div>
                                        <div class="flex items-center p-3 bg-white rounded-lg border border-gray-200">
                                            <input type="checkbox"
                                                name="annulation_flexible"
                                                id="annulation_flexible"
                                                class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                            <label for="annulation_flexible" class="ml-2 text-sm text-gray-700">
                                                <i class="fas fa-undo mr-2 text-[#862633]"></i>
                                                Politique d'annulation flexible
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Information sur la période -->
                                <div class="mt-6 bg-[#862633] bg-opacity-10 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <i class="fas fa-calendar-alt text-[#862633] mt-1 mr-3"></i>
                                        <div>
                                            <h4 class="font-medium text-[#862633]">Période Coupe du Monde 2030</h4>
                                            <p class="text-sm text-gray-600">
                                                Votre hébergement doit être disponible pendant la période du tournoi
                                                (1er juin - 31 août 2030). Les dates en dehors de cette période ne seront pas prises en compte.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Équipements -->
                            <!-- Section Équipements avec le nouveau style -->
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
                                            value="Wifi"
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
                                            value="Climatisation"
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
                                            value="Cuisine"
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
                                            value="TV"
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
                                            value="Parking"
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
                                            value="Piscine"
                                            class="h-4 w-4 text-[#862633] rounded border-gray-300 focus:ring-[#862633]">
                                        <label for="piscine" class="ml-2 text-sm text-gray-700">
                                            <i class="fas fa-swimming-pool mr-2 text-[#862633]"></i>Piscine
                                        </label>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-4">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Sélectionnez les équipements disponibles dans votre hébergement
                                </p>
                            </div>
                        </div>
                    </div>



                    <!-- Boutons d'action -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <button type="button" onclick="closeAnnonceModal()"
                            class="px-6 py-3 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 font-medium transition duration-300">
                            Annuler
                        </button>
                        <button type="submit"
                            class="worldcup-gradient hover:bg-[#6E1F2A] text-white px-8 py-3 rounded-md font-bold shadow-md transition duration-300">
                            <i class="fas fa-plus mr-2"></i>
                            Publier l'hébergement
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts remain the same -->
    <script>
        // Simple script to toggle favorites (for demonstration)
        document.querySelectorAll('.fa-heart').forEach(heart => {
            heart.addEventListener('click', function() {
                this.classList.toggle('far');
                this.classList.toggle('fas');
                this.classList.toggle('text-red-500');
            });
        });

        // Fonctions pour la modal d'ajout d'annonce
        function openAnnonceModal() {
            document.getElementById('annonceModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Empêche le défilement du body
        }

        function closeAnnonceModal() {
            document.getElementById('annonceModal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Réactive le défilement du body
        }

        // Validation de l'URL de l'image
        document.getElementById('images').addEventListener('blur', function() {
            validateImageUrl(this);
        });

        function validateImageUrl(input) {
            const url = input.value;
            if (url && !isValidImageUrl(url)) {
                input.setCustomValidity('Veuillez entrer une URL d\'image valide (jpg, jpeg, png)');
            } else {
                input.setCustomValidity('');
            }
        }

        function isValidImageUrl(url) {
            try {
                const parsedUrl = new URL(url);
                return /\.(jpg|jpeg|png)$/i.test(parsedUrl.pathname);
            } catch {
                return false;
            }
        }

        // Script pour vérifier que la date de fin est après la date de début
        document.getElementById('disponible_au').addEventListener('change', function() {
            var dateDebut = document.getElementById('disponible_du').value;
            var dateFin = this.value;

            if (dateDebut && dateFin && new Date(dateFin) <= new Date(dateDebut)) {
                alert('La date de fin doit être postérieure à la date de début.');
                this.value = '';
            }
        });

        // Validation des dates
        document.addEventListener('DOMContentLoaded', function() {
            const dateDebut = document.getElementById('disponible_du');
            const dateFin = document.getElementById('disponible_au');

            // Définir les dates minimales et maximales
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
    </script>
</body>

</html>