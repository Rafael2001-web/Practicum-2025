{{-- Modal Crear Permiso --}}
<div id="createModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        {{-- Overlay --}}
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeCreateModal()"></div>

        {{-- Modal --}}
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="createForm" method="POST" action="{{ route('permissions.store') }}">
                @csrf
                
                {{-- Header --}}
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-center mb-4">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m0 0a2 2 0 01-2 2m2-2h3m-3 0h-3m-2-4.5v9"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left flex-1">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Crear Nuevo Permiso
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Completa la información para crear un nuevo permiso.
                            </p>
                        </div>
                        <button type="button" onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    {{-- Form Fields --}}
                    <div class="space-y-4">
                        {{-- Nombre --}}
                        <div>
                            <label for="create_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre del Permiso *
                            </label>
                            <input type="text" 
                                   id="create_name" 
                                   name="name" 
                                   required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                                   placeholder="Ej: manage users, view reports, etc.">
                            <p class="text-xs text-gray-500 mt-1">
                                Usa nombres descriptivos como "manage users", "view reports", etc.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Crear Permiso
                    </button>
                    <button type="button" 
                            onclick="closeCreateModal()"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:w-auto sm:text-sm transition-colors duration-200">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>