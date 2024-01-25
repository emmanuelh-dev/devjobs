<div class="max-w-xl mx-auto">

    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input wire:model="form.titulo" id="titulo" class="block mt-1 w-full" type="text" name="titulo" required placeholder="Titulo vacante"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="titulo" :value="__('Salario Mensual')" />
        <x-text-input wire:model="form.titulo" id="titulo" class="block mt-1 w-full" type="text" name="titulo" required placeholder="Titulo vacante"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>


</div>
