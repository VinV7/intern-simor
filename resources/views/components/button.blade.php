<button {{ $attributes->merge(['class' => 'px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700']) }}>
    {{ $slot }}
</button>