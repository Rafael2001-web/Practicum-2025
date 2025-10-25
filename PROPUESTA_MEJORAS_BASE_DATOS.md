# 🔧 **PROPUESTA DE MEJORAS PARA LA BASE DE DATOS**

## 📊 **ANÁLISIS DE LA ESTRUCTURA ACTUAL**

### ❌ **PROBLEMAS IDENTIFICADOS**

1. **Tablas desconectadas**: Muchas tablas importantes no tienen relaciones entre sí
2. **Falta de integridad referencial**: Los datos pueden ser inconsistentes
3. **Redundancia de información**: Campo `entidad` en `plan` debería ser una FK
4. **Relaciones perdidas**: No hay vínculos entre planes, programas, proyectos y objetivos
5. **Falta de trazabilidad**: No se puede seguir la cadena de planificación completa

---

## 🎯 **RELACIONES FUNDAMENTALES QUE FALTAN**

### 🔗 **RELACIONES CRÍTICAS A IMPLEMENTAR**

#### 1. **PLAN ↔ ENTIDAD** (N:1)
```sql
-- Cambiar campo 'entidad' de TEXT a FK
ALTER TABLE plan DROP COLUMN entidad;
ALTER TABLE plan ADD COLUMN idEntidad BIGINT NOT NULL;
ALTER TABLE plan ADD FOREIGN KEY (idEntidad) REFERENCES entidad(idEntidad);
```
**Justificación**: Un plan debe pertenecer a una entidad específica para trazabilidad.

#### 2. **PROGRAMA ↔ PLAN** (N:1)
```sql
-- Los programas deben estar vinculados a planes específicos
ALTER TABLE programa ADD COLUMN idPlan BIGINT;
ALTER TABLE programa ADD FOREIGN KEY (idPlan) REFERENCES plan(idPlan);
```
**Justificación**: Los programas ejecutan los planes institucionales.

#### 3. **PROYECTO ↔ PROGRAMA** (N:1)
```sql
-- Los proyectos deben pertenecer a programas
ALTER TABLE proyectos ADD COLUMN idPrograma BIGINT;
ALTER TABLE proyectos ADD FOREIGN KEY (idPrograma) REFERENCES programa(idPrograma);
```
**Justificación**: Los proyectos son la ejecución específica de los programas.

#### 4. **PLAN ↔ ODS** (N:M) - Tabla Pivot
```sql
-- Crear tabla pivot para relacionar planes con ODS
CREATE TABLE plan_ods (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    idPlan BIGINT NOT NULL,
    idOds BIGINT NOT NULL,
    porcentaje_contribucion DECIMAL(5,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan) ON DELETE CASCADE,
    FOREIGN KEY (idOds) REFERENCES ods(idOds) ON DELETE CASCADE,
    UNIQUE KEY unique_plan_ods (idPlan, idOds)
);
```

#### 5. **PLAN ↔ OBJETIVOS ESTRATÉGICOS** (N:M) - Tabla Pivot
```sql
-- Crear tabla pivot para relacionar planes con objetivos estratégicos
CREATE TABLE plan_objetivos_estrategicos (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    idPlan BIGINT NOT NULL,
    idobjEstrategico BIGINT NOT NULL,
    prioridad ENUM('alta', 'media', 'baja') DEFAULT 'media',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan) ON DELETE CASCADE,
    FOREIGN KEY (idobjEstrategico) REFERENCES objEstrategicos(idobjEstrategico) ON DELETE CASCADE,
    UNIQUE KEY unique_plan_objetivo (idPlan, idobjEstrategico)
);
```

#### 6. **PLAN ↔ PND** (N:M) - Tabla Pivot
```sql
-- Crear tabla pivot para alinear planes con PND
CREATE TABLE plan_pnd (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    idPlan BIGINT NOT NULL,
    idPnd BIGINT NOT NULL,
    nivel_alineacion ENUM('total', 'parcial', 'indirecta') DEFAULT 'parcial',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan) ON DELETE CASCADE,
    FOREIGN KEY (idPnd) REFERENCES pnd(idPnd) ON DELETE CASCADE,
    UNIQUE KEY unique_plan_pnd (idPlan, idPnd)
);
```

