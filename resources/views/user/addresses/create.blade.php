<x-layout>
    <x-slot:heading>Agregar Dirección</x-slot:heading>
    <div class="flex justify-center mt-10">
        <form method="POST" action="{{ route('address.store') }}" class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="street">Calle:</label>
                <input type="text" name="street" id="street" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="city">Ciudad:</label>
                <input type="text" name="city" id="city" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="state">Estado:</label>
                <input type="text" name="state" id="state" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="country">País:</label>
                <input type="text" name="country" id="country" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="postal_code">Código Postal:</label>
                <input type="text" name="postal_code" id="postal_code" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="type">Tipo:</label>
                <select name="type" id="type" class="w-full p-2 border rounded-lg" required>
                    <option value="home">Casa</option>
                    <option value="work">Trabajo</option>
                    <option value="vacation">Vacaciones</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    Guardar Dirección
                </button>
            </div>
        </form>
    </div>
</x-layout>
