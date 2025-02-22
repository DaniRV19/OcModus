<x-layout>
    <x-slot:heading>
        <h1 class="text-2xl font-semibold">Products</h1>
    </x-slot:heading>   
    
    <div class="space-y-4"> 
        @foreach ( $products as $product)
            <a href="/products/{{ $product['id'] }}" class=" block px-4 py-6 border border-gray-200 rounded"> 
                <div class="font-bold text-blue-500">{{ ucfirst($product->category->name) }}</div>
                <div class="text-xl">
                    <strong>{{ ucfirst($product['name']) }}:</strong> {{ $product['price'] }}€.
                </div>
                <div class="text-sm">
                    {{ ucfirst($product['description']) }}
                </div>
                <div class="text-sm">
                    <strong>{{ ucfirst($product['stock']) }}</strong> disponibles en el almacén.
                </div>
                <div class="text-sm">
                    Slug: <strong>{{ $product['slug'] }}</strong>
                </div>
                <div class="text-sm">
                    Nº de Identificación en el almacén: <strong>{{ ucfirst($product['sku']) }}</strong>
                </div>
            </a>
        @endforeach

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout>