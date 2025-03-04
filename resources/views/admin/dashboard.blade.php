<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldCup Hosts 2030 - Administration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .worldcup-gradient {
            background: linear-gradient(135deg, #862633 0%, #009A44 100%);
        }

        .sidebar-link.active {
            background-color: #862633;
            border-left-color: #009A44;
        }

        .sidebar-link:hover {
            background-color: #862633;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-900 text-white w-64 flex-shrink-0">
            <div class="p-4 worldcup-gradient">
                <a href="#" class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-futbol mr-2"></i>
                    TouriStay 2030
                </a>
                <p class="text-gray-300 text-sm mt-1">Administration</p>
            </div>
            <nav class="mt-5">
                <a href="{{Route('admin.dashboard')}}" class="flex items-center py-3 px-6 text-white sidebar-link active">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="" class="flex items-center py-3 px-6 text-gray-300 hover:text-white sidebar-link">
                    <i class="fas fa-users mr-3"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="" class="flex items-center py-3 px-6 text-gray-300 hover:text-white sidebar-link">
                    <i class="fas fa-flag mr-3"></i>
                    <span>Signalements</span>
                </a>
                <a href="#" class="flex items-center py-3 px-6 text-gray-300 hover:text-white sidebar-link">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Paramètres</span>
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 bg-gray-900">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center text-gray-300 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <span class="text-[#862633] text-lg font-semibold">Administration WorldCup 2030</span>
                    </div>
                    <div class="flex items-center space-x-6">

                        <!-- Notifications -->
                        <button class="text-[#862633] hover:text-[#009A44] transition-colors duration-300">
                            <i class="fas fa-bell text-xl"></i>
                        </button>

                        <!-- User Profile -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 text-gray-700 focus:outline-none">
                                @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}"
                                    alt="Admin Avatar"
                                    class="h-8 w-8 rounded-full object-cover border-2 border-[#009A44]">
                                @else
                                <div class="h-8 w-8 rounded-full bg-[#862633] text-black flex items-center justify-center">
                                    <i class="fas fa-user"></i>
                                </div>
                                @endif
                                <i class="fas fa-chevron-down text-xs text-[#009A44]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @if(session('success'))
                <div class="bg-[#009A44]/10 border-l-4 border-[#009A44] text-[#009A44] p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                <h1 class="text-2xl font-bold text-[#862633] mb-6 flex items-center">
                    <i class="fas fa-chart-line mr-3"></i>
                    Vue d'ensemble TouriStay 2030
                </h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#862633]">
                        <div class="flex items-center">
                            <div class="rounded-full bg-[#862633]/10 p-3">
                                <i class="fas fa-users text-[#862633] text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Utilisateurs inscrits</h3>
                                <p class="text-2xl font-bold text-[#862633]">{{ $stats['users_count'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#009A44]">
                        <div class="flex items-center">
                            <div class="rounded-full bg-[#009A44]/10 p-3">
                                <i class="fas fa-home text-[#009A44] text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Hébergements actifs</h3>
                                <p class="text-2xl font-bold text-[#009A44]">{{ $stats['annonces_count'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#862633]">
                        <div class="flex items-center">
                            <div class="rounded-full bg-[#862633]/10 p-3">
                                <i class="fas fa-calendar-check text-[#862633] text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Réservations</h3>
                                <p class="text-2xl font-bold text-[#862633]">{{ $stats['reservations_count'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#009A44]">
                        <div class="flex items-center">
                            <div class="rounded-full bg-[#009A44]/10 p-3">
                                <i class="fas fa-flag text-[#009A44] text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm font-medium">Signalements</h3>
                                <p class="text-2xl font-bold text-[#009A44]">{{ $stats['signalements_count'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#862633]">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-[#862633] text-lg font-semibold flex items-center">
                                <i class="fas fa-chart-line mr-2"></i>
                                Inscriptions mensuelles
                            </h2>
                        </div>
                        <div class="relative h-64">
                            <img src="/api/placeholder/600/250" alt="Graphique des inscriptions" class="w-full h-full object-cover rounded">
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#009A44]">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-[#009A44] text-lg font-semibold flex items-center">
                                <i class="fas fa-globe mr-2"></i>
                                Répartition par pays hôtes
                            </h2>
                        </div>
                        <div class="relative h-64">
                            <img src="/api/placeholder/600/250" alt="Graphique de répartition" class="w-full h-full object-cover rounded">
                        </div>
                    </div>
                </div>

                <!-- Recent Listings -->
                <div class="bg-white rounded-lg shadow-md mb-8 border-t-4 border-[#862633]">
                    <div class="flex items-center justify-between p-6 border-b">
                        <h2 class="text-[#862633] text-lg font-semibold flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Hébergements récents
                        </h2>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="text-[#009A44] hover:text-[#862633] transition-colors duration-300 text-sm font-medium">
                                Voir tous
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">Titre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">Ville Hôte</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">Propriétaire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">Prix/Nuit</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#862633] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($annonces as $annonce)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#862633] font-medium">#{{ $annonce->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $annonce->titre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-map-marker-alt text-[#009A44] mr-2"></i>
                                            {{ $annonce->ville }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-user text-[#862633] mr-2"></i>
                                            {{ $annonce->user->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-[#009A44]">{{ $annonce->prix }} DH/nuit</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-3">
                                            <a href="#" class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.annonces.delete', $annonce->id) }}" method="POST"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet hébergement ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[#862633] hover:text-red-700 transition-colors duration-200">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <div class="flex flex-col items-center py-4">
                                            <i class="fas fa-home text-[#862633] text-4xl mb-2"></i>
                                            Aucun hébergement disponible
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Recent Reports -->
                <div class="bg-white rounded-lg shadow-md border-t-4 border-[#009A44]">
                    <div class="flex items-center justify-between p-6 border-b">
                        <h2 class="text-[#009A44] text-lg font-semibold flex items-center">
                            <i class="fas fa-flag mr-2"></i>
                            Signalements récents
                        </h2>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="text-[#009A44] hover:text-[#862633] transition-colors duration-300 text-sm font-medium">
                                Voir tous
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">Annonce</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">Raison</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">Signalé par</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-[#009A44] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#862633] font-medium">#R102</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-home text-[#009A44] mr-2"></i>
                                            Maison traditionnelle (#1251)
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-600">
                                            Photos trompeuses
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-user text-[#862633] mr-2"></i>
                                            Carlos R.
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">24 Fév 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-3">
                                            <button class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-[#862633] hover:text-red-700 transition-colors duration-200">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#862633] font-medium">#R101</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-home text-[#009A44] mr-2"></i>
                                            Studio vue mer (#1245)
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-orange-100 text-orange-600">
                                            Contenu frauduleux
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="flex items-center">
                                            <i class="fas fa-user text-[#862633] mr-2"></i>
                                            Marie T.
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">22 Fév 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-3">
                                            <button class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-[#009A44] hover:text-[#862633] transition-colors duration-200">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="text-[#862633] hover:text-red-700 transition-colors duration-200">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>