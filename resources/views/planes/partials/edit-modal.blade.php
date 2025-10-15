{{-- Edit Modal --}}
<x-modal name="edit-plan-modal" maxWidth="2xl">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Editar Plan
            </h3>
            <button onclick="closeModal('edit-plan-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="edit-plan-form" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nombre --}}
                <div>
                    <x-label for="edit_nombre" value="Nombre del Plan" />
                    <x-input 
                        id="edit_nombre" 
                        name="nombre" 
                        type="text" 
                        class="mt-1 block w-full" 
                        required 
                        placeholder="Ingrese el nombre del plan"
                    />
                    <x-input-error for="nombre" class="mt-2" />
                </div>

                {{-- Entidad --}}
                <div>
                    <x-label for="edit_entidad" value="Entidad" />
                    <x-input 
                        id="edit_entidad" 
                        name="entidad" 
                        type="text" 
                        class="mt-1 block w-full" 
                        required 
                        placeholder="Ingrese la entidad responsable"
                    />
                    <x-input-error for="entidad" class="mt-2" />
                </div>

                {{-- Presupuesto --}}
                <div>
                    <x-label for="edit_presupuesto" value="Presupuesto" />
                    <x-input 
                        id="edit_presupuesto" 
                        name="presupuesto" 
                        type="number" 
                        step="0.01"
                        min="0"
                        class="mt-1 block w-full" 
                        required 
                        placeholder="0.00"
                    />
                    <x-input-error for="presupuesto" class="mt-2" />
                </div>

                {{-- Estado --}}
                <div>
                    <x-label for="edit_estado" value="Estado" />
                    <select id="edit_estado" 
                            name="estado" 
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                        <option value="">Seleccionar estado</option>
                        <option value="Borrador">Borrador</option>
                        <option value="Aprobado">Aprobado</option>
                        <option value="Rechazado">Rechazado</option>
                    </select>
                    <x-input-error for="estado" class="mt-2" />
                </div>

                {{-- Fecha Inicio --}}
                <div>
                    <x-label for="edit_fecha_inicio" value="Fecha de Inicio" />
                    <x-input 
                        id="edit_fecha_inicio" 
                        name="fecha_inicio" 
                        type="date" 
                        class="mt-1 block w-full" 
                        required 
                    />
                    <x-input-error for="fecha_inicio" class="mt-2" />
                </div>

                {{-- Fecha Fin --}}
                <div>
                    <x-label for="edit_fecha_fin" value="Fecha de Fin" />
                    <x-input 
                        id="edit_fecha_fin" 
                        name="fecha_fin" 
                        type="date" 
                        class="mt-1 block w-full" 
                        required 
                    />
                    <x-input-error for="fecha_fin" class="mt-2" />
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" onclick="closeModal('edit-plan-modal')">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit">
                    Actualizar Plan
                </x-button>
            </div>
        </form>
    </div>
</x-modal>