<x-layout>
    <x-slot:heading>
        Productos
    </x-slot:heading>

    <div class="">
        @foreach ( $products as $product)

            <div class="relative pb-48 max-w-96 shadow-sm">
                <img  class="absolute h-full w-full object-cover rounded-lg shadow-md" src="https://blog.vegaffinity.com/wp-content/uploads/2024/04/chorizo-vegano.png" alt="" >
            </div>
            <div class="relative px-3 -mt-16 max-w-96">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{ $product['name'] }}</h4>
                    <div class="mt-1">
                        {{ $product['price'] }}
                    </div>
                    <div class="mt-2">
                        {{ $product['stock'] }}<span class="text-gray-600 text-sm"> /uds</span>
                    </div>
                    <div class="flex justify-center mt-4 pb-1 rounded-lg bg-emerald-400 text-white">
                        <a href="#" class="mt-1">Comprar</a>
                    </div>
                </div>
            </div>

        @endforeach

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout>
