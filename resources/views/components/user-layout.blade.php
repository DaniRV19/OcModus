<x-layout>
    <x-slot:heading>
        Panel de Usuario
    </x-slot:heading>

    @php
        $user = auth()->user();
        // Pedidos realizados (excluyendo los cancelados, o mostrarlos todos y mostrar el botón solo para los que no están cancelados)
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->latest()
            ->simplePaginate(5);

        // Pedidos cancelados para la sección de devoluciones
        $canceledOrders = \App\Models\Order::where('user_id', auth()->id())
            ->where('status', 'canceled')
            ->latest()
            ->get();
    @endphp

    <!-- Panel de usuario: Datos personales -->
    <div class="flex justify-center mt-10">
        <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
            <div class="text-center mb-4">
                <img class="w-24 h-24 rounded-full border-2 border-gray-300 shadow"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="Foto de perfil">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Nombre:</label>
                    <p class="text-gray-800">{{ $user->first_name }}</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Apellidos:</label>
                    <p class="text-gray-800">{{ $user->last_name }}</p>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-1">Correo Electrónico:</label>
                <p class="text-gray-800">{{ $user->email }}</p>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-1">Teléfono:</label>
                <p class="text-gray-800">{{ $user->phone }}</p>
            </div>
            <div class="mt-6 text-center">
                <a href="/user/edit" class="inline-block bg-green-600 p-4 text-md text-gray-100 rounded-md">
                    Editar
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de Direcciones -->
    <div class="mt-8">
        <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Mis Direcciones</h3>
        @php
            $addresses = auth()->user()->addresses;
        @endphp
        <div class="w-full max-w-lg mx-auto">
            @if($addresses->count() > 0)
                @foreach($addresses as $address)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">
                        <p><strong>Calle:</strong> {{ $address->street }}</p>
                        <p><strong>Ciudad:</strong> {{ $address->city }}</p>
                        <p><strong>Estado:</strong> {{ $address->state }}</p>
                        <p><strong>País:</strong> {{ $address->country }}</p>
                        <p><strong>Código Postal:</strong> {{ $address->postal_code }}</p>
                        <p><strong>Tipo:</strong> {{ ucfirst($address->type) }}</p>
                        <p><strong>Predeterminada:</strong> {{ $address->is_default ? 'Sí' : 'No' }}</p>
                        <div class="mt-2 flex justify-end space-x-2">
                            <a href="{{ route('address.edit', $address->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                Editar
                            </a>
                            <form action="{{ route('address.destroy', $address->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta dirección?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600">No tienes direcciones registradas.</p>
            @endif
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('address.create') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded">
                Añadir Dirección
            </a>
        </div>
    </div>


    <!-- Sección de Pedidos Realizados -->
    <div class="mt-8">
        <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Pedidos Realizados</h3>
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-w-6xl mx-auto">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-gradient-to-r from-green-400 to-teal-400 text-white">
                    <tr>
                        <th class="px-6 py-3">ID Pedido</th>
                        <th class="px-6 py-3">Productos</th>
                        <th class="px-6 py-3">Cantidad</th>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                                        <tr class="border-b">
                                            <td class="px-6 py-3">{{ $order->id }}</td>
                                            <td class="px-6 py-3">
                                                @php
                                                    $productNames = $order->details->map(function ($detail) {
                                                        return optional(\App\Models\Product::find($detail->product_id))->name;
                                                    })->implode(', ');
                                                @endphp
                                                {{ $productNames }}
                                            </td>
                                            <td class="px-6 py-3">{{ $order->details->sum('quantity') }}</td>
                                            <td class="px-6 py-3">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-3">{{ ucfirst($order->status) }}</td>
                                            <td class="px-6 py-3">
                                                @if($order->status != 'canceled')
                                                    <form action="{{ route('user.orders.cancel', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="bg-red-500 text-white px-2 py-1 rounded hover:cursor-pointer">
                                                            Cancelar
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-600">Cancelado</span>
                                                @endif
                                            </td>
                                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No se han realizado pedidos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <!-- Sección de Devoluciones -->
    <div class="mt-8">
        <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Devoluciones</h3>
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-w-6xl mx-auto">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-gradient-to-r from-red-400 to-yellow-400 text-white">
                    <tr>
                        <th class="px-6 py-3">ID Pedido</th>
                        <th class="px-6 py-3">Productos</th>
                        <th class="px-6 py-3">Cantidad</th>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Motivo</th>
                        <th class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($canceledOrders as $order)
                                        <tr class="border-b">
                                            <td class="px-6 py-3">{{ $order->id }}</td>
                                            <td class="px-6 py-3">
                                                @php
                                                    $productNames = $order->details->map(function ($detail) {
                                                        return optional(\App\Models\Product::find($detail->product_id))->name;
                                                    })->implode(', ');
                                                @endphp
                                                {{ $productNames }}
                                            </td>
                                            <td class="px-6 py-3">{{ $order->details->sum('quantity') }}</td>
                                            <td class="px-6 py-3">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-3">Cancelación solicitada</td>
                                            <td class="px-6 py-3">{{ ucfirst($order->status) }}</td>
                                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No hay devoluciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

<x-footer></x-footer>