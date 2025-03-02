<x-layout>
    <x-slot:heading>Valorar Producto</x-slot:heading>
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        @php
            // Puedes recibir el ID del producto mediante la URL y recuperarlo en el controlador
            $product = \App\Models\Product::findOrFail(request()->route('product'));
        @endphp
        <h2 class="text-2xl font-bold mb-4">Valorar: {{ $product->name }}</h2>
        <form method="POST" action="{{ route('reviews.store', $product->id) }}">
            @csrf
            <div class="mb-4">
                <label for="rating" class="block text-gray-700 font-bold mb-1">Calificación (1-5):</label>
                <input type="number" name="rating" id="rating" min="1" max="5" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-bold mb-1">Comentario:</label>
                <textarea name="comment" id="comment" rows="4" class="w-full p-2 border rounded-lg" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    Enviar Valoración
                </button>
            </div>
        </form>
    </div>
</x-layout>
