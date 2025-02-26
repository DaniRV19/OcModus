
@php
use Surfsidemedia\Shoppingcart\Facades\Cart;
@endphp

<!-- Navbar Principal -->
<header class="bg-white shadow-sm">
    <!-- Sección superior -->
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">

                <a href="#" class="flex items-center">
                    <svg id="toggle-categories" class="h-10 w-10 text-primary-green" viewBox="0 0 100 100" fill="currentColor">
                        <path d="M50 15c-19.33 0-35 15.67-35 35s15.67 35 35 35 35-15.67 35-35-15.67-35-35-35zm0 60c-13.81 0-25-11.19-25-25s11.19-25 25-25 25 11.19 25 25-11.19 25-25 25z"/>
                        <path d="M50 35c-8.28 0-15 6.72-15 15 0 8.28 6.72 15 15 15 8.28 0 15-6.72 15-15 0-8.28-6.72-15-15-15zm0 20c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                    </svg>
                </a>
            </div>

            <!-- Navegación Principal - Escritorio -->
            <nav class="hidden md:flex space-x-10">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/products" :active="request()->is('products')">Productos</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contacto</x-nav-link>
            </nav>

            <!-- Navegación móvil - Toggle -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-500 hover:text-primary-green">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

            <!-- Icono carrito/bolsa -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('shopping_cart.index') }}" class="text-gray-500 hover:text-primary-green relative">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    @if(Cart::instance('cart')->content()->count() > 0)
                        <span class="absolute -top-2 -right-2 bg-primary-green text-black text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ Cart::instance('cart')->content()->count() }}</span>
                    @endif
                    </a>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 inset-shadow-sm p-4">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/products" :active="request()->is('products')">Productos</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contacto</x-nav-link>
        </div>
    </div>

    <!-- Sección de categorías (Desplegable) -->
    <div id="categories-panel" class="hidden border-t border-gray-200 py-5 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Columna Comida -->
                <div>
                    <h3 class="text-dark-brown font-medium mb-4">Comida</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-500 hover:text-primary-green">EJEMPLO</a></li>
                    </ul>
                </div>

                <!-- Columna Ropa -->
                <div>
                    <h3 class="text-dark-brown font-medium mb-4">Ropa</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-500 hover:text-primary-green">EJEMPLO</a></li>
                    </ul>
                </div>

                <!-- Columna Categorías -->
                <div>
                    <h3 class="text-dark-brown font-medium mb-4">Categorías</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-500 hover:text-primary-green">EJEMPLO</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
