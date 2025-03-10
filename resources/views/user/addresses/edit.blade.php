<x-layout>
    <x-slot:heading>Editar Dirección</x-slot:heading>
    <div class="flex justify-center mt-10">
        <form method="POST" action="{{ route('address.update', $address->id) }}" class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="street">Calle:</label>
                <input type="text" name="street" id="street" class="w-full p-2 border rounded-lg" value="{{ $address->street }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="city">Ciudad:</label>
                <input type="text" name="city" id="city" class="w-full p-2 border rounded-lg" value="{{ $address->city }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="state">Estado:</label>
                <input type="text" name="state" id="state" class="w-full p-2 border rounded-lg" value="{{ $address->state }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="country">País:</label>
                <input type="text" name="country" id="country" class="w-full p-2 border rounded-lg" value="{{ $address->country }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="postal_code">Código Postal:</label>
                <input type="text" name="postal_code" id="postal_code" class="w-full p-2 border rounded-lg" value="{{ $address->postal_code }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1" for="type">Tipo:</label>
                <select name="type" id="type" class="w-full p-2 border rounded-lg" required>
                    <option value="home" {{ $address->type == 'home' ? 'selected' : '' }}>Casa</option>
                    <option value="work" {{ $address->type == 'work' ? 'selected' : '' }}>Trabajo</option>
                    <option value="vacation" {{ $address->type == 'vacation' ? 'selected' : '' }}>Vacaciones</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    Actualizar Dirección
                </button>
            </div>
        </form>
    </div>
</x-layout>
