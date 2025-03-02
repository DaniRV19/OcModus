<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Datos personales -->
                    <x-form-field class="sm:col-span-3">
                        <x-form-label for="first_name">Nombre</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-3">
                        <x-form-label for="last_name">Apellidos</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" :value="old('email')" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-2">
                        <x-form-label for="phone">Teléfono</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="phone" id="phone" type="number" :value="old('phone')" required />
                            <x-form-error name="phone" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-3">
                        <x-form-label for="password">Contraseña</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-3">
                        <x-form-label for="password_confirmation">Confirmar Contraseña</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>

                    <!-- Datos de dirección -->
                    <x-form-field class="sm:col-span-6">
                        <x-form-label for="street">Calle</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="street" id="street" required />
                            <x-form-error name="street" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-2">
                        <x-form-label for="city">Ciudad</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="city" id="city" required />
                            <x-form-error name="city" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-2">
                        <x-form-label for="state">Estado</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="state" id="state" required />
                            <x-form-error name="state" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-1">
                        <x-form-label for="postal_code">Código Postal</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="postal_code" id="postal_code" required />
                            <x-form-error name="postal_code" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-1">
                        <x-form-label for="country">País</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="country" id="country" required />
                            <x-form-error name="country" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
