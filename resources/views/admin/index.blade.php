<x-admin-layout>
    <x-slot:heading>
        Panel de Administrador
    </x-slot:heading>
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Panel de Administrador</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            <x-button href="products/create">Crear Producto</x-button>
            <x-button href="categories/create">Crear Categoría</x-button>
            <x-button href="roles/create">Crear Rol</x-button>
            <x-button href="vouchers/create">Crear Cupón</x-button>
        </div>

        <h2 class="text-xl font-bold pt-8">Productos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($products as $product)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2 capitalize">{{ $product->name }}</h3>

                    <div class="text-sm mb-2">
                        ID: <span class="font-bold">{{ $product->id }}</span>
                    </div>

                    <div class="text-sm mb-2">
                        Estado:
                        <span class="font-semibold
                                @if($product->stock > 0 and $product->stock < 5) text-yellow-400
                                @elseif($product->stock > 0) text-green-600
                                    @else text-red-600
                                @endif">
                            @if($product->stock > 0 and $product->stock < 5) Pocas unidades
                            @elseif($product->stock > 0) Disponible
                                @else Agotado
                            @endif
                        </span>
                    </div>

                    <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $product->description }}">
                        {{ Str::limit($product->description, 50) }}
                    </div>

                    <div class="flex justify-between orders-center mt-2">
                        <a href="/admin/products/{{ $product->id }}" class="text-xs text-blue-500 hover:underline">Ver
                            detalles</a>
                        <span class="text-xs font-bold">{{ $product->stock }} /uds</span>
                        <span class="text-xs font-bold">{{ $product->price }} €</span>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold pt-8">Categorías</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($categories as $category)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2 capitalize">{{ $category->name }}</h3>

                    <div class="text-sm mb-2">
                        ID: <span class="font-bold">{{ $category->id }}</span>
                    </div>

                    <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $category->description }}">
                        {{ Str::limit($category->description, 50) }}
                    </div>

                    <div class="flex justify-between orders-center mt-2">
                        <a href="/categories/{{ $category->id }}" class="text-xs text-blue-500 hover:underline">Ver
                            detalles</a>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold pt-8">Pedidos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($orders as $order)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2">{{ $order->title }}</h3>

                    <div class="text-sm mb-2">
                        ID: <span class="font-bold">{{ $order->id }}</span>
                    </div>

                    <div class="text-sm mb-2">
                        Estado:
                        <span class="font-semibold
                                @if($order->status == 'pending') text-yellow-500
                                @elseif($order->status == 'shipped') text-blue-400
                                @elseif($order->status == 'delivered') text-green-600
                                @elseif($order->status == 'canceled') text-red-600
                                @endif">
                            {{ $order->status }}
                        </span>
                    </div>

                    <div class="text-sm mb-2">
                        Fecha: <span class="font-medium">{{ $order->created_at->format('d/m/Y') }}</span>
                    </div>

                    <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $order->description }}">
                        {{ Str::limit($order->description, 50) }}
                    </div>

                    <div class="flex justify-between orders-center mt-2">
                        <a href="/orders/{{ $order->id }}" class="text-xs text-blue-500 hover:underline">Ver detalles</a>
                        <span class="text-xs font-bold">{{ $order->price }} €</span>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold pt-8">Roles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($roles as $role)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2 capitalize">{{ $role->name }}</h3>

                    <div class="text-sm mb-2">
                        ID: <span class="font-bold">{{ $role->id }}</span>
                    </div>

                    <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $role->description }}">
                        {{ Str::limit($role->description, 50) }}
                    </div>

                    <div class="flex justify-between orders-center mt-2">
                        <a href="admin/roles/{{ $role->id }}" class="text-xs text-blue-500 hover:underline">Ver detalles</a>
                        <span class="text-xs font-bold">{{ $role->price }} €</span>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold pt-8">Cupones</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($vouchers as $voucher)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2 capitalize">{{ $voucher->code }}</h3>

                    <div class="text-sm mb-2">
                        ID: <span class="font-bold">{{ $voucher->id }}</span>
                    </div>

                    <div class="text-xs text-gray-600 mb-3 truncate" title="{{ $voucher->description }}">
                        {{ Str::limit($voucher->description, 50) }}
                    </div>

                    <div class="flex justify-between orders-center mt-2">
                        <a href="/admin/vouchers/{{ $voucher->id }}" class="text-xs text-blue-500 hover:underline">Ver
                            detalles</a>
                        <span class="text-xs font-bold">{{ $voucher->price }} €</span>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold pt-8">Descuentos por Categoría</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 pt-2">
            @foreach($categories as $category)
                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-lg transition duration-300">
                    <h3 class="font-bold text-blue-600 text-sm mb-2 capitalize">{{ $category->name }}</h3>
                    <p class="text-xs text-gray-600 mb-3 truncate" title="{{ $category->description }}">
                        {{ Str::limit($category->description, 50) }}
                    </p>
                    <form action="{{ route('admin.categories.discount.update', $category->id) }}" method="POST"
                        class="flex flex-col gap-2">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-bold">Descuento (%)</label>
                            <input type="number" name="discount" value="{{ $category->discount ?? 0 }}" step="0.01" min="0"
                                max="100" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="discount_active" value="1" {{ $category->discount_active ? 'checked' : '' }} class="form-checkbox">
                                <span class="ml-2">Activo</span>
                            </label>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Guardar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>


    </div>
</x-admin-layout>