<x-admin-layout>
    <x-slot:heading>
        Roles
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($roles as $role)
            <a href="/roles/{{ $role->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg capitalize">
                <div class="font-bold text-blue-500 text-sm">{{ $role->name }}</div>

                <div class="text-xs">
                    {{ $role->description }}
                </div>
            </a>
        @endforeach
    </div>
</x-admin-layout>
