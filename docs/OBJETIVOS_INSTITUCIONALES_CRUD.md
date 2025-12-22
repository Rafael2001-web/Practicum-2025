# CRUD de Objetivos Institucionales - Documentación

## 📋 Resumen

Se ha implementado exitosamente el CRUD completo para **Objetivos Institucionales**, una tabla de alineación estratégica que conecta tres elementos clave:

1. **PND** (Plan Nacional de Desarrollo)
2. **ODS** (Objetivos de Desarrollo Sostenible - Agenda 2030)
3. **Objetivos Estratégicos** (de la institución)

## 🎯 Componentes Creados

### 1. **Base de Datos**
- ✅ Migración: `2025_10_26_185536_create_pnd_ods_alignment_table.php`
- ✅ Tabla: `objetivos_institucionales`
- ✅ Modelo: `ObjetivoInstitucional.php` con relaciones
- ✅ Seeder: `ObjetivoInstitucionalSeeder.php` (8 registros de ejemplo)

### 2. **Controlador**
- ✅ `ObjetivoInstitucionalController.php`
  - index() - Listado con relaciones eager loading
  - store() - Creación con validaciones
  - show() - Detalle con relaciones
  - update() - Actualización con validaciones
  - destroy() - Eliminación

### 3. **Vistas**
```
resources/views/objetivos-institucionales/
├── index.blade.php              # Vista principal con tabla
├── show.blade.php               # Vista de detalle
└── partials/
    ├── create-modal.blade.php   # Modal de creación
    ├── edit-modal.blade.php     # Modal de edición
    └── delete-modal.blade.php   # Modal de eliminación
```

### 4. **Rutas**
- ✅ GET `/objetivos-institucionales` - Listado
- ✅ GET `/objetivos-institucionales/{id}` - Ver detalle
- ✅ POST `/objetivos-institucionales` - Crear
- ✅ PUT `/objetivos-institucionales/{id}` - Actualizar
- ✅ DELETE `/objetivos-institucionales/{id}` - Eliminar

### 5. **Permisos y Roles**
Permisos creados:
- `view strategic alignment`
- `manage strategic alignment`
- `create strategic alignment`
- `edit strategic alignment`
- `delete strategic alignment`

**Roles con acceso:**
- 🎯 **Planificador Estratégico**: CRUD completo
- 👁️ **Supervisor General**: Solo lectura

## 🔗 Relaciones del Modelo

```php
ObjetivoInstitucional
├── belongsTo(Pnd)
├── belongsTo(Ods)
└── belongsTo(objEstrategico)
```

**Relaciones inversas agregadas:**
```php
Pnd::objetivosInstitucionales()
Ods::objetivosInstitucionales()
objEstrategico::objetivosInstitucionales()
```

## 📊 Estructura de la Tabla

| Campo | Tipo | Descripción |
|-------|------|-------------|
| idObjInstitucional | BIGINT (PK) | ID único |
| idPnd | BIGINT (FK) | Referencia al PND |
| idOds | BIGINT (FK) | Referencia al ODS |
| idobjEstrategico | BIGINT (FK) | Referencia al Objetivo Estratégico |
| nivel_alineacion | STRING | Alto, Medio, Bajo |
| justificacion | TEXT | Justificación de la alineación |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

**Restricciones:**
- Índice único en `[idPnd, idOds, idobjEstrategico]`
- Cascada en eliminación para mantener integridad referencial

## 🎨 Características de la Interfaz

### Vista Index
- ✅ Tabla responsive con componente `<x-table>`
- ✅ Badges de color según nivel de alineación (Alto=Verde, Medio=Amarillo, Bajo=Rojo)
- ✅ Botones de acción con iconos SVG
- ✅ Permisos granulares con `@can` y `@canany`
- ✅ Exportación a CSV, Excel, JSON, PDF (para usuarios con permiso)

### Vista Show
- ✅ Diseño con tarjetas (cards) para cada elemento de la triple alineación
- ✅ Código de colores por tipo de elemento
- ✅ Visualización clara del nivel de alineación
- ✅ Metadata de auditoría (fechas)

### Modales
- ✅ Diseño consistente con el resto del sistema
- ✅ Validación en frontend y backend
- ✅ Mensajes de confirmación para acciones destructivas

## 🚀 Cómo Usar

### 1. Acceso al Módulo
```
URL: /objetivos-institucionales
```

### 2. Crear Nuevo Objetivo Institucional
1. Clic en "Nuevo Objetivo Institucional"
2. Seleccionar PND, ODS y Objetivo Estratégico
3. Elegir nivel de alineación
4. Agregar justificación (opcional)
5. Guardar

### 3. Ver Detalle
- Clic en el botón "Ver" (ícono de ojo)
- Se muestra la información completa de la triple alineación

### 4. Editar
- Clic en el botón "Editar" (ícono de lápiz)
- Modificar campos necesarios
- Guardar cambios

### 5. Eliminar
- Clic en el botón "Eliminar" (ícono de papelera)
- Confirmar eliminación en el modal

## 📝 Validaciones

### Backend (Laravel)
```php
'idPnd' => 'required|exists:pnd,idPnd'
'idOds' => 'required|exists:ods,idOds'
'idobjEstrategico' => 'required|exists:objestrategicos,idobjEstrategico'
'nivel_alineacion' => 'required|in:Alto,Medio,Bajo'
'justificacion' => 'nullable|string'
```

### Frontend
- Campos requeridos marcados con asterisco rojo
- Selects con opciones predefinidas
- Textarea opcional para justificación

## 🔒 Seguridad

- ✅ Middleware de autenticación
- ✅ Permisos granulares por acción
- ✅ Validación de existencia de registros relacionados
- ✅ Protección CSRF en formularios
- ✅ Validación de integridad referencial

## 📦 Datos de Ejemplo

El seeder incluye 8 registros de ejemplo que demuestran alineaciones entre:
- Diversos ejes del PND (Social, Económico, Sostenible)
- Diferentes ODS (2, 3, 4, 5, 8, 9, 13, 16)
- Múltiples objetivos estratégicos

## 🔄 Próximos Pasos Sugeridos

1. ⭐ Agregar filtros de búsqueda en el listado
2. 📊 Implementar gráficos de alineación estratégica
3. 📑 Crear reportes PDF personalizados
4. 🔔 Notificaciones al crear/modificar alineaciones
5. 📈 Dashboard de métricas de alineación

---

✅ **CRUD completamente funcional y listo para producción**
