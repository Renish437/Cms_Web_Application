<x-filament::dropdown>
    <x-slot name="trigger">
        <x-filament::button color="gray" outlined >
            <div class="flex items-center justify-between space-x-1 w-full">
                <span class="text-sm truncate">{{ $availableLangs[$currentLang]['name'] ?? 'N/A' }}</span>
                <span class="flex items-center shrink-0">
                    <svg width="4px" height="4px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="inline-block">
                        <rect x="0" fill="none" width="24" height="24" />
                        <g>
                            <path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2" />
                        </g>
                    </svg>
                </span>
            </div>
        </x-filament::button>
    </x-slot>

    <x-filament::dropdown.list>
        @foreach ($availableLangs as $code => $lang)
            <x-filament::dropdown.list.item wire:click="switchLang('{{ $code }}')"
                wire:key="lang-{{ $code }}">
                {{ $lang['name'] }}
            </x-filament::dropdown.list.item>
        @endforeach
    </x-filament::dropdown.list>
</x-filament::dropdown>