<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-2 py-1 text-base text-gray-500 capitalize bg-gray-300 border border-gray-500 shadow hover:bg-gray-400 md:px-4 md:py-2 transition cursor-pointer']) }}>
    {{ $slot }}
</button>
