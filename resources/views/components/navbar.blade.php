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

                <a href="/" class="flex items-center">
                    <img class="w-40" src="{{ asset('img/logo-primary-nobg.png') }}" alt="">
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
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

                    <!-- Icono carrito/bolsa -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('shopping_cart.index') }}"
                            class="text-gray-500 hover:text-primary-green relative">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            @if(Cart::instance('cart_' . auth()->id())->content()->count() > 0)
                                <span class="absolute -top-2 -right-2 bg-primary-green text-black text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                    {{ Cart::instance('cart_' . auth()->id())->content()->count() }}
                                </span>
                            @endif

                        </a>
                    </div>
                </div>
            </div>

            <!-- Menú móvil -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 inset-shadow-sm p-4">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <x-nav-link href="/" :active="request()->is('/')">Inicio</x-nav-link>
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
{{--                                @foreach($products as $product)--}}
{{--                                    @if($product->category_id == 1)--}}
{{--                                        <li><a href="products/">{{ $product->name }}</a></li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
                            </ul>
                        </div>

                        <!-- Columna Ropa -->
                        <div>
                            <h3 class="text-dark-brown font-medium mb-4">Ropa</h3>
                            <ul class="space-y-2">
{{--                                @foreach($products as $product)--}}
{{--                                    @if($product->category_id == 2)--}}
{{--                                        <li><a href="products/">{{ $product->name }}</a></li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
                            </ul>
                        </div>

                        <!-- Columna Categorías -->
                        <div>
                            <h3 class="text-dark-brown font-medium mb-4">Categorías</h3>
                            <ul class="space-y-2">
{{--                                @foreach($categories as $category)--}}
{{--                                    <li><a href="admin/categories">{{$category->name}}</a></li>--}}
{{--                                @endforeach--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</header>
