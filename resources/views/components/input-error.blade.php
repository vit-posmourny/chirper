@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 pl-2']) }}>
        <ul>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>     
@endif
