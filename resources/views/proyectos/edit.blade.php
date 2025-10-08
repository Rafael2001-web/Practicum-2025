<x-modal name="edit-proyecto-modal" maxWidth="2xl">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary">
                Editar Proyecto
            </h3>
            <button x-on:click="$dispatch('close-modal', 'edit-proyecto-modal')"
                class="text-neutral hover:text-primary transition-colors duration-150">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="edit-proyecto-form" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="edit_nombre" value="Nombre del Proyecto" />
                    <x-text-input id="edit_nombre" name="nombre" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
                </div>

                <div>
                    <x-input-label for="edit_sector" value="Sector" />
                    <select id="edit_sector" name="sector"
                        class="mt-1 block w-full border-neutral/30 bg-white text-neutral focus:border-secondary focus:ring-secondary/20 focus:ring-2 rounded-md shadow-sm"
                        required>
                        <option value="">Seleccione un sector</option>
                        <option value="Salud">Salud</option>
                        <option value="Educación">Educación</option>
                        <option value="Infraestructura">Infraestructura</option>
                        <option value="Medio Ambiente">Medio Ambiente</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('sector')" />
                </div>

                <div>
                    <x-input-label for="edit_fecha_inicio" value="Fecha de Inicio" />
                    <x-text-input id="edit_fecha_inicio" name="fecha_inicio" type="date" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('fecha_inicio')" />
                </div>

                <div>
                    <x-input-label for="edit_fecha_fin" value="Fecha de Fin" />
                    <x-text-input id="edit_fecha_fin" name="fecha_fin" type="date" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('fecha_fin')" />
                </div>

                <div>
                    <x-input-label for="edit_presupuesto" value="Presupuesto ($)" />
                    <x-text-input id="edit_presupuesto" name="presupuesto" type="number" step="0.01" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('presupuesto')" />
                </div>

                <div>
                    <x-input-label for="edit_estado" value="Estado" />
                    <select id="edit_estado" name="estado"
                        class="mt-1 block w-full border-neutral/30 bg-white text-neutral focus:border-secondary focus:ring-secondary/20 focus:ring-2 rounded-md shadow-sm"
                        required>
                        <option value="">Seleccionar estado</option>
                        <option value="borrador">Borrador</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="ejecucion">En Ejecución</option>
                        <option value="completado">Completado</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                </div>
            </div>

            <div class="col-span-2">
                <x-input-label for="edit_descripcion" value="Descripción" />
                <textarea id="edit_descripcion" name="descripcion" rows="3"
                    class="mt-1 block w-full border-neutral/30 bg-white text-neutral focus:border-secondary focus:ring-secondary/20 focus:ring-2 rounded-md shadow-sm"
                    required></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <x-secondary-button type="button" x-on:click="$dispatch('close-modal', 'edit-proyecto-modal')">
                    Cancelar
                </x-secondary-button>
                <x-primary-button type="submit">
                    Actualizar Proyecto
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>