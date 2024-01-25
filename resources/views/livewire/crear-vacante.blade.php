<div class="max-w-xl mx-auto space-y-4">

    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input wire:model="form.titulo" id="titulo" class="block mt-1 w-full" type="text" name="titulo"
            required placeholder="Titulo vacante" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="categoria" :value="__('categoria Vacante')" />
        <x-text-input wire:model="form.categoria" id="categoria" class="block mt-1 w-full" type="text"
            name="categoria" required placeholder="categoria vacante" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="empresa" :value="__('empresa Vacante')" />
        <x-text-input wire:model="form.empresa" id="empresa" class="block mt-1 w-full" type="text" name="empresa"
            required placeholder="empresa vacante" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('ultimo_dia Vacante')" />
        <x-text-input wire:model="form.ultimo_dia" id="ultimo_dia" class="block mt-1 w-full" type="date"
            name="ultimo_dia" required placeholder="ultimo_dia vacante" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('descripcion Vacante')" />
        <textarea wire:model="form.descripcion"
            id="descripcion"class="h-72 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagen" />
        <x-text-input wire:model="form.imagen" id="imagen" type="file" name="imagen" required
            placeholder="imagen vacante" />
    </div>

    <x-primary-button wire:click="crearVacante" class="w-full">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</div>
