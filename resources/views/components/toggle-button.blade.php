@props(['active' => false])

{{-- class="{{ $active--}}
{{--    ? ' border-b-2 border-primary-green '--}}
{{--    : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-bl-lg rounded-tr-lg' }}--}}
{{--    text-gray-500 hover:text-primary-green px-3 py-2 "--}}
{{--   aria-current="{{ $active ? 'page' : 'false' }}"--}}


<div class="md:hidden">
    <button id="mobile-menu-button" class="text-gray-500 hover:text-primary-green">
        <svg class="{{ $active ? 'bg-gray-800 rounded-full' : ''}} h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
