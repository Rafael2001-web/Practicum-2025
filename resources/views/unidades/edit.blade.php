<x-app-layout>
@section('title','Editar')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Unidades') }}
        </h2>
    </x-slot>
    {{-- Formulario para la edicion de unidades --}}

        <form action="{{ route ('unidades.update' , $unidades->idUnidad )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- 
            <div>
                <label class="block">ID</label>
                <input type="number" name="idUnidad" require value="{{ old('idUnidad', $unidades->idUnidad) }}">
            </div>--}}

             <div>
                <label class="block">Macrosector</label>
                <input type="text" name="macrosector" require value="{{ old('macrosector', $unidades->macrosector) }}" >
            </div>

             <div>
                <label class="block">Sector</label>
                <input type="text" name="sector" require value="{{ old('sector', $unidades->sector) }}" >
            </div>

            <div>
                <label class="block">Estado</label>
                <input type="text" name="estado" require value="{{ old('estado', $unidades->estado) }}" >
            </div>

            <button type="submit">Actualizar</button>

            <a href="{{route('unidades.index')}}">Volver</a>
            
        </form>
</x-app-layout>