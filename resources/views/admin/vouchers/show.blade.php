<x-layout>
    <x-slot:heading>
        Cupones
    </x-slot:heading>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="border-b pb-4 mb-4">
            <h2 class="font-bold text-2xl text-gray-800">{{ $voucher->name }}</h2>
        </div>

        <div class="mb-6">
            <p class="text-gray-700 leading-relaxed">
                <span class="font-semibold">Dinero:</span> {{ $voucher->amount }}
            </p>
        </div>

        <div class="mb-6">
            <p class="text-gray-700 leading-relaxed">
                <span class="font-semibold">Expira el:</span> {{ $voucher->expiry_date }}
            </p>
        </div>

        <div class="flex justify-between items-center mt-8">
            <x-button href="/vouchers" class="bg-gray-500 hover:bg-gray-600">
                Volver
            </x-button>

            <x-button href="/vouchers/{{ $voucher->id }}/edit" class="bg-blue-600 hover:bg-blue-700">
                Editar rol
            </x-button>
        </div>
    </div>
</x-layout>
