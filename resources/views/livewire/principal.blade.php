<div>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between">
            <p>Nueva tarea</p>
            <x-button wire:click="post()">+</x-button>
        </div>
        <div class="flex flex-col">
                @forelse($pendientes as $pendiente)
                    <div class="flex justify-between">
                        <div>
                            <input type="checkbox" wire:click="toggleCompletada('{{ $pendiente->id }}')" {{ $pendiente->completada ? 'checked' : '' }}>
                            <td>{{ $pendiente->tarea }}</td>
                        </div>
                        <div class="mt-[10px]">
                            <x-danger-button>Eliminar</x-danger-button>
                        </div>
                    </div>
                @empty
                    <p>No hay tareas</p>
                @endforelse ()
        </div>
    </div>
    <div>
        @if ($open)
                <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
                    <div class="py-12">
                        <div class="max-w-xl mx-auto sm:px lg:px-8">
                            <div class="bg-white shadow-lg rounded-lg p-6">
                                <form wire:submit="save">
                                    <div class="mb-4">
                                        <x-label>
                                            Tarea
                                        </x-label>
                                        <x-input class="w-full"
                                        wire:model="tarea" required/>
                                    </div>
                                    <div class="mb-4">
                                        <x-label>Descripción</x-label>
                                        <x-text-area class="w-full"
                                        wire:model="descripcion"></x-text-area>
                                    </div>

                                    <div class="flex justify-end">
                                        <x-danger-button class="mr-2"
                                        wire:click="$set('open', false)">
                                            Cancelar
                                        </x-danger-button>
                                        <x-button class="ml-2">
                                            Crear
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
</div>
