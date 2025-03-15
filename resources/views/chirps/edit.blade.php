<x-layouts.app>

    <div class="flex flex-col max-h-[85vh] lg:max-h-[95vh] max-w-2xl mx-auto p-4 sm:p-6 lg:p-6">

        <form method="POST" action="{{ route('chirps.update', $chirp) }}">

            @csrf

            @method('patch')

            <textarea
                name="message"
                class="max-h-[40vh] block min-h-10 w-full px-3 py-2 border-1 border-gray-300 focus:ring-2 focus:ring-fuchsia-600 rounded-md shadow-sm"
            >{{ old('message', $chirp->message) }}</textarea>

            <x-input-error :messages="$errors->get('message')" class='mt-2'/>
            
            <div class="mt-4 space-x-2">

                <x-primary-button>{{ __('Save') }}</x-primary-button>

                <a href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>

            </div>

        </form>

    </div>

</x-layouts.app>