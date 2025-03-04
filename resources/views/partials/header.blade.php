<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <i class="fas fa-futbol text-[#862633] text-2xl"></i>
                    <span class="text-2xl font-bold tracking-tighter">
                        <span class="font-playfair">Touri</span>
                        <span class="text-[#009A44] font-playfair">Stay </span>
                        <span class="text-[#862633] text-lg font-light align-top tracking-wide ml-1">2030</span>
                    </span>
                </a>
            </div>
            
            <!-- Navigation principale -->
            <nav class="hidden md:flex space-x-8 text-sm">
                <a href="{{ route('home') }}" class="text-gray-800 hover:text-[#862633] px-3 py-2 transition-all duration-300 font-medium {{ request()->routeIs('home') ? 'border-b-2 border-[#862633]' : '' }}">
                    <i class="fas fa-home mr-1"></i> Accueil
                </a>
                <a href="{{ route('annonces.index') }}" class="text-gray-800 hover:text-[#009A44] px-3 py-2 transition-all duration-300 font-medium {{ request()->routeIs('annonces.index') ? 'border-b-2 border-[#009A44]' : '' }}">
                    <i class="fas fa-building mr-1"></i> Hébergements
                </a>
                <a href="{{ route('annonces.search') }}" class="text-gray-800 hover:text-[#862633] px-3 py-2 transition-all duration-300 font-medium {{ request()->routeIs('annonces.search') ? 'border-b-2 border-[#862633]' : '' }}">
                    <i class="fas fa-search mr-1"></i> Recherche
                </a>
                <a href="#" class="text-gray-800 hover:text-[#009A44] px-3 py-2 transition-all duration-300 font-medium">
                    <i class="fas fa-globe mr-1"></i> Mondial 2030
                </a>
            </nav>
            
            <!-- Boutons d'action -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="flex items-center text-gray-800 hover:text-[#862633] focus:outline-none transition-all duration-300">
                            <span class="mr-2">{{ Auth::user()->name }}</span>
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" 
                                     class="h-8 w-8 rounded-full object-cover border-2 border-[#009A44]">
                            @else
                                <div class="h-8 w-8 rounded-full bg-[#862633] text-white flex items-center justify-center">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                            
                            <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#862633]/10">
                                <i class="fas fa-user-circle mr-2 text-[#862633]"></i> Mon profil
                            </a>
                            
                            @if(Auth::user()->role === 'proprietaire')
                                <a href="{{ route('mes-annonces.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#009A44]/10">
                                    <i class="fas fa-home mr-2 text-[#009A44]"></i> Mes annonces
                                </a>
                            @endif
                            
                            @if(Auth::user()->role === 'touriste')
                                <a href="{{ route('favoris.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#862633]/10">
                                    <i class="fas fa-heart mr-2 text-[#862633]"></i> Mes favoris
                                </a>
                            @endif
                            
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#009A44]/10">
                                    <i class="fas fa-cog mr-2 text-[#009A44]"></i> Administration
                                </a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-[#862633]/10">
                                    <i class="fas fa-sign-out-alt mr-2 text-[#862633]"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-[#862633] hover:text-[#009A44] px-3 py-2 transition-all duration-300 font-medium">
                        <i class="fas fa-sign-in-alt mr-1"></i> Connexion
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#862633] text-white px-4 py-2 rounded-md shadow hover:bg-[#009A44] transition-all duration-300">
                        <i class="fas fa-user-plus mr-1"></i> Inscription
                    </a>
                @endauth
            </div>
                        <!-- Menu mobile -->
                        <div class="flex md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-[#862633] hover:text-[#009A44] focus:outline-none transition-all duration-300">
                    <svg class="h-6 w-6" x-show="!open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" x-show="open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute top-20 right-0 left-0 bg-white shadow-lg z-50">
                    
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="{{ route('home') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 hover:text-[#862633] rounded-md transition-all duration-300">
                            <i class="fas fa-home mr-2"></i> Accueil
                        </a>
                        <a href="{{ route('annonces.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#009A44]/10 hover:text-[#009A44] rounded-md transition-all duration-300">
                            <i class="fas fa-building mr-2"></i> Hébergements
                        </a>
                        <a href="{{ route('annonces.search') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 hover:text-[#862633] rounded-md transition-all duration-300">
                            <i class="fas fa-search mr-2"></i> Recherche
                        </a>
                        <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#009A44]/10 hover:text-[#009A44] rounded-md transition-all duration-300">
                            <i class="fas fa-globe mr-2"></i> Mondial 2030
                        </a>
                    </div>
                    
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        @auth
                            <div class="flex items-center px-4">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" 
                                         class="h-10 w-10 rounded-full object-cover border-2 border-[#009A44]">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-[#862633] text-white flex items-center justify-center">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="ml-3">
                                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="text-sm font-medium text-[#009A44]">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            
                            <div class="mt-3 space-y-1 px-2">
                                <a href="{{ route('profile') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 rounded-md">
                                    <i class="fas fa-user-circle mr-2 text-[#862633]"></i> Mon profil
                                </a>
                                
                                @if(Auth::user()->role === 'proprietaire')
                                    <a href="{{ route('mes-annonces.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#009A44]/10 rounded-md">
                                        <i class="fas fa-home mr-2 text-[#009A44]"></i> Mes annonces
                                    </a>
                                @endif
                                
                                @if(Auth::user()->role === 'touriste')
                                    <a href="{{ route('favoris.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 rounded-md">
                                        <i class="fas fa-heart mr-2 text-[#862633]"></i> Mes favoris
                                    </a>
                                @endif
                                
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#009A44]/10 rounded-md">
                                        <i class="fas fa-cog mr-2 text-[#009A44]"></i> Administration
                                    </a>
                                @endif
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 rounded-md">
                                        <i class="fas fa-sign-out-alt mr-2 text-[#862633]"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="mt-3 space-y-1 px-2">
                                <a href="{{ route('login') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#862633]/10 rounded-md">
                                    <i class="fas fa-sign-in-alt mr-2 text-[#862633]"></i> Connexion
                                </a>
                                <a href="{{ route('register') }}" class="flex items-center px-3 py-2 text-base font-medium text-gray-800 hover:bg-[#009A44]/10 rounded-md">
                                    <i class="fas fa-user-plus mr-2 text-[#009A44]"></i> Inscription
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>