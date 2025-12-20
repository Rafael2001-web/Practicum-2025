# 🎯 Diagrama de Asignación de Actores - Sistema SIPEIP 2.0

## 📋 Mapa Visual de Responsabilidades

```
Sistema SIPEIP 2.0 - Asignación por CRUD Específico
═══════════════════════════════════════════════════════

👑 ADMINISTRADOR                    🏢 GESTOR DE ENTIDADES
   DEL SISTEMA                         
   ┌─────────────┐                     ┌─────────────┐
   │   USUARIOS  │ ✅ CRUD             │  ENTIDADES  │ ✅ CRUD
   └─────────────┘                     └─────────────┘
   │                                   │
   └── 👀 Supervisa todos los demás    └── 👀 Lee: Programas


🏗️ COORDINADOR                     🎯 ESPECIALISTA 
   DE UNIDADES                        EN ODS
   ┌─────────────┐                     ┌─────────────┐
   │   UNIDADES  │ ✅ CRUD             │     ODS     │ ✅ CRUD
   └─────────────┘                     └─────────────┘
   │                                   │
   └── 👀 Lee: Usuarios, Entidades     └── 👀 Lee: Obj.Estratégicos, Planes


🎯 PLANIFICADOR                     🇵🇪 ANALISTA 
   ESTRATÉGICO                        DE PND
   ┌─────────────┐                     ┌─────────────┐
   │ OBJETIVOS   │ ✅ CRUD             │     PND     │ ✅ CRUD
   │ESTRATÉGICOS │                     └─────────────┘
   └─────────────┘                     │
   │                                   └── 👀 Lee: Obj.Estratégicos, Planes
   └── 👀 Lee: ODS, PND, Planes        


📋 GESTOR                          📊 COORDINADOR
   DE PLANES                          DE PROGRAMAS
   ┌─────────────┐                     ┌─────────────┐
   │   PLANES    │ ✅ CRUD             │  PROGRAMAS  │ ✅ CRUD
   └─────────────┘                     └─────────────┘
   │                                   │
   └── 👀 Lee: Obj.Est, ODS,           └── 👀 Lee: Entidades, Planes
       PND, Programas


📈 ANALISTA                        👁️ SUPERVISOR 
   DE PROYECTOS                       GENERAL
   ┌─────────────┐                     ┌─────────────┐
   │  PROYECTOS  │ ✅ CRUD             │   TODOS     │ 👀 SOLO
   └─────────────┘                     │   LOS       │    LECTURA
   │                                   │   CRUDs     │    + 
   └── 👀 Lee: Planes,                 └─────────────┘    REPORTES
       Programas, Usuarios              
```

## 🔗 Flujo de Relaciones y Dependencias

```
FLUJO DE INFORMACIÓN Y DEPENDENCIAS
═══════════════════════════════════

   👑 ADMIN ──── gestiona ───→ 👤 USUARIOS
       │                         │
       │ supervisa               │ acceden
       ↓                         ↓
   🏢 ENTIDADES ←─── vincula ─── 📊 PROGRAMAS
       │                         ↑
       │ contexto                │ se basan en
       ↓                         │
   🏗️ UNIDADES               📋 PLANES
                                 ↑
   🎯 ODS ←──── alineación ──────┤
       │                        │
       │ coherencia              │ alineación
       ↓                        ↓
   🎯 OBJ.ESTRATÉGICOS ←── 🇵🇪 PND
                                 ↑
                              vincula
                                 │
                           📈 PROYECTOS
```

## 🎨 Código de Colores por Área

```
ÁREAS FUNCIONALES
═══════════════════

🔵 ADMINISTRACIÓN Y ESTRUCTURA
   👑 Administrador del Sistema
   🏢 Gestor de Entidades  
   🏗️ Coordinador de Unidades

🟢 PLANIFICACIÓN ESTRATÉGICA
   🎯 Especialista en ODS
   🎯 Planificador Estratégico
   🇵🇪 Analista de PND

🟡 GESTIÓN OPERATIVA
   📋 Gestor de Planes
   📊 Coordinador de Programas
   📈 Analista de Proyectos

🟣 SUPERVISIÓN Y CONTROL
   👁️ Supervisor General
```

## 🛡️ Matriz de Seguridad Simplificada

| Actor | Su CRUD | Puede Leer | No Accede |
|-------|---------|------------|-----------|
| 👑 Admin | ✅ Usuarios | 👀 Todo | ❌ Nada |
| 🏢 Gest.Ent | ✅ Entidades | 👀 Programas | ❌ Resto |
| 🏗️ Coord.Unid | ✅ Unidades | 👀 Usuarios, Entidades | ❌ Resto |
| 🎯 Esp.ODS | ✅ ODS | 👀 Obj.Est, Planes | ❌ Resto |
| 🎯 Plan.Est | ✅ Obj.Estratégicos | 👀 ODS, PND, Planes | ❌ Resto |
| 🇵🇪 Anal.PND | ✅ PND | 👀 Obj.Est, Planes | ❌ Resto |
| 📋 Gest.Planes | ✅ Planes | 👀 Obj.Est, ODS, PND, Prog | ❌ Resto |
| 📊 Coord.Prog | ✅ Programas | 👀 Entidades, Planes | ❌ Resto |
| 📈 Anal.Proy | ✅ Proyectos | 👀 Planes, Prog, Usuarios | ❌ Resto |
| 👁️ Supervisor | ❌ Ninguno | 👀 Todo + 📊 Reportes | ❌ Modificar |

## 🔑 Ventajas del Sistema

✅ **Responsabilidad Única**: Cada usuario tiene UN solo CRUD principal
✅ **Segregación de Funciones**: Evita conflictos y errores
✅ **Trazabilidad Clara**: Cada cambio tiene un responsable específico  
✅ **Seguridad Granular**: Acceso mínimo necesario
✅ **Escalabilidad**: Fácil agregar nuevos roles específicos
✅ **Auditoría Simplificada**: Un actor = Un área de responsabilidad

## 🚀 Implementación Técnica

### En Laravel - Sistema de Roles y Permisos:

```php
// Ejemplo de middleware para cada actor
Route::group(['middleware' => 'role:admin'], function() {
    Route::resource('usuarios', UsuarioController::class);
    Route::get('*/read-only', [ReadOnlyController::class, 'index']);
});

Route::group(['middleware' => 'role:gestor_entidades'], function() {
    Route::resource('entidades', EntidadController::class);
    Route::get('programas', [ProgramaController::class, 'index']);
});

// Y así sucesivamente para cada rol...
```

---

*Este modelo garantiza que cada usuario tenga responsabilidades claras y específicas, mejorando la seguridad y organización del sistema.*