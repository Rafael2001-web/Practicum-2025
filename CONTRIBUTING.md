# Guía de Contribución - SIPeIP 2.0

¡Gracias por tu interés en contribuir a SIPeIP 2.0! Esta guía te ayudará a empezar.

## 🤝 Cómo Contribuir

### 1. Fork y Clone

```bash
# Fork el repositorio en GitHub
# Luego clona tu fork
git clone https://github.com/TU_USUARIO/Practicum-2025.git
cd Practicum-2025

# Agrega el repositorio original como upstream
git remote add upstream https://github.com/Rafael2001-web/Practicum-2025.git
```

### 2. Configura el Entorno de Desarrollo

Sigue las instrucciones en el [README.md](README.md) para configurar tu entorno local.

### 3. Crea una Rama para tu Feature

```bash
git checkout -b feature/nombre-descriptivo
# o para corrección de bugs
git checkout -b fix/descripcion-del-bug
```

### 4. Realiza tus Cambios

- Escribe código limpio y siguiendo las convenciones de Laravel
- Agrega comentarios cuando sea necesario
- Asegúrate de que tu código siga el estilo PSR-12
- Actualiza la documentación si es necesario

### 5. Testing

Antes de hacer commit, asegúrate de:

```bash
# Ejecutar tests (si existen)
php artisan test

# Verificar estilo de código
./vendor/bin/phpcs --standard=PSR12 app/

# Limpiar código
./vendor/bin/phpcbf --standard=PSR12 app/
```

### 6. Commit y Push

```bash
# Agrega tus cambios
git add .

# Commit con mensaje descriptivo
git commit -m "feat: descripción breve del cambio"

# Push a tu fork
git push origin feature/nombre-descriptivo
```

### 7. Crea un Pull Request

1. Ve a tu fork en GitHub
2. Haz clic en "Pull Request"
3. Asegúrate de que la rama base sea `main`
4. Describe tus cambios detalladamente
5. Espera la revisión

## 📝 Convenciones de Commits

Usamos [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` Nueva funcionalidad
- `fix:` Corrección de bug
- `docs:` Cambios en documentación
- `style:` Cambios de formato (no afectan la lógica)
- `refactor:` Refactorización de código
- `test:` Agregar o modificar tests
- `chore:` Tareas de mantenimiento

Ejemplos:
```
feat: agregar exportación Excel para proyectos
fix: corregir cálculo de presupuesto en programas
docs: actualizar guía de instalación
```

## 🏗️ Estructura del Código

### Modelos
- Ubicación: `app/Models/`
- Deben incluir `fillable` o `guarded`
- Definir relaciones claramente
- Usar factories para datos de prueba

### Controladores
- Ubicación: `app/Http/Controllers/`
- Seguir patrón RESTful
- Métodos: index, create, store, show, edit, update, destroy
- Validar datos en FormRequests cuando sea complejo

### Vistas
- Ubicación: `resources/views/`
- Usar Blade components cuando sea posible
- Mantener consistencia con el diseño existente
- Seguir estructura de carpetas por módulo

### Migraciones
- Nombres descriptivos con fecha
- Incluir `up()` y `down()`
- No modificar migraciones ya ejecutadas en producción
- Crear nueva migración para cambios

## 🎨 Estándares de Código

### PHP
- Seguir PSR-12
- Usar type hints
- Documentar con PHPDoc cuando sea necesario
- Evitar código duplicado

### JavaScript
- Usar Alpine.js para interactividad
- Código limpio y comentado
- Evitar jQuery (usar Alpine.js o Vanilla JS)

### CSS
- Usar TailwindCSS
- Evitar estilos inline cuando sea posible
- Usar las clases de color del sistema:
  - `primary`: Color principal
  - `secondary`: Color secundario
  - `accent`: Color de acento
  - `color1`: Color complementario

## 🐛 Reportar Bugs

Para reportar un bug:

1. Verifica que no exista un issue similar
2. Crea un nuevo issue con:
   - Título descriptivo
   - Pasos para reproducir
   - Comportamiento esperado vs actual
   - Screenshots si es relevante
   - Información del entorno (PHP, Laravel, navegador)

## 💡 Sugerir Features

Para sugerir una nueva funcionalidad:

1. Crea un issue con la etiqueta "enhancement"
2. Describe el problema que resuelve
3. Propón una solución
4. Explica casos de uso

## ✅ Checklist antes de PR

- [ ] El código sigue los estándares de estilo
- [ ] He actualizado la documentación relevante
- [ ] He agregado/actualizado tests si es necesario
- [ ] Todos los tests pasan
- [ ] He probado mis cambios localmente
- [ ] El commit sigue las convenciones
- [ ] He actualizado CHANGELOG.md si es un cambio significativo

## 📚 Recursos

- [Documentación de Laravel](https://laravel.com/docs)
- [TailwindCSS](https://tailwindcss.com/docs)
- [Alpine.js](https://alpinejs.dev/)
- [PSR-12](https://www.php-fig.org/psr/psr-12/)

## 🆘 Ayuda

Si necesitas ayuda:
- Revisa la documentación existente
- Busca en issues cerrados
- Crea un issue con la etiqueta "question"
- Contacta al equipo de desarrollo

---

¡Gracias por contribuir a SIPeIP 2.0! 🎉
