<x-admin-layout>
    <x-slot:heading>
        Cupones
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($vouchers as $voucher)
            <a href="/vouchers/{{ $voucher->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg capitalize">
                <div class="font-bold text-blue-500 text-sm">{{ $voucher->name }}</div>

                <div class="text-xs">
                    Dinero: {{ $voucher->amount }}
                </div>
                <div class="text-xs">
                    Expiración: {{ $voucher->expiry_date }}
                </div>
            </a>
        @endforeach
    </div>
</x-admin-layout>
