  @extends('index')
  @section('content')
  <main x-transition class="pt-20" x-data="{ currentSection: 'devices' }">
            <!-- Page Header -->
    <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
                <div class="container mx-auto px-4">
                    <div class="text-center">
                        <h1 class="text-4xl lg:text-6xl font-bold mb-6" x-text="$t('products.title')">
                            Nos produits
                        </h1>
                        <p class="text-xl text-blue-100 max-w-2xl mx-auto" x-text="$t('products.subtitle')">
                            Découvrez notre gamme complète de solutions de sécurité incendie
                        </p>
                    </div>
                </div>
            </section>

            <!-- Products Section -->
            <section class="py-20 bg-gray-50 dark:bg-gray-800">
                <div class="container mx-auto px-4">
                    
                    <!-- Section Toggle -->
                    <div class="flex justify-center mb-12">
                        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-1">
                            <button @click="currentSection = 'devices'" 
                                    :class="currentSection === 'devices' ? 'bg-white dark:bg-gray-800 shadow text-gray-900 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400'"
                                    class="px-4 py-2 rounded transition-all duration-300" 
                                    x-text="$t('products.sections.devices')">Appareils</button>
                            <button @click="currentSection = 'software'" 
                                    :class="currentSection === 'software' ? 'bg-white dark:bg-gray-800 shadow text-gray-900 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400'"
                                    class="px-4 py-2 rounded transition-all duration-300" 
                                    x-text="$t('products.sections.software')">Logiciels</button>
                        </div>
                    </div>
                    
                    <!-- Devices Section -->
                    <div x-show="currentSection === 'devices'" x-transition class="mb-16" x-data="{ currentPage: 0, productsPerPage: 3, totalPages: Math.ceil({{ $produits->count() }} / 3) }">
                        <h3 class="text-2xl font-bold mb-8" x-text="$t('products.devices.title')">Appareils</h3>
                        
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            
                            @foreach ($produits as $produit )
                            
                          
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 product-card"
                                 x-show="Math.floor({{ $loop->index }} / productsPerPage) === currentPage" 
                                 x-transition:enter="transition ease-out duration-500 transform"
                                 x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-300 transform"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 -translate-y-4 scale-95">
                                <div class="relative">
                                    <img src="{{ $produit->photo ? asset('storage/'.$produit->photo) : 'https://via.placeholder.com/150' }}"
                                         alt="Santinel Basic" 
                                         loading="lazy"
                                         class="w-full h-48 object-contain object-center bg-gray-50 dark:bg-gray-700">
                                    <span class="absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded text-sm font-medium">
                                        Basic
                                    </span>
                                </div>
                                <div class="p-6">
                                    <h4 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100" >{{ $produit->name }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4" >
                                       {{ $produit->description }}
                                    </p>
                                    <div class="text-2xl font-bold text-primary-600 dark:text-primary-400 mb-4">${{ $produit->price }}</div>
                                    @if ($contacte)

                                    <a href="/produit/{{ $produit->id }}/{{ $produit->slug }}" 
                                       class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2"
                                       target="_blank">
                                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                                        <span x-text="$t('products.devices.basic.order_link')">Commander</span>
                                    </a>
                                          
                                    @endif
                                </div>
                            </div>
                            @endforeach

                         
                        </div>
                        
                        <!-- Enhanced Pagination avec numéros de page et info -->
                        <div class="flex flex-col items-center space-y-4">
                            <!-- Info de pagination -->
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Page <span class="font-semibold text-primary-600" x-text="currentPage + 1"></span> sur <span class="font-semibold text-primary-600" x-text="totalPages"></span>
                            </p>

                            <div class="flex items-center space-x-4">
                                <!-- Bouton première page -->
                                <button @click="currentPage = 0"
                                        :disabled="currentPage === 0"
                                        :class="currentPage === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-50 dark:hover:bg-primary-900 hover:text-primary-600 dark:hover:text-primary-400 hover:scale-110'"
                                        class="p-2 rounded-lg transition-all duration-300 transform bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600">
                                    <i data-lucide="chevrons-left" class="w-5 h-5"></i>
                                </button>

                                <!-- Bouton précédent -->
                                <button @click="currentPage = Math.max(0, currentPage - 1)"
                                        :disabled="currentPage === 0"
                                        :class="currentPage === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-50 dark:hover:bg-primary-900 hover:text-primary-600 dark:hover:text-primary-400 hover:scale-110'"
                                        class="p-2 rounded-lg transition-all duration-300 transform bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600">
                                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                                </button>

                                <!-- Numéros de page -->
                                <div class="flex items-center space-x-2">
                                    <template x-for="pageIndex in totalPages" :key="pageIndex">
                                        <button @click="currentPage = pageIndex - 1"
                                                :class="currentPage === pageIndex - 1 ? 
                                                    'bg-primary-600 text-white ring-2 ring-primary-300 dark:ring-primary-700' : 
                                                    'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900'"
                                                class="w-10 h-10 rounded-lg flex items-center justify-center font-medium transition-all duration-300 border border-gray-200 dark:border-gray-600 hover:shadow-md"
                                                x-text="pageIndex">
                                        </button>
                                    </template>
                                </div>
                                
                                <!-- Bouton suivant -->
                                <button @click="currentPage = Math.min(totalPages - 1, currentPage + 1)"
                                        :disabled="currentPage === totalPages - 1"
                                        :class="currentPage === totalPages - 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-50 dark:hover:bg-primary-900 hover:text-primary-600 dark:hover:text-primary-400 hover:scale-110'"
                                        class="p-2 rounded-lg transition-all duration-300 transform bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600">
                                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                                </button>

                                <!-- Bouton dernière page -->
                                <button @click="currentPage = totalPages - 1"
                                        :disabled="currentPage === totalPages - 1"
                                        :class="currentPage === totalPages - 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-50 dark:hover:bg-primary-900 hover:text-primary-600 dark:hover:text-primary-400 hover:scale-110'"
                                        class="p-2 rounded-lg transition-all duration-300 transform bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600">
                                    <i data-lucide="chevrons-right" class="w-5 h-5"></i>
                                </button>
                            </div>

                            <!-- Info sur les résultats -->
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Affichage des produits <span class="font-semibold text-primary-600" x-text="(currentPage * productsPerPage) + 1"></span> à 
                                <span class="font-semibold text-primary-600" x-text="Math.min((currentPage + 1) * productsPerPage, {{ $produits->count() }})"></span> 
                                sur <span class="font-semibold text-primary-600">{{ $produits->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Software Section -->
                    <div x-show="currentSection === 'software'" x-transition>
                        <h3 class="text-2xl font-bold mb-8" x-text="$t('products.software.title')">Logiciel de supervision</h3>
                        
                        <!-- Plan Toggle -->
                        <div class="flex justify-center mb-8">
                            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-1">
                                <button @click="annualPlan = false" 
                                        :class="!annualPlan ? 'bg-white dark:bg-gray-800 shadow text-gray-900 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400'"
                                        class="px-4 py-2 rounded transition-all duration-300" 
                                        x-text="$t('products.software.monthly')">Mensuel</button>
                                <button @click="annualPlan = true" 
                                        :class="annualPlan ? 'bg-white dark:bg-gray-800 shadow text-gray-900 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400'"
                                        class="px-4 py-2 rounded transition-all duration-300" 
                                        x-text="$t('products.software.annual')">Annuel</button>
                            </div>
                        </div>

                        <!-- Software Cards Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            
                            <!-- Domestique Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-600 overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-2xl font-bold" x-text="$t('products.software.domestic.title')">Version Domestique</h4>
                                        <i data-lucide="home" class="w-8 h-8"></i>
                                    </div>
                                    <p class="text-blue-100 mt-2" x-text="$t('products.software.domestic.subtitle')">Pour maisons et petits bâtiments</p>
                                </div>
                                
                                <div class="p-6">
                                    <!-- Pricing Toggle -->
                                    <div class="text-center mb-6">
                                        <div class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                            <span x-show="!annualPlan">$29</span>
                                            <span x-show="annualPlan">$25</span>
                                            <span class="text-lg text-gray-500 dark:text-gray-400">/mois</span>
                                        </div>
                                        <div x-show="annualPlan" class="text-sm text-green-600 dark:text-green-400 font-medium">
                                            Économisez $48/an
                                        </div>
                                    </div>
                                    
                                    <!-- Features -->
                                    <ul class="space-y-3 mb-8">
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.monitoring')">Surveillance 24/7</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.alerts')">Alertes mobiles</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.dashboard')">Tableau de bord simple</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.support')">Support technique</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="x" class="w-5 h-5 text-gray-400"></i>
                                            <span class="text-gray-400 line-through" x-text="$t('products.software.features.ai')">IA prédictive</span>
                                        </li>
                                    </ul>
                                    
                                    <button class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105"
                                            x-text="$t('products.software.cta')">
                                        Choisir ce plan
                                    </button>
                                </div>
                            </div>

                            <!-- Entreprise Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border-2 border-primary-500 dark:border-primary-400 overflow-hidden relative">
                                <!-- Popular Badge -->
                                <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Populaire
                                </div>
                                
                                <div class="bg-gradient-to-r from-primary-600 to-primary-800 text-white p-6">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-2xl font-bold" x-text="$t('products.software.enterprise.title')">Version Entreprise</h4>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2-icon lucide-building-2">
                                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                                            <path d="M10 6h4"/>
                                            <path d="M10 10h4"/>
                                            <path d="M10 14h4"/>
                                            <path d="M10 18h4"/>
                                        </svg>
                                    </div>
                                    <p class="text-blue-100 mt-2" x-text="$t('products.software.enterprise.subtitle')">Pour entreprises et grands bâtiments</p>
                                </div>
                                
                                <div class="p-6">
                                    <!-- Pricing Toggle -->
                                    <div class="text-center mb-6">
                                        <div class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                            <span x-show="!annualPlan">$99</span>
                                            <span x-show="annualPlan">$85</span>
                                            <span class="text-lg text-gray-500 dark:text-gray-400">/mois</span>
                                        </div>
                                        <div x-show="annualPlan" class="text-sm text-green-600 dark:text-green-400 font-medium">
                                            Économisez $168/an
                                        </div>
                                    </div>
                                    
                                    <!-- Features -->
                                    <ul class="space-y-3 mb-8">
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.monitoring')">Surveillance 24/7</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.alerts')">Alertes mobiles</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.advancedDashboard')">Tableau de bord avancé</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.prioritySupport')">Support prioritaire</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.ai')">IA prédictive</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                                            <span class="text-gray-700 dark:text-gray-300" x-text="$t('products.software.features.multiSite')">Multi-sites</span>
                                        </li>
                                    </ul>
                                    
                                    <button class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105"
                                            x-text="$t('products.software.cta')">
                                        Choisir ce plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>

    @endsection
