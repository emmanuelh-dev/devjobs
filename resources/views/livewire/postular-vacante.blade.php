<form class="bg-neutral-100 p-4 rounded-lg" wire:submit.prevent="postularme">
    @if (session()->has('mensaje'))
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="text-gray-900">
                <div class="p-4 border border-green-500 sm:rounded-lg">
                    {{ session('mensaje') }}
                </div>
            </div>
        </div>
    @endif
    <x-input-label>
        <span class="mb-4">Selecciona tu CV</span>
        <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf"
            class="block w-full file:border-0 file:bg-blue-400 file:p-2 mt-2 file:text-white" />
    </x-input-label>
    <x-input-error :messages="$errors->get('cv')" class="mt-2" />
    <x-primary-button type="submit" class="mt-4 w-full justify-center">
        Postularme
    </x-primary-button>
</form>
