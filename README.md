# SIPeIP 2.0 - Sistema Integrado de Planificación e Inversión Pública

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
</p>

## 📋 ¿Qué es SIPeIP 2.0?

**SIPeIP 2.0** (Sistema Integrado de Planificación e Inversión Pública) es una plataforma web integral desarrollada con Laravel para la gestión eficiente de la planificación e inversión pública del Estado. El sistema facilita la administración de proyectos, programas y objetivos estratégicos gubernamentales.

## ✨ ¿Qué puedes hacer en este repositorio?

### 🎯 Funcionalidades Principales

#### 1. **Gestión Institucional**
- **Entidades Gubernamentales**: Administrar ministerios, secretarías e instituciones del Estado
  - Crear, editar, visualizar y eliminar entidades
  - Generar reportes en PDF
  - Gestionar códigos únicos, subsectores y niveles de gobierno
  
- **Unidades Organizacionales**: Gestionar unidades administrativas
  - Macrosectores y sectores de desarrollo
  - Estados de actividad
  - Exportación a PDF

#### 2. **Planificación Estratégica**
- **Planes de Desarrollo**: Administrar planes gubernamentales
  - Planes nacionales, departamentales y municipales
  - Presupuestos y períodos de ejecución
  - Control de estados de implementación
  
- **Objetivos Estratégicos**: Definir y monitorear objetivos institucionales
  - Estrategias y metas cuantitativas
  - Asignación de responsables
  - Reportes detallados

- **ODS (Objetivos de Desarrollo Sostenible)**: Gestionar los 17 ODS
  - Numeración oficial de la ONU
  - Metas e indicadores globales
  - Seguimiento de avances

- **PND (Plan Nacional de Desarrollo)**: Administrar objetivos del PND
  - Ejes estratégicos
  - Objetivos y descripciones
  - Alineación con políticas públicas

#### 3. **Inversión Pública**
- **Proyectos de Inversión**: Gestionar proyectos públicos
  - Códigos y sectores específicos
  - Cronogramas (fecha inicio/fin)
  - Presupuestos y estados de ejecución
  - Asignación a usuarios responsables

- **Programas Gubernamentales**: Administrar programas de gran escala
  - Objetivos y áreas temáticas
  - Presupuestos millonarios
  - Responsables institucionales

### 🔐 Sistema de Autenticación

- **Registro de usuarios**
- **Inicio de sesión**
- **Roles de usuario**:
  - `admin`: Acceso completo a todos los módulos
  - `user`: Acceso limitado según permisos
- **Recuperación de contraseñas**
- **Gestión de perfil**

### 📊 Generación de Reportes

Todos los módulos principales incluyen:
- Exportación a PDF de listados y detalles
- Reportes personalizables por entidad
- Visualización optimizada para impresión

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP >= 8.1
- Composer
- Node.js y NPM
- MySQL/MariaDB o PostgreSQL
- Extensiones PHP: PDO, Mbstring, OpenSSL, JSON, Tokenizer

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/Rafael2001-web/Practicum-2025.git
   cd Practicum-2025
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar el archivo de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar la base de datos en `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sipeip
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

6. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

7. **Poblar la base de datos con datos de prueba** (opcional)
   ```bash
   php artisan db:seed
   # O para datos más completos, ver FACTORIES_SEEDERS.md
   ```

8. **Compilar assets frontend**
   ```bash
   npm run dev
   # O para producción:
   npm run build
   ```

9. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

10. **Acceder a la aplicación**
    - Abrir navegador en: `http://localhost:8000`

## 📚 Documentación Adicional

- **[QUICKSTART.md](QUICKSTART.md)**: Guía rápida con comandos y referencias útiles
- **[FACTORIES_SEEDERS.md](FACTORIES_SEEDERS.md)**: Guía completa sobre factories y seeders para generar datos de prueba realistas
- **[CONTRIBUTING.md](CONTRIBUTING.md)**: Guía para contribuir al proyecto

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 10.x**: Framework PHP principal
- **Laravel Breeze**: Sistema de autenticación
- **Laravel Sanctum**: Autenticación API
- **DomPDF**: Generación de reportes PDF
- **AdminLTE**: Panel administrativo

### Frontend
- **TailwindCSS**: Framework CSS
- **Alpine.js**: Interactividad JavaScript
- **Vite**: Build tool
- **Blade**: Motor de plantillas

### Base de Datos
- Migraciones y seeders incluidos
- Factories para datos de prueba
- Soporte para MySQL/PostgreSQL

## 📁 Estructura del Proyecto

```
Practicum-2025/
├── app/
│   ├── Http/Controllers/     # Controladores
│   │   ├── EntidadController.php
│   │   ├── ProyectoController.php
│   │   ├── ProgramaController.php
│   │   └── ...
│   └── Models/               # Modelos Eloquent
│       ├── Entidad.php
│       ├── Proyecto.php
│       ├── Programa.php
│       └── ...
├── database/
│   ├── factories/            # Factories para datos de prueba
│   ├── migrations/           # Migraciones de base de datos
│   └── seeders/              # Seeders
├── resources/
│   └── views/                # Vistas Blade
│       ├── dashboard.blade.php
│       ├── welcome.blade.php
│       └── ...
└── routes/
    └── web.php               # Rutas web
```

## 🔗 Rutas Principales

### Públicas
- `/` - Página de bienvenida
- `/login` - Inicio de sesión
- `/register` - Registro de usuarios

### Autenticadas
- `/dashboard` - Panel de control principal
- `/entidades` - Gestión de entidades
- `/unidades` - Gestión de unidades
- `/planes` - Planes de desarrollo
- `/programas` - Programas gubernamentales
- `/proyectos` - Proyectos de inversión
- `/objEstrategicos` - Objetivos estratégicos
- `/ods` - Objetivos de Desarrollo Sostenible
- `/pnd` - Plan Nacional de Desarrollo

Cada ruta soporta operaciones CRUD completas (crear, leer, actualizar, eliminar).

## 👥 Contribuir

Si deseas contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto es de código abierto y está disponible bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

## 🤝 Soporte

Para preguntas, problemas o sugerencias:
- Abre un issue en GitHub
- Contacta al equipo de desarrollo

---

**Desarrollado con ❤️ para mejorar la gestión de inversión pública**
