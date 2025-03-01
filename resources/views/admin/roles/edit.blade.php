<x-layout>
    <x-slot:heading>
        Editar Rol {{ $role->name }}
    </x-slot:heading>

    <form method="POST" action="/roles/{{ $role->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- NOMBRE -->
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="name"
                                       class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Categoria" value="{{ $role->name }}" required>
                            </div>
                            @error('name')
                            <p class="text-xs text-red-500 font-semibold mt-2 ms-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- DESCRIPCION -->
                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Descripcion</label>
                        <div class="mt-2">
                            <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="description" id="description"
                                       class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Descripción..." value="{{ $role->description }}" required>
                            </div>
                            @error('description')
                            <p class="text-xs text-red-500 font-semibold mt-2 ms-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/roles/{{ $role->id }}" type="button"
                   class="text-sm/6 font-semibold text-gray-900">
                    Cancel
                </a>

                <div>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/roles/{{ $role->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
