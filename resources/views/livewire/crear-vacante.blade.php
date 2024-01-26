<form class="max-w-xl mx-auto space-y-4" wire:submit.prevent='crearVacante



'>

    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input wire:model="titulo" id="titulo" class="block mt-1 w-full" type="text"
            placeholder="Titulo vacante" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model='salario' id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="0">Seleccione</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach

        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria Vacante')" />
        <select wire:model='categoria' id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="0">Seleccione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach

        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input wire:model="empresa" id="empresa" class="block mt-1 w-full" type="text"
            placeholder="Empresa" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia')" />
        <x-text-input wire:model="ultimo_dia" id="ultimo_dia" class="block mt-1 w-full" type="date"
            placeholder="ultimo_dia vacante" />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Describe la vacante')" />
        <textarea wire:model="descripcion"
            id="descripcion"class="h-72 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagen" />
        <x-text-input wire:model="imagen" id="imagen" type="file" placeholder="imagen vacante" accept="image/*" />
        <div>
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="" />
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button type="submit" class="w-full">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
