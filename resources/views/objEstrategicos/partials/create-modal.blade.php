{{-- Create Modal --}}
<x-modal name="create-objestrategico-modal" maxWidth="lg">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Crear Nuevo Objetivo Estratégico
            </h3>
            <button onclick="closeModal('create-objestrategico-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="create-objestrategico-form" method="POST" action="{{ route('objEstrategicos.store') }}" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Fecha de Registro --}}
                <div>
                    <x-label for="fechaRegistro" value="Fecha de Registro" />
                    <x-input 
                        id="fechaRegistro" 
                        name="fechaRegistro" 
                        type="date" 
                        class="mt-1 block w-full" 
                        required 
                        value="{{ date('Y-m-d') }}" 
                    />
                    <x-input-error for="fechaRegistro" class="mt-2" />
                </div>

                {{-- Estado --}}
                <div>
                    <x-label for="estado" value="Estado" />
                    <select id="estado" 
                            name="estado" 
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                        <option value="">Seleccionar estado</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                    <x-input-error for="estado" class="mt-2" />
                </div>
            </div>

            {{-- Descripción --}}
            <div>
                <x-label for="descripcion" value="Descripción" />
                <textarea 
                    id="descripcion" 
                    name="descripcion" 
                    rows="4"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Ingrese la descripción del objetivo estratégico"
                    required
                ></textarea>
                <x-input-error for="descripcion" class="mt-2" />
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" onclick="closeModal('create-objestrategico-modal')">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit">
                    Crear Objetivo Estratégico
                </x-button>
            </div>
        </form>
    </div>
</x-modal>