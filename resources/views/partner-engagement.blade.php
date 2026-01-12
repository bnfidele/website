@extends('index')
@section('content')

<main x-transition class="pt-20" x-data="partnerEngagement()">
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6">
                    Rejoignez notre réseau de partenaires
                </h1>
                <p class="text-xl text-blue-100 mb-8">
                    Flamx, leader en solutions de lutte contre l'incendie, vous invite à devenir partenaire et à croître ensemble.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Mission Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700/30 rounded-2xl p-8 hover:bg-white/40 dark:hover:bg-gray-800/40 transition-all duration-300 shadow-xl">
                    <div class="mb-6">
                        <i data-lucide="target" class="w-12 h-12 text-blue-900"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Notre Mission</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Fournir des solutions innovantes et fiables de détection et extinction d'incendies pour protéger les biens et les personnes.
                    </p>
                </div>

                <!-- Vision Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700/30 rounded-2xl p-8 hover:bg-white/40 dark:hover:bg-gray-800/40 transition-all duration-300 shadow-xl">
                    <div class="mb-6">
                        <i data-lucide="eye" class="w-12 h-12 text-blue-900"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Notre Vision</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Devenir le partenaire de confiance incontournable dans la sécurité incendie à travers des services d'excellence.
                    </p>
                </div>

                <!-- Partnership Card -->
                <div class="group backdrop-blur-xl bg-white/30 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700/30 rounded-2xl p-8 hover:bg-white/40 dark:hover:bg-gray-800/40 transition-all duration-300 shadow-xl">
                    <div class="mb-6">
                        <i data-lucide="handshake" class="w-12 h-12 text-blue-900"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Partenariat</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Ensemble, nous créons des solutions durables et innovantes qui répondent aux défis actuels.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Charter & Conditions Section -->
    <section class="py-20 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">
                Conditions & Engagements
            </h2>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Charter of Engagement -->
                <div x-data="{ open: false }" class="backdrop-blur-xl bg-white/40 dark:bg-gray-700/40 border border-white/20 dark:border-gray-600/30 rounded-2xl shadow-xl overflow-hidden">
                    <button @click="open = !open" class="w-full p-8 text-left flex items-start justify-between hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <i data-lucide="file-text" class="w-8 h-8 text-blue-900"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Objectifs de la Charte</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Nos engagements envers nos partenaires</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-6 h-6 text-gray-500 transition-transform flex-shrink-0 mt-1"></i>
                    </button>

                    <div x-show="open" x-transition class="px-8 pb-8 space-y-4 border-t border-white/10 dark:border-gray-600/20 pt-6">
                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Confiance</strong>: Garantir une utilisation sûre, conforme et performante du système Sentinelle Feu</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Engagement</strong>: Préciser les engagements de chaque partie pour assurer la fiabilité du dispositif.</p>
                            </div>

                             <div class="flex gap-3">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Resilience</strong>: Protéger les intérêts techniques, financiers, juridiques et commerciaux liés au système.</p>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Work Policy -->
                <div x-data="{ open: false }" class="backdrop-blur-xl bg-white/40 dark:bg-gray-700/40 border border-white/20 dark:border-gray-600/30 rounded-2xl shadow-xl overflow-hidden">
                    <button @click="open = !open" class="w-full p-8 text-left flex items-start justify-between hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <i data-lucide="briefcase" class="w-8 h-8 text-blue-900"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Politique de Travail</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Principes de collaboration</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-6 h-6 text-gray-500 transition-transform flex-shrink-0 mt-1"></i>
                    </button>

                    <div x-show="open" x-transition class="px-8 pb-8 space-y-4 border-t border-white/10 dark:border-gray-600/20 pt-6">
                        <div class="space-y-3">
                            
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Soutien</strong> Assistance constante et formation régulière</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Respect des délais</strong> de livraison convenus</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Qualité garantie</strong> de tous les produits/services</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Formation continue</strong> du personnel</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Conformité</strong> aux normes et réglementations</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="arrow-right" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Responsabilité sociale</strong> et environnementale</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partnership Conditions -->
                <div x-data="{ open: false }" class="backdrop-blur-xl bg-white/40 dark:bg-gray-700/40 border border-white/20 dark:border-gray-600/30 rounded-2xl shadow-xl overflow-hidden">
                    <button @click="open = !open" class="w-full p-8 text-left flex items-start justify-between hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <i data-lucide="shield-check" class="w-8 h-8 text-blue-900"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Conditions de Partenariat</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Critères et exigences</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-6 h-6 text-gray-500 transition-transform flex-shrink-0 mt-1"></i>
                    </button>

                    <div x-show="open" x-transition class="px-8 pb-8 space-y-4 border-t border-white/10 dark:border-gray-600/20 pt-6">
                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Licence professionnelle valide et assurance responsabilité</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Expérience minimale de 2 ans dans le secteur</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Équipe formée et certifiée</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Infrastructure technique adequately</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Engagement d'une durée minimale de 3 ans</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Benefits -->
                <div x-data="{ open: false }" class="backdrop-blur-xl bg-white/40 dark:bg-gray-700/40 border border-white/20 dark:border-gray-600/30 rounded-2xl shadow-xl overflow-hidden">
                    <button @click="open = !open" class="w-full p-8 text-left flex items-start justify-between hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <i data-lucide="gift" class="w-8 h-8 text-blue-900"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Avantages Partenaires</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Ce que nous vous offrons</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''" class="w-6 h-6 text-gray-500 transition-transform flex-shrink-0 mt-1"></i>
                    </button>

                    <div x-show="open" x-transition class="px-8 pb-8 space-y-4 border-t border-white/10 dark:border-gray-600/20 pt-6">
                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <i data-lucide="zap" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Marges commerciales compétitives</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="zap" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Support technique et commercial dédié</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="zap" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Matériaux marketing et outils de vente</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="zap" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Accès au portail partenaire exclusif</p>
                            </div>
                            <div class="flex gap-3">
                                <i data-lucide="zap" class="w-5 h-5 text-blue-900 flex-shrink-0 mt-0.5"></i>
                                <p class="text-gray-700 dark:text-gray-300">Programme de fidélité et bonus annuels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Form Section -->
    <section class="py-20 bg-gradient-to-br from-blue-900 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-4">Compléter votre dossier de partenariat</h2>
                <p class="text-center text-blue-100 mb-16">Remplissez le formulaire ci-dessous pour nous soumettre votre candidature</p>

                <form @submit.prevent="submitForm" class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-8 md:p-12 shadow-2xl" enctype="multipart/form-data">
                    @csrf
                    <!-- Company Information Section -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                            <i data-lucide="building-2" class="w-6 h-6"></i>
                            Informations Entreprise
                        </h3>

                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Company Name (nom) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-3">
                                    <i data-lucide="building" class="w-4 h-4 inline mr-2"></i>
                                    Nom de l'entreprise *
                                </label>
                                <input type="text" 
                                       name="nom"
                                       x-model="form.nom"
                                       required
                                       placeholder="Votre entreprise"
                                       class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-semibold mb-3">
                                    <i data-lucide="mail" class="w-4 h-4 inline mr-2"></i>
                                    Email entreprise *
                                </label>
                                <input type="email" 
                                       name="email"
                                       x-model="form.email"
                                       required
                                       placeholder="contact@entreprise.com"
                                       class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                            </div>

                            <!-- Phone (téléphone) -->
                            <div>
                                <label class="block text-sm font-semibold mb-3">
                                    <i data-lucide="phone" class="w-4 h-4 inline mr-2"></i>
                                    Téléphone *
                                </label>
                                <input type="tel" 
                                       name="telephone"
                                       x-model="form.telephone"
                                       required
                                       placeholder="+243 81 23 45 67 89"
                                       class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                            </div>

                            <!-- Physical Address (adresse) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-3">
                                    <i data-lucide="map-pin" class="w-4 h-4 inline mr-2"></i>
                                    Adresse physique *
                                </label>
                                <input type="text" 
                                       name="adresse"
                                       x-model="form.adresse"
                                       required
                                       placeholder="123 Rue de la Paix, 75000 Goma"
                                       class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                            </div>

                            <!-- Website (site_web) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-3">
                                    <i data-lucide="globe" class="w-4 h-4 inline mr-2"></i>
                                    Site web
                                </label>
                                <input type="url" 
                                       name="site_web"
                                       x-model="form.site_web"
                                       placeholder="https://www.votresite.com"
                                       class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                            </div>

                            
                        </div>
                    </div>

                    <!-- Partnership Type Section -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                            <i data-lucide="network" class="w-6 h-6"></i>
                            Type de Partenariat *
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <template x-for="type in partnershipTypes" :key="type.value">
                                <label class="flex items-center gap-4 p-4 bg-white/10 border border-white/20 rounded-lg cursor-pointer hover:bg-white/20 transition-all">
                                    <input type="radio" 
                                           name="type"
                                           :value="type.value" 
                                           x-model="form.type"
                                           class="w-4 h-4" 
                                           required>
                                    <span class="flex items-center gap-2">
                                        <i :data-lucide="type.icon" class="w-5 h-5"></i>
                                        <span x-text="type.label"></span>
                                    </span>
                                </label>
                            </template>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                            <i data-lucide="file-text" class="w-6 h-6"></i>
                            Informations Complémentaires
                        </h3>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold mb-3">
                                    Description de votre activité
                                </label>
                                <textarea name="note"
                                          x-model="form.note"
                                          placeholder="Décrivez votre activité et votre expérience..."
                                          rows="4"
                                          class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all resize-none"></textarea>
                            </div>

                            <!-- Contact Person -->
                            <div class="grid md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-semibold mb-3">
                                        <i data-lucide="user" class="w-4 h-4 inline mr-2"></i>
                                        Nom du responsable *
                                    </label>
                                    <input type="text" 
                                           name="name"
                                           x-model="form.name"
                                           required
                                           placeholder="votre nom"
                                           class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold mb-3">
                                        <i data-lucide="briefcase" class="w-4 h-4 inline mr-2"></i>
                                        Fonction *
                                    </label>
                                    <input type="text" 
                                           name="fonction"
                                           x-model="form.fonction"
                                           required
                                           placeholder="Directeur, Gérant, etc."
                                           class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Digital Signature Section -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                            <i data-lucide="pen-tool" class="w-6 h-6"></i>
                            Signature Électronique
                        </h3>

                        <div class="bg-white/10 border-2 border-dashed border-white/30 rounded-lg p-8 text-center">
                            <div x-show="!form.signature" class="space-y-4">
                                <div>
                                    <i data-lucide="edit-3" class="w-12 h-12 mx-auto text-blue-200 mb-4"></i>
                                    <p class="text-lg font-semibold mb-4">Zone de signature</p>
                                    <canvas id="signatureCanvas" 
                                            @mousedown="startDrawing"
                                            @mousemove="draw"
                                            @mouseup="stopDrawing"
                                            @mouseleave="stopDrawing"
                                            @touchstart.prevent="startDrawingTouch"
                                            @touchmove.prevent="drawTouch"
                                            @touchend="stopDrawing"
                                            class="w-full bg-white/5 border border-white/20 rounded cursor-crosshair mx-auto"
                                            width="500" 
                                            height="150">
                                    </canvas>
                                </div>

                                <div class="flex gap-4 justify-center">
                                    <button type="button" 
                                            @click="clearSignature"
                                            class="px-6 py-2 bg-red-500/50 hover:bg-red-600/50 border border-red-400 rounded-lg font-semibold transition-all">
                                        
                                        Effacer
                                    </button>
                                    <button type="button" 
                                            @click="saveSignature"
                                            class="px-6 py-2 bg-green-500/50 hover:bg-green-600/50 border border-green-400 rounded-lg font-semibold transition-all">
                                        
                                        Enregistrer
                                    </button>
                                </div>
                            </div>

                            <div x-show="form.signature" class="space-y-4">
                                <p class="text-green-300 font-semibold flex items-center justify-center gap-2">
                                  
                                    Signature enregistrée
                                </p>
                                <img :src="form.signature" alt="Signature" class="h-32 mx-auto">
                                <button type="button" 
                                        @click="form.signature = ''; clearSignature()"
                                        class="px-4 py-2 bg-blue-500/50 hover:bg-blue-600/50 border border-blue-400 rounded-lg font-semibold transition-all">
                                    <i data-lucide="edit" class="w-4 h-4 inline mr-2"></i>
                                    Modifier
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="signature" x-model="form.signature">

                        <p class="text-sm text-blue-200 mt-4">
                            <i data-lucide="info" class="w-4 h-4 inline mr-2"></i>
                            En signant, vous acceptez les conditions de partenariat et engagements ci-dessus.
                        </p>
                    </div>

                    <!-- Agreements Checkboxes -->
                    <div class="mb-12 space-y-4">
                        <h3 class="text-2xl font-bold flex items-center gap-3">
                            <i data-lucide="shield" class="w-6 h-6"></i>
                            Acceptations
                        </h3>

                        <label class="flex items-start gap-3 p-4 bg-white/10 border border-white/20 rounded-lg cursor-pointer hover:bg-white/20 transition-all">
                            <input type="checkbox" 
                                   x-model="form.acceptCharter"
                                   class="w-5 h-5 mt-0.5" 
                                   required>
                            <span class="text-sm">
                                J'accepte la charte d'engagement et les conditions de partenariat *
                            </span>
                        </label>

                        <label class="flex items-start gap-3 p-4 bg-white/10 border border-white/20 rounded-lg cursor-pointer hover:bg-white/20 transition-all">
                            <input type="checkbox" 
                                   x-model="form.acceptTerms"
                                   class="w-5 h-5 mt-0.5" 
                                   required>
                            <span class="text-sm">
                                J'accepte les conditions d'utilisation et la politique de confidentialité *
                            </span>
                        </label>

                        <label class="flex items-start gap-3 p-4 bg-white/10 border border-white/20 rounded-lg cursor-pointer hover:bg-white/20 transition-all">
                            <input type="checkbox" 
                                   x-model="form.acceptMarketing"
                                   class="w-5 h-5 mt-0.5">
                            <span class="text-sm">
                                J'accepte de recevoir des communications de Flamx
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button Section -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button type="submit" 
                                :disabled="!form.signature || !form.acceptCharter || !form.acceptTerms"
                                class="w-full sm:flex-1 bg-blue-500 hover:bg-blue-600 disabled:bg-gray-500 disabled:cursor-not-allowed text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:scale-105 disabled:hover:scale-100 flex items-center justify-center gap-2 shadow-lg">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            Soumettre mon dossier
                        </button>
                        <button type="reset" 
                                class="w-full sm:flex-1 px-8 py-3 bg-white/20 hover:bg-white/30 border border-white/30 rounded-lg font-semibold transition-all text-white">
                            Réinitialiser
                        </button>
                    </div>

                    <!-- Success Message -->
                    <div x-show="showSuccess" x-transition class="mt-8 bg-green-500/20 border-2 border-green-400 rounded-lg p-6 text-green-100 flex items-start gap-4">
                        <i data-lucide="check-circle" class="w-6 h-6 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h4 class="font-bold mb-2">Candidature reçue avec succès !</h4>
                            <p>Nous examinerons votre dossier et reviendrons vers vous dans les 5 jours ouvrables.</p>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div x-show="errorMessage" x-transition class="mt-8 bg-red-500/20 border-2 border-red-400 rounded-lg p-6 text-red-100 flex items-start gap-4">
                        <i data-lucide="alert-circle" class="w-6 h-6 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h4 class="font-bold mb-2">Erreur</h4>
                            <p x-text="errorMessage" class="whitespace-pre-line"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

   