#### 7. **PROYECTO ↔ ODS** (N:M) - Tabla Pivot
```sql
-- Relacionar proyectos directamente con ODS
CREATE TABLE proyecto_ods (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    proyecto_id BIGINT NOT NULL,
    idOds BIGINT NOT NULL,
    impacto_esperado TEXT,
    indicadores TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id) ON DELETE CASCADE,
    FOREIGN KEY (idOds) REFERENCES ods(idOds) ON DELETE CASCADE,
    UNIQUE KEY unique_proyecto_ods (proyecto_id, idOds)
);
```

#### 8. **ENTIDAD ↔ UNIDAD** (N:1)
```sql
-- Las entidades deben pertenecer a unidades organizacionales
ALTER TABLE entidad ADD COLUMN idUnidad BIGINT;
ALTER TABLE entidad ADD FOREIGN KEY (idUnidad) REFERENCES unidad(idUnidad);
```

---

## 🏗️ **NUEVA ARQUITECTURA PROPUESTA**

### 📊 **JERARQUÍA ORGANIZACIONAL**
```
UNIDAD (Macrosector/Sector)
    ↓
ENTIDAD (Organismo específico)
    ↓
PLAN (Planificación institucional)
    ↓
PROGRAMA (Líneas de acción)
    ↓
PROYECTO (Iniciativas específicas)
```

### 🌐 **ALINEACIÓN ESTRATÉGICA**
```
PND (Plan Nacional) ←→ PLAN ←→ ODS (Objetivos Globales)
                         ↓
              OBJETIVOS ESTRATÉGICOS
                         ↓
                    PROGRAMAS
                         ↓
                    PROYECTOS
```

---

## 📝 **MIGRACIONES RECOMENDADAS**

### 🔧 **MIGRACIÓN 1: Corregir relación Plan-Entidad**
```php
<?php
// database/migrations/xxxx_xx_xx_fix_plan_entidad_relation.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plan', function (Blueprint $table) {
            // Cambiar campo entidad de TEXT a FK
            $table->dropColumn('entidad');
            $table->unsignedBigInteger('idEntidad')->after('nombre');
            $table->foreign('idEntidad')->references('idEntidad')->on('entidad')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('plan', function (Blueprint $table) {
            $table->dropForeign(['idEntidad']);
            $table->dropColumn('idEntidad');
            $table->text('entidad')->after('nombre');
        });
    }
};
```

### 🔧 **MIGRACIÓN 2: Agregar relaciones de jerarquía**
```php
<?php
// database/migrations/xxxx_xx_xx_add_hierarchy_relations.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Entidad -> Unidad
        Schema::table('entidad', function (Blueprint $table) {
            $table->unsignedBigInteger('idUnidad')->nullable()->after('idEntidad');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidad')->onDelete('set null');
        });

        // Programa -> Plan
        Schema::table('programa', function (Blueprint $table) {
            $table->unsignedBigInteger('idPlan')->nullable()->after('idEntidad');
            $table->foreign('idPlan')->references('idPlan')->on('plan')->onDelete('cascade');
        });

        // Proyecto -> Programa
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('idPrograma')->nullable()->after('user_id');
            $table->foreign('idPrograma')->references('idPrograma')->on('programa')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign(['idPrograma']);
            $table->dropColumn('idPrograma');
        });

        Schema::table('programa', function (Blueprint $table) {
            $table->dropForeign(['idPlan']);
            $table->dropColumn('idPlan');
        });

        Schema::table('entidad', function (Blueprint $table) {
            $table->dropForeign(['idUnidad']);
            $table->dropColumn('idUnidad');
        });
    }
};
```

