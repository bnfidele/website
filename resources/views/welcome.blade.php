<!DOCTYPE html>
<html lang="fr" x-data="app()" x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title x-text="$t('meta.title')">Flamx - Solutions de lutte contre l'incendie</title>
    <meta name="description" x-bind:content="$t('meta.description')">
    
    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
        
        /* Product card styles */
        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .dark .product-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.25), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            transition: transform 0.5s ease-out;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        .product-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .order-button {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }
        
        .order-button:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
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
        
        .pagination-dot {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .pagination-dot.active {
            transform: scale(1.3);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
        
        .carousel-scroll {
            animation: scroll 20s linear infinite;
        }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        .carousel-scroll:hover {
            animation-play-state: paused;
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
                    <i data-lucide="flame" class="w-8 h-8 text-primary-900 dark:text-blue-400"></i>
                    <span class="text-2xl font-bold text-primary-900 dark:text-blue-400">Flamx</span>
                </div>
                
                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" @click="goToSection('home')" :class="activeSection === 'home' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="transition-colors duration-300" x-text="$t('nav.home')">Accueil</a>
                    <a href="#" @click="goToSection('about')" :class="activeSection === 'about' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="transition-colors duration-300" x-text="$t('nav.about')">À-propos</a>
                    <a href="#" @click="setCurrentPage('products')" :class="activeSection === 'products' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="transition-colors duration-300" x-text="$t('nav.products')">Produits</a>
                    <a href="#" @click="goToSection('contact')" :class="activeSection === 'contact' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="transition-colors duration-300" x-text="$t('nav.contact')">Contact</a>
                </div>
                
                <!-- Language & Theme Controls -->
                <div class="flex items-center space-x-4">
                    <!-- Language Selector -->
                    <select x-model="currentLang" @change="switchLanguage()" class="bg-transparent border border-gray-300 dark:border-gray-600 rounded px-2 py-1 text-sm">
                        <option value="fr">FR</option>
                        <option value="en">EN</option>
                    </select>
                    
                    <!-- Dark Mode Toggle -->
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
                <a href="#" @click="goToSection('home')" :class="activeSection === 'home' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="block py-2 transition-colors duration-300" x-text="$t('nav.home')">Accueil</a>
                <a href="#" @click="goToSection('about')" :class="activeSection === 'about' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="block py-2 transition-colors duration-300" x-text="$t('nav.about')">À-propos</a>
                <a href="#" @click="setCurrentPage('products')" :class="activeSection === 'products' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="block py-2 transition-colors duration-300" x-text="$t('nav.products')">Produits</a>
                <a href="#" @click="goToSection('contact')" :class="activeSection === 'contact' ? 'text-primary-600 font-semibold' : 'hover:text-primary-600'" class="block py-2 transition-colors duration-300" x-text="$t('nav.contact')">Contact</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
  
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
                <div>
                    <h3 class="text-lg font-semibold mb-4" x-text="$t('footer.contact.title')">Contact</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-5 h-5 text-primary-400"></i>
                            <a href="mailto:contact@flamx.com" class="text-gray-300 hover:text-primary-400 transition-colors duration-300">
                                contact@flamx.com
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i data-lucide="phone" class="w-5 h-5 text-primary-400"></i>
                            <a href="tel:+33123456789" class="text-gray-300 hover:text-primary-400 transition-colors duration-300">
                                +33 1 23 45 67 89
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-primary-400"></i>
                            <span class="text-gray-300" x-text="$t('footer.contact.address')">
                                Paris, France
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4" x-text="$t('footer.social.title')">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-primary-600 transition-colors duration-300">
                            <i data-lucide="linkedin" class="w-5 h-5"></i>
                        </a>
                        <a href="https://wa.me/33123456789" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-green-600 transition-colors duration-300" target="_blank">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-blue-600 transition-colors duration-300">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="bg-gray-800 dark:bg-gray-900 p-3 rounded-full hover:bg-sky-500 transition-colors duration-300">
                            <i data-lucide="twitter" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-gray-700 dark:border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © 2025 Flamx. <span x-text="$t('footer.rights')">Tous droits réservés.</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Fixed WhatsApp Button -->
    <a href="https://wa.me/33123456789" 
       class="fixed bottom-4 right-4 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 ease-out transform hover:scale-110"
       aria-label="Contacter via WhatsApp">
        <i data-lucide="message-circle" class="w-6 h-6"></i>
    </a>

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

    <!-- Alpine.js App Logic -->
    <script>
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
                            title: 'Flamx - Solutions de lutte contre l\'incendie',
                            description: 'Protégez vos biens avec nos systèmes de détection et d\'extinction automatisés'
                        },
                        nav: {
                            home: 'Accueil',
                            about: 'À-propos',
                            products: 'Produits',
                            contact: 'Contact'
                        },
                        hero: {
                            title: 'Solutions de pointe pour la sécurité incendie',
                            subtitle: 'Protégez vos biens avec nos systèmes de détection et d\'extinction automatisés',
                            cta: 'Notre catalogue'
                        },
                        demo: {
                            sectionTitle: 'Supervision en temps réel',
                            title: 'Système en temps réel',
                            alert: 'Alerte: Fumée détectée - Bureau 204'
                        },
                        partners: {
                            title: 'Nos partenaires'
                        },
                        about: {
                            title: 'À propos de Flamx',
                            description: 'Depuis plus de 15 ans, Flamx développe des solutions innovantes pour la prévention et la lutte contre l\'incendie. Notre mission est de protéger vos biens et vos vies grâce à une technologie de pointe.',
                            stats: {
                                clients: 'Clients satisfaits',
                                incidents: 'Incidents évités',
                                experience: 'Années d\'expérience'
                            }
                        },
                        products: {
                            title: 'Nos produits',
                            subtitle: 'Découvrez notre gamme complète de solutions de sécurité incendie',
                            vrGoggles: {
                                category: 'Intelligence Artificielle',
                                title: 'Lunettes VR alimentées par IA redéfinissent la réalité',
                                description: 'Découvrez le niveau supérieur de réalité augmentée avec des lunettes intelligentes intégrant une IA de pointe pour une interaction transparente avec le monde qui vous entoure.',
                                order: 'Commander maintenant'
                            },
                            sections: {
                                devices: 'Appareils',
                                software: 'Logiciels'
                            },
                            devices: {
                                title: 'Appareils',
                                basic: {
                                    title: 'Santinel Basic',
                                    description: 'Système de détection de base fiable',
                                    order: 'Commander',
                                    order_link: 'voir plus'
                                },
                                plus: {
                                    title: 'Santinel Plus',
                                    description: 'Version améliorée avec capteurs supplémentaires',
                                    order: 'Commander'
                                },
                                pro: {
                                    title: 'Santinel Pro',
                                    description: 'Système avancé avec IA intégrée',
                                    order: 'Commander'
                                },
                                promax: {
                                    title: 'Santinel Pro Max',
                                    description: 'Solution complète avec extinction automatique',
                                    order: 'Commander'
                                },
                                ultra: {
                                    title: 'Santinel Ultra',
                                    description: 'Technologie révolutionnaire multi-zones',
                                    order: 'Commander'
                                },
                                enterprise: {
                                    title: 'Santinel Enterprise',
                                    description: 'Solution professionnelle complète',
                                    order: 'Commander'
                                }
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
                            description: 'Solutions de pointe pour la sécurité incendie depuis plus de 15 ans.',
                            contact: {
                                title: 'Contact',
                                address: 'Paris, France'
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
                            contact: 'Contact'
                        },
                        hero: {
                            title: 'Cutting-edge fire safety solutions',
                            subtitle: 'Protect your assets with our automated detection and suppression systems',
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
                            description: 'For over 15 years, Flamx has been developing innovative solutions for fire prevention and firefighting. Our mission is to protect your property and lives through cutting-edge technology.',
                            stats: {
                                clients: 'Satisfied clients',
                                incidents: 'Incidents prevented',
                                experience: 'Years of experience'
                            }
                        },
                        products: {
                            title: 'Our products',
                            subtitle: 'Discover our complete range of fire safety solutions',
                            vrGoggles: {
                                category: 'Artificial Intelligence',
                                title: 'AI-Powered VR Goggles Redefine Reality',
                                description: 'Experience the next level of augmented reality with smart goggles integrating cutting-edge AI for seamless interaction with the world around you.',
                                order: 'Order now'
                            },
                            sections: {
                                devices: 'Devices',
                                software: 'Software'
                            },
                            devices: {
                                title: 'Devices',
                                basic: {
                                    title: 'Santinel Basic',
                                    description: 'Reliable basic detection system',
                                    order: 'Order',
                                    order_link: 'See more'
                                },
                                plus: {
                                    title: 'Santinel Plus',
                                    description: 'Enhanced version with additional sensors',
                                    order: 'Order'
                                },
                                pro: {
                                    title: 'Santinel Pro',
                                    description: 'Advanced system with integrated AI',
                                    order: 'Order'
                                },
                                promax: {
                                    title: 'Santinel Pro Max',
                                    description: 'Complete solution with automatic suppression',
                                    order: 'Order'
                                },
                                ultra: {
                                    title: 'Santinel Ultra',
                                    description: 'Revolutionary multi-zone technology',
                                    order: 'Order'
                                },
                                enterprise: {
                                    title: 'Santinel Enterprise',
                                    description: 'Complete professional solution',
                                    order: 'Order'
                                }
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
                            description: 'Cutting-edge fire safety solutions for over 15 years.',
                            contact: {
                                title: 'Contact',
                                address: 'Paris, France'
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

                animateCounter(target, type) {
                    if (this.counters.completed[type]) return;
                    
                    this.counters.completed[type] = true;
                    this.counters.animating[type] = true;
                    this.counters[type] = 0;
                    
                    const duration = 2500;
                    const frameRate = 60;
                    const totalFrames = Math.round(duration / (1000 / frameRate));
                    const easeOutQuart = t => 1 - Math.pow(1 - t, 4);
                    
                    let currentFrame = 0;
                    
                    const animate = () => {
                        currentFrame++;
                        const progress = currentFrame / totalFrames;
                        const easedProgress = easeOutQuart(Math.min(progress, 1));
                        
                        const currentValue = Math.floor(easedProgress * target);
                        this.counters[type] = currentValue;
                        
                        if (progress >= 0.4 && progress <= 0.6) {
                            this.$nextTick(() => {
                                const element = document.querySelector(`[x-text="counters.${type}"]`);
                                if (element) {
                                    element.classList.add('active');
                                }
                            });
                        }
                        
                        if (target > 100 && progress > 0.3 && progress < 0.8 && Math.random() > 0.8) {
                            this.createParticles(type);
                        }
                        
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            this.counters[type] = target;
                            this.counters.animating[type] = false;
                            
                            this.$nextTick(() => {
                                const element = document.querySelector(`[x-text="counters.${type}"]`);
                                if (element) {
                                    element.classList.add('animate');
                                    setTimeout(() => {
                                        element.classList.remove('animate', 'active');
                                    }, 800);
                                }
                            });
                        }
                    };
                    
                    const randomDelay = Math.random() * 200;
                    setTimeout(() => {
                        requestAnimationFrame(animate);
                    }, randomDelay);
                },

                createParticles(type) {
                    const element = document.querySelector(`[x-text="counters.${type}"]`);
                    if (!element) return;
                    
                    const container = element.closest('.counter-particles');
                    if (!container) return;
                    
                    const particleCount = Math.floor(Math.random() * 3) + 3;
                    
                    for (let i = 0; i < particleCount; i++) {
                        const particle = document.createElement('div');
                        particle.className = 'particle';
                        
                        const x = (Math.random() - 0.5) * 60;
                        const y = (Math.random() - 0.5) * 40;
                        
                        particle.style.setProperty('--particle-x', `${x}px`);
                        particle.style.setProperty('--particle-y', `${y}px`);
                        particle.style.left = '50%';
                        particle.style.top = '50%';
                        particle.style.animationDelay = `${i * 100}ms`;
                        
                        container.appendChild(particle);
                        
                        setTimeout(() => {
                            if (particle.parentNode) {
                                particle.parentNode.removeChild(particle);
                            }
                        }, 2000);
                    }
                },

                resetCounters() {
                    Object.keys(this.counters.completed).forEach(type => {
                        this.counters.completed[type] = false;
                        this.counters.animating[type] = false;
                        this.counters[type] = 0;
                    });
                },

                submitForm() {
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

        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(e.target.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    </script>
</body>
</html>