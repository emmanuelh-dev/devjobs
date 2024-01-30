<div>
    <livewire:filtrar-vacantes />
    <div class="py-16 overflow-hidden mt-4">
        <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl  space-y-4">
            @if ($vacantes->count() > 0)
                @foreach ($vacantes as $vacante)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 flex justify-between items-center">
                            <div>
                                <a href="{{ route('vacantes.show', $vacante) }}"
                                    class="text-lg font-bold">{{ $vacante->titulo }}</a>
                                <p class="font-bold text-gray-500">{{ $vacante->empresa }}</p>
                                <p class="text-sm font-semibold">Ultimo dia {{ $vacante->ultimo_dia }}</p>
                            </div>
                            <div class="flex flex-col lg:flex-row gap-2">
                                <a href="{{ route('vacantes.show', $vacante) }}"
                                    class="p-2 text-center bg-gray-900 text-white rounded">
                                    <span
                                        class="rounded-full bg-blue-500 size-4 py-2 px-3 mr-2">{{ $vacante->candidatos->count() }}</span>
                                    Ver vacante
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class=" bg-[#FBFBFB] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        <p class="text-6xl font-extrabold text-center py-4">Ups, algo salio mal con tu busqueda.</p>
                        <img src="/ups.jpeg" class="max-w-xs mx-auto" alt="Ups">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
