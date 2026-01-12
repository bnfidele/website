 @extends('index')
 @section('content')
 <main x-show="currentPage === 'home'" x-transition class="pt-20">
        
        <!-- Hero Section -->
        <section id="home" class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
            <div class="container mx-auto px-4">
                <!-- Banner Component -->
                <div class="flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-12">
                    <div class="lg:w-1/2">
                        <h1 class="text-4xl lg:text-6xl font-bold mb-6" x-text="$t('hero.title')">
                           Découvrez les solutions de sécurité incendie de Flamx
                        </h1>
                        <p class="text-xl mb-8 text-blue-100" x-text="$t('hero.subtitle')">
                            Systèmes automatisés de détection et d’extinction incendie, Flamx garantit une sécurité optimale pour vos biens et vos proches. Nos solutions intelligentes, accessibles sur web et mobile, offrent surveillance 24/7, alertes en temps réel et protection incendie avancée. Idéal pour maisons, bureaux et entreprises, Flamx utilise des technologies modernes pour prévenir les incendies, sécuriser vos espaces et sauver des vies
                        </p>
                        <a 
                            href="/produit" 
                            class="bg-white hover:bg-gray-100 text-primary-900 dark:bg-primary-900 dark:hover:bg-primary-800 dark:text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 ease-out transform hover:scale-105"
                            x-text="$t('hero.cta')"
                        >
                            Notre catalogue
                        </a>

                    </div>
                    <div class="lg:w-1/2">
                        <img src="{{ 'storage/'.'img/img.png'}}" 
                             alt="Appareil Flamx" 
                             loading="lazy"
                          >
                    </div>
                </div>
            </div>
        </section>

        <!-- Demo Devices Mockup -->
        <section class="py-12 md:py-20 bg-white dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto text-center">
                    <h2 class="text-2xl md:text-3xl font-bold mb-8 md:mb-12 text-gray-900 dark:text-gray-100" x-text="$t('demo.sectionTitle')">Supervision en temps réel</h2>
                    
                    <!-- Devices Container -->
                    <div class="flex justify-center items-center min-h-[300px] md:min-h-[400px]">
                        
                        <!-- Tablet Mockup with Phone Overlay -->
                        <div class="relative mx-auto">
                            <!-- Tablet Frame -->
                            <div class="bg-gradient-to-b from-gray-700 to-gray-900 rounded-[0.75rem] p-1 shadow-2xl">
                                <div class="bg-black rounded-[0.5rem] p-0.5">
                                    <!-- Screen -->
                                    <div class="bg-white dark:bg-gray-100 rounded-[0.25rem] overflow-hidden aspect-[4/3] relative w-72 md:w-80">
                                        <!-- Screen Content -->
                                        <div class="p-4 h-full flex flex-col">
                                            <!-- Header -->
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center space-x-2">
                                                    <i data-lucide="flame" class="w-5 h-5 text-primary-600"></i>
                                                    <span class="text-lg font-bold text-gray-900">Flamx Pro</span>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                                    <span class="text-xs text-gray-600">LIVE</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Demo Card with Alert -->
                                    <div class="bg-gray-50 rounded-lg shadow-sm p-3 mb-3">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <i data-lucide="activity" class="w-4 h-4 text-green-500"></i>
                                            <h3 class="text-sm font-semibold text-gray-900" x-text="$t('demo.title')">Système en temps réel</h3>
                                        </div>
                                        
                                        <!-- Alert Component -->
                                        <div class="bg-red-50 border border-red-200 rounded-md p-2" 
                                                x-data="{ show: false }" 
                                                x-init="setTimeout(() => show = true, 1000)"
                                                x-show="show" 
                                                x-transition>
                                            <div class="flex items-center space-x-2">
                                                <i data-lucide="alert-triangle" class="w-3 h-3 text-red-600"></i>
                                                <span class="text-red-800 font-medium text-xs" x-text="$t('demo.alert')">
                                                    Alerte: Fumée détectée - Bureau 204
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Dashboard Stats -->
                                    <div class="grid grid-cols-3 gap-2 flex-1">
                                        <div class="bg-green-50 rounded-lg p-2 text-center">
                                            <div class="text-base font-bold text-green-600">24</div>
                                            <div class="text-xs text-gray-600">Capteurs</div>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-2 text-center">
                                            <div class="text-base font-bold text-blue-600">98%</div>
                                            <div class="text-xs text-gray-600">Fiabilité</div>
                                        </div>
                                        <div class="bg-purple-50 rounded-lg p-2 text-center">
                                            <div class="text-base font-bold text-purple-600">0</div>
                                            <div class="text-xs text-gray-600">Incidents</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tablet Home Button -->
                        <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2">
                            <div class="w-6 h-0.5 bg-gray-500 rounded-full"></div>
                        </div>
                    </div>
                    
                    <!-- Phone Mockup (Superposed) -->
                    <div class="absolute -right-6 md:-right-10 top-4 md:top-6 z-10">
                        <!-- Phone Frame -->
                        <div class="bg-gradient-to-b from-gray-700 to-gray-900 rounded-[0.75rem] p-1 shadow-xl">
                            <div class="bg-black rounded-[0.5rem] p-0.5">
                                <!-- Screen -->
                                <div class="bg-white dark:bg-gray-100 rounded-[0.25rem] overflow-hidden aspect-[9/16] relative w-28 md:w-32">
                                    <!-- Notch -->
                                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-8 md:w-10 h-2 bg-black rounded-b-md z-10"></div>
                                    
                                    <!-- Screen Content -->
                                    <div class="p-2 h-full flex flex-col pt-4">
                                        <!-- Mobile Header -->
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center space-x-1">
                                                <i data-lucide="flame" class="w-3 h-3 text-primary-600"></i>
                                                <span class="text-xs font-bold text-gray-900">Flamx</span>
                                            </div>
                                            <i data-lucide="bell" class="w-3 h-3 text-red-500 animate-bounce"></i>
                                        </div>
                                        
                                        <!-- Mobile Alert Card -->
                                        <div class="bg-red-50 border border-red-200 rounded p-2 mb-2"
                                                x-data="{ show: false }" 
                                                x-init="setTimeout(() => show = true, 1500)"
                                                x-show="show" 
                                                x-transition>
                                            <div class="flex items-start space-x-1">
                                                <i data-lucide="alert-triangle" class="w-2 h-2 text-red-600 mt-0.5"></i>
                                                <div>
                                                    <div class="text-xs font-semibold text-red-800">URGENTE</div>
                                                    <div class="text-xs text-red-700">Bureau 204</div>
                                                    <div class="text-xs text-red-600">2 min</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Mobile Stats Compact -->
                                        <div class="space-y-1 flex-1">
                                            <div class="bg-green-50 rounded p-1 flex justify-between">
                                                <span class="text-xs text-gray-600">Capteurs</span>
                                                <span class="text-xs font-bold text-green-600">24</span>
                                            </div>
                                            <div class="bg-blue-50 rounded p-1 flex justify-between">
                                                <span class="text-xs text-gray-600">État</span>
                                                <span class="text-xs font-bold text-blue-600">OK</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Mobile Bottom Nav -->
                                        <div class="flex justify-around pt-2 border-t border-gray-200">
                                            <i data-lucide="home" class="w-3 h-3 text-primary-600"></i>
                                            <i data-lucide="activity" class="w-3 h-3 text-gray-400"></i>
                                            <i data-lucide="settings" class="w-3 h-3 text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Phone Home Indicator -->
                            <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2">
                                <div class="w-4 h-0.5 bg-gray-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Carousel -->
