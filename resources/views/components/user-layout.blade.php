<!DOCTYPE html>
<html lang="en" class="h-full bg-amber-50/75">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de usuario | Oc Modus</title>
    
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-green': '#74AE84',
                        'secondary-gold': '#E9C16A',
                        'bright-green': '#30B776',
                        'cream': '#ECE2D4',
                        'dark-brown': '#483D00'
                    }
                }
            }
        }
    </script>
</head>
<body>
<div class="min-h-full">
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            @guest
                <div>
                    <x-nav-link href="/login" :active="request()->is('login')">Iniciar Sesión</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Registrarse</x-nav-link>
                </div>
            @endguest
            @auth
                <div class="flex gap-10 justify-baseline">
                    <x-button href="/admin">Panel de Administrador</x-button>
                    <x-button href="/user">Panel de Usuario</x-button>
                    <form method="POST" action="/logout">
                        @csrf

                        <x-form-button>Log Out</x-form-button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>

<div class="flex justify-center mt-10">
    <form class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <div class="text-center mb-4">
            <img class="w-24 h-24 rounded-full border-2 border-gray-300 shadow" 
                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                 alt="Foto de perfil">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="nombre" class="block text-gray-700 font-bold mb-1">Nombre: </label>
                <p>{{ $user->name }}</p>
                
            </div>
            <div>
                <label for="apellidos" class="block text-gray-700 font-bold mb-1">Apellidos: </label>
                
            </div>
        </div>

        <div class="mt-4">
            <label for="email" class="block text-gray-700 font-bold mb-1">Correo Electrónico: </label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="mt-4">
            <label for="telefono" class="block text-gray-700 font-bold mb-1">Teléfono</label>
            
        </div>

        <div class="mt-4">
            <label for="ciudad" class="block text-gray-700 font-bold mb-1">Ciudad</label>
            
        </div>

        <div class="mt-6 text-center">
            <x-button href="user.edit" type="submit">
                Editar
            </x-button>
        </div>
    </form>
</div>



<!-- Sección de Pedidos Realizados -->
<div class="mt-8">
    <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Pedidos Realizados</h3>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-w-6xl mx-auto">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gradient-to-r from-green-400 to-teal-400 text-white">
                <tr>
                    <th class="px-6 py-3">ID Pedido</th>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Cantidad</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Estado</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<!-- Sección de Devoluciones -->
<div class="mt-8">
    <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Devoluciones</h3>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-w-6xl mx-auto">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gradient-to-r from-red-400 to-yellow-400 text-white">
                <tr>
                    <th class="px-6 py-3">ID Devolución</th>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Motivo</th>
                    <th class="px-6 py-3">Estado</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

</body>
</html>