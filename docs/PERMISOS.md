# Sistema de Permisos - Practicum 2025

## Descripción General

El sistema de permisos de la aplicación Practicum 2025 está basado en el paquete **Spatie Laravel Permission**, que proporciona un sistema robusto y flexible de autorización basado en roles y permisos. Este sistema permite controlar el acceso a diferentes funcionalidades de la aplicación de manera granular.

## Tipos de Permisos

### 1. Permisos de Visualización (`view`)

**Propósito**: Permiten la lectura y visualización de información sin capacidad de modificación.

**Funcionalidad**:
- Acceso a la vista `index` (lista de registros)
- Acceso a la vista `show` (detalle de un registro específico)
- Visualización de datos sin opciones de edición o eliminación

**Ejemplo de uso**:
```php
Gate::authorize('view pnd');
@can('view pnd')
    // Mostrar contenido
@endcan
```

**Aplicación en controladores**:
```php
public function index()
{
    Gate::authorize('view pnd');
    $records = Pnd::all();
    return view('pnd.index', compact('records'));
}
```

---

### 2. Permisos de Gestión Completa (`manage`)

**Propósito**: Otorgan control total sobre un módulo específico.

**Funcionalidad**:
- Incluye todos los permisos: `view`, `create`, `edit`, `delete`
- Acceso a todas las operaciones CRUD
- Control administrativo completo del módulo

**Ejemplo de uso**:
```php
Gate::authorize('manage pnd');
@can('manage pnd')
    // Acceso completo al módulo
@endcan
```

**Ventajas**:
- Simplifica la asignación de permisos para administradores
- Reduce la cantidad de permisos que se deben verificar
- Ideal para roles con responsabilidades completas sobre un módulo

---

### 3. Permiso de Creación (`create`)

**Propósito**: Permite crear nuevos registros en un módulo específico.

**Funcionalidad**:
- Acceso al formulario de creación
- Capacidad de enviar datos para crear nuevos registros
- Sin acceso a edición o eliminación de registros existentes

**Ejemplo de uso**:
```php
Gate::authorize('create pnd');
@can('create pnd')
    <button onclick="openCreateModal()">Nuevo Registro</button>
@endcan
```

**Aplicación en controladores**:
```php
public function store(Request $request)
{
    Gate::authorize('create pnd');
    Pnd::create($request->validated());
    return redirect()->route('pnd.index');
}
```

---

### 4. Permiso de Edición (`edit`)

**Propósito**: Permite modificar registros existentes.

**Funcionalidad**:
- Acceso al formulario de edición
- Capacidad de actualizar datos de registros existentes
- Sin capacidad de crear o eliminar registros

**Ejemplo de uso**:
```php
Gate::authorize('edit pnd');
@can('edit pnd')
    <button onclick="openEditModal()">Editar</button>
@endcan
```

**Aplicación en controladores**:
```php
public function update(Request $request, $id)
{
    Gate::authorize('edit pnd');
    $pnd = Pnd::findOrFail($id);
    $pnd->update($request->validated());
    return redirect()->route('pnd.index');
}
```

---

### 5. Permiso de Eliminación (`delete`)

**Propósito**: Permite eliminar registros del sistema.

**Funcionalidad**:
- Capacidad de eliminar registros permanentemente
- Acceso a la funcionalidad de eliminación
- Acción irreversible (según configuración)

**Ejemplo de uso**:
```php
Gate::authorize('delete pnd');
@can('delete pnd')
    <button onclick="openDeleteModal()">Eliminar</button>
@endcan
```

**Aplicación en controladores**:
```php
public function destroy($id)
{
    Gate::authorize('delete pnd');
    $pnd = Pnd::findOrFail($id);
    $pnd->delete();
    return redirect()->route('pnd.index');
}
```

---

### 6. Permiso General de Reportes (`generate reports`)

**Propósito**: Permiso global que otorga acceso a la generación de reportes en todos los módulos.

**Funcionalidad**:
- Generación de reportes PDF, CSV, Excel, JSON
- Exportación de datos de cualquier módulo
- Acceso a funcionalidades de impresión

**Ejemplo de uso**:
```php
@can('generate reports')
    <a href="{{ route('pnd.pdf') }}">Generar PDF</a>
@endcan
```

**Características**:
- Permiso transversal que aplica a todos los módulos
- Útil para roles con responsabilidades de análisis y auditoría
- No requiere permisos específicos por módulo

---

### 7. Permiso Específico de Reporte por Módulo (`generate report [módulo]`)

**Propósito**: Permite generar reportes solo de un módulo específico.

**Funcionalidad**:
- Generación de reportes limitada a un módulo particular
- Control granular sobre quién puede exportar qué información
- Complementa o restringe el permiso general de reportes

**Ejemplo de uso**:
```php
@canany(['generate report pnd', 'generate reports'])
    <a href="{{ route('pnd.pdf') }}">Generar Reporte PND</a>
@endcanany
```

**Aplicación en controladores**:
```php
public function generatePdf()
{
    Gate::any(['generate report pnd', 'generate reports']);
    $data = Pnd::all();
    $pdf = Pdf::loadView('pnd.pdf', compact('data'));
    return $pdf->download('pnd-report.pdf');
}
```

---

## Uso Combinado de Permisos

### Verificación de Múltiples Permisos con `@canany`

Permite verificar si el usuario tiene **al menos uno** de los permisos especificados:

