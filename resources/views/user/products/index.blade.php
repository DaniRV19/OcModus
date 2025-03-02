<x-layout>
    <x-slot:heading>
        Productos
    </x-slot:heading>

    <div class="flex flex-wrap gap-10 items-center justify-center">
        @foreach ($products as $product)
            <div class="mb-8 shadow-sm">
                <div class="relative pb-44 w-72">
                    <img class="absolute h-full w-full object-cover rounded-b-lg shadow-md"
                        src="{{ $product->images()->get()->pluck('url')->first() }}" alt="{{ $product['name'] }}">
                </div>
                <div class="relative -mt-8 w-72">
                    <div class="bg-white p-6 rounded-t-2xl">
                        <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{ $product['name'] }}</h4>
                        <div class="mt-1">
                            ${{ $product['price'] }}
                        </div>
                        <div class="mt-2">
                            {{ $product['stock'] }}<span class="text-gray-600 text-sm"> /uds</span>
                        </div>

                        <!-- Formulario de valoración con estrellas -->
                        @auth
                            <form action="{{ route('reviews.show', $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="flex items-center">
                                    <span class="mr-2">Tu valoración:</span>
                                    <!-- Estrellas para la valoración -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}-{{ $product->id }}" class="hidden">
                                        <label for="star{{ $i }}-{{ $product->id }}" class="cursor-pointer text-gray-300 hover:text-yellow-400 transition duration-200 ease-in-out star-rating">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                            </svg>
                                        </label>
                                    @endfor
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="w-full bg-green-600 p-4 text-md text-gray-100 rounded-md hover:cursor-pointer">
                                        Enviar valoración
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="text-gray-600 text-sm mt-3">Por favor, <a href="{{ route('login') }}" class="text-blue-600">inicia sesión</a> para valorar este producto.</p>
                        @endauth
                    </div>

                    <!-- Formulario para añadir el producto al carrito -->
                    <form action="{{ route('shopping_cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-full bg-green-600 p-4 text-md text-gray-100 rounded-md hover:cursor-pointer">
                            Añadir al carrito
                        </button>
                    </form>
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

