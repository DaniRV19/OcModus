<x-layout>
    <x-slot:heading>Checkout</x-slot:heading>
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

                    <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:cursor-pointer">
                            Proceder al Pago
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-layout>