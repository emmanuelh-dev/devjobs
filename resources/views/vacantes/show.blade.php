<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <h1 class="font-bold text-2xl py-6 text-center">{{ $vacante->titulo }}</h1>

                    <div class="p-6 bg-neutral-100 rounded-lg">
                        <p><span class="font-bold">Empresa:</span> {{ $vacante->empresa }}</p>
                        <p><span class="font-bold"></span> {{ $vacante->categoria->categoria }}</p>
                        <p><span class="font-bold">Salario:</span> {{ $vacante->salario->salario }}</p>
                        <p><span class="font-bold">Publicado:</span> {{ $vacante->created_at }}</p>
                        <p><span class="font-bold">Ultimo dia para postular:</span> {{ $vacante->ultimo_dia }}</p>
                    </div>
                    <div class="gap-4 flex flex-col-reverse lg:flex-row">
                        <img class="lg:w-1/3" src="{{ asset('storage/vacantes' . '/' . $vacante->imagen) }}" alt="">
                        <div>
                            <p class="p-6 bg-neutral-100 rounded-lg">{{ $vacante->descripcion }}</p>
                            <x-primary-link href="{{ route('login') }}" class="mt-4 w-full justify-center">Posular a esta vacante</x-primary-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
