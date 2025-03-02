<x-layout>
    <x-slot:heading>
        Inicio
    </x-slot:heading>

    <!-- Sección Quiénes Somos -->
    <section class="container mx-auto px-6 py-12 max-w-4xl" id="qs">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-green-800 mb-4">Quiénes Somos</h2>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-8"></div>
        </div>

        <div class="prose prose-lg mx-auto text-gray-700">
            <p class="mb-6">
                En <span class="font-semibold text-green-700">OCModus</span>, somos un equipo apasionado de jóvenes
                amantes de la naturaleza que creemos en el poder transformador de la alimentación vegana y consciente.
                Nuestra historia comenzó este mismo año 2025, cuando nuestro pequeño grupo de emprendedores decidió
                crear alternativas saludables y sostenibles que no comprometieran el sabor ni la calidad.
            </p>

            <p class="mb-6">
                Nuestra misión es clara: facilitar el acceso a productos veganos de la más alta calidad, cultivados de
                manera sostenible y procesados éticamente. Trabajamos directamente con agricultores locales y
                cooperativas internacionales certificadas para garantizar que cada producto en nuestro catálogo cumpla
                con nuestros rigurosos estándares.
            </p>

            <p class="mb-6">
                Lo que nos diferencia es nuestro compromiso con la transparencia. Creemos que cada persona tiene derecho
                a conocer exactamente lo que consume, de dónde proviene y cómo impacta en el mundo. Por eso, compartimos
                la historia completa de cada producto, desde la semilla hasta su mesa.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 text-center">
                <div class="bg-green-50 p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Sostenibilidad</h3>
                    <p class="text-gray-600">Comprometidos con prácticas que respetan y preservan nuestro planeta.</p>
                </div>

                <div class="bg-green-50 p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Calidad</h3>
                    <p class="text-gray-600">Seleccionamos cuidadosamente cada ingrediente para garantizar la
                        excelencia.</p>
                </div>

                <div class="bg-green-50 p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.479m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Comunidad</h3>
                    <p class="text-gray-600">Construimos relaciones significativas con productores y consumidores.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorías Destacadas -->
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Categorías Destacadas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="https://hips.hearstapps.com/hmg-prod/images/cocina-vegana-elle-gourmet-6537604a784d0.jpg?crop=0.616xw:1.00xh;0.119xw,0&resize=640:*"
                    alt="Alimentos" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Alimentos</h3>
                    <p class="text-gray-600 mb-4">Descubre nuestra variedad de alimentos 100% vegetales.</p>
                    <a href="/products" class="text-green-600 hover:text-green-700 font-medium">Ver productos →</a>
                </div>
            </div>
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="https://www.mundodeportivo.com/files/og_thumbnail/uploads/2024/09/19/66ebf1871f67c.jpeg"
                    alt="Complementos" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Complementos</h3>
                    <p class="text-gray-600 mb-4">Suplementos y complementos para una nutrición completa.</p>
                    <a href="/products" class="text-green-600 hover:text-green-700 font-medium">Ver productos →</a>
                </div>
            </div>
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="https://koochgreencosmetics.com/cdn/shop/articles/Notas_de_prensa_-_2021-03-17T095120.596.jpg?v=1615971362&width=1500"
                    alt="Cosmética" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Cosmética</h3>
                    <p class="text-gray-600 mb-4">Productos de belleza y cuidado personal cruelty-free.</p>
                    <a href="/products" class="text-green-600 hover:text-green-700 font-medium">Ver productos →</a>
                </div>
            </div>
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 duration-300">
                <img src="https://s1.elespanol.com/2024/02/01/actualidad/829427248_239587760_1706x960.jpg" alt="Hogar"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Hogar</h3>
                    <p class="text-gray-600 mb-4">Artículos sostenibles para un hogar ecológico.</p>
                    <a href="/products" class="text-green-600 hover:text-green-700 font-medium">Ver productos →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="bg-green-50 py-12">
        <div class="container mx-auto px-4">
            @php
                // Obtenemos los productos con id 1, 2, 3 y 4
                $featuredProducts = \App\Models\Product::whereIn('id', [1, 2, 3, 4])->get();
            @endphp


            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Productos Destacados</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"></div>


                <div class="flex flex-wrap gap-10 items-center justify-center">
                    @foreach ($featuredProducts as $product)
                        <div class="mb-8 shadow-sm">
                            <div class="relative pb-44 w-72">
                                <img class="absolute h-full w-full object-cover rounded-b-lg shadow-md"
                                    src="{{ optional($product->images()->where('is_primary', true)->first())->url ?? asset('/api/placeholder/300/300') }}"
                                    alt="{{ $product->name }}">
                            </div>
                            <div class="relative -mt-8 w-72">
                                <div class="bg-white p-6 rounded-t-2xl">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mb-2">{{ $product->description ?? 'Sin descripción' }}
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="text-xl font-bold text-green-600">€{{ number_format($product->price, 2) }}</span>
                                        <form action="{{ route('shopping_cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit"
                                                class="w-full bg-green-600 p-4 text-md text-gray-100 rounded-md hover:cursor-pointer">
                                                Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="/products"
                        class="inline-block border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold py-2 px-6 rounded-md transition duration-300">
                        Ver todos los productos
                    </a>
                </div>
            </div>
    </section>

    <!-- Beneficios -->
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">¿Por qué elegirnos?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">100% Vegano</h3>
                <p class="text-gray-600">Todos nuestros productos están libres de ingredientes de origen animal y no son
                    testados en animales.</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Ecológico y Sostenible</h3>
                <p class="text-gray-600">Nos comprometemos con el medio ambiente utilizando envases biodegradables y
                    procesos sostenibles.</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Envío Rápido</h3>
                <p class="text-gray-600">Entrega en 24-48 horas para que disfrutes de tus productos lo antes posible.
                </p>
            </div>
        </div>
    </section>

    <!-- Instagram Feed -->
    <section class="container mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Síguenos en Instagram</h2>
            <a href="https://instagram.com/ocm_veganshop" target="_blank"
                class="flex items-center text-green-600 font-medium hover:text-green-700 mt-4 md:mt-0">
                @ocm_veganshop
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        
    </section>

    <!-- Características adicionales / Confianza -->
    <section class="bg-white py-12 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="flex items-center justify-center md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="font-semibold text-gray-800">Envío Gratis</h3>
                        <p class="text-sm text-gray-600">En pedidos superiores a 50€</p>
                    </div>
                </div>
                <div class="flex items-center justify-center md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="font-semibold text-gray-800">Entrega Rápida</h3>
                        <p class="text-sm text-gray-600">24-48h laborables</p>
                    </div>
                </div>
                <div class="flex items-center justify-center md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="font-semibold text-gray-800">Pago Seguro</h3>
                        <p class="text-sm text-gray-600">Transacciones encriptadas</p>
                    </div>
                </div>
                <div class="flex items-center justify-center md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="font-semibold text-gray-800">Productos Frescos</h3>
                        <p class="text-sm text-gray-600">100% naturales</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>

<x-footer></x-footer>