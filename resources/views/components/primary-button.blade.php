@php
    $classes ='
    bg-indigo-600            dark:bg-indigo-400 
    text-white               dark:text-gray-800
    active:bg-gray-900       dark:active:bg-gray-500
    hover:bg-indigo-800      dark:hover:bg-indigo-300
    focus:ring-offset-2      dark:focus:ring-offset-gray-900
                             dark:active:text-gray-200
                             dark:focus:text-gray-200


    border border-transparent rounded-md font-semibold text-xs 
    uppercase tracking-widest focus:bg-gray-700 
    focus:outline-none focus:ring-2 focus:ring-indigo-500 
    transition ease-in-out duration-150
    inline-flex items-center px-4 py-2';
@endphp


<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes])}}>
    {{ $slot }}
</button>
