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
                    <input type="text" id="product_name" name="product_name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="product_name" />
                </div>
                <div>
                    <label for="sku" class="block text-[#483D00] font-medium mb-2">SKU</label>
                    <input type="text" id="sku" name="sku" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="sku" />
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-[#483D00] font-medium mb-2">Descripción</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]"></textarea>
                <x-form-error name="description" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="category" class="block text-[#483D00] font-medium mb-2">Categoría</label>
                    <select id="category" name="category" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                        <option value="" disabled>Seleccionar categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{  $category['name'] }}</option>
                        @endforeach
                    </select>
                    <x-form-error name="category" />
                </div>
                <div>
                    <label for="price" class="block text-[#483D00] font-medium mb-2">Precio (€)</label>
                    <input type="number" id="price" name="price" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="price" />
                </div>
                <div>
                    <label for="stock" class="block text-[#483D00] font-medium mb-2">Stock</label>
                    <input type="number" id="stock" name="stock" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#74AE84]">
                    <x-form-error name="stock" />
                </div>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-[#483D00] font-medium mb-2">Imagen del producto</label>
                <div class="border-2 border-dashed border-gray-300 rounded p-6 text-center">
                    <input type="file" id="image" name="image" class="hidden">
                    <label for="image" class="cursor-pointer bg-[#74AE84] hover:bg-[#30B776] text-white font-medium py-2 px-4 rounded inline-block transition duration-300">
                        Seleccionar archivo
                    </label>
                    <p class="text-gray-500 mt-2 text-sm">JPG, PNG o GIF. Máximo 5MB</p>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <button type="button" class="px-6 py-2 border border-gray-300 rounded text-[#483D00] hover:bg-gray-100 transition duration-300 hover:cursor-pointer">
                    Cancelar
                </button>
                <x-form-button>Crear Producto</x-form-button>
            </div>
        </form>
    </div>
    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('image-preview-container');
            const noImageContainer = document.getElementById('no-image-container');
            const preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    noImageContainer.classList.add('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                previewContainer.classList.add('hidden');
                noImageContainer.classList.remove('hidden');
            }
        }
    </script>
</x-layout>
