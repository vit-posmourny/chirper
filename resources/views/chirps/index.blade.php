<x-layouts.app>

    <div class="flex flex-col justify-stretch max-h-[95vh] max-w-2xl mx-auto p-4 sm:p-6 lg:p-6">

        <form method="POST" action="{{ route('chirps.store') }}">
            @csrf
            <textarea 
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="max-h-[40vh] block min-h-10 w-full px-3 py-2 border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            
            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>

        </form>    

        <div class="shrink mt-6 bg-white overflow-auto shadow-sm rounded-lg divide-y">

            @foreach ($chirps as $chirp)
                <div class="p-3 flex space-x-2">

                    <i data-lucide='message-circle-more'></i>

                    <div class="flex-1">

                        <div class="text-sm flex mt-px">
                            <div>
                                
                                <span class="text-gray-800">{{ $chirp->user->name; }}</span>

                                <small class="ml-2 text-xs text-gray-600">{{ $chirp->created_at->addHour(); }}</small>

                            </div>
                        </div>

                        <p class="mt-2 text-base text-gray-900">{{ $chirp->message; }}</p>

                    </div>
                </div>
            @endforeach

        </div>

    </div>

</x-layouts.app>