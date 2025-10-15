{{-- Edit Modal --}}
<x-modal name="edit-proyecto-modal" maxWidth="2xl">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Editar Proyecto
            </h3>
            <button onclick="closeModal('edit-proyecto-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="edit-proyecto-form" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Código --}}
                <div>
                    <x-label for="edit_codigo" value="Código del Proyecto" />
                    <x-input 
                        id="edit_codigo" 
                        name="codigo" 
                        type="text" 
                        class="mt-1 block w-full" 
                        readonly
                    />
                    <x-input-error for="codigo" class="mt-2" />
                </div>

                {{-- Nombre --}}
                <div>
                    <x-label for="edit_nombre" value="Nombre del Proyecto" />
                    <x-input 
                        id="edit_nombre" 
                        name="nombre" 
                        type="text" 
                        class="mt-1 block w-full" 
                        required 
                        placeholder="Ingrese el nombre del proyecto"
                    />
                    <x-input-error for="nombre" class="mt-2" />
                </div>

                {{-- Sector --}}
                <div>
                    <x-label for="edit_sector" value="Sector" />
                    <x-input 
                        id="edit_sector" 
                        name="sector" 
                        type="text" 
                        class="mt-1 block w-full" 
                        required 
                        placeholder="Ingrese el sector"
                    />
                    <x-input-error for="sector" class="mt-2" />
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
                        <option value="planificado">Planificado</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="En Ejecución">En Ejecución</option>
                        <option value="completado">Completado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                    <x-input-error for="estado" class="mt-2" />
                </div>

                {{-- Usuario --}}
                <div>
                    <x-label for="edit_user_id" value="Usuario Responsable" />
                    <select id="edit_user_id" 
                            name="user_id" 
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                        <option value="">Seleccionar usuario</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="user_id" class="mt-2" />
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

            {{-- Descripción --}}
            <div>
                <x-label for="edit_descripcion" value="Descripción" />
                <textarea 
                    id="edit_descripcion" 
                    name="descripcion" 
                    rows="4"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Ingrese la descripción del proyecto"
                    required
                ></textarea>
                <x-input-error for="descripcion" class="mt-2" />
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" onclick="closeModal('edit-proyecto-modal')">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit">
                    Actualizar Proyecto
                </x-button>
            </div>
        </form>
    </div>
</x-modal>