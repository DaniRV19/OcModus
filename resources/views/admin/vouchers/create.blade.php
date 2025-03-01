<x-layout>
    <x-slot:heading>Crea una nueva Categoría</x-slot:heading>

    <div class="max-w-4xl mx-auto p-8 rounded-lg shadow bg-white/80">
        <h1 class="text-2xl font-bold text-[#483D00] mb-6">Información de las categorías</h1>
        <p class="text-gray-600 mb-8">Complete todos los campos para crear una nueva categoría en la tienda.</p>

        <form method="POST" action="/roles">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-[#483D00] font-medium mb-2">Nombre del Cupón</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="name" />
                </div>
            </div>

            <div class="mb-6">
                <label for="amount" class="block text-[#483D00] font-medium mb-2">Dinero:</label>
                <input id="amount" name="amount" type="number" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]"></input>
                <x-form-error name="amount" />
            </div>

            <div class="mb-6">
                <label for="amount" class="block text-[#483D00] font-medium mb-2">Expiración:</label>
                <input id="amount" name="amount" type="date" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]"></input>
                <x-form-error name="amount" />
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="/vouchers" class="px-6 py-2 border border-gray-300 rounded text-[#483D00] hover:bg-gray-100 transition duration-300 hover:cursor-pointer">
                    Cancelar
                </a>
                <x-form-button>Crear Cupón</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
