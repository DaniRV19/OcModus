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
</x-layout>
