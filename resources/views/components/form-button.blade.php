<button {{ $attributes->merge([
    'class' => 'px-6 py-2 bg-[#30B776] hover:bg-primary-green text-white font-medium rounded transition duration-300 hover:cursor-pointer',
    'type' => 'submit'
]) }}> {{ $slot }}</button>