### 🔧 **MIGRACIÓN 3: Crear tablas pivot para alineación estratégica**
```php
<?php
// database/migrations/xxxx_xx_xx_create_strategic_alignment_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Plan - ODS
        Schema::create('plan_ods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPlan');
            $table->unsignedBigInteger('idOds');
            $table->decimal('porcentaje_contribucion', 5, 2)->default(0);
            $table->timestamps();
            
            $table->foreign('idPlan')->references('idPlan')->on('plan')->onDelete('cascade');
            $table->foreign('idOds')->references('idOds')->on('ods')->onDelete('cascade');
            $table->unique(['idPlan', 'idOds']);
        });

        // Plan - Objetivos Estratégicos
        Schema::create('plan_objetivos_estrategicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPlan');
            $table->unsignedBigInteger('idobjEstrategico');
            $table->enum('prioridad', ['alta', 'media', 'baja'])->default('media');
            $table->timestamps();
            
            $table->foreign('idPlan')->references('idPlan')->on('plan')->onDelete('cascade');
            $table->foreign('idobjEstrategico')->references('idobjEstrategico')->on('objEstrategicos')->onDelete('cascade');
            $table->unique(['idPlan', 'idobjEstrategico']);
        });

        // Plan - PND
        Schema::create('plan_pnd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPlan');
            $table->unsignedBigInteger('idPnd');
            $table->enum('nivel_alineacion', ['total', 'parcial', 'indirecta'])->default('parcial');
            $table->timestamps();
            
            $table->foreign('idPlan')->references('idPlan')->on('plan')->onDelete('cascade');
            $table->foreign('idPnd')->references('idPnd')->on('pnd')->onDelete('cascade');
            $table->unique(['idPlan', 'idPnd']);
        });

        // Proyecto - ODS
        Schema::create('proyecto_ods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('idOds');
            $table->text('impacto_esperado')->nullable();
            $table->text('indicadores')->nullable();
            $table->timestamps();
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('idOds')->references('idOds')->on('ods')->onDelete('cascade');
            $table->unique(['proyecto_id', 'idOds']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyecto_ods');
        Schema::dropIfExists('plan_pnd');
        Schema::dropIfExists('plan_objetivos_estrategicos');
        Schema::dropIfExists('plan_ods');
    }
};
```

---

## 🚀 **ACTUALIZAR MODELOS ELOQUENT**

### 📝 **Modelo Plan actualizado**
```php
<?php
// app/Models/Plan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plan extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPlan';
    public $timestamps = false;
    protected $table = 'plan';

    protected $fillable = [
        'codigo',
        'nombre',
        'idEntidad',
        'presupuesto',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    protected static function booted()
    {
        static::creating(function ($plan) {
            if (empty($plan->codigo)) {
                do {
                    $codigo = 'PLN-' . strtoupper(Str::random(5));
                } while (self::where('codigo', $codigo)->exists());

                $plan->codigo = $codigo;
            }
        });
    }

    // RELACIONES
    public function entidad()
    {
        return $this->belongsTo(Entidad::class, 'idEntidad', 'idEntidad');
    }

    public function programas()
    {
        return $this->hasMany(Programa::class, 'idPlan', 'idPlan');
    }

    public function ods()
    {
        return $this->belongsToMany(Ods::class, 'plan_ods', 'idPlan', 'idOds')
                    ->withPivot('porcentaje_contribucion')
                    ->withTimestamps();
    }

    public function objetivosEstrategicos()
    {
        return $this->belongsToMany(objEstrategico::class, 'plan_objetivos_estrategicos', 'idPlan', 'idobjEstrategico')
                    ->withPivot('prioridad')
                    ->withTimestamps();
    }

    public function pnd()
    {
        return $this->belongsToMany(Pnd::class, 'plan_pnd', 'idPlan', 'idPnd')
                    ->withPivot('nivel_alineacion')
                    ->withTimestamps();
    }
}
```

### 📝 **Modelo Programa actualizado**
```php
<?php
// app/Models/Programa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programa extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPrograma';
    protected $table = 'programa';

    protected $fillable = [
        'idEntidad',
        'idPlan',
        'nombre',
        'descripcion',
    ];

    // RELACIONES
    public function entidad(): BelongsTo
    {
        return $this->belongsTo(Entidad::class, 'idEntidad', 'idEntidad');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'idPlan', 'idPlan');
    }

    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'idPrograma', 'idPrograma');
    }
}
```

