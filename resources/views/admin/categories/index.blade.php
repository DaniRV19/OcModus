<x-admin-layout>
    <x-slot:heading>
        Categorías
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($categories as $category)
            <a href="/categories/{{ $category->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg capitalize">
                <div class="font-bold text-blue-500 text-sm">{{ $category->name }}</div>

                <div class="text-sm">
                    slug: <span class="font-bold">{{ $category->slug }}</span>
                </div>

                <div class="text-xs">
                    {{ $category->description }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>
