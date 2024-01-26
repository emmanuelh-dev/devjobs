<div>
    <div class="space-y-4">
        @if ($vacantes->count() > 0)
            @foreach ($vacantes as $vacante)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-bold">{{ $vacante->titulo }}</h2>
                            <p class="font-bold text-gray-500">{{ $vacante->empresa }}</p>
                            <p class="text-sm font-semibold">Ultimo dia {{ $vacante->ultimo_dia }}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-2">
                            <a class="p-2 text-center bg-gray-900 text-white rounded">Candidatos</a>
                            <a class="p-2 text-center bg-blue-500 text-white rounded">Editar</a>
                            <a class="p-2 text-center bg-red-500 text-white rounded">Eliminar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>Notienes ninguna vacante, comienza creando una.</div>
                </div>
            </div>
        @endif
    </div>

    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>

</div>
