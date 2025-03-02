<x-layout>
    <x-slot:heading>
        Editar Usuario
    </x-slot:heading>

    <div class="flex justify-center mt-10">
        <form method="POST" action="/user" class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="text-center mb-4">
                <img class="w-24 h-24 rounded-full border-2 border-gray-300 shadow"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="Foto de perfil">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nombre" class="block text-gray-700 font-bold mb-1">Nombre</label>
                    <input type="text" id="nombre" name="first_name"
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green"
                        placeholder="Tu nombre" value="{{ auth()->user()->first_name }}" required>
                </div>
                <div>
                    <label for="apellidos" class="block text-gray-700 font-bold mb-1">Apellidos</label>
                    <input type="text" id="apellidos" name="last_name"
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green"
                        placeholder="Tus apellidos" value="{{ auth()->user()->last_name }}" required>
                </div>
            </div>

            <div class="mt-4">
                <label for="email" class="block text-gray-700 font-bold mb-1">Correo Electrónico</label>
                <input type="email" id="email" name="email"
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green"
                    placeholder="email@example.com" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="mt-4">
                <label for="telefono" class="block text-gray-700 font-bold mb-1">Teléfono</label>
                <input type="tel" id="telefono" name="phone"
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="+1234567890"
                    value="{{ auth()->user()->phone }}" required>
            </div>

            @php
                // Obtener la dirección predeterminada del usuario, si existe.
                $defaultAddress = auth()->user()->addresses()->where('is_default', true)->first();
            @endphp

            <div class="mt-4">
                <label for="ciudad" class="block text-gray-700 font-bold mb-1">Ciudad</label>
                <input type="text" id="ciudad" name="city"
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="Tu ciudad"
                    value="{{ $defaultAddress ? $defaultAddress->city : '' }}" required>
            </div>

            <div class="mt-6 text-center">
                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-layout>