<button {{ $attributes->merge(['type' => 'submit', 
    'class' => 'w-full bg-red-600 justify-center text-white']) }}>
    {{ $slot }}
</button>
