<x-layout>
    <x-slot:heading>
        Contacto
    </x-slot:heading>
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1">
                <div class="lg:mb-0 mb-10">
                    <div class="group w-full h-full">
                        <div class="relative h-full">
                            <img src="https://imgs.search.brave.com/vFas4yhTQBoonG75ENJScZGG3g44RVf8j8svMmIJ6HA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/Zm90b3MtcHJlbWl1/bS9lbnNhbGFkYS1l/c3BpbmFjYXMtYmFi/eS1ib25pYXRvLWdh/cmJhbnpvcy1hZ3Vh/Y2F0ZS1jb21pZGEt/c2FuYS12ZWdhbmFf/OTk2MjcxLTgzMTAu/anBnP3NlbXQ9YWlz/X2h5YnJpZA"
                                alt="Contacto"
                                class="w-full h-full lg:rounded-l-2xl rounded-2xl bg-blend-multiply bg-green-700 object-cover" />
                            <h1 class="font-manrope text-white text-4xl font-bold leading-10 absolute top-11 left-11">
                                Contáctanos</h1>
                        </div>
                    </div>
                </div>
                <div class="bg-green-50 p-5 lg:p-11 lg:rounded-r-2xl rounded-2xl">
                    <h2 class="text-green-600 font-manrope text-4xl font-semibold leading-10 mb-11">Contáctanos</h2>
                    <form id="contactForm">
                        <input type="text" id="name" placeholder="Nombre" required
                            class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-4">
                        <span id="nameError" class="text-red-500 text-sm hidden">Este campo es obligatorio.</span>

                        <input type="email" id="email" placeholder="Email" required
                            class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-4">
                        <span id="emailError" class="text-red-500 text-sm hidden">Ingresa un email válido.</span>

                        <input type="text" id="phone" placeholder="Teléfono" required
                            class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-4">
                        <span id="phoneError" class="text-red-500 text-sm hidden">Este campo es obligatorio.</span>

                        <textarea id="message" placeholder="Mensaje" required
                            class="w-full h-24 text-gray-600 placeholder-gray-400 bg-transparent text-lg shadow-sm font-normal leading-7 rounded-lg border border-gray-200 focus:outline-none pl-4 pt-2 mb-4"></textarea>
                        <span id="messageError" class="text-red-500 text-sm hidden">Este campo es obligatorio.</span>

                        <button type="submit"
                            class="w-full h-12 text-white text-base font-semibold leading-6 rounded-full transition-all duration-700 hover:bg-green-800 bg-green-600 shadow-sm">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Éxito -->
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-semibold text-green-600 mb-4">¡Mensaje enviado con éxito!</h2>
            <p class="text-gray-600 mb-4">Nos pondremos en contacto contigo pronto.</p>
            <button id="closeModal"
                class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700">Cerrar</button>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (event) {
            event.preventDefault();
            let isValid = true;

            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let phone = document.getElementById('phone').value.trim();
            let message = document.getElementById('message').value.trim();
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (name === '') {
                document.getElementById('nameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('nameError').classList.add('hidden');
            }

            if (email === '' || !emailPattern.test(email)) {
                document.getElementById('emailError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('emailError').classList.add('hidden');
            }

            if (phone === '') {
                document.getElementById('phoneError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('phoneError').classList.add('hidden');
            }

            if (message === '') {
                document.getElementById('messageError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('messageError').classList.add('hidden');
            }

            if (isValid) {
                document.getElementById('successModal').classList.remove('hidden');
                this.reset();
            }
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('successModal').classList.add('hidden');
        });
    </script>
</x-layout>
@include('components.footer')
