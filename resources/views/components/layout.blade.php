<!doctype html>
<html lang="en" class="h-full bg-amber-50/75">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oc Modus | The Vegan Choice</title>
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
    <x-navbar></x-navbar>

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
                    
                    <x-button href="/user">Panel de usuario</x-button>

                        <x-button href="/admin">Panel de Administrador</x-button>
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

<script>
    // Función para el menú móvil
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Función para el panel de categorías
    const toggleCategoriesButton = document.getElementById('toggle-categories');
    const categoriesPanel = document.getElementById('categories-panel');

    toggleCategoriesButton.addEventListener('click', () => {
        categoriesPanel.classList.toggle('hidden');
    });
</script>
</body>
</html>
