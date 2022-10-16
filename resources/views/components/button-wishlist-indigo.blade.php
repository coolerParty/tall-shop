<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-2 py-1 text-base text-indigo-500 capitalize border border-indigo-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-indigo-500 transition cursor-pointer']) }}>
    {{ $slot }}
</button>