```php
@canany(['view pnd', 'manage pnd'])
    // Código visible si tiene view O manage
@endcanany
```

### Verificación con `Gate::any()`

Similar a `@canany`, pero se usa en controladores:

```php
public function index()
{
    Gate::any(['view pnd', 'manage pnd']);
    // Lógica del controlador
}
```

### Verificación de Todos los Permisos con `@canall`

Verifica que el usuario tenga **todos** los permisos especificados:

```php
@canall(['edit pnd', 'generate reports'])
    // Solo visible si tiene AMBOS permisos
@endcanall
```

---

## Módulos del Sistema y sus Permisos

Cada módulo del sistema tiene su conjunto de permisos siguiendo el patrón:

| Módulo | View | Create | Edit | Delete | Manage | Generate Report |
|--------|------|--------|------|--------|--------|----------------|
| **PND** (Plan Nacional Desarrollo) | `view pnd` | `create pnd` | `edit pnd` | `delete pnd` | `manage pnd` | `generate report pnd` |
| **ODS** (Objetivos Desarrollo Sostenible) | `view ods` | `create ods` | `edit ods` | `delete ods` | `manage ods` | `generate report ods` |
| **Unidades** | `view unidades` | `create unidades` | `edit unidades` | `delete unidades` | `manage unidades` | `generate report unidades` |
| **Planes** | `view planes` | `create planes` | `edit planes` | `delete planes` | `manage planes` | `generate report planes` |
| **Objetivos Institucionales** | `view objetivos` | `create objetivos` | `edit objetivos` | `delete objetivos` | `manage objetivos` | `generate report objetivos` |
| **Usuarios** | `view usuarios` | `create usuarios` | `edit usuarios` | `delete usuarios` | `manage usuarios` | - |
| **Roles** | `view roles` | `create roles` | `edit roles` | `delete roles` | `manage roles` | - |
| **Permisos** | `view permissions` | `create permissions` | `edit permissions` | `delete permissions` | `manage permissions` | - |

---

## Buenas Prácticas

### 1. En Controladores

Siempre verificar permisos al inicio de cada método:

```php
public function index()
{
    Gate::authorize('view pnd');
    // Resto del código
}
```

### 2. En Vistas Blade

Ocultar elementos de UI que el usuario no puede usar:

```php
@can('manage pnd')
    <button>Editar</button>
    <button>Eliminar</button>
@endcan
```

### 3. Uso de `manage` para Simplicidad

Para usuarios que necesitan acceso completo, usar `manage` en lugar de múltiples permisos individuales:

```php
Gate::any(['create pnd', 'manage pnd']); // Permite create O manage
```

### 4. Reportes con Doble Verificación

Siempre verificar tanto el permiso general como el específico:

```php
@canany(['generate report pnd', 'generate reports'])
    // Botón de reporte
@endcanany
```

---

## Jerarquía de Roles Recomendada

### Super Administrador
- Permiso: `manage` en todos los módulos
- Permiso: `generate reports` (global)

### Administrador de Módulo
- Permiso: `manage` en módulos específicos
- Permiso: `generate report [módulo]`

### Editor
- Permisos: `view`, `create`, `edit` en módulos específicos
- Sin permiso: `delete`

### Consultor
- Permiso: `view` en módulos específicos
- Permiso: `generate report [módulo]`
- Sin permisos de modificación

### Usuario Básico
- Permiso: `view` en módulos limitados
- Sin permisos de exportación o modificación

---

## Implementación Técnica

### Middleware de Autorización

El sistema utiliza los siguientes middlewares:

- `auth`: Verifica que el usuario esté autenticado
- `permission:[nombre]`: Verifica permiso específico
- `role:[nombre]`: Verifica rol específico

### Archivo de Configuración

Ubicación: `config/permission.php`

Configuración de cache, modelos y tablas del sistema de permisos.

### Tablas de Base de Datos

- `permissions`: Almacena los permisos
- `roles`: Almacena los roles
- `model_has_permissions`: Relación usuarios-permisos
- `model_has_roles`: Relación usuarios-roles
- `role_has_permissions`: Relación roles-permisos

---

## Comandos Útiles

```bash
# Limpiar cache de permisos
php artisan permission:cache-reset

# Crear permiso
php artisan permission:create-permission "nombre del permiso"

# Crear rol
php artisan permission:create-role "nombre del rol"

# Asignar permiso a rol
php artisan permission:assign-permission "rol" "permiso"
```

---

## Resolución de Problemas

### Error: "User does not have the right permissions"

**Solución**: Verificar que el usuario tenga el rol asignado y que el rol tenga los permisos necesarios.

### Permiso no se aplica después de asignar

**Solución**: Limpiar cache de permisos:
```bash
php artisan permission:cache-reset
```

### Conflicto entre permisos específicos y `manage`

**Solución**: El permiso `manage` debe incluir automáticamente todos los demás permisos del módulo. Verificar la lógica con `Gate::any()`.

---

## Recursos Adicionales

- **Documentación Spatie Permission**: https://spatie.be/docs/laravel-permission
- **Laravel Gates & Policies**: https://laravel.com/docs/authorization
- **Seeders de Roles y Permisos**: Ver archivo `database/seeders/RoleSeeder.php`

---

*Última actualización: Diciembre 2025*
*Versión: 2.0*
*Sistema: Practicum 2025 - Gestión de Objetivos Institucionales*
