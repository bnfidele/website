  
  @extends('index')
  @section('content')
  

  <!-- FAQ Main Content -->
    <main x-transition class="pt-20" x-data="{ openFaq: null }">
        <!-- Page Header -->
        <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6" x-text="$t('faq.title')">
                        Questions fréquentes
                    </h1>
                    <p class="text-xl text-blue-100 max-w-2xl mx-auto" x-text="$t('faq.subtitle')">
                        Trouvez les réponses aux questions les plus courantes sur nos produits
                    </p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <!-- FAQ Items -->
                    <div class="space-y-6">
                        
                        <!-- FAQ Item 1 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 1 ? null : 1"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.installation.title')">
                                    Comment installer les détecteurs Santinel ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 1" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.installation.answer')">
                                    L'installation est simple et rapide. Nos détecteurs se fixent au plafond avec des vis standard. 
                                    Un guide d'installation détaillé est fourni avec chaque produit. 
                                    Pour les versions Pro et Enterprise, une installation professionnelle est incluse.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 2 ? null : 2"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.maintenance.title')">
                                    Quelle est la maintenance requise ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 2" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.maintenance.answer')">
                                    La maintenance est minimale. Testez les détecteurs une fois par mois et remplacez la batterie annuellement. 
                                    Le logiciel effectue des auto-diagnostics et vous alertera en cas de problème.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 3 ? null : 3"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.warranty.title')">
                                    Quelle est la garantie offerte ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 3" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.warranty.answer')">
                                    Tous nos produits sont garantis 3 ans pièces et main d'œuvre. 
                                    La garantie couvre les défauts de fabrication et les dysfonctionnements. 
                                    Le support technique est inclus pendant toute la durée de la garantie.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 4 ? null : 4"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.compatibility.title')">
                                    Les systèmes sont-ils compatibles avec d'autres marques ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 4" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.compatibility.answer')">
                                    Nos systèmes Santinel Pro, Pro Max et Enterprise sont compatibles avec la plupart des systèmes de sécurité existants. 
                                    Ils supportent les protocoles standards comme Modbus et BACnet pour une intégration facile.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 5 ? null : 5"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.support.title')">
                                    Quel support technique est disponible ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 5" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.support.answer')">
                                    Nous offrons un support technique par email, téléphone et chat en direct. 
                                    Les clients Entreprise bénéficient d'un support prioritaire 24/7. 
                                    Notre équipe d'experts est formée pour résoudre rapidement tous vos problèmes.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                            <button @click="openFaq = openFaq === 6 ? null : 6"
                                    class="w-full p-6 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="$t('faq.questions.pricing.title')">
                                    Comment fonctionne la tarification des logiciels ?
                                </h3>
                                <i data-lucide="chevron-down" 
                                   class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                   :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openFaq === 6" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="px-6 pb-6">
                                <p class="text-gray-600 dark:text-gray-400" x-text="$t('faq.questions.pricing.answer')">
                                    Les logiciels sont facturés par abonnement mensuel ou annuel. 
                                    L'abonnement annuel offre une réduction de 15%. 
                                    Aucun engagement à long terme requis pour commencer.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact CTA -->
                    <div class="mt-16 text-center">
                        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-gray-600">
                            <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100" x-text="$t('faq.contact.title')">
                                Vous ne trouvez pas votre réponse ?
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6" x-text="$t('faq.contact.description')">
                                Notre équipe d'experts est là pour répondre à toutes vos questions spécifiques.
                            </p>
                          <a href="{{ '/#contact'}}" 
                            class="bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105"  x-text="$t('faq.contact.cta')">
                            Contactez-nous
                        </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection