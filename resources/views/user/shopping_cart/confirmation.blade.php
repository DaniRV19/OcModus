<x-layout>
    <x-slot:heading>Confirmación</x-slot:heading>
    <main class="pt-24">
        <section class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">¡Gracias por tu compra!</h2>
            <p class="text-lg mb-4">Tu pedido ha sido procesado y el pago se realizó correctamente.</p>
            <div class="flex flex-col items-center space-y-4">
                <x-button href="{{ route('checkout.invoice') }}">
                    Descargar Factura
                </x-button>
                <x-button href="/products">
                    Volver al inicio
                </x-button>
            </div>
        </section>
    </main>
</x-layout>

<x-footer></x-footer>
