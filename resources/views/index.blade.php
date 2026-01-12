<!DOCTYPE html>
<html lang="fr" x-data="app()" x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Version .ico (compatibilité) -->
    <link rel="shortcut icon" href="{{ asset('storage/img/icon.jpg') }}" type="image/x-icon">
    
       {!! SEOTools::generate() !!}
    <!-- Tailwind CSS v4 CDN -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Penguin UI -->

<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-16BJF9HN63"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-16BJF9HN63');
    </script>

    <link href="https://unpkg.com/@penguin-ui/core@latest/dist/style.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .dark .glassmorphism {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.2);
        }
        
        /* Animations de compteur améliorées */
        .counter-container {
            perspective: 1000px;
        }
        
        .counter-number {
            display: inline-block;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            font-variant-numeric: tabular-nums;
            position: relative;
        }
        
        .counter-number.animate {
            animation: counterPulse 0.8s ease-out;
        }
        
        .counter-animation {
            animation: countUp 2s ease-out;
            transform-origin: center;
        }
        
        @keyframes countUp {
            0% { 
                transform: scale(0.3) rotateY(180deg); 
                opacity: 0; 
                filter: blur(4px);
            }
            50% { 
                transform: scale(1.1) rotateY(90deg); 
                opacity: 0.7; 
                filter: blur(2px);
            }
            100% { 
                transform: scale(1) rotateY(0deg); 
                opacity: 1; 
                filter: blur(0px);
            }
        }
        
        @keyframes counterPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .counter-text {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out 0.5s forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Animation de brillance pour les compteurs */
        .counter-shine {
            position: relative;
            overflow: hidden;
        }
        
        .counter-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.8s ease-in-out;
        }
        
        .counter-shine.active::before {
            left: 100%;
        }
        
        /* Effet de particules pour les gros nombres */
        .counter-particles {
            position: relative;
        }
        
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #3b82f6;
            border-radius: 50%;
            pointer-events: none;
            animation: particleFloat 2s ease-out forwards;
        }
        
        @keyframes particleFloat {
            0% {
                opacity: 1;
                transform: translate(0, 0) scale(0);
            }
            50% {
                opacity: 0.8;
                transform: translate(var(--particle-x, 20px), var(--particle-y, -30px)) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(calc(var(--particle-x, 20px) * 2), calc(var(--particle-y, -30px) * 2)) scale(0.5);
            }
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    <!-- Header Glassmorphism -->
        <header class="fixed top-0 w-full z-50 glassmorphism">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <i data-lucide="flame"  alt="Flamx Logo"  class="w-8 h-8 text-primary-900 dark:text-blue-400"></i>
                    <span class="text-2xl font-bold text-primary-900 dark:text-blue-400">Flamx</span>
                </div>
                
                <!-- Menu Desktop -->
               
                <div class="hidden md:flex items-center space-x-8">
                    {{-- Accueil --}}
                    <a href="{{ url('/#home') }}"
                    class="transition-colors duration-300 {{ request()->is('/#home') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'  }}" x-text="$t('nav.home')">
                    Accueil
                    </a>

                    {{-- À propos --}}
                    <a href="{{ url('/#about') }}"
                    class="transition-colors duration-300 {{ request()->is('/#about') && request()->getRequestUri() === '/#about' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}" x-text="$t('nav.about')">
                    À-propos
                    </a>

                    {{-- Produits --}}
                    <a href="{{ route('produit') }}"
                    class="transition-colors duration-300 {{ request()->routeIs('produit') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}"  x-text="$t('nav.products')">
                    Produits
                    </a>

                    {{-- Contact --}}
                    <a href="{{ url('/#contact') }}"
                    class="transition-colors duration-300 {{ request()->is('/#contact')  ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}"  x-text="$t('nav.contact')">
                    Contact
                    </a>

                    {{-- FAQ --}}
                    <a href="{{ route('faq') }}"
                    class="transition-colors duration-300 {{ request()->routeIs('faq') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}">
                    FAQ
                    </a>
                </div>

                
                <!-- Language & Theme Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Language Selector -->
                    <select x-model="currentLang" @change="switchLanguage()" class="bg-transparent border border-gray-300 dark:border-gray-600 rounded px-2 py-1 text-sm">
                        <option value="fr">FR</option>
                        <option value="en">EN</option>
                    </select>
                    
                    <!-- Dark Mode Toggle (Penguin UI style) -->
                    <button @click="toggleDarkMode()" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i data-lucide="sun" x-show="darkMode" class="w-5 h-5"></i>
                        <i data-lucide="moon" x-show="!darkMode" class="w-5 h-5"></i>
                    </button>
                    
                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </nav>
            
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 space-y-2">
                                {{-- Accueil --}}
                <a href="{{ url('/#home') }}"
                class="block py-2 transition-colors duration-300 {{ request()->is('/#home') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }} "x-text="$t('nav.home')">
                Accueil
                </a>

                {{-- À propos --}}
                <a href="{{ url('/#about') }}"
                class="block py-2 transition-colors duration-300 {{ request()->is('/') && request()->getRequestUri() === '/#about' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}" x-text="$t('nav.about')">
                À-propos
                </a>

                {{-- Produits --}}
                <a href="{{ route('produit') }}"
                class="block py-2 transition-colors duration-300 {{ request()->routeIs('produit') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}" x-text="$t('nav.products')">
                Produits
                </a>

                {{-- Contact --}}
                <a href="{{ url('/#contact') }}"
                class="block py-2 transition-colors duration-300 {{ request()->is('/') && request()->getRequestUri() === '/#contact' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}">
                Contact
                </a>

                {{-- FAQ --}}
                <a href="{{ route('faq') }}"
                class="block py-2 transition-colors duration-300 {{ request()->routeIs('faq') ? 'text-primary-600 font-semibold' : 'hover:text-primary-600' }}">
                FAQ
                </a>
            </div>
        </div>
    </header>

    <!-- Home Main Content -->
  @yield('content')
  
    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-gray-950 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i data-lucide="flame" class="w-8 h-8 text-blue-400"></i>
                        <span class="text-2xl font-bold text-blue-400">Flamx</span>
                    </div>
                    <p class="text-gray-300 mb-4" x-text="$t('footer.description')">
                        Solutions de pointe pour la sécurité incendie depuis plus de 15 ans.
                    </p>
                </div>
                
                <!-- Contact Info -->
                 @if ($contacte)
                <div>
                    <h3 class="text-lg font-semibold mb-4" x-text="$t('footer.contact.title')">Contact</h3>
                    <div class="space-y-3">
                        @if ($contacte->email)
                        
                        <div class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-5 h-5 text-primary-400"></i>
                            <a href="mailto:contact@flamx.com" class="text-gray-300 hover:text-primary-400 transition-colors duration-300">
                                {{ $contacte->email }}
                            </a>
                        </div>
                        @endif
                        @if ($contacte->phone)
                        <div class="flex items-center space-x-3">
                            <i data-lucide="phone" class="w-5 h-5 text-primary-400"></i>
                            <a href="tel:{{ $contacte->phone }}" class="text-gray-300 hover:text-primary-400 transition-colors duration-300">
                                {{ $contacte->phone }}
                            </a>
                        </div>
                        @endif
                        @if ($contacte->address)
                        <div class="flex items-center space-x-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-primary-400"></i>
                            <span class="text-gray-300">
                                {{ $contacte->address }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            
                
                <!-- Social Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4" x-text="$t('footer.social.title')">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        @if ($contacte->linkedin)
                        <a href="{{ $contacte->linkedin }}" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-primary-600 transition-colors duration-300">
                            <i data-lucide="linkedin" class="w-5 h-5"></i>
                        </a>
                        @endif
                        @if ($contacte->whatsapp)
                        <a href="{{ $contacte->whatsapp }}" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-green-600 transition-colors duration-300" target="_blank">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </a>
                        @endif
                        @if ($contacte->facebook)
                      
                        <a href="{{ $contacte->facebook }}" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-blue-600 transition-colors duration-300">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        @endif
                        @if($contacte->twitter)
                        <a href="{{ $contacte->twitter }}" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-sky-500 transition-colors duration-300">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-gray-700 dark:border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © 2025 Flamx. <span x-text="$t('footer.rights')">Tous droits réservés.</span>
                </p>
            </div>
        </div>
    </footer>
    
    @if ($contacte)
    <!-- Fixed WhatsApp Button -->
     @if ($contacte->phone)
    <a href="https://wa.me/{{ preg_replace('/\D/', '', $contacte->phone) }}?text=Bonjour,%20je%20souhaite%20en%20savoir%20plus%20sur%20vos%20produits%20et%20services." 
       class="fixed bottom-4 right-4 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 ease-out transform hover:scale-110"
       aria-label="Contacter via WhatsApp">
        <i data-lucide="message-circle" class="w-6 h-6"></i>
    </a>
    @endif
    @endif

    <!-- Cookie Consent Toast -->
    <div x-show="showCookieConsent" 
         x-transition
         class="fixed bottom-4 left-4 z-50 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg shadow-lg p-4 max-w-sm">
        <div class="flex items-start space-x-3">
            <i data-lucide="cookie" class="w-5 h-5 text-primary-600 dark:text-primary-400 mt-1"></i>
            <div class="flex-1">
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-3" x-text="$t('cookies.message')">
                    Nous utilisons des cookies pour améliorer votre expérience.
                </p>
                <div class="flex space-x-2">
                    <button @click="acceptCookies()" 
                            class="bg-primary-600 hover:bg-primary-700 text-white px-3 py-1 rounded text-sm transition-colors duration-300"
                            x-text="$t('cookies.accept')">Accepter</button>
                    <button @click="showCookieConsent = false" 
                            class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 px-3 py-1 rounded text-sm transition-colors duration-300"
                            x-text="$t('cookies.decline')">Refuser</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" 
            onclick="scrollToTop()" 
            class="fixed bottom-6 left-6 z-50 bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white p-3 rounded-full shadow-lg transition-all duration-300 opacity-0 translate-y-2 transform hover:scale-110"
            aria-label="Remonter en haut">
        <i data-lucide="chevron-up" class="w-6 h-6"></i>
    </button>

    <!-- Alpine.js App Logic -->
    <script>
        // Initialisation d'Alpine.js pour le formulaire de contact
        document.addEventListener('alpine:init', () => {
            Alpine.data('contactForm', () => ({
                form: {
                    name: '',
                    email: '',
                    message: ''
                },
                loading: false,
                errors: {},
                successMessage: '',
                errorMessage: '',

                async submitForm() {
                    this.loading = true;
                    this.errors = {};
                    this.successMessage = '';
                    this.errorMessage = '';

                    try {
                        // Vérification des champs requis côté client
                        if (!this.form.name || !this.form.email || !this.form.message) {
                            this.errorMessage = 'Veuillez remplir tous les champs obligatoires.';
                            this.loading = false;
                            return;
                        }

                        const response = await fetch('/contact', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify(this.form)
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            throw result;
                        }

                        this.successMessage = result.message;
                        this.form = { name: '', email: '', message: '' };
                    } catch (error) {
                        if (error.errors) {
                            this.errors = error.errors;
                        } else {
                            this.errorMessage = error.message || 'Une erreur est survenue. Veuillez réessayer.';
                        }
                    } finally {
                        this.loading = false;
                    }
                }
            }));
        });

        // Fonction principale de l'application Alpine.js
        function app() {
            return {
                darkMode: localStorage.getItem('darkMode') === 'true' || false,
                currentLang: localStorage.getItem('language') || 'fr',
                currentPage: 'home',
                activeSection: 'home',
                mobileMenuOpen: false,
                annualPlan: false,
                showCookieConsent: !localStorage.getItem('cookieConsent'),
                counters: {
                    clients: 0,
                    incidents: 0,
                    experience: 0,
                    animating: {
                        clients: false,
                        incidents: false,
                        experience: false
                    },
                    completed: {
                        clients: false,
                        incidents: false,
                        experience: false
                    }
                },
                
                translations: {
                    fr: {
                        meta: {
                            title: 'Flamx  - Solutions de lutte contre l\'incendie',
                            description: 'Protégez vos biens avec nos systèmes de détection et d\'extinction automatisés'
                        },
                        nav: {
                            home: 'Accueil',
                            about: 'À-propos',
                            products: 'Produits',
                            contact: 'Contact',
                            faq: 'FAQ'
                        },
                        hero: {
                            title: 'l’innovation au service de votre sécurité incendie',
                            subtitle: 'Flamx protège ce qui compte. Nos systèmes automatisés détectent et éteignent les incendies, offrant sécurité 24/7, alertes en temps réel et protection avancée pour maisons, bureaux et entreprises',
                            cta: 'Notre catalogue'
                        },
                        demo: {
                            sectionTitle: 'Supervision en temps réel',
                            title: 'Système en temps réel',
                            alert: 'Alerte: Fumée détectée - Bureau 204'
                        },
                        partners: {
                            title: 'Nos partenaires',
                            description: 'Nous collaborons avec des leaders de l\'industrie pour vous offrir les meilleures solutions.'
                        },
                        about: {
                            title: 'À propos de Flamx',
                            description: 'Flamx développe des solutions innovantes et automatisées avec Flame-X pour prévenir et combattre les incendies, grâce à des technologies de pointe garantissant protection, fiabilité et efficacité. Les systèmes Flamx incluent la surveillance Sentinell feu et des dispositifs anti-incendie avancés, offrant une sécurité incendie optimale pour maisons, bureaux et entreprises. Disponibles à l’international, les solutions Flamx protègent contre le feu et toutes situations d’incendie, assurant une protection complète et moderne.',
                            stats: {
                                clients: 'Clients satisfaits',
                                incidents: 'Incidents évités',
                                experience: 'Années d\'expérience'
                            },
                            whyChoose: {
                                title: 'Pourquoi nous choisir ?',
                                innovation: {
                                    title: 'Innovation',
                                    description: 'Technologie de pointe avec IA intégrée pour une détection précoce et précise'
                                },
                                reliability: {
                                    title: 'Fiabilité',
                                    description: 'Systèmes testés et certifiés avec un taux de fiabilité de 99.8%'
                                },
                                support: {
                                    title: 'Support 24/7',
                                    description: 'Équipe d\'experts disponible en permanence pour vous assister'
                                },
                                installation: {
                                    title: 'Installation facile',
                                    description: 'Installation rapide et professionnelle par nos techniciens certifiés'
                                },
                                warranty: {
                                    title: 'Garantie 3 ans',
                                    description: 'Garantie complète pièces et main d\'œuvre avec support inclus'
                                },
                                compatibility: {
                                    title: 'Compatibilité',
                                    description: 'Compatible avec tous les systèmes de sécurité existants'
                                }
                            },
                            testimonials: {
                                title: 'Témoignages clients',
                                client1: {
                                    quote: 'Installation impeccable et système très fiable. L\'alerte mobile nous a sauvé d\'un incendie majeur.',
                                    name: 'Marie Dubois',
                                    position: 'Directrice, Hotel Royal'
                                },
                                client2: {
                                    quote: 'Le tableau de bord Entreprise nous donne un contrôle total sur tous nos sites. Excellent investissement.',
                                    name: 'Jean Martin',
                                    position: 'PDG, Martin Industries'
                                },
                                client3: {
                                    quote: 'Support technique réactif et produits de qualité. Je recommande Flamx sans hésitation.',
                                    name: 'Sophie Lambert',
                                    position: 'Responsable sécurité, Centre commercial kivu'
                                }
                            },
                        },
                        products: {
                            title: 'Nos produits',
                            subtitle: 'Découvrez notre gamme complète de solutions de sécurité incendie',
                            sections: {
                                devices: 'Appareils',
                                software: 'Logiciels'
                            },
                            vrGoggles: {
                                category: 'Artificial Intelligence',
                                title: 'AI-Powered VR Goggles Redefine Reality',
                                description: 'Experience the next level of augmented reality with smart goggles integrating cutting-edge AI for seamless interaction with the world around you.',
                                order: 'Order now'
                            },
                            devices: {
                                title: 'Appareils',
                                basic: {
                                    order: 'Commander',
                                    order_link: 'Voir plus'
                                },
                            },
                            software: {
                                title: 'Logiciel de supervision',
                                monthly: 'Mensuel',
                                annual: 'Annuel',
                                cta: 'Choisir ce plan',
                                domestic: {
                                    title: 'Version Domestique',
                                    subtitle: 'Pour maisons et petits bâtiments'
                                },
                                enterprise: {
                                    title: 'Version Entreprise',
                                    subtitle: 'Pour entreprises et grands bâtiments'
                                },
                                features: {
                                    monitoring: 'Surveillance 24/7',
                                    alerts: 'Alertes mobiles',
                                    dashboard: 'Tableau de bord simple',
                                    advancedDashboard: 'Tableau de bord avancé',
                                    support: 'Support technique',
                                    prioritySupport: 'Support prioritaire',
                                    ai: 'IA prédictive',
                                    multiSite: 'Multi-sites'
                                }
                            }
                        },
                        faq : {
                            title: 'Questions fréquentes',
                            subtitle: 'Trouvez les réponses aux questions les plus courantes sur nos produits',
                            questions: {
                                installation: {
                                    title: 'Comment installer les détecteurs Santinel ?',
                                    answer: 'L\'installation est simple et rapide. Nos détecteurs se fixent au plafond avec des vis standard. Un guide d\'installation détaillé est fourni avec chaque produit. Pour les versions Pro et Enterprise, une installation professionnelle est incluse.'
                                },
                                maintenance: {
                                    title: 'Quelle est la maintenance requise ?',
                                    answer: 'La maintenance est minimale. Testez les détecteurs une fois par mois et remplacez la batterie annuellement. Le logiciel effectue des auto-diagnostics et vous alertera en cas de problème.'
                                },
                                warranty: {
                                    title: 'Quelle est la garantie offerte ?',
                                    answer: 'Tous nos produits sont garantis 3 ans pièces et main d\'œuvre. La garantie couvre les défauts de fabrication et les dysfonctionnements. Le support technique est inclus pendant toute la durée de la garantie.'
                                },
                                compatibility: {
                                    title: 'Les systèmes sont-ils compatibles avec d\'autres marques ?',
                                    answer: 'Nos systèmes Santinel Pro, Pro Max et Enterprise sont compatibles avec la plupart des systèmes de sécurité existants. Ils supportent les protocoles standards comme Modbus et BACnet pour une intégration facile.'
                                },
                                support: {
                                    title: 'Quel support technique est disponible ?',
                                    answer: 'Nous offrons un support technique par email, téléphone et chat en direct. Les clients Entreprise bénéficient d\'un support prioritaire 24/7. Notre équipe d\'experts est formée pour résoudre rapidement tous vos problèmes.'
                                },
                                pricing: {
                                    title: 'Comment fonctionne la tarification des logiciels ?',
                                    answer: 'Les logiciels sont facturés par abonnement mensuel ou annuel. L\'abonnement annuel offre une réduction de 15%. Aucun engagement à long terme requis pour commencer.'
                                }
                            },
                            contact: {
                                title: 'Vous ne trouvez pas votre réponse ?',
                                description: 'Notre équipe d\'experts est là pour répondre à toutes vos questions spécifiques.',
                                cta: 'Contactez-nous'
                            }
                        },
                        contact: {
                            title: 'Contactez-nous',
                            form: {
                                name: 'Nom complet',
                                namePlaceholder: 'Votre nom complet',
                                email: 'Email',
                                emailPlaceholder: 'votre.email@exemple.com',
                                message: 'Message',
                                messagePlaceholder: 'Décrivez votre projet...',
                                submit: 'Envoyer le message'
                            },
                            social: {
                                title: 'Suivez-nous'
                            }
                        },
                        cookies: {
                            message: 'Nous utilisons des cookies pour améliorer votre expérience.',
                            accept: 'Accepter',
                            decline: 'Refuser'
                        },
                        footer: {
                            description: 'Technologie de pointe pour une protection incendie électronique efficace.',
                            contact: {
                                title: 'Contact',
                            },
                            social: {
                                title: 'Suivez-nous'
                            },
                            rights: 'Tous droits réservés.'
                        }
                    },
                    en: {
                        meta: {
                            title: 'Flamx - Fire Safety Solutions',
                            description: 'Protect your assets with our automated detection and suppression systems'
                        },
                        nav: {
                            home: 'Home',
                            about: 'About',
                            products: 'Products',
                            contact: 'Contact',
                            faq: 'FAQ'
                        },
                        hero: {
                            title: 'Innovation at the service of your fire safety',
                            subtitle: 'Flamx protects what matters most. Our automated systems detect and extinguish fires, providing 24/7 security, real-time alerts, and advanced protection for homes, offices, and businesses.',
                            cta: 'Our catalog'
                        },
                        demo: {
                            sectionTitle: 'Real-time supervision',
                            title: 'Real-time system',
                            alert: 'Alert: Smoke detected - Office 204'
                        },
                        partners: {
                            title: 'Our partners'
                        },
                        about: {
                            title: 'About Flamx',
                            description: 'Flamx develops innovative and automated solutions with Flame-X to prevent and fight fires, using cutting-edge technologies that ensure protection, reliability, and efficiency. Flamx systems include Sentinell fire monitoring and advanced anti-fire devices, providing optimal fire safety for homes, offices, and businesses. Available internationally, Flamx solutions protect against fire and all emergency situations, delivering comprehensive and modern protection.',
                            stats: {
                                clients: 'Satisfied clients',
                                incidents: 'Incidents prevented',
                                experience: 'Years of experience'
                            },
                            whyChoose: {
                                title: 'Why choose us?',
                                innovation: {
                                    title: 'Innovation',
                                    description: 'Cutting-edge technology with integrated AI for early and accurate detection'
                                },
                                reliability: {
                                    title: 'Reliability',
                                    description: 'Tested and certified systems with 99.8% reliability rate'
                                },
                                support: {
                                    title: '24/7 Support',
                                    description: 'Expert team available around the clock to assist you'
                                },
                                installation: {
                                    title: 'Easy installation',
                                    description: 'Quick and professional installation by our certified technicians'
                                },
                                warranty: {
                                    title: '3-year warranty',
                                    description: 'Complete parts and labor warranty with included support'
                                },
                                compatibility: {
                                    title: 'Compatibility',
                                    description: 'Compatible with all existing security systems'
                                }
                            },
                            testimonials: {
                                title: 'Client testimonials',
                                client1: {
                                    quote: 'Flawless installation and very reliable system. The mobile alert saved us from a major fire.',
                                    name: 'Marie Dubois',
                                    position: 'Director, Hotel Royal'
                                },
                                client2: {
                                    quote: 'The Enterprise dashboard gives us complete control over all our sites. Excellent investment.',
                                    name: 'Jean Martin',
                                    position: 'CEO, Martin Industries'
                                },
                                client3: {
                                    quote: 'Responsive technical support and quality products. I recommend Flamx without hesitation.',
                                    name: 'Sophie Lambert',
                                    position: 'Security Manager, Rivoli Shopping Center kivu'
                                }
                            },
                        },
                        products: {
                            title: 'Our products',
                            subtitle: 'Discover our complete range of fire safety solutions',
                            vrGoggles: {
                                category: 'Artificial Intelligence',
                                title: 'AI-Powered VR Goggles Redefine Reality',
                                description: 'Experience the next level of augmented reality with smart goggles integrating cutting-edge AI for seamless interaction with the world around you.',
                                order: 'Order now',
                               
                            },
                            sections: {
                                devices: 'Devices',
                                software: 'Software'
                            },
                           
                            devices: {
                                title: 'Devices',
                                basic: {
                                    order: 'Order',
                                    order_link: 'See more'
                                },
                            },
                            software: {
                                title: 'Supervision software',
                                monthly: 'Monthly',
                                annual: 'Annual',
                                cta: 'Choose this plan',
                                domestic: {
                                    title: 'Domestic Version',
                                    subtitle: 'For homes and small buildings'
                                },
                                enterprise: {
                                    title: 'Enterprise Version',
                                    subtitle: 'For businesses and large buildings'
                                },
                                features: {
                                    monitoring: '24/7 monitoring',
                                    alerts: 'Mobile alerts',
                                    dashboard: 'Simple dashboard',
                                    advancedDashboard: 'Advanced dashboard',
                                    support: 'Technical support',
                                    prioritySupport: 'Priority support',
                                    ai: 'Predictive AI',
                                    multiSite: 'Multi-site'
                                }
                            }
                        },
                        faq: {
                            title: 'Frequently Asked Questions',
                            subtitle: 'Find answers to the most common questions about our products',
                            questions: {
                                installation: {
                                    title: 'How do I install Santinel detectors?',
                                    answer: 'Installation is simple and quick. Our detectors mount to the ceiling with standard screws. A detailed installation guide is provided with each product. Professional installation is included with Pro and Enterprise versions.'
                                },
                                maintenance: {
                                    title: 'What maintenance is required?',
                                    answer: 'Maintenance is minimal. Test detectors monthly and replace batteries annually. The software performs self-diagnostics and will alert you to any issues.'
                                },
                                warranty: {
                                    title: 'What warranty is offered?',
                                    answer: 'All our products come with a 3-year parts and labor warranty. The warranty covers manufacturing defects and malfunctions. Technical support is included for the entire warranty period.'
                                },
                                compatibility: {
                                    title: 'Are the systems compatible with other brands?',
                                    answer: 'Our Santinel Pro, Pro Max and Enterprise systems are compatible with most existing security systems. They support standard protocols like Modbus and BACnet for easy integration.'
                                },
                                support: {
                                    title: 'What technical support is available?',
                                    answer: 'We provide technical support via email, phone, and live chat. Enterprise customers get 24/7 priority support. Our expert team is trained to quickly resolve all your issues.'
                                },
                                pricing: {
                                    title: 'How does software pricing work?',
                                    answer: 'Software is billed monthly or annually. Annual subscription offers 15% discount. No long-term commitment required to get started.'
                                }
                            },
                            contact: {
                                title: 'Can\'t find your answer?',
                                description: 'Our expert team is here to answer all your specific questions.',
                                cta: 'Contact us'
                            }
                        },
                        contact: {
                            title: 'Contact us',
                            form: {
                                name: 'Full name',
                                namePlaceholder: 'Your full name',
                                email: 'Email',
                                emailPlaceholder: 'your.email@example.com',
                                message: 'Message',
                                messagePlaceholder: 'Describe your project...',
                                submit: 'Send message'
                            },
                            social: {
                                title: 'Follow us'
                            }
                        },
                        cookies: {
                            message: 'We use cookies to improve your experience.',
                            accept: 'Accept',
                            decline: 'Decline'
                        },
                        footer: {
                            description: 'Cutting-edge technology for effective electronic fire protection.',
                            contact: {
                                title: 'Contact',
                            },
                            social: {
                                title: 'Follow us'
                            },
                            rights: 'All rights reserved.'
                        }
                    }
                },

                init() {
                    this.updateLanguage();
                    lucide.createIcons();
                },

                toggleDarkMode() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('darkMode', this.darkMode);
                },

                switchLanguage() {
                    localStorage.setItem('language', this.currentLang);
                    this.updateLanguage();
                },

                updateLanguage() {
                    document.documentElement.lang = this.currentLang;
                },

                $t(key) {
                    const keys = key.split('.');
                    let value = this.translations[this.currentLang];
                    for (const k of keys) {
                        value = value?.[k];
                    }
                    return value || key;
                },

               
                
                submitForm() {
                    // Form submission logic here
                    alert(this.$t('contact.form.success') || 'Message envoyé avec succès !');
                },

                acceptCookies() {
                    localStorage.setItem('cookieConsent', 'true');
                    this.showCookieConsent = false;
                },

                setCurrentPage(page) {
                    this.currentPage = page;
                    this.mobileMenuOpen = false;
                    this.activeSection = page;
                    // Scroll to top when navigating to FAQ or Products pages
                    if (page === 'faq' || page === 'products') {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                },

                goToSection(section) {
                    this.setCurrentPage('home');
                    this.activeSection = section;
                    this.$nextTick(() => {
                        const element = document.getElementById(section);
                        if (element) {
                            element.scrollIntoView({behavior: 'smooth'});
                        }
                    });
                }
            }
        }

        // Fonction pour remonter en haut de la page
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Smooth scrolling pour les liens d'ancrage
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(e.target.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
        
        // Afficher/masquer le bouton "remonter en haut" selon la position de scroll
        window.addEventListener('scroll', function() {
            const scrollButton = document.getElementById('scrollToTop');
            if (scrollButton) {
                if (window.pageYOffset > 300) {
                    scrollButton.classList.remove('opacity-0', 'translate-y-2');
                    scrollButton.classList.add('opacity-100', 'translate-y-0');
                } else {
                    scrollButton.classList.add('opacity-0', 'translate-y-2');
                    scrollButton.classList.remove('opacity-100', 'translate-y-0');
                }
            }
        });
    </script>
</body>
</html>