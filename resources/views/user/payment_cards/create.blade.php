<x-layout>
    <x-slot:heading>Agregar Tarjeta de Pago</x-slot:heading>
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <form action="{{ route('payment_cards.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="card_holder" class="block text-gray-700 font-bold mb-2">Titular de la Tarjeta:</label>
                <input type="text" name="card_holder" id="card_holder" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="card_number" class="block text-gray-700 font-bold mb-2">Número de Tarjeta:</label>
                <input type="text" name="card_number" id="card_number" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="expiration_date" class="block text-gray-700 font-bold mb-2">Fecha de Vencimiento (MM/YY):</label>
                <input type="text" name="expiration_date" id="expiration_date" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="cvv" class="block text-gray-700 font-bold mb-2">CVV:</label>
                <input type="text" name="cvv" id="cvv" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_default" value="1" class="form-checkbox">
                    <span class="ml-2">Tarjeta Predeterminada</span>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition hover:cursor-pointer">
                    Guardar Tarjeta
                </button>
            </div>
        </form>
    </div>
</x-layout>
