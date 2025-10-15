{{-- Delete Modal --}}
<x-modal name="delete-proyecto-modal" maxWidth="md">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Confirmar Eliminación
            </h3>
            <button onclick="closeModal('delete-proyecto-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="mb-6">
            <div class="flex items-center mb-4">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
            </div>
            <div class="text-center">
                <h3 class="text-lg leading-6 font-medium text-primary mb-2">
                    ¿Estás seguro de que deseas eliminar este proyecto?
                </h3>
                <p class="text-sm text-neutral">
                    El proyecto "<span id="delete-proyecto-name" class="font-semibold"></span>" será eliminado permanentemente. Esta acción no se puede deshacer.
                </p>
            </div>
        </div>
        
        <div class="flex justify-end space-x-3">
            <x-secondary-button type="button" onclick="closeModal('delete-proyecto-modal')">
                Cancelar
            </x-secondary-button>
            <form id="delete-proyecto-form" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">
                    Eliminar Proyecto
                </x-danger-button>
            </form>
        </div>
    </div>
</x-modal>