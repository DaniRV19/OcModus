<x-layout>
    <x-slot:heading>Crea un nuevo Producto</x-slot:heading>

    <div class="max-w-4xl mx-auto p-8 rounded-lg shadow bg-white/80">
        <h1 class="text-2xl font-bold text-[#483D00] mb-6">Información del Producto</h1>
        <p class="text-gray-600 mb-8">Complete todos los campos para crear un nuevo producto en la tienda.</p>

        <form method="POST" action="/products">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="product_name" class="block text-[#483D00] font-medium mb-2">Nombre del producto</label>
                    <input type="text" id="product_name" name="product_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="product_name" />
                </div>
                <div>
                    <label for="sku" class="block text-[#483D00] font-medium mb-2">SKU</label>
                    <input type="text" id="sku" name="sku"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="sku" />
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-[#483D00] font-medium mb-2">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]"></textarea>
                <x-form-error name="description" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="category" class="block text-[#483D00] font-medium mb-2">Categoría</label>
                    <select id="category" name="category"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                        <option value="" disabled>Seleccionar categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{  $category['name'] }}</option>
                        @endforeach
                    </select>
                    <x-form-error name="category" />
                </div>
                <div>
                    <label for="price" class="block text-[#483D00] font-medium mb-2">Precio (€)</label>
                    <input type="number" id="price" name="price" step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="price" />
                </div>
                <div>
                    <label for="stock" class="block text-[#483D00] font-medium mb-2">Stock</label>
                    <input type="number" id="stock" name="stock"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="stock" />
                </div>
            </div>

            <div class="mb-6">
                <label for="image_url" class="block text-[#483D00] font-medium mb-2">URL de la imagen del
                    producto</label>
                <input type="text" id="image_url" name="image_url" placeholder="https://ejemplo.com/imagen.jpg"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                <x-form-error name="image_url" />
            </div>


            <div class="mt-8 flex justify-end space-x-4">
                <button type="button"
                    class="px-6 py-2 border border-gray-300 rounded text-[#483D00] hover:bg-gray-100 transition duration-300 hover:cursor-pointer">
                    Cancelar
                </button>
                <x-form-button>Crear Producto</x-form-button>
            </div>
        </form>
    </div>
</x-layout>