<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @forelse ($vacante->candidatos as $candidato)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between items-center">
                        <div>
                            <h2 class="font-bold text-xl">{{ $candidato->vacante->titulo }}</h2>
                            <p>{{ $candidato->user->name }}</p>
                            <span>{{ $candidato->created_at->diffForHumans() }}</span>
                        </div>
                        <div>
                            <a href="{{ asset('storage/cv/' . $candidato->cv) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded inline-block mt-4" target="_blank">Ver CV</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __('Aun no tienes candidatos.') }}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