### 📝 **Modelo Proyecto actualizado**
```php
<?php
// app/Models/Proyecto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'sector',
        'fecha_inicio',
        'fecha_fin',
        'presupuesto',
        'estado',
        'user_id',
        'idPrograma'
    ];

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    // RELACIONES
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma', 'idPrograma');
    }

    public function ods()
    {
        return $this->belongsToMany(Ods::class, 'proyecto_ods', 'proyecto_id', 'idOds')
                    ->withPivot('impacto_esperado', 'indicadores')
                    ->withTimestamps();
    }

    // RELACIONES CALCULADAS
    public function entidad()
    {
        return $this->hasOneThrough(
            Entidad::class,
            Programa::class,
            'idPrograma',
            'idEntidad',
            'idPrograma',
            'idEntidad'
        );
    }

    public function plan()
    {
        return $this->hasOneThrough(
            Plan::class,
            Programa::class,
            'idPrograma',
            'idPlan',
            'idPrograma',
            'idPlan'
        );
    }
}
```

### 📝 **Modelo Entidad actualizado**
```php
<?php
// app/Models/Entidad.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEntidad';
    public $timestamps = false;
    protected $table = 'entidad';

    protected $fillable = [
        'codigo',
        'subSector',
        'nivelGobierno',
        'estado',
        'fechaCreacion',
        'fechaActualizacion',
        'idUnidad'
    ];

    // RELACIONES
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function programas(): HasMany
    {
        return $this->hasMany(Programa::class, 'idEntidad', 'idEntidad');
    }

    public function planes(): HasMany
    {
        return $this->hasMany(Plan::class, 'idEntidad', 'idEntidad');
    }
}
```

---

## 📊 **BENEFICIOS DE LA NUEVA ESTRUCTURA**

### ✅ **INTEGRIDAD REFERENCIAL**
- ✅ **Consistencia de datos**: No se pueden crear datos huérfanos
- ✅ **Cascadas configuradas**: Eliminación controlada de registros relacionados
- ✅ **Validaciones automáticas**: La BD evita datos inconsistentes

### ✅ **TRAZABILIDAD COMPLETA**
- ✅ **Jerarquía clara**: Unidad → Entidad → Plan → Programa → Proyecto
- ✅ **Alineación estratégica**: Vínculos con PND, ODS, y Objetivos Estratégicos
- ✅ **Seguimiento**: Desde la planificación hasta la ejecución

### ✅ **FUNCIONALIDADES MEJORADAS**
- ✅ **Consultas eficientes**: Joins optimizados entre tablas relacionadas
- ✅ **Reportes consolidados**: Información agregada por jerarquía
- ✅ **Validaciones de negocio**: Reglas automáticas en la BD

### ✅ **ESCALABILIDAD**
- ✅ **Estructura extensible**: Fácil agregar nuevas relaciones
- ✅ **Performance optimizada**: Índices en claves foráneas
- ✅ **Mantenimiento simplificado**: Estructura lógica y organizada

---

## 🎯 **PRÓXIMOS PASOS RECOMENDADOS**

1. **🔧 Ejecutar migraciones** en orden secuencial
2. **📝 Actualizar modelos Eloquent** con las nuevas relaciones
3. **🧪 Crear seeders** para datos de prueba con las nuevas relaciones
4. **🎛️ Actualizar controladores** para usar las nuevas relaciones
5. **🎨 Modificar vistas** para mostrar la información relacionada
6. **✅ Crear tests** para validar la integridad de las relaciones

---

**🚀 RESULTADO ESPERADO: BASE DE DATOS COMPLETAMENTE INTEGRADA Y FUNCIONAL**

*Con estas mejoras, tendrás un sistema robusto que mantiene la trazabilidad completa desde la planificación estratégica hasta la ejecución de proyectos específicos, con alineación total a objetivos nacionales e internacionales.*