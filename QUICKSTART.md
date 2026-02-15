# Guía Rápida - SIPeIP 2.0

Comandos y referencias rápidas para trabajar con el Sistema Integrado de Planificación e Inversión Pública.

## 🚀 Inicio Rápido

### Instalación en 5 pasos
```bash
# 1. Instalar dependencias
composer install && npm install

# 2. Configurar entorno
cp .env.example .env && php artisan key:generate

# 3. Configurar base de datos (editar .env primero)
php artisan migrate

# 4. Poblar con datos de prueba (opcional)
php artisan db:seed

# 5. Iniciar servidor
php artisan serve
```

## 📊 Comandos de Base de Datos

### Migraciones
```bash
# Ejecutar migraciones
php artisan migrate

# Revertir última migración
php artisan migrate:rollback

# Resetear y ejecutar todas
php artisan migrate:fresh

# Con seeders
php artisan migrate:fresh --seed
```

### Seeders
```bash
# Ejecutar todos los seeders
php artisan db:seed

# Seeder específico
php artisan db:seed --class=EntidadSeeder
php artisan db:seed --class=ProyectoSeeder
php artisan db:seed --class=ProgramaSeeder
```

Ver [FACTORIES_SEEDERS.md](FACTORIES_SEEDERS.md) para más detalles.

## 🏭 Factories en Tinker

```bash
php artisan tinker
```

### Crear registros
```php
// Una entidad
App\Models\Entidad::factory()->create()

// 10 proyectos
App\Models\Proyecto::factory()->count(10)->create()

// Programa específico
App\Models\Programa::factory()->create([
    'nombre' => 'Programa Especial 2025'
])
```

## 🎨 Frontend

### Desarrollo
```bash
# Modo desarrollo (con hot reload)
npm run dev

# Compilar para producción
npm run build
```

### TailwindCSS
Clases personalizadas del sistema:
- `bg-primary` - Color principal
- `bg-secondary` - Color secundario  
- `bg-accent` - Color de acento
- `bg-color1` - Color complementario
- `text-neutral` - Texto neutral

## 🔐 Usuarios y Autenticación

### Crear usuario admin desde Tinker
```php
php artisan tinker

App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
])
```

### Roles disponibles
- `admin` - Acceso completo
- `user` - Acceso limitado

## 📁 Estructura de Rutas

### Públicas
- `/` - Landing page
- `/login` - Iniciar sesión
- `/register` - Registro

### Admin (requiere autenticación)
```
/dashboard              # Panel principal
/entidades              # CRUD Entidades
/unidades               # CRUD Unidades
/planes                 # CRUD Planes
/programas              # CRUD Programas
/proyectos              # CRUD Proyectos
/objEstrategicos        # CRUD Objetivos Estratégicos
/ods                    # CRUD ODS
/pnd                    # CRUD PND
```

### Operaciones CRUD
Cada módulo soporta:
- `GET /modulo` - Listar todos
- `GET /modulo/create` - Formulario crear
- `POST /modulo` - Guardar nuevo
- `GET /modulo/{id}` - Ver detalle
- `GET /modulo/{id}/edit` - Formulario editar
- `PUT/PATCH /modulo/{id}` - Actualizar
- `DELETE /modulo/{id}` - Eliminar
- `GET /modulo/pdf` - Exportar PDF

## 🔧 Artisan Útiles

### Cache
```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimizar para producción
php artisan optimize
```

### Desarrollo
```bash
# Listar rutas
php artisan route:list

# Crear controlador
php artisan make:controller NombreController

# Crear modelo con migración y factory
php artisan make:model Nombre -mf

# Crear seeder
php artisan make:seeder NombreSeeder
```

## 📄 Generación de PDFs

Todos los módulos principales tienen exportación PDF:

```php
// En controladores
use Barryvdh\DomPDF\Facade\Pdf;

public function generarPdf()
{
    $datos = Modelo::all();
    $pdf = Pdf::loadView('modulo.pdf', compact('datos'));
    return $pdf->download('archivo.pdf');
}
```

## 🐛 Debugging

### Logs
```bash
# Ver logs en tiempo real
tail -f storage/logs/laravel.log
```

### En código
```php
// Debugging rápido
dd($variable);           // Dump and die
dump($variable);         // Dump y continuar
logger()->info($data);   // Log a archivo
```

### Query debugging
```php
// Ver queries SQL
DB::enableQueryLog();
// ... ejecutar queries
dd(DB::getQueryLog());
```

## 📦 Modelos Principales

### Entidad
```php
Entidad::create([
    'codigo' => 'ENT-001',
    'nombre' => 'Ministerio de Educación',
    'subsector' => 'Educación',
    'nivel' => 'Nacional',
    'estado' => 'Activo'
])
```

### Proyecto
```php
Proyecto::create([
    'codigo' => 'PROY-001',
    'nombre' => 'Construcción Escuela',
    'descripcion' => '...',
    'sector' => 'Educación',
    'fecha_inicio' => now(),
    'fecha_fin' => now()->addYear(),
    'presupuesto' => 1000000,
    'estado' => 'En Ejecución',
    'user_id' => 1
])
```

### Programa
```php
Programa::create([
    'codigo' => 'PROG-001',
    'nombre' => 'Programa de Salud',
    'objetivo' => '...',
    'responsable' => 'Ministerio de Salud',
    'presupuesto' => 5000000
])
```

## ⚡ Atajos de Desarrollo

### Git
```bash
# Estado rápido
git status -sb

# Commit rápido
git add . && git commit -m "mensaje"

# Ver cambios
git diff --stat
```

### Composer
```bash
# Actualizar dependencias
composer update

# Instalar sin dev
composer install --no-dev

# Autoload dump
composer dump-autoload
```

## 🔍 Troubleshooting

### Problema: Error de permisos
```bash
chmod -R 775 storage bootstrap/cache
```

### Problema: .env no encontrado
```bash
cp .env.example .env
php artisan key:generate
```

### Problema: Assets no se cargan
```bash
npm run build
php artisan storage:link
```

### Problema: Migraciones fallan
```bash
php artisan migrate:fresh
# O revisar .env para credenciales de DB
```

## 📚 Recursos Rápidos

- **Documentación completa**: [README.md](README.md)
- **Factories y Seeders**: [FACTORIES_SEEDERS.md](FACTORIES_SEEDERS.md)
- **Contribuir**: [CONTRIBUTING.md](CONTRIBUTING.md)
- **Laravel Docs**: https://laravel.com/docs
- **TailwindCSS**: https://tailwindcss.com/docs

---

💡 **Tip**: Guarda este archivo como referencia rápida durante el desarrollo.
