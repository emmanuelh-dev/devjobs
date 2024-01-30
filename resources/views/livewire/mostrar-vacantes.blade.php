<div>
    <div class="space-y-4">
        @if ($vacantes->count() > 0)
            @foreach ($vacantes as $vacante)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between items-center">
                        <div>
                            <a href="{{ route('vacantes.show', $vacante) }}" class="text-lg font-bold">{{ $vacante->titulo }}</a>
                            <p class="font-bold text-gray-500">{{ $vacante->empresa }}</p>
                            <p class="text-sm font-semibold">Ultimo dia {{ $vacante->ultimo_dia }}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-2">
                            <a href="{{ route('candidatos.index', $vacante) }}" class="p-2 text-center bg-gray-900 text-white rounded">
                                <span class="rounded-full bg-blue-500 size-4 py-2 px-3">{{ $vacante->candidatos->count() }}</span> Candidatos
                            </a>
                            <a href="{{ route('vacantes.edit', $vacante) }}"
                                class="p-2 text-center bg-blue-500 text-white rounded">Editar</a>
                            <button wire:click="$dispatch('eliminar', {{ $vacante }})"
                                class="p-2 text-center bg-red-500 text-white rounded">Eliminar</button>
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
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('eliminar', vacante => {
                Swal.fire({
                    title: vacante.titulo,
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0048ff',
                    cancelButtonColor: '#ff0000',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarVacante', { vacante: vacante });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
