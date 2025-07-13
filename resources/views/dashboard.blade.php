@extends('layouts.app')

@section('content')
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Panel de Control</h1>

    @auth
      @if(auth()->user()->isAdmin())
        <div class="grid grid-cols-2 gap-4">
          <a href="{{ route('entidades.index') }}" class="p-4 bg-white rounded shadow hover:bg-gray-50">
            <h2 class="text-xl font-semibold">Configuración Institucional</h2>
            <p>Gestiona entidades del Estado</p>
          </a>
          <a href="{{ route('programas.index') }}" class="p-4 bg-white rounded shadow hover:bg-gray-50">
            <h2 class="text-xl font-semibold">Gestión de Programas</h2>
            <p>Administra proyectos de inversión</p>
          </a>
        </div>
      @else
        <p>Bienvenido {{ auth()->user()->name }}, no tienes permisos de administrador.</p>
      @endif
    @else
      <p>Debes <a href="{{ route('login') }}">iniciar sesión</a> para ver este contenido.</p>
    @endauth

  </div>
@endsection
