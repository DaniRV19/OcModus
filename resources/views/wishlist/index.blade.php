<x-layout>
    <x-slot:heading>
        Mis Favoritos
    </x-slot:heading>

    <div class="flex flex-wrap gap-10 items-center justify-center">
        @foreach ($wishlist as $product)
            <div class="mb-8 shadow-sm w-72">
                <div class="relative pb-44">
                    <img class="absolute h-full w-full object-cover rounded-b-lg shadow-md"
                         src="{{ $product->images()->pluck('url')->first() }}" alt="{{ $product->name }}">
                </div>
                <div class="relative -mt-8 bg-white p-6 rounded-t-2xl">
                    <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{ $product->name }}</h4>
                    <div class="mt-1 text-gray-800">
                        ${{ $product->price }}
                    </div>
                    <div class="mt-2 text-gray-600 text-sm">
                        {{ $product->stock }} unidades disponibles
                    </div>

                    <!-- Botón para quitar de favoritos -->
                    <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            <span class="ml-1">Quitar de favoritos</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
