<x-layout>
    <x-slot:heading>
        Checkout
    </x-slot:heading>
    <main class="pt-24">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Resumen de Pedido</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex flex-col md:flex-row gap-4">
                <div class="w-full md:w-3/4">
                    <div class="border-b-2 pb-4 mb-4">
                        <h3 class="text-lg font-semibold">Pasos de Compra</h3>
                        <div class="flex justify-between mt-2">
                            <span class="px-4 py-2 bg-gray-200 rounded-lg">01 Carrito</span>
                            <span class="px-4 py-2 bg-green-600 text-white rounded-lg">02 Checkout</span>
                            <span class="px-4 py-2 bg-gray-200 rounded-lg">03 Confirmación</span>
                        </div>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-3 text-left">Producto</th>
                                    <th class="p-3 text-left">Cantidad</th>
                                    <th class="p-3 text-left">Precio</th>
                                    <th class="p-3 text-left">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr class="border-b">
                                        <td class="p-3">{{ $item->name }}</td>
                                        <td class="p-3">{{ $item->qty }}</td>
                                        <td class="p-3">${{ $item->price }}</td>
                                        <td class="p-3">${{ $item->subtotal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full md:w-1/4 bg-gray-100 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-3">Totales</h3>
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
                            @if(isset($voucher))
                                <tr class="border-b">
                                    <th class="text-left p-2">Descuento (Cupón {{ $voucher->code }})</th>
                                    <td class="text-right p-2">- ${{ number_format($discount, 2) }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th class="text-left p-2 font-bold">Total</th>
                                <td class="text-right p-2 font-bold">${{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Selección de tarjeta de pago -->
                    @php
                        $paymentCards = auth()->user()->paymentCards;
                    @endphp
                    @if($paymentCards->count() > 0)
                        <form id="payment-form" method="POST" action="{{ route('checkout.process') }}">
                            @csrf
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold mb-2">Seleccione Método de Pago</h3>
                                <div class="space-y-2">
                                    @foreach($paymentCards as $card)
                                        <div class="flex items-center">
                                            <input type="radio" id="card{{ $card->id }}" name="payment_card" value="{{ $card->id }}" class="mr-2" required>
                                            <label for="card{{ $card->id }}" class="text-sm">
                                                {{ $card->card_holder }} - **** **** **** {{ substr($card->card_number, -4) }} (Exp: {{ $card->expiration_date }})
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg mt-4 hover:bg-green-700 transition">
                                Proceder al Pago
                            </button>
                        </form>
                    @else
                        <div class="mt-4">
                            <p class="text-red-500">No tienes métodos de pago registrados. Por favor, añade uno para continuar.</p>
                            <a href="{{ route('payment_cards.create') }}" class="block bg-blue-600 text-white text-center py-2 rounded-lg mt-2 hover:bg-blue-700 transition">
                                Añadir Método de Pago
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </main>
</x-layout>

<x-footer></x-footer>
