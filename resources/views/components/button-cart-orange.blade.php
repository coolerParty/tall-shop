<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-2 py-1 text-base text-orange-500 capitalize border border-orange-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-orange-500 transition cursor-pointer']) }}>
    {{ $slot }}
</button>
