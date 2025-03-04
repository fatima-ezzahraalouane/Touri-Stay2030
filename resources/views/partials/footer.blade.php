<footer class="bg-gray-900 text-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo et description -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center">
                    <span class="text-2xl font-bold tracking-tighter">
                        <span class="font-playfair">Touri</span><span class="text-[#009A44] font-playfair">Stay</span>
                        <span class="text-lg font-light align-top tracking-wide ml-1 text-[#862633]">2030</span>
                    </span>
                </div>
                <p class="mt-4 text-sm text-gray-300">
                    Votre plateforme officielle d'hébergement pour la Coupe du Monde 2030 au Maroc, en Espagne et au Portugal.
                </p>
                <div class="mt-6 flex space-x-4">
                    <a href="#" class="text-[#009A44] hover:text-[#862633] transition-all duration-300">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-[#009A44] hover:text-[#862633] transition-all duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-[#009A44] hover:text-[#862633] transition-all duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>
            
            <!-- Villes Hôtes -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-[#009A44] tracking-wider uppercase mb-4">Pays Hôtes</h3>
                <ul class="mt-4 space-y-3">
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#009A44] transition-all duration-300 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Maroc
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#009A44] transition-all duration-300 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Espagne
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#009A44] transition-all duration-300 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Portugal
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Support -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-[#862633] tracking-wider uppercase mb-4">Assistance</h3>
                <ul class="mt-4 space-y-3">
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#862633] transition-all duration-300 flex items-center">
                            <i class="fas fa-headset mr-2"></i>
                            Centre d'aide
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#862633] transition-all duration-300 flex items-center">
                            <i class="fas fa-question-circle mr-2"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#862633] transition-all duration-300 flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#862633] transition-all duration-300 flex items-center">
                            <i class="fas fa-shield-alt mr-2"></i>
                            Sécurité
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Newsletter -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-[#009A44] tracking-wider uppercase mb-4">Newsletter</h3>
                <p class="mt-4 text-sm text-gray-300">
                    Restez informé des dernières actualités de la Coupe du Monde 2030.
                </p>
                <form class="mt-4">
                    <div class="flex">
                        <input type="email" required placeholder="Votre email" 
                               class="appearance-none min-w-0 w-full bg-gray-800 border border-gray-700 rounded-l-md py-2 px-4 text-base text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#009A44] focus:border-[#009A44]">
                        <button type="submit" 
                                class="flex-shrink-0 bg-[#862633] text-white px-4 py-2 rounded-r-md shadow hover:bg-[#009A44] transition-all duration-300">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-12 pt-8 border-t border-gray-800">
            <p class="text-sm text-gray-400 text-center">
                &copy; {{ date('Y') }} TouriStay 2030. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>