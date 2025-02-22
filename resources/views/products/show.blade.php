<x-layout>
    <x-slot:heading>
        <h2 class="text-2xl font-semibold">Product</h2>
    </x-slot:heading>   
    
    <h2 class="text-2xl font-semibold">{{ $product->title }}</h2>
    <p>
        This job pay <strong>{{ $product->price }}</strong>€
    </p>

    <p class="mt-6">
        <x-button href="/products/{{ $product->id }}/edit">Edit Product</x-button>
    </p>
</x-layout>