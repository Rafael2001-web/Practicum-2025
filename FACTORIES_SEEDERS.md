# SIPeIP 2.0 - Factories y Seeders

## 📋 Descripción

Este sistema incluye factories y seeders completos para todos los modelos del Sistema Integrado de Planificación e Inversión Pública (SIPeIP 2.0).

## 🏭 Factories Disponibles

### 1. EntidadFactory
Genera entidades gubernamentales con:
- Código único
- Nombres realistas de ministerios e instituciones
- Subsectores específicos
- Niveles de gobierno (Nacional, Departamental, Municipal, Distrital)
- Estados y fechas

### 2. UnidadFactory
Crea unidades organizacionales con:
- Macrosectores de desarrollo
- Sectores específicos
- Estados de actividad

### 3. PlanFactory
Genera planes de desarrollo con:
- Códigos únicos
- Nombres realistas de planes
- Presupuestos y fechas de ejecución
- Estados de implementación

### 4. ProyectoFactory
Crea proyectos de inversión pública con:
- Códigos únicos
- Nombres descriptivos por sector
- Descripciones detalladas
- Presupuestos y cronogramas
- Relación con usuarios

### 5. ProgramaFactory
Genera programas gubernamentales con:
- Códigos únicos
- Nombres por área temática
- Objetivos y responsables
- Presupuestos de gran escala

### 6. PndFactory
Crea objetivos del Plan Nacional de Desarrollo con:
- Códigos únicos
- Nombres alineados con ODS
- Metas e indicadores
- Períodos de implementación

### 7. ObjEstrategicoFactory
Genera objetivos estratégicos institucionales con:
- Códigos únicos
- Estrategias específicas
- Metas cuantitativas
- Responsables ministeriales

### 8. OdsFactory
Crea los 17 Objetivos de Desarrollo Sostenible con:
- Numeración oficial (1-17)
- Nombres y descripciones oficiales
- Metas globales e indicadores
- Porcentajes de avance

## 🌱 Seeders Disponibles

1. **AdminUserSeeder** - Usuarios administradores
2. **EntidadSeeder** - 20 entidades gubernamentales
3. **UnidadSeeder** - 20 unidades organizacionales  
4. **OdsSeeder** - Los 17 ODS oficiales
5. **PndSeeder** - 16 objetivos PND
6. **ObjEstrategicoSeeder** - 10 objetivos estratégicos
7. **PlanSeeder** - 15 planes de desarrollo
8. **ProgramaSeeder** - 12 programas gubernamentales
9. **ProyectoSeeder** - Proyectos de inversión pública

## 🚀 Comandos de Uso

### Poblar toda la base de datos:
```bash
php artisan db:seed-all
```

### Poblar con migraciones frescas:
```bash
php artisan db:seed-all --fresh
```

### Seeders individuales:
```bash
php artisan db:seed --class=EntidadSeeder
php artisan db:seed --class=UnidadSeeder
php artisan db:seed --class=OdsSeeder
php artisan db:seed --class=PndSeeder
php artisan db:seed --class=ObjEstrategicoSeeder
php artisan db:seed --class=PlanSeeder
php artisan db:seed --class=ProgramaSeeder
php artisan db:seed --class=ProyectoSeeder
```

### Usar factories en Tinker:
```bash
php artisan tinker

# Crear una entidad
App\Models\Entidad::factory()->create()

# Crear 5 proyectos
App\Models\Proyecto::factory()->count(5)->create()

# Crear un plan específico
App\Models\Plan::factory()->create(['nombre' => 'Plan Especial 2025'])
```

## 📊 Estructura de Datos

### Orden de Dependencias
Los seeders se ejecutan en orden específico para mantener la integridad referencial:

1. Usuarios (base para proyectos)
2. Entidades y Unidades (estructura organizacional)
3. ODS, PND y Objetivos Estratégicos (marcos normativos)
4. Planes, Programas y Proyectos (instrumentos de inversión)

### Datos Realistas
Todos los factories generan datos coherentes con la realidad colombiana:
- Nombres de ministerios e instituciones reales
- Sectores de desarrollo nacional
- Presupuestos acordes a proyectos públicos
- Fechas y períodos de implementación realistas

## 🔧 Personalización

### Modificar cantidades:
Edita los seeders para cambiar las cantidades:

```php
// En UnidadSeeder.php
Unidad::factory()->count(50)->create(); // Cambiar de 20 a 50
```

### Agregar datos específicos:
```php
// En factories, agregar datos específicos
'nombre' => $this->faker->randomElement([
    'Tu nuevo elemento',
    // ... elementos existentes
])
```

### Estados personalizados:
```php
'estado' => $this->faker->randomElement([
    'Tu nuevo estado',
    // ... estados existentes
])
```

## 📝 Notas Importantes

1. **Códigos únicos**: Todos los factories generan códigos únicos para evitar conflictos
2. **Fechas coherentes**: Las fechas de inicio y fin mantienen lógica temporal
3. **Relaciones**: Los factories manejan automáticamente las relaciones entre modelos
4. **Estados realistas**: Los estados reflejan ciclos de vida reales de proyectos públicos
5. **Presupuestos escalados**: Los montos son apropiados para cada tipo de instrumento

¡El sistema está listo para generar datos de prueba realistas para SIPeIP 2.0! 🎉