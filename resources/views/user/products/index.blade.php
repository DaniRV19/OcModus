<x-layout>
    <x-slot:heading>
        Productos
    </x-slot:heading>

    <div class="flex flex-wrap gap-10 items-center justify-center">
        @foreach ($products as $product)
            <div class="mb-8 shadow-lg rounded-lg overflow-hidden transition-transform duration-300">
                <div class="relative pb-44 w-72">
                    <img class="absolute h-full w-full object-cover rounded-t-lg shadow-md"
                         src="{{ $product->images()->get()->pluck('url')->first() }}" alt="{{ $product['name'] }}">
                </div>
                <div class="relative -mt-8 w-72 bg-white rounded-b-lg shadow-md p-6">
                    <h4 class="mt-1 font-semibold text-lg leading-tight truncate text-gray-800">{{ $product['name'] }}</h4>
                    <div class="mt-1 text-xl font-bold text-green-600">
                        ${{ $product['price'] }}
                    </div>
                    <div class="mt-2 text-gray-600 text-sm">
                        {{ $product['stock'] }} /uds
                    </div>

                    <!-- Formulario de valoración con estrellas -->
                    @auth
                        <form action="{{ route('reviews.show', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex items-center">
                                <span class="mr-2 text-gray-700">Tu valoración:</span>
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}-{{ $product->id }}" class="hidden">
                                    <label for="star{{ $i }}-{{ $product->id }}" class="cursor-pointer text-gray-300 hover:text-yellow-400 transition duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    </label>
                                @endfor
                            </div>
                            <button type="submit" class="mt-3 w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 rounded-md transition">
                                Enviar valoración
                            </button>
                        </form>
                    @else
                        <p class="text-gray-600 text-sm mt-3">Por favor, <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">inicia sesión</a> para valorar este producto.</p>
                    @endauth

                    <!-- Botones de Wishlist y Carrito -->
                    <div class="mt-4 flex gap-2">
                        @auth
                            <form action="{{ Auth::user()->wishlist->contains($product->id) ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" method="POST" class="w-1/3">
                                @csrf
                                <button type="submit" class="flex items-center justify-center w-full px-3 py-2 rounded-md text-red-500 border border-red-500 hover:bg-red-100 transition">
                                    @if(Auth::user()->wishlist->contains($product->id))
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-red-500">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    @endif
                                </button>
                            </form>
                        @endauth

                        <form action="{{ route('shopping_cart.add') }}" method="POST" class="w-2/3">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 rounded-md transition flex items-center justify-center">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $products->links() }}
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Encuentra todos los radios de valoración
        const stars = document.querySelectorAll('input[name="rating"]');

        stars.forEach(star => {
            star.addEventListener('change', function() {
                // Establece las clases de color de las estrellas según la selección
                const selectedValue = this.value;
                const labels = this.closest('form').querySelectorAll('label');

                labels.forEach((label, index) => {
                    // Asignar color según la estrella seleccionada
                    if (index < selectedValue) {
                        label.classList.add('text-yellow-400');
                        label.classList.remove('text-gray-300');
                    } else {
                        label.classList.remove('text-yellow-400');
                        label.classList.add('text-gray-300');
                    }
                });
            });
        });
    });
</script>

</x-layout>

<x-footer></x-footer>

