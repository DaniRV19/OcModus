
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de usuario | Oc Modus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
<div class="flex justify-center mt-10">
    <form class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <div class="text-center mb-4">
            <img class="w-24 h-24 rounded-full border-2 border-gray-300 shadow" 
                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                 alt="Foto de perfil">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="nombre" class="block text-gray-700 font-bold mb-1">Nombre</label>
                <input type="text" id="nombre" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="Tu nombre" required>
            </div>
            <div>
                <label for="apellidos" class="block text-gray-700 font-bold mb-1">Apellidos</label>
                <input type="text" id="apellidos" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="Tus apellidos" required>
            </div>
        </div>

        <div class="mt-4">
            <label for="email" class="block text-gray-700 font-bold mb-1">Correo Electrónico</label>
            <input type="email" id="email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="email@example.com" required>
        </div>

        <div class="mt-4">
            <label for="telefono" class="block text-gray-700 font-bold mb-1">Teléfono</label>
            <input type="tel" id="telefono" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="+1234567890" required>
        </div>

        <div class="mt-4">
            <label for="ciudad" class="block text-gray-700 font-bold mb-1">Ciudad</label>
            <input type="text" id="ciudad" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="Tu ciudad" required>
        </div>

        <div class="mt-4">
            <label for="direccion" class="block text-gray-700 font-bold mb-1">Dirección</label>
            <input type="text" id="direccion" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-primary-green" placeholder="Calle y número" required>
        </div>

        <div class="mt-4 flex items-center">
            <input type="checkbox" id="terminos" class="mr-2">
            <label for="terminos" class="text-gray-700">Acepto los términos y condiciones</label>
        </div>

        <div class="mt-6 text-center">
            <button href="user" type="submit" class="bg-primary-green text-white py-2 px-4 rounded-lg hover:bg-bright-green transition">
                Guardar
            </button>
        </div>
    </form>
</div>

</body>