<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldCup Stay 2030 - Tableau de Bord Propriétaire</title>
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

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="bg-[#009A44] hover:bg-[#007A34] text-white px-4 py-2 rounded-md font-medium transition duration-300">
                        Déconnexion
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
                <div class="text-gray-600">Affichant 1 à 4 sur 4 annonces</div>
                <nav class="inline-flex rounded-md shadow-sm">
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm font-medium rounded-l-md text-gray-700 hover:bg-gray-50">
                        Précédent
                    </a>
                    <a href="#" class="py-2 px-4 bg-blue-600 border border-blue-600 text-sm font-medium text-white">
                        1
                    </a>
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 hover:bg-gray-50">
                        Suivant
                    </a>
                </nav>
            </div>
        </div>

        <!-- Footer avec nouvelles couleurs -->
        <!-- <footer class="bg-[#862633] text-white mt-12 py-8 rounded-lg">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div> -->


        <!-- Footer -->
        <footer class="worldcup-gradient bg-[#862633] text-white mt-12 py-8 rounded-lg">

            <div class="text-center text-gray-300">
                <p>&copy; TouriStay 2030. Tous droits réservés.</p>
            </div>
        </footer>
    </div>

    <!-- Modal remains the same but with updated styling -->
    <!-- ... Rest of the modal code ... -->

    <!-- Scripts remain the same -->
    <script>
        // Existing JavaScript code remains unchanged
    </script>
</body>

</html>