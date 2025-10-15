{{-- Edit Modal --}}
<x-modal name="edit-programa-modal" maxWidth="lg">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Editar Programa
            </h3>
            <button onclick="closeModal('edit-programa-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="edit-programa-form" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                {{-- Entidad --}}
                <div>
                    <x-label for="edit_idEntidad" value="Entidad" />
                    <select id="edit_idEntidad" 
                            name="idEntidad" 
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                        <option value="">Seleccionar entidad</option>
                        @foreach(\App\Models\Entidad::all() as $entidad)
                            <option value="{{ $entidad->idEntidad }}">{{ $entidad->subSector }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="idEntidad" class="mt-2" />
                </div>

                {{-- Nombre --}}
                <div>
                    <x-label for="edit_nombre" value="Nombre del Programa" />
                    <x-input 
                        id="edit_nombre" 
                        name="nombre" 
                        type="text" 
                        class="mt-1 block w-full" 
                        required 
                        placeholder="Ingrese el nombre del programa"
                    />
                    <x-input-error for="nombre" class="mt-2" />
                </div>

                {{-- Descripción --}}
                <div>
                    <x-label for="edit_descripcion" value="Descripción" />
                    <textarea 
                        id="edit_descripcion" 
                        name="descripcion" 
                        rows="4"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Ingrese la descripción del programa"
                        required
                    ></textarea>
                    <x-input-error for="descripcion" class="mt-2" />
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" onclick="closeModal('edit-programa-modal')">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit">
                    Actualizar Programa
                </x-button>
            </div>
        </form>
    </div>
</x-modal>