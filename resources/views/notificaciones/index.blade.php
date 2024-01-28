<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @forelse ($notificaciones as $notificacion)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="text-gray-900 space-y-4">
                        <div class="p-4 sm:rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-bold">Tienes un nuevo candidato en tu vacante: <span
                                            class="font-normal">{{ $notificacion->data['nombre_vacante'] }}</span></p>
                                    <p class="text-neutral-400">{{ $notificacion->created_at->diffForHumans() }}</p>
                                </div>
                                <x-primary-button href="{{ 'candidatos/' }}" class="">
                                    Ver candidato
                                </x-primary-button>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="text-gray-900 space-y-4">
                        <div class="p-4 sm:rounded-lg">
                            Buen trabajo, no tienes notificaciones pendientes
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