<section class="py-12 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-white" x-text="$t('partners.title')">Nos partenaires</h2>
        
        <!-- Carousel Container -->
        <div class="overflow-hidden">
            <div class="carousel-scroll flex space-x-8 justify-center items-center">
                <!-- Multiple logos for seamless scrolling -->
                @foreach($partenaires as $partenaire)
                    <div class="p-6 flex-shrink-0">
                        <img src="{{ $partenaire->logo ? asset('storage/'.$partenaire->logo) : 'https://via.placeholder.com/150' }}" 
                            alt="Wakisha" 
                            loading="lazy"
                            class="h-16 w-32 object-contain">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white dark:bg-gray-900" x-intersect="activeSection = 'about'">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8" x-text="$t('about.title')">À propos de Flamx</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-12" x-text="$t('about.description')">
               Flamx développe des solutions innovantes et automatisées avec Flame-X pour prévenir et combattre les incendies, grâce à des technologies de pointe garantissant protection, fiabilité et efficacité. Les systèmes Flamx incluent la surveillance Sentinell feu et des dispositifs anti-incendie avancés, offrant une sécurité incendie optimale pour maisons, bureaux et entreprises. Disponibles à l’international, les solutions Flamx protègent contre le feu et toutes situations d’incendie, assurant une protection complète et moderne.
            </p>

                <div class="max-w-6xl mx-auto mb-20 lg:mb-32">
            <h3 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-center mb-4 lg:mb-6 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.title')">Pourquoi nous choisir ?</h3>
            <p class="text-lg lg:text-xl text-center text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-12 lg:mb-16">
                Découvrez les avantages uniques qui font de Flamx le leader en matière de sécurité incendie électronique
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Innovation -->
                <div class="group text-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 rounded-xl p-8 lg:p-10 shadow-lg hover:shadow-2xl border border-gray-200 dark:border-gray-600 hover:border-blue-300 dark:hover:border-blue-500 transition-all duration-500 transform hover:-translate-y-2"
                        x-intersect="$el.classList.add('animate-fade-in-up')">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 w-16 h-16 lg:w-20 lg:h-20 rounded-full flex items-center justify-center mx-auto mb-4 lg:mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="lightbulb" class="w-8 h-8 lg:w-10 lg:h-10 text-white"></i>
                    </div>
                    <h4 class="text-xl lg:text-2xl font-semibold mb-3 lg:mb-4 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.innovation.title')">Innovation</h4>
                    <p class="text-gray-600 dark:text-gray-400 lg:text-lg mb-4" x-text="$t('about.whyChoose.innovation.description')">
                        Technologie de pointe avec IA intégrée pour une détection précoce et précise
                    </p>
                    <div class="flex justify-center space-x-2 mb-3">
                        <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">IA Avancée</span>
                        <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">IoT</span>
                    </div>
                    <div class="text-sm text-blue-600 dark:text-blue-400 font-semibold">
                        🏆 Prix Innovation 2025
                    </div>
                </div>
                
                <!-- Reliability -->
                <div class="text-center bg-gray-50 dark:bg-gray-800 rounded-xl p-8 shadow-lg border border-gray-200 dark:border-gray-600">
                    <div class="bg-green-100 dark:bg-green-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="shield-check" class="w-8 h-8 text-green-600 dark:text-green-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.reliability.title')">Fiabilité</h4>
                    <p class="text-gray-600 dark:text-gray-400" x-text="$t('about.whyChoose.reliability.description')">
                        Systèmes testés et certifiés avec un taux de fiabilité de 99.8%
                    </p>
                </div>
                
                <!-- Support -->
                <div class="text-center bg-gray-50 dark:bg-gray-800 rounded-xl p-8 shadow-lg border border-gray-200 dark:border-gray-600">
                    <div class="bg-purple-100 dark:bg-purple-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="headphones" class="w-8 h-8 text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.support.title')">Support 24/7</h4>
                    <p class="text-gray-600 dark:text-gray-400" x-text="$t('about.whyChoose.support.description')">
                        Équipe d'experts disponible en permanence pour vous assister
                    </p>
                </div>
                
                <!-- Installation -->
                <div class="text-center bg-gray-50 dark:bg-gray-800 rounded-xl p-8 shadow-lg border border-gray-200 dark:border-gray-600">
                    <div class="bg-orange-100 dark:bg-orange-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="wrench" class="w-8 h-8 text-orange-600 dark:text-orange-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.installation.title')">Installation facile</h4>
                    <p class="text-gray-600 dark:text-gray-400" x-text="$t('about.whyChoose.installation.description')">
                        Installation rapide et professionnelle par nos techniciens certifiés
                    </p>
                </div>
                
                <!-- Warranty -->
                <div class="text-center bg-gray-50 dark:bg-gray-800 rounded-xl p-8 shadow-lg border border-gray-200 dark:border-gray-600">
                    <div class="bg-red-100 dark:bg-red-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="award" class="w-8 h-8 text-red-600 dark:text-red-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.warranty.title')">Garantie 3 ans</h4>
                    <p class="text-gray-600 dark:text-gray-400" x-text="$t('about.whyChoose.warranty.description')">
                        Garantie complète pièces et main d'œuvre avec support inclus
                    </p>
                </div>
                
                <!-- Compatibility -->
                <div class="text-center bg-gray-50 dark:bg-gray-800 rounded-xl p-8 shadow-lg border border-gray-200 dark:border-gray-600">
                    <div class="bg-indigo-100 dark:bg-indigo-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="puzzle" class="w-8 h-8 text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3 text-gray-900 dark:text-gray-100" x-text="$t('about.whyChoose.compatibility.title')">Compatibilité</h4>
                    <p class="text-gray-600 dark:text-gray-400" x-text="$t('about.whyChoose.compatibility.description')">
                        Compatible avec tous les systèmes de sécurité existants
                    </p>
                </div>
            </div>

        </div>
        
        <div class="max-w-6xl mx-auto mb-12 lg:mb-16">
            <h3 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-center mb-12 lg:mb-16 text-gray-900 dark:text-gray-100" x-text="$t('about.testimonials.title')">Témoignages clients</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Testimonial 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 lg:p-8 border border-gray-200 dark:border-gray-600">
                    <div class="flex items-center mb-4 lg:mb-6">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-r from-pink-400 to-pink-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-white font-bold text-lg">MD</span>
                        </div>
                        <div class="flex text-yellow-400">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                        </div>
                    </div>
                    <blockquote class="text-gray-600 dark:text-gray-400 mb-4 lg:mb-6 lg:text-lg" x-text="$t('about.testimonials.client1.quote')">
                        "Installation impeccable et système très fiable. L'alerte mobile nous a sauvé d'un incendie majeur."
                    </blockquote>
                    <div class="text-sm lg:text-base">
                        <div class="font-semibold text-gray-900 dark:text-gray-100" x-text="$t('about.testimonials.client1.name')">Marie Dubois</div>
                        <div class="text-gray-500 dark:text-gray-400" x-text="$t('about.testimonials.client1.position')">Directrice, Hotel Royal</div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 lg:p-8 border border-gray-200 dark:border-gray-600">
                    <div class="flex items-center mb-4 lg:mb-6">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-white font-bold text-lg">JM</span>
                        </div>
                        <div class="flex text-yellow-400">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                        </div>
                    </div>
                    <blockquote class="text-gray-600 dark:text-gray-400 mb-4 lg:mb-6 lg:text-lg" x-text="$t('about.testimonials.client2.quote')">
                        "Le tableau de bord Entreprise nous donne un contrôle total sur tous nos sites. Excellent investissement."
                    </blockquote>
                    <div class="text-sm lg:text-base">
                        <div class="font-semibold text-gray-900 dark:text-gray-100" x-text="$t('about.testimonials.client2.name')">Jean Martin</div>
                        <div class="text-gray-500 dark:text-gray-400" x-text="$t('about.testimonials.client2.position')">PDG, Martin Industries</div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 lg:p-8 border border-gray-200 dark:border-gray-600">
                    <div class="flex items-center mb-4 lg:mb-6">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-r from-green-400 to-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-white font-bold text-lg">SL</span>
                        </div>
                        <div class="flex text-yellow-400">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                        </div>
                    </div>
                    <blockquote class="text-gray-600 dark:text-gray-400 mb-4 lg:mb-6 lg:text-lg" x-text="$t('about.testimonials.client3.quote')">
                        "Support technique réactif et produits de qualité. Je recommande Flamx sans hésitation."
                    </blockquote>
                    <div class="text-sm lg:text-base">
                        <div class="font-semibold text-gray-900 dark:text-gray-100" x-text="$t('about.testimonials.client3.name')">Sophie Lambert</div>
                        <div class="text-gray-500 dark:text-gray-400" x-text="$t('about.testimonials.client3.position')">Responsable sécurité, Centre commercial Rivoli</div>
                    </div>
                </div>
            </div>
        </div>

            
            <!-- Stats with Counter -->
                            <div x-data="statsCounter()" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="text-center" x-intersect="startDelayedCounter(500, 'clients')">
                                    <div class="text-4xl font-bold text-primary-600 mb-2" x-text="counters.clients">0</div>
                                    <div class="text-gray-600 dark:text-gray-300" x-text="$t('about.stats.clients')">Clients satisfaits</div>
                                </div>

                                <div class="text-center" x-intersect="startDelayedCounter(1200, 'incidents')">
                                    <div class="text-4xl font-bold text-primary-600 mb-2" x-text="counters.incidents">0</div>
                                    <div class="text-gray-600 dark:text-gray-300" x-text="$t('about.stats.incidents')">Incidents évités</div>
                                </div>

                                <div class="text-center" x-intersect="startDelayedCounter(15, 'experience')">
                                    <div class="text-4xl font-bold text-primary-600 mb-2" x-text="counters.experience">0</div>
                                    <div class="text-gray-600 dark:text-gray-300"  x-text="$t('about.stats.experience')">Années d'expérience</div>
                                </div>
                            </div>

                                <script>
                                document.addEventListener("alpine:init", () => {
                                    Alpine.data("statsCounter", () => ({
                                        counters: { clients: 100, incidents: 300, experience: 1 },
                                        animating: { clients: false, incidents: false, experience: false },

                                        // Fonction de départ avec délai
                                        startDelayedCounter(target, key) {
                                            // Si déjà en animation, ne rien faire
                                            if (this.animating[key]) return;
                                            this.animating[key] = true;

                                            // Délai de 2 minutes = 120000 ms
                                            setTimeout(() => {
                                                let start = 0;
                                                const duration = 1500; // durée de l'animation en ms
                                                const stepTime = Math.max(Math.floor(duration / target), 20);

                                                let timer = setInterval(() => {
                                                    start++;
                                                    this.counters[key] = start;
                                                    if (start >= target) {
                                                        clearInterval(timer);
                                                        this.counters[key] = target;
                                                        this.animating[key] = false;
                                                    }
                                                }, stepTime);

                                            }, 120000); // 120 000 ms = 2 minutes
                                        }
                                    }))
                                })
                                </script>
                
            </div>
        </section>
        
        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white dark:bg-gray-800" x-intersect="activeSection = 'contact'">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto" x-data="contactForm">
                    <!-- Alerte de succès -->
                    <div x-show="successMessage" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="relative w-full overflow-hidden rounded-lg border border-green-600 bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300" role="alert">
                        <div class="flex w-full items-center gap-2 bg-green-600/10 p-4">
                            <div class="bg-green-600/15 text-green-600 rounded-full p-1" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h3 class="text-sm font-semibold text-green-600">Message envoyé avec succès</h3>
                                <p class="text-xs font-medium sm:text-sm" x-text="successMessage"></p>
                            </div>
                            <button class="ml-auto" @click="successMessage = ''" aria-label="dismiss alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="size-4 shrink-0">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Alerte d'erreur -->
                    <div x-show="errorMessage" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="relative w-full overflow-hidden rounded-lg border border-red-600 bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300" role="alert">
                        <div class="flex w-full items-center gap-2 bg-red-600/10 p-4">
                            <div class="bg-red-600/15 text-red-600 rounded-full p-1" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h3 class="text-sm font-semibold text-red-600">Erreur</h3>
                                <p class="text-xs font-medium sm:text-sm" x-text="errorMessage"></p>
                            </div>
                            <button class="ml-auto" @click="errorMessage = ''" aria-label="dismiss alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="size-4 shrink-0">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Erreurs de validation -->
                    <div x-show="Object.keys(errors).length > 0" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="relative w-full overflow-hidden rounded-lg border border-amber-500 bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300" role="alert">
                        <div class="flex w-full items-center gap-2 bg-amber-500/10 p-4">
                            <div class="bg-amber-500/15 text-amber-500 rounded-full p-1" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h3 class="text-sm font-semibold text-amber-500">Attention</h3>
                                <div class="text-xs font-medium sm:text-sm">
                                    <p>Veuillez corriger les erreurs suivantes :</p>
                                    <template x-for="(error, field) in errors" :key="field">
                                        <p x-text="error[0]" class="mt-1"></p>
                                    </template>
                                </div>
                            </div>
                            <button class="ml-auto" @click="errors = {}" aria-label="dismiss alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="size-4 shrink-0">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-gray-100" x-text="$t('contact.title')">Contactez-nous</h2>
                    
                    <!-- Contact Form -->
                    <form class="space-y-6" @submit.prevent="submitForm()">
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" x-text="$t('contact.form.name')">Nom complet</label>
                            <input type="text" x-model="form.name" 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-300"
                                   x-bind:placeholder="$t('contact.form.namePlaceholder')"
                                   required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" x-text="$t('contact.form.email')">Email</label>
                            <input type="email"  x-model="form.email"
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-300"
                                   x-bind:placeholder="$t('contact.form.emailPlaceholder')"
                                   required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" x-text="$t('contact.form.message')">Message</label>
                            <textarea rows="5" x-model="form.message"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-300"
                                      x-bind:placeholder="$t('contact.form.messagePlaceholder')"
                                      required></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300"
                                x-text="$t('contact.form.submit')"

                                x-bind:disabled="loading">
                           <span x-show="!loading">Envoyer</span>
                          <span x-show="loading">Envoi...</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection