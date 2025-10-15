{{-- Create Modal --}}
<x-modal name="create-pnd-modal" maxWidth="lg">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Crear Nuevo Objetivo PND
            </h3>
            <button onclick="closeModal('create-pnd-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="create-pnd-form" method="POST" action="{{ route('pnd.store') }}" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- EJE --}}
                <div>
                    <x-label for="eje" value="EJE" />
                    <select id="eje" 
                            name="eje" 
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                        <option value="">Seleccione un eje</option>
                        <option value="EJE Social">EJE Social</option>
                        <option value="EJE Desarrollo económico">EJE Desarrollo económico</option>
                        <option value="EJE Infraestructura">EJE Infraestructura</option>
                        <option value="EJE Institucional">EJE Institucional</option>
                        <option value="EJE Gestion de Riesgos">EJE Gestion de Riesgos</option>
                    </select>
                    <x-input-error for="eje" class="mt-2" />
                </div>

                {{-- Objetivo Nacional --}}
                <div>
                    <x-label for="objetivoN" value="# Objetivo Nacional" />
                    <x-input 
                        id="objetivoN" 
                        name="objetivoN" 
                        type="number" 
                        class="mt-1 block w-full" 
                        required 
                        min="1"
                        placeholder="Ingrese el número del objetivo nacional"
                    />
                    <x-input-error for="objetivoN" class="mt-2" />
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
                    placeholder="Ingrese la descripción del objetivo PND"
                    required
                ></textarea>
                <x-input-error for="descripcion" class="mt-2" />
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" onclick="closeModal('create-pnd-modal')">
                    Cancelar
                </x-secondary-button>
                <x-button type="submit">
                    Crear Objetivo PND
                </x-button>
            </div>
        </form>
    </div>
</x-modal>