# 🚀 **SCRIPT DE EJECUCIÓN DE MIGRACIONES**

## 📋 **PASOS PARA EJECUTAR LAS MIGRACIONES**

### 🔧 **PASO 1: Iniciar servicios necesarios**

1. **Abrir XAMPP Control Panel**
2. **Iniciar Apache** (si no está iniciado)
3. **Iniciar MySQL** 
4. **Verificar que la base de datos `proyecto2025` existe**

### 🔧 **PASO 2: Verificar estado actual**

```bash
# Cambiar al directorio del proyecto
cd C:\xampp\htdocs\laravel\Practicum-2025

# Verificar estado de migraciones
php artisan migrate:status
```

### 🔧 **PASO 3: Ejecutar migraciones EN ORDEN**

⚠️ **IMPORTANTE**: Ejecutar las migraciones en este orden específico para evitar errores de dependencias:

```bash
# 1. Primero: Corregir relación Plan-Entidad
php artisan migrate --path=database/migrations/2025_10_25_182648_fix_plan_entidad_relation.php

# 2. Segundo: Agregar relaciones de jerarquía organizacional  
php artisan migrate --path=database/migrations/2025_10_25_182851_add_organizational_hierarchy_relations.php

# 3. Tercero: Crear tablas pivot para alineación estratégica
php artisan migrate --path=database/migrations/2025_10_25_182906_create_strategic_alignment_tables.php
```

### 🔧 **PASO 4: Verificar que todo se ejecutó correctamente**

```bash
# Verificar estado final
php artisan migrate:status

# Ver estructura de la base de datos
php artisan tinker
```

En Tinker, puedes probar:
```php
// Verificar que las relaciones funcionan
\App\Models\Plan::with('entidad')->first()
\App\Models\Entidad::with('programas')->first()
\App\Models\Programa::with(['entidad', 'plan'])->first()
```

### 🔧 **PASO 5: Poblar datos de prueba (Opcional)**

Si quieres probar las relaciones, puedes ejecutar:

```bash
# Ejecutar seeders existentes
php artisan db:seed
```

---

## 📊 **ESTRUCTURA FINAL ESPERADA**

### ✅ **NUEVAS TABLAS CREADAS:**
- `plan_ods`
- `plan_objetivos_estrategicos` 
- `plan_pnd`
- `proyecto_ods`

### ✅ **CAMPOS AGREGADOS:**
- `entidad.idUnidad` (FK → unidad.idUnidad)
- `plan.idEntidad` (FK → entidad.idEntidad) [reemplaza campo `entidad`]
- `programa.idPlan` (FK → plan.idPlan)
- `proyectos.idPrograma` (FK → programa.idPrograma)

### ✅ **RELACIONES FUNCIONALES:**
- **Jerarquía**: Unidad → Entidad → Plan → Programa → Proyecto
- **Alineación**: Plan ↔ ODS, Plan ↔ PND, Plan ↔ Obj.Estratégicos
- **Impacto**: Proyecto ↔ ODS

---

## 🆘 **SI HAY ERRORES**

### ❌ **Error: "Cannot add foreign key constraint"**
**Solución**: Verificar que existan datos compatibles antes de la migración.

```bash
# Ejecutar en MySQL directamente para limpiar datos incompatibles
# Solo si es necesario y tienes backup de datos
```

### ❌ **Error: "Table 'plan' doesn't have column 'entidad'"**
**Solución**: La primera migración ya se ejecutó correctamente.

### ❌ **Error de conexión a MySQL**
**Solución**: 
1. Iniciar MySQL en XAMPP
2. Verificar configuración en `.env`
3. Probar conexión: `php artisan migrate:status`

---

## 📝 **NOTAS IMPORTANTES**

1. **⚠️ Hacer backup** de la base de datos antes de ejecutar las migraciones
2. **🔄 Ejecutar en orden** - cada migración depende de la anterior
3. **✅ Verificar datos** - las FK requieren datos consistentes
4. **🧪 Probar relaciones** después de cada migración

---

## 🎯 **RESULTADO ESPERADO**

Después de ejecutar todas las migraciones tendrás:

- ✅ **Base de datos completamente relacionada**
- ✅ **Integridad referencial garantizada**  
- ✅ **Jerarquía organizacional funcional**
- ✅ **Alineación estratégica implementada**
- ✅ **Modelos Eloquent con todas las relaciones**

**🚀 ¡Tu sistema estará listo para manejar la planificación institucional de manera integral!**