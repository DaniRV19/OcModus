<!doctype html>
<html lang="en" class="h-full bg-amber-50/75">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de Administrador | Oc Modus</title>
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

<body class="h-full">
<div class="min-h-screen flex">
    <!-- Navbar Lateral para Administrador -->
    <aside class="bg-white w-64 flex-shrink-0 border-r border-gray-200 shadow-md">
        <!-- Logo -->
        <div class="p-4 border-b border-gray-200">
            <a href="#" class="flex items-center">
                <svg class="h-10 w-10 text-primary-green" viewBox="0 0 100 100" fill="currentColor">
                    <path d="M50 15c-19.33 0-35 15.67-35 35s15.67 35 35 35 35-15.67 35-35-15.67-35-35-35zm0 60c-13.81 0-25-11.19-25-25s11.19-25 25-25 25 11.19 25 25-11.19 25-25 25z"/>
                    <path d="M50 35c-8.28 0-15 6.72-15 15 0 8.28 6.72 15 15 15 8.28 0 15-6.72 15-15 0-8.28-6.72-15-15-15zm0 20c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                </svg>
                <span class="ml-2 text-xl font-semibold text-dark-brown">Admin Panel</span>
            </a>
        </div>

        <!-- Navegación de Administrador -->
        <nav class="py-4">
            <div class="px-4 py-2">
                <h3 class="text-xs uppercase text-gray-500 font-semibold">Gestión</h3>
                <ul class="mt-2 space-y-4">
                    <li>
                        <x-nav-link href="/admin/" :active="request()->is('admin/dashboard')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Dashboard
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/admin/products" :active="request()->is('admin/products*')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Productos
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/admin/categories" :active="request()->is('admin/categories*')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Categorías
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/admin/orders" :active="request()->is('admin/orders*')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Pedidos
                        </x-nav-link>
                    </li>
                </ul>
            </div>

            <div class="px-4 py-2 mt-6">
                <h3 class="text-xs uppercase text-gray-500 font-semibold">Configuración</h3>
                <ul class="mt-2 space-y-1">
                    <li>
                        <x-nav-link href="/admin/users" :active="request()->is('admin/users*')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Usuarios
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/admin/settings" :active="request()->is('admin/settings*')" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            Configuración
                        </x-nav-link>
                    </li>
                </ul>
            </div>

            <div class="px-4 py-2 mt-6">
                <form method="POST" action="/logout" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center px-4 py-2 w-full text-sm text-red-600 rounded-lg hover:bg-red-50">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <div class="flex-1 flex flex-col">
        <!-- Header superior -->
        <header class="bg-white shadow">
            <div class="px-4 py-4 sm:px-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">{{ $heading }}</h1>

                <!-- Botón móvil para mostrar/ocultar sidebar -->
                <button id="mobile-menu-button" class="md:hidden text-gray-500 hover:text-primary-green">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Perfil del usuario -->
                <div class="hidden md:flex items-center">
                    <span class="text-sm text-gray-600 mr-2">Admin</span>
                    <div class="h-8 w-8 rounded-full bg-primary-green flex items-center justify-center text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenido principal -->
        <main class="flex-1 overflow-y-auto bg-amber-50/75">
            <div class="px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<script>
    // Función para el menú móvil en vista responsive
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.querySelector('aside');

    mobileMenuButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('absolute');
        sidebar.classList.toggle('z-10');
        sidebar.classList.toggle('inset-y-0');
        sidebar.classList.toggle('left-0');
    });

    // Ocultar sidebar por defecto en móvil
    if (window.innerWidth < 768) {
        sidebar.classList.add('hidden');
    }

    // Ajustar visibilidad del sidebar cuando cambia el tamaño de la ventana
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('hidden', 'absolute', 'z-10', 'inset-y-0', 'left-0');
        } else {
            sidebar.classList.add('hidden');
        }
    });
</script>
</body>
</html>