</main>

<script>
function partnerEngagement() {
    return {
        showSuccess: false,
        errorMessage: '',
        isLoading: false,
        partnershipTypes: [
            { value: 'commercial', label: 'Commercial', icon: 'shopping-cart' },
            { value: 'financial', label: 'Financier', icon: 'coins' },
            { value: 'technical', label: 'Technique', icon: 'wrench' },
            { value: 'supplier', label: 'Fournisseur', icon: 'package' },
            { value: 'legal', label: 'Juridique', icon: 'scale' }
        ],
        form: {
            nom: '',
            email: '',
            telephone: '',
            adresse: '',
            site_web: '',
            type: '',
            note: '',
            name: '',
            fonction: '',
            signature: '',
            acceptCharter: false,
            acceptTerms: false,
            acceptMarketing: false
        },
        canvas: null,
        ctx: null,
        isDrawing: false,

        init() {
            this.canvas = document.getElementById('signatureCanvas');
            this.ctx = this.canvas.getContext('2d');
            this.setupCanvas();
        },

        setupCanvas() {
            const dpr = window.devicePixelRatio || 1;
            this.canvas.width = this.canvas.offsetWidth * dpr;
            this.canvas.height = this.canvas.offsetHeight * dpr;
            this.ctx.scale(dpr, dpr);
            this.ctx.strokeStyle = '#ffffff';
            this.ctx.lineWidth = 2;
            this.ctx.lineCap = 'round';
            this.ctx.lineJoin = 'round';
        },

        startDrawing(e) {
            if (!this.form.signature) {
                this.isDrawing = true;
                const rect = this.canvas.getBoundingClientRect();
                this.ctx.beginPath();
                this.ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
            }
        },

        startDrawingTouch(e) {
            if (!this.form.signature) {
                this.isDrawing = true;
                const touch = e.touches[0];
                const rect = this.canvas.getBoundingClientRect();
                this.ctx.beginPath();
                this.ctx.moveTo(touch.clientX - rect.left, touch.clientY - rect.top);
            }
        },

        draw(e) {
            if (!this.isDrawing || this.form.signature) return;
            const rect = this.canvas.getBoundingClientRect();
            this.ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
            this.ctx.stroke();
        },

        drawTouch(e) {
            if (!this.isDrawing || this.form.signature) return;
            const touch = e.touches[0];
            const rect = this.canvas.getBoundingClientRect();
            this.ctx.lineTo(touch.clientX - rect.left, touch.clientY - rect.top);
            this.ctx.stroke();
        },

        stopDrawing() {
            this.isDrawing = false;
        },

        clearSignature() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        },

        saveSignature() {
            if (this.canvas.toDataURL() !== 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==') {
                this.form.signature = this.canvas.toDataURL();
            }
        },

        handleLogoUpload(e) {
            // Le fichier sera géré par le formulaire multipart
        },

        async submitForm() {
            if (!this.form.signature || !this.form.acceptCharter || !this.form.acceptTerms) {
                this.errorMessage = 'Veuillez compléter tous les champs requis, signer et accepter les conditions.';
                return;
            }

            this.isLoading = true;
            this.errorMessage = '';

            try {
                const formData = new FormData();
                
                // Ajouter tous les champs du formulaire
                formData.append('nom', this.form.nom);
                formData.append('email', this.form.email);
                formData.append('telephone', this.form.telephone);
                formData.append('adresse', this.form.adresse);
                formData.append('site_web', this.form.site_web);
                formData.append('type', this.form.type);
                formData.append('name', this.form.name);
                formData.append('fonction', this.form.fonction);
                formData.append('signature', this.form.signature);
                formData.append('note', this.form.note);

                // Ajouter le logo s'il existe
                const logoInput = document.querySelector('input[name="logo"]');
                if (logoInput && logoInput.files.length > 0) {
                    formData.append('logo', logoInput.files[0]);
                }

                const response = await fetch('{{ route("devenir.partenaire") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    this.showSuccess = true;
                    
                    // Réinitialiser le formulaire après 3 secondes
                    setTimeout(() => {
                        this.form = {
                            nom: '',
                            email: '',
                            telephone: '',
                            adresse: '',
                            site_web: '',
                            type: '',
                            note: '',
                            name: '',
                            fonction: '',
                            signature: '',
                            acceptCharter: false,
                            acceptTerms: false,
                            acceptMarketing: false
                        };
                        this.showSuccess = false;
                        this.clearSignature();
                        logoInput.value = '';
                    }, 3000);
                } else {
                    this.errorMessage = data.message || 'Erreur lors de l\'enregistrement du partenaire.';
                    if (data.errors) {
                        const errors = Object.values(data.errors).flat();
                        this.errorMessage += '\n' + errors.join('\n');
                    }
                }
            } catch (error) {
                console.error('Erreur:', error);
                this.errorMessage = 'Une erreur est survenue. Veuillez réessayer.';
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>

@endsection
