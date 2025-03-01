<x-layout>
    <x-slot:heading>
        Categoría
    </x-slot:heading>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="border-b pb-4 mb-4">
            <h2 class="font-bold text-2xl text-gray-800">{{ $category->name }}</h2>
            <h3 class="font-medium text-gray-600 mt-1">Subcategoría: {{ $category->slug }}</h3>
        </div>

        <div class="mb-6">
            <p class="text-gray-700 leading-relaxed">
                <span class="font-semibold">Descripción:</span> {{ $category->description }}
            </p>
        </div>

        <div class="flex justify-between items-center mt-8">
            <x-button href="/categories" class="bg-gray-500 hover:bg-gray-600">
                Volver
            </x-button>

            <x-button href="/categories/{{ $category->id }}/edit" class="bg-blue-600 hover:bg-blue-700">
                Editar categoría
            </x-button>
        </div>
    </div>
</x-layout>
