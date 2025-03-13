{{-- resources\views\components\layouts\app.blade.php --}}
<x-layouts.app.sidebar>
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
