<x-layouts.app>
    
    <div class="flex flex-col max-h-[85vh] lg:max-h-[95vh] max-w-2xl mx-auto p-4 sm:p-6 lg:p-6">

        <form method="POST" action="{{ route('chirps.store') }}">
            @csrf
            <textarea 
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="max-h-[40vh] block min-h-10 w-full px-3 py-2 border-1 border-gray-300 focus:ring-2 focus:ring-fuchsia-600 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            
            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>

        </form>    

        <div class="overflow-auto mt-6 bg-white shadow-sm rounded-lg divide-y">

            @foreach ($chirps as $chirp)
                <div class="p-3 flex space-x-2">
                    
                    <div>
                        {{-- <i data-lucide='message-circle-more'></i> --}}
                        <img src="{{ Vite::asset('resources/icons/sms_24dp_EA33F7_FILL0_wght300_GRAD0_opsz24.svg') }}">
                    </div>

                    <div class="flex-1">

                        <div class="flex text-sm mt-px justify-between">
                            <div>
                                <span class="text-gray-800">{{ $chirp->user->name; }}</span>

                                <small class="ml-2 text-xs text-gray-600">{{ $chirp->updated_at->addHour(); }}</small>

                                @unless ($chirp->created_at->eq($chirp->updated_at))

                                    <span class="pl-2 pr-1 text-xl align-middle text-gray-600">&middot;</span><small class="text-sm text-gray-600">{{ __('edited') }}</small>

                                @endunless
                                
                            </div>

                            @if ($chirp->user->is(auth()->user()))

                                <x-dropdown class="place-self-end">
                                    <x-slot name="trigger">
                                        <button>
                                            {{-- <i data-lucide='ellipsis-vertical'></i> --}}
                                            <img src="{{ Vite::asset('resources/icons/more_horiz_24dp_666666_FILL0_wght300_GRAD0_opsz24.svg') }}">
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">

                                        <x-dropdown-link :href="route('chirps.edit', $chirp)">

                                            {{ __('Edit') }}

                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
    
                                                {{ __('Delete') }}
    
                                            </x-dropdown-link>
    
                                        </form>

                                    </x-slot>

                                </x-dropdown>

                            @endif

                        </div>

                        <p class="mt-2 text-base text-gray-900">{{ $chirp->message; }}</p>

                    </div>
                </div>
            @endforeach

        </div>

    </div>

</x-layouts.app>