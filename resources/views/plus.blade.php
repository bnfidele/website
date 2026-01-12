@extends('index')

@section('content')
    @if ($produit)
  
  <main x-transition class="pt-20">
        <!-- Hero Section -->
        <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6" >
                       {{ $produit->name }}
                    </h1>
                    <p class="text-xl text-blue-100 max-w-2xl mx-auto" >
                        {{ $produit->meta_description }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Product Card Section -->
        <section class="py-16 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                        <!-- Desktop Layout: Image left, Content right -->
                        <div class="hidden md:grid md:grid-cols-5 h-80">
                            <!-- Image Section (2/5 width) -->
                             @if ($produit->photo )
                             
                        
                            <div class="col-span-2 overflow-hidden">
                                <img src="{{ asset('storage/' . $produit->photo) }}" 
                                     class="product-image w-full h-full object-cover" 
                                     :alt="$t('products.vrGoggles.title')" />
                            </div>
                            @elseif (!$produit->photo)

                            <div class="col-span-2 overflow-hidden">
                                <img src="{{ asset('storage/' .'img/logo.png') }}" 
                                     class="product-image w-full h-full object-cover" 
                                     :alt="$t('products.vrGoggles.title')" />
                            </div>
                            @endif

                            
                            <!-- Content Section (3/5 width) -->
                            <div class="col-span-3 flex flex-col justify-center p-8">
                               
                                
                                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white mb-4" >
                                   {{ $produit->name }}
                                </h3>
                                
                                <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed mb-6">
                                   {{ $produit->description }}
                                </p>
                                 <div class="text-2xl font-bold text-primary-600 dark:text-primary-400 mb-4">${{ $produit->price }}</div>
                                <a href="https://wa.me/09876544322?text=Bonjour,%20je%20souhaite%20commander%20les%20lunettes%20VR%20IA" 
                                       class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2"
                                       target="_blank">
                                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                                        <span x-text="$t('products.devices.basic.order')">Commander</span>
                                </a>
                                          
                            </div>
                        </div>

                        <!-- Mobile Layout: Image top, Content bottom -->
                        <div class="md:hidden">
                            <!-- Image Section -->
                             @if ($produit->photo )
                            <div class="overflow-hidden h-64">
                                <img src="{{ asset('storage/' . $produit->photo) }}" 
                                     class="product-image w-full h-full object-cover" 
                                     :alt="$t('products.vrGoggles.title')" />
                            </div>
                            @elseif(!$produit->photo)
                            <img src="{{ asset('storage/' .'img/icon.jpg') }}" 
                                     class="product-image w-full h-full object-cover" 
                                     :alt="$t('products.vrGoggles.title')" />
                            @endif
                            
                            <!-- Content Section -->
                            <div class="p-6">


                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                                 {{$produit->name }}
                                </h3>
                                
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                    {{$produit->description }}
                                </p>
                                 <div class="text-2xl font-bold text-primary-600 dark:text-primary-400 mb-4">${{ $produit->price }}</div>
                                 @if ($contacte)
                                    <a href="https://wa.me/{{ $contacte->phone }}?text=Bonjour,%20je%20souhaite%20commander%20les%20{{ $produit->name }}%20{{ $produit->description }}%20de%20{{ $produit->price }}" 
                                        class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-900 dark:hover:bg-primary-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2"
                                        target="_blank">
                                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                                            <span x-text="$t('products.devices.basic.order')">Commander</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </section>
 </main>
   @endif
@endsection
