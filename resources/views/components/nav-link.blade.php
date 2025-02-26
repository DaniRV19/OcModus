@props(['active' => false])

<a class="{{ $active
    ? ' border-b-2 border-primary-green '
    : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-bl-lg rounded-tr-lg' }}
    text-gray-500 hover:text-primary-green px-3 py-2 "
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{ $attributes }}>
    {{ $slot }}
</a>
