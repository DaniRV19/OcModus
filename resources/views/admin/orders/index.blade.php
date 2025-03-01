<x-admin-layout>
    <x-slot:heading>
        Pedidos
    </x-slot:heading>
    <div class="space-y-4">
        @foreach($orders as $order)
            <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                <h3 class="font-bold text-blue-600 text-sm mb-2">{{ $order->title }}</h3>

                <div class="text-sm mb-2">
                    ID: <span class="font-bold">{{ $order->id }}</span>
                </div>

                <div class="text-sm mb-2">
                    Estado:
                    <span class="font-semibold
                            @if($order->status == 'completado') text-green-600
                            @elseif($order->status == 'pendiente') text-yellow-600
                            @else text-red-600
                            @endif">
                            {{ $order->status }}
                        </span>
                </div>

                <div class="text-sm mb-2">
                    Fecha: <span class="font-medium">{{ $order->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="text-sm mb-2">
                    Realizado por: <a href="user/{{$order->user->id}}" class="font-medium text-emerald-500 hover:cursor-pointer">({{ $order->user->id }}) {{ $order->user->first_name}} {{ $order->user->last_name }}</a>
                </div>

                <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $order->description }}">
                    {{ Str::limit($order->description, 50) }}
                </div>

                <div class="flex justify-between orders-center mt-2">
                    <a href="/admin/orders/{{ $order->id }}" class="text-xs text-blue-500 hover:underline">Ver detalles</a>
                    <span class="text-xs font-bold">{{ $order->subtotal  }} €</span>
                </div>
            </div>
        @endforeach

        <div>
            {{ $orders->links() }}
        </div>
    </div>

</x-admin-layout>
