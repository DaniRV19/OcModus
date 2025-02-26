<x-layout>
    <x-slot:heading>Carrito</x-slot:heading>
    <main class="pt-24">
        <div class="mb-4 pb-4"></div>
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Tu Carrito</h2>
            @php
                // Obtenemos el subtotal "limpio" (sin formato) de la instancia "cart"
                $rawSubtotal = (float) Cart::instance('cart')->subtotal(2, '.', '');
                // Costo de envío calculado como 7.5% del subtotal (ajústalo según necesites)
                $shipping = $rawSubtotal * 0.075;
                // Tasa de IVA (por ejemplo, 21%)
                $vatRate = 0.21;
                $vat = $rawSubtotal * $vatRate;
                $total = $rawSubtotal + $shipping + $vat;
            @endphp
            <div class="flex flex-col md:flex-row gap-4">
                <div class="w-full md:w-3/4">
                    <div class="border-b-2 pb-4 mb-4">
                        <h3 class="text-lg font-semibold">Pasos de Compra</h3>
                        <div class="flex justify-between mt-2">
                            <span class="px-4 py-2 bg-blue-500 text-white rounded-lg">01 Carrito</span>
                            <span class="px-4 py-2 bg-gray-200 rounded-lg">02 Checkout</span>
                            <span class="px-4 py-2 bg-gray-200 rounded-lg">03 Confirmación</span>
                        </div>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        @if($items->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full border-collapse border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="p-3 text-left">Producto</th>
                                            <th class="p-3 text-left">Detalles</th>
                                            <th class="p-3 text-left">Precio</th>
                                            <th class="p-3 text-left">Cantidad</th>
                                            <th class="p-3 text-left">Subtotal</th>
                                            <th class="p-3">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr class="border-b">
                                                <td class="p-3">
                                                    <img src="{{ asset('assets/images/cart-item-1.jpg') }}"
                                                        class="w-20 h-20 object-cover" alt="Product Image" />
                                                </td>
                                                <td class="p-3">
                                                    <h4 class="font-bold">{{ $item->name }}</h4>
                                                </td>
                                                <td class="p-3 text-gray-700">${{ $item->price }}</td>
                                                <td class="p-3">
                                                    <!-- Formulario para actualizar la cantidad -->
                                                    <form action="{{ route('shopping_cart.update', $item->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="number" name="quantity" value="{{ $item->qty }}" min="1"
                                                            class="w-16 text-center border rounded-lg p-2"
                                                            onchange="this.form.submit()" />
                                                    </form>
                                                </td>
                                                <td class="p-3 text-gray-700">${{ $item->subtotal }}</td>
                                                <td class="p-3">
                                                    <!-- Formulario para eliminar el ítem del carrito -->
                                                    <form action="{{ route('shopping_cart.remove', $item->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-500 hover:text-red-700 hover:cursor-pointer">✖</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <form action="{{ route('shopping_cart.applyCoupon') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="text" name="coupon_code" placeholder="Coupon Code"
                                        class="border rounded-lg p-2" />
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Aplicar
                                        Cupón</button>
                                </form>
                                @if(session('error'))
                                    <p class="text-red-500 text-sm">{{ session('error') }}</p>
                                @elseif(session('success'))
                                    <p class="text-green-500 text-sm">{{ session('success') }}</p>
                                @endif
                            </div>

                        @else
                            <div class="text-center py-10">
                                <p class="text-gray-500">No hay artículos en el carrito</p>
                                <a href="/products"
                                    class="bg-blue-500 text-white px-6 py-2 rounded-lg mt-4 inline-block">Ver Artículos</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-full md:w-1/4 bg-gray-100 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-3">Total de Compra</h3>
                    <table class="w-full">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left p-2">Subtotal</th>
                                <td class="text-right p-2">${{ number_format($rawSubtotal, 2) }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left p-2">Gastos de envío</th>
                                <td class="text-right p-2">${{ number_format($shipping, 2) }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left p-2">Impuesto ({{ $vatRate * 100 }}%)</th>
                                <td class="text-right p-2">${{ number_format($vat, 2) }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-2 font-bold">Total</th>
                                <td class="text-right p-2 font-bold">${{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if($items->count() > 0)
                        <!-- Enlace al checkout -->
                        <a href="{{ route('checkout.index') }}"
                            class="block bg-green-500 text-white text-center mt-4 py-2 rounded-lg">
                            Proceder al Checkout
                        </a>
                    @else
                        <!-- Botón deshabilitado o mensaje -->
                        <button disabled
                            class="block bg-gray-500 text-white text-center mt-4 py-2 rounded-lg cursor-not-allowed px-4">
                            Proceder al Checkout
                        </button>
                        <p class="text-center text-sm text-gray-600 mt-2">Agrega productos para continuar</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
</x-layout>