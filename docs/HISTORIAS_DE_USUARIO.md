# 📋 HISTORIAS DE USUARIO - SISTEMA DE GESTIÓN PRACTICUM 2025

## 🔐 MÓDULO DE AUTENTICACIÓN Y AUTORIZACIÓN

### HU-001: Registro de Usuario
**Como** visitante del sistema  
**Quiero** poder registrarme con mis datos personales  
**Para** acceder al sistema con mi cuenta personal  

**Criterios de Aceptación:**
- El usuario puede acceder al formulario de registro
- Debe proporcionar: nombre, email y contraseña
- El email debe ser único en el sistema
- La contraseña debe cumplir requisitos de seguridad
- Recibe confirmación de registro exitoso
- Es redirigido al dashboard tras el registro

### HU-002: Inicio de Sesión
**Como** usuario registrado  
**Quiero** iniciar sesión con mis credenciales  
**Para** acceder a las funcionalidades del sistema según mi rol  

**Criterios de Aceptación:**
- El usuario puede acceder al formulario de login
- Debe proporcionar email y contraseña válidos
- El sistema valida las credenciales
- Es redirigido al dashboard si las credenciales son correctas
- Recibe mensaje de error si las credenciales son incorrectas

### HU-003: Cierre de Sesión
**Como** usuario autenticado  
**Quiero** cerrar mi sesión de forma segura  
**Para** proteger mi cuenta cuando termine de usar el sistema  

**Criterios de Aceptación:**
- El usuario puede cerrar sesión desde cualquier página
- La sesión se cierra completamente
- Es redirigido a la página de login
- No puede acceder a páginas protegidas sin volver a autenticarse

## 👑 MÓDULO DE ADMINISTRACIÓN DEL SISTEMA

### HU-004: Gestión de Usuarios (Administrador)
**Como** Administrador del Sistema  
**Quiero** gestionar todos los usuarios del sistema  
**Para** mantener control sobre quién tiene acceso y sus permisos  

**Criterios de Aceptación:**
- Puede ver listado completo de usuarios
- Puede crear nuevos usuarios
- Puede editar información de usuarios existentes
- Puede eliminar usuarios
- Puede ver detalles completos de cada usuario
- Puede asignar roles a los usuarios

### HU-005: Gestión de Roles (Administrador)
**Como** Administrador del Sistema  
**Quiero** crear y gestionar roles del sistema  
**Para** organizar los permisos según las responsabilidades laborales  

**Criterios de Aceptación:**
- Puede ver listado de todos los roles
- Puede crear nuevos roles con nombre y descripción
- Puede editar roles existentes
- Puede eliminar roles no utilizados
- Puede ver detalles de cada rol
- Puede asignar permisos específicos a cada rol

### HU-006: Gestión de Permisos (Administrador)
**Como** Administrador del Sistema  
**Quiero** gestionar los permisos individuales  
**Para** tener control granular sobre las acciones permitidas  

**Criterios de Aceptación:**
- Puede ver listado completo de permisos
- Puede crear nuevos permisos específicos
- Puede editar permisos existentes
- Puede eliminar permisos obsoletos
- Puede ver detalles de cada permiso

## 🏢 MÓDULO DE GESTIÓN DE ENTIDADES

### HU-007: Visualización de Entidades
**Como** usuario con permisos de visualización de entidades  
**Quiero** ver el listado de entidades del sistema  
**Para** consultar información sobre las organizaciones registradas  

**Criterios de Aceptación:**
- Puede acceder al listado de entidades
- Ve información: código, subsector, nivel gobierno, estado, fechas
- Puede ver detalles individuales de cada entidad
- La información se muestra de forma clara y organizada

### HU-008: Gestión Completa de Entidades (Gestor)
**Como** Gestor de Entidades  
**Quiero** realizar operaciones CRUD completas sobre entidades  
**Para** mantener actualizada la información organizacional  

**Criterios de Aceptación:**
- Puede crear nuevas entidades con todos los campos requeridos
- Puede editar entidades existentes
- Puede eliminar entidades cuando sea necesario
- Las validaciones evitan datos duplicados o incorrectos
- Recibe confirmaciones de operaciones exitosas

### HU-009: Generación de Reportes de Entidades
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes en PDF de entidades  
**Para** obtener documentos imprimibles con la información  

**Criterios de Aceptación:**
- Puede acceder al botón de generar PDF
- El PDF se genera con formato profesional
- Contiene toda la información relevante de las entidades
- Se descarga automáticamente al navegador

## 🏗️ MÓDULO DE GESTIÓN DE UNIDADES

### HU-010: Visualización de Unidades
**Como** usuario con permisos de visualización de unidades  
**Quiero** ver el listado de unidades organizacionales  
**Para** consultar la estructura interna de las entidades  

**Criterios de Aceptación:**
- Puede acceder al listado de unidades
- Ve información completa de cada unidad
- Puede ver detalles individuales
- La información se presenta de forma estructurada

### HU-011: Gestión Completa de Unidades (Coordinador)
**Como** Coordinador de Unidades  
**Quiero** gestionar completamente las unidades organizacionales  
**Para** mantener actualizada la estructura organizacional  

**Criterios de Aceptación:**
- Puede crear nuevas unidades
- Puede editar unidades existentes
- Puede eliminar unidades obsoletas
- Puede establecer relaciones entre unidades y entidades
- Validaciones aseguran integridad de datos

### HU-012: Generación de Reportes de Unidades
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes en PDF de unidades  
**Para** documentar la estructura organizacional  

**Criterios de Aceptación:**
- Puede generar PDF con listado de unidades
- El documento incluye información completa
- Formato profesional y legible
- Descarga automática

## 🎯 MÓDULO DE OBJETIVOS DE DESARROLLO SOSTENIBLE (ODS)

### HU-013: Visualización de ODS
**Como** usuario con permisos de visualización de ODS  
**Quiero** consultar los Objetivos de Desarrollo Sostenible  
**Para** alinear proyectos con agenda internacional  

**Criterios de Aceptación:**
- Puede ver listado completo de ODS
- Accede a detalles de cada objetivo
- Información clara sobre metas y indicadores
- Interfaz intuitiva para navegación

### HU-014: Gestión de ODS (Especialista)
**Como** Especialista en ODS  
**Quiero** gestionar la información de los ODS  
**Para** mantener actualizada la base de objetivos sostenibles  

**Criterios de Aceptación:**
- Puede crear nuevos registros de ODS
- Puede editar ODS existentes
- Puede eliminar registros obsoletos
- Validaciones aseguran consistencia con estándares internacionales

### HU-015: Generación de Reportes de ODS
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes de ODS en PDF  
**Para** crear documentos de referencia y seguimiento  

**Criterios de Aceptación:**
- Genera PDF con información completa de ODS
- Formato alineado con estándares institucionales
- Incluye objetivos, metas e indicadores
- Descarga inmediata

## 🎯 MÓDULO DE OBJETIVOS ESTRATÉGICOS

### HU-016: Visualización de Objetivos Estratégicos
**Como** usuario con permisos de visualización de objetivos estratégicos  
**Quiero** consultar los objetivos estratégicos institucionales  
**Para** entender las metas organizacionales de largo plazo  

**Criterios de Aceptación:**
- Accede al listado de objetivos estratégicos
- Ve detalles de cada objetivo
- Información organizada por prioridades
- Navegación clara entre objetivos

### HU-017: Gestión de Objetivos Estratégicos (Planificador)
**Como** Planificador Estratégico  
**Quiero** gestionar los objetivos estratégicos institucionales  
**Para** alinear la planificación con la visión organizacional  

**Criterios de Aceptación:**
- Puede crear nuevos objetivos estratégicos
- Puede editar objetivos existentes
- Puede eliminar objetivos obsoletos
- Establece vinculaciones con otros elementos del sistema
- Validaciones aseguran coherencia estratégica

### HU-018: Generación de Reportes de Objetivos Estratégicos
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes de objetivos estratégicos  
**Para** crear documentos de planificación y seguimiento  

**Criterios de Aceptación:**
- Genera PDF con objetivos estratégicos
- Formato ejecutivo y profesional
- Incluye metas e indicadores asociados
- Descarga automática del documento

## 🇵🇪 MÓDULO DE PLAN NACIONAL DE DESARROLLO (PND)

### HU-019: Visualización del PND
**Como** usuario con permisos de visualización del PND  
**Quiero** consultar información del Plan Nacional de Desarrollo  
**Para** alinear proyectos con políticas nacionales  

**Criterios de Aceptación:**
- Accede a información completa del PND
- Ve detalles de políticas y lineamientos
- Consulta objetivos nacionales
- Navega entre diferentes componentes del plan

### HU-020: Gestión del PND (Analista)
**Como** Analista de PND  
**Quiero** gestionar la información del Plan Nacional de Desarrollo  
**Para** mantener actualizados los lineamientos nacionales  

**Criterios de Aceptación:**
- Puede crear registros de componentes del PND
- Puede editar información existente
- Puede eliminar elementos obsoletos
- Mantiene coherencia con directrices nacionales
- Validaciones aseguran cumplimiento normativo

### HU-021: Generación de Reportes del PND
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes del PND en PDF  
**Para** crear documentos de referencia institucional  

**Criterios de Aceptación:**
- Genera PDF con información del PND
- Formato oficial y estructurado
- Incluye políticas y lineamientos
- Descarga inmediata

## 📋 MÓDULO DE GESTIÓN DE PLANES

### HU-022: Visualización de Planes
**Como** usuario con permisos de visualización de planes  
**Quiero** consultar los planes institucionales  
**Para** entender la planificación organizacional  

**Criterios de Aceptación:**
- Accede al listado de planes
- Ve detalles de cada plan
- Consulta objetivos y metas específicas
- Navega entre diferentes tipos de planes

### HU-023: Gestión de Planes (Gestor)
**Como** Gestor de Planes  
**Quiero** administrar completamente los planes institucionales  
**Para** mantener actualizada la planificación organizacional  

**Criterios de Aceptación:**
- Puede crear nuevos planes
- Puede editar planes existentes
- Puede eliminar planes obsoletos
- Establece vinculaciones con objetivos estratégicos
- Validaciones aseguran coherencia planificadora

### HU-024: Generación de Reportes de Planes
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes de planes en PDF  
**Para** crear documentos oficiales de planificación  

**Criterios de Aceptación:**
- Genera PDF con información completa de planes
- Formato oficial e institucional
- Incluye objetivos, metas y cronogramas
- Descarga automática

## 📊 MÓDULO DE GESTIÓN DE PROGRAMAS

### HU-025: Visualización de Programas
**Como** usuario con permisos de visualización de programas  
**Quiero** consultar los programas institucionales  
**Para** entender las iniciativas organizacionales en curso  

**Criterios de Aceptación:**
- Accede al listado de programas
- Ve información detallada de cada programa
- Consulta objetivos y alcance
- Navega entre programas activos e inactivos

### HU-026: Gestión de Programas (Coordinador)
**Como** Coordinador de Programas  
**Quiero** gestionar completamente los programas institucionales  
**Para** coordinar las iniciativas organizacionales  

**Criterios de Aceptación:**
- Puede crear nuevos programas
- Puede editar programas existentes
- Puede eliminar programas finalizados
- Establece relaciones con planes y proyectos
- Validaciones aseguran viabilidad programática

### HU-027: Generación de Reportes de Programas
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes de programas en PDF  
**Para** documentar las iniciativas institucionales  

**Criterios de Aceptación:**
- Genera PDF con información de programas
- Formato ejecutivo y detallado
- Incluye objetivos, recursos y cronogramas
- Descarga inmediata del documento

## 📈 MÓDULO DE GESTIÓN DE PROYECTOS

### HU-028: Visualización de Proyectos
**Como** usuario con permisos de visualización de proyectos  
**Quiero** consultar los proyectos institucionales  
**Para** hacer seguimiento a las iniciativas específicas  

**Criterios de Aceptación:**
- Accede al listado completo de proyectos
- Ve detalles de cada proyecto
- Consulta estado y avances
- Filtra proyectos por diferentes criterios

### HU-029: Gestión de Proyectos (Analista)
**Como** Analista de Proyectos  
**Quiero** gestionar completamente los proyectos institucionales  
**Para** asegurar el seguimiento y control de iniciativas  

**Criterios de Aceptación:**
- Puede crear nuevos proyectos
- Puede editar proyectos existentes
- Puede eliminar proyectos cancelados
- Establece vinculaciones con programas y ODS
- Validaciones aseguran viabilidad técnica y financiera

### HU-030: Generación de Reportes de Proyectos
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes de proyectos en PDF  
**Para** crear documentos de seguimiento y control  

**Criterios de Aceptación:**
- Genera PDF con información detallada de proyectos
- Formato técnico y ejecutivo
- Incluye cronogramas, recursos y resultados
- Descarga automática

## 🏠 MÓDULO DE DASHBOARD Y NAVEGACIÓN

### HU-031: Dashboard Principal
**Como** usuario autenticado  
**Quiero** acceder a un dashboard personalizado  
**Para** tener una visión general del sistema según mi rol  

**Criterios de Aceptación:**
- Ve resumen de información relevante a su rol
- Accede a accesos rápidos a módulos permitidos
- Visualiza estadísticas básicas del sistema
- Navegación intuitiva hacia todas las funcionalidades

### HU-032: Gestión de Perfil Personal
**Como** usuario autenticado  
**Quiero** gestionar mi perfil personal  
**Para** mantener actualizada mi información personal  

**Criterios de Aceptación:**
- Puede editar su información personal
- Puede cambiar su contraseña
- Puede ver sus permisos asignados
- Puede actualizar sus preferencias del sistema

## 📊 MÓDULO DE REPORTERÍA AVANZADA

### HU-033: Acceso a Reportería (Supervisor General)
**Como** Supervisor General  
**Quiero** acceder a todos los reportes del sistema  
**Para** tener visión completa de la información institucional  

**Criterios de Aceptación:**
- Puede generar reportes de todos los módulos
- Accede a reportes consolidados
- Exporta información en formato PDF
- Visualiza dashboards ejecutivos

### HU-034: Reportes Consolidados
**Como** usuario con permisos de generación de reportes  
**Quiero** generar reportes consolidados multi-módulo  
**Para** obtener visiones integrales del sistema  

**Criterios de Aceptación:**
- Genera reportes que combinan información de múltiples módulos
- Formatos ejecutivos y técnicos disponibles
- Exportación en PDF optimizada
- Datos actualizados en tiempo real

## 🔒 MÓDULO DE SEGURIDAD Y CONTROL DE ACCESO

### HU-035: Control de Acceso Granular
**Como** sistema  
**Quiero** controlar el acceso a cada funcionalidad según permisos  
**Para** garantizar la seguridad y confidencialidad de la información  

**Criterios de Aceptación:**
- Solo usuarios autenticados acceden al sistema
- Cada acción requiere permisos específicos
- Los permisos se validan en tiempo real
- Acceso denegado se maneja elegantemente

### HU-036: Páginas de Error Personalizadas
**Como** usuario  
**Quiero** recibir mensajes de error claros y profesionales  
**Para** entender qué está sucediendo cuando hay problemas  

**Criterios de Aceptación:**
- Página 403 personalizada para acceso denegado
- Página 404 personalizada para recursos no encontrados
- Página 500 personalizada para errores del servidor
- Diseño consistente con la identidad visual del sistema

## 🎨 MÓDULO DE INTERFAZ DE USUARIO

### HU-037: Interfaz Consistente y Profesional
**Como** usuario del sistema  
**Quiero** una interfaz visualmente atractiva y consistente  
**Para** tener una experiencia de uso agradable y profesional  

**Criterios de Aceptación:**
- Diseño basado en AdminLTE para profesionalismo
- Colores y tipografías consistentes en todo el sistema
- Iconografía clara y significativa para cada módulo
- Responsive design para diferentes dispositivos

### HU-038: Navegación Intuitiva
**Como** usuario del sistema  
**Quiero** navegar fácilmente entre las diferentes funcionalidades  
**Para** ser eficiente en el uso del sistema  

**Criterios de Aceptación:**
- Menú lateral organizado por módulos
- Breadcrumbs para orientación
- Botones de acción claramente identificados
- Enlaces contextuales entre módulos relacionados

### HU-039: Tablas Interactivas Avanzadas
**Como** usuario del sistema  
**Quiero** interactuar de forma avanzada con las tablas de datos  
**Para** analizar, filtrar y exportar información de manera eficiente  

**Criterios de Aceptación:**
- **Paginación dinámica**: Navegar entre páginas con controles intuitivos
- **Búsqueda en tiempo real**: Filtrar datos escribiendo en campo de búsqueda
- **Ordenación por columnas**: Hacer clic en encabezados para ordenar ASC/DESC
- **Exportación múltiple**: Exportar datos en formatos CSV, JSON, Excel
- **Impresión optimizada**: Generar versión imprimible de la tabla
- **Control de columnas**: Mostrar/ocultar columnas según necesidades
- **Información de registros**: Ver total de registros y página actual
- **Responsive**: Adaptación automática a diferentes tamaños de pantalla
- **Persistencia**: Mantener filtros y ordenación al navegar

**Funcionalidades Técnicas Implementadas:**
- Componente Table reutilizable en todos los módulos
- JavaScript table.js para funcionalidades interactivas
- Integración con DataTables para rendimiento optimizado
- Configuración personalizable por módulo

### HU-040: Modales Interactivos
**Como** usuario del sistema  
**Quiero** utilizar ventanas modales para acciones específicas  
**Para** realizar operaciones sin perder el contexto de la página actual  

**Criterios de Aceptación:**
- **Confirmación de eliminación**: Modal de confirmación antes de eliminar registros
- **Vista rápida de detalles**: Modal para ver información completa sin cambiar de página
- **Formularios emergentes**: Crear y editar registros en ventanas modales
- **Mensajes de estado**: Modales informativos para confirmaciones y errores
- **Diseño responsivo**: Adaptación correcta en dispositivos móviles
- **Animaciones suaves**: Transiciones fluidas al abrir/cerrar modales
- **Accesibilidad**: Navegación por teclado y compatibilidad con lectores de pantalla
- **Cierre múltiple**: Cerrar con botón, tecla ESC o clic fuera del modal

**Funcionalidades Técnicas Implementadas:**
- Componente Modal reutilizable
- JavaScript para gestión de eventos
- Integración con Bootstrap Modal
- Confirmaciones AJAX para operaciones críticas

### HU-041: Componentes Reutilizables del Sistema
**Como** desarrollador del sistema  
**Quiero** utilizar componentes UI reutilizables  
**Para** mantener consistencia y acelerar el desarrollo  

**Criterios de Aceptación:**
- **Componente Table**: Tabla estandarizada con todas las funcionalidades avanzadas
- **Componente Modal**: Modal base para diferentes tipos de contenido
- **Componente Button**: Botones estandarizados con estados y variantes
- **Configuración centralizada**: Estilos y comportamientos en archivos centralizados
- **Documentación**: Guías de uso para cada componente
- **Extensibilidad**: Capacidad de personalizar sin romper la consistencia

**Valor para el Usuario Final:**
- Interfaz consistente en todo el sistema
- Mejor experiencia de usuario
- Funcionalidades avanzadas sin complejidad
- Rendimiento optimizado

### HU-042: Experiencia de Usuario Optimizada
**Como** usuario del sistema  
**Quiero** una experiencia fluida y sin fricciones  
**Para** ser productivo y eficiente en mis tareas diarias  

**Criterios de Aceptación:**
- **Carga rápida**: Tiempos de respuesta optimizados
- **Feedback visual**: Indicadores de carga y confirmaciones de acciones
- **Manejo de errores**: Mensajes claros cuando algo sale mal
- **Atajos de teclado**: Navegación rápida con combinaciones de teclas
- **Autoguardado**: Prevención de pérdida de datos en formularios largos
- **Historial de navegación**: Navegación coherente con botón "atrás"
- **Tooltips informativos**: Ayuda contextual en elementos complejos
- **Estados visuales**: Indicadores claros de elementos activos/inactivos

## 🛠️ MÓDULO DE DESARROLLO Y ARQUITECTURA TÉCNICA

### HU-043: Arquitectura de Componentes Frontend
**Como** desarrollador del sistema  
**Quiero** una arquitectura de componentes frontend bien estructurada  
**Para** mantener código limpio, reutilizable y fácil de mantener  

**Criterios de Aceptación:**
- **Estructura de archivos organizada**: Separación clara entre assets, components y views
- **Componentes Blade reutilizables**: Table.blade.php, Modal.blade.php, Button.blade.php
- **JavaScript modular**: Archivo table.js con funciones específicas y reutilizables
- **CSS componentizado**: Estilos organizados por componente y funcionalidad
- **Configuración centralizada**: Variables y configuraciones en archivos dedicados

### HU-044: Sistema de Assets y Dependencias
**Como** desarrollador del sistema  
**Quiero** un sistema de gestión de assets optimizado  
**Para** garantizar rendimiento y compatibilidad del frontend  

**Criterios de Aceptación:**
- **Vite como bundler**: Compilación rápida y hot reload en desarrollo
- **Gestión de dependencias**: NPM para librerías JavaScript y CSS
- **Optimización de producción**: Minificación y compresión de assets
- **Compatibilidad**: Soporte para navegadores modernos
- **Integración con Laravel**: Assets servidos correctamente desde el backend

**Dependencias Técnicas Implementadas:**
```json
{
  "devDependencies": {
    "axios": "^1.1.2",
    "laravel-vite-plugin": "^0.7.5",
    "vite": "^4.0.0"
  },
  "dependencies": {
    "bootstrap": "^5.2.3",
    "datatables.net": "^1.13.4",
    "datatables.net-bs5": "^1.13.4",
    "jquery": "^3.6.4"
  }
}
```

### HU-045: Funcionalidades Avanzadas de DataTables
**Como** usuario del sistema  
**Quiero** funcionalidades avanzadas en todas las tablas  
**Para** manejar grandes volúmenes de datos de forma eficiente  

**Criterios de Aceptación:**
- **Paginación servidor**: Carga de datos por demanda para mejor rendimiento
- **Búsqueda global**: Filtrado instantáneo en todas las columnas
- **Búsqueda por columna**: Filtros específicos para cada campo
- **Exportación avanzada**:
  - CSV con encoding UTF-8
  - Excel con formato preservado
  - JSON estructurado
  - PDF con estilos corporativos
  - Impresión optimizada
- **Configuración de columnas**:
  - Mostrar/ocultar dinámicamente
  - Reordenar columnas por drag & drop
  - Redimensionar anchos
  - Fijar columnas izquierda/derecha
- **Ordenación múltiple**: Ordenar por múltiples columnas simultáneamente
- **Estados persistentes**: Guardar preferencias del usuario
- **Responsive automático**: Colapsar columnas en pantallas pequeñas

**Implementación Técnica en table.js:**
```javascript
// Configuración base reutilizable
const defaultTableConfig = {
    pageLength: 25,
    responsive: true,
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
    language: { /* Localización español */ },
    columnDefs: [/* Configuraciones específicas */]
};
```

---

## 🧭 MÓDULO DE SEGUIMIENTO DE ACTIVIDADES

### HU-046: Registro de Actividades
**Como** Planificador  
**Quiero** registrar actividades asociadas a proyectos y objetivos  
**Para** planificar y controlar su ejecución con trazabilidad  

**Criterios de Aceptación:**
- Se registra código único por proyecto (ACT001, ACT002, ...)
- Campos obligatorios: nombre, fechas planificadas, prioridad
- Estado inicial: PLANIFICADA
- Se valida que fecha inicio ≤ fecha fin
- Se permite asociar la actividad a uno o más objetivos válidos

### HU-047: Seguimiento del Avance de Actividades
**Como** Aprobador  
**Quiero** actualizar el avance real y fechas reales de una actividad  
**Para** monitorear el progreso y detectar desviaciones a tiempo  

**Criterios de Aceptación:**
- Se registra avance real y fechas reales de inicio/fin
- Se calcula el indicador de avance: $avance_real / avance_planificado * 100$
- Se calcula la variacion de tiempo: $fecha_real_fin - fecha_planificada_fin$
- Se actualiza el estado reportado (NO INICIADA, EN_RIESGO, COMPLETADA)
- Se actualiza el cumplimiento del objetivo segun regla AND/OR configurable

### HU-048: Eliminación Lógica y Auditoría
**Como** Planificador o Auditor  
**Quiero** eliminar lógicamente actividades con trazabilidad  
**Para** mantener historial y control de cambios  

**Criterios de Aceptación:**
- Se cambia el estado activo/inactivo sin borrar fisicamente
- Se registra usuario, fecha, hora y accion en auditoria
- Se mantiene el historial de cambios por actividad

### HU-049: Reportes de Actividades
**Como** usuario con permisos de reporte  
**Quiero** generar reportes de actividades en multiples formatos  
**Para** presentar evidencia de seguimiento y cumplimiento  

**Criterios de Aceptación:**
- Reportes disponibles en PDF, XLS, CSV y XML
- Filtros por proyecto, objetivo, estado y fechas
- Descarga inmediata desde la interfaz

### HU-050: Alertas por Desviaciones
**Como** Supervisor de proyectos  
**Quiero** recibir alertas cuando existan retrasos o desviaciones  
**Para** tomar acciones correctivas oportunas  

**Criterios de Aceptación:**
- Se generan alertas por actividades con variacion de tiempo > 0
- Se resaltan actividades en riesgo en el tablero de seguimiento
- Se registra fecha y motivo de la alerta

---

## 📋 RESUMEN DE ROLES Y PERMISOS IMPLEMENTADOS

### Roles del Sistema:
1. **👑 Administrador del Sistema**: Control total del sistema
2. **📊 Supervisor General**: Acceso a reportes de todos los módulos
3. **🏢 Gestor de Entidades**: Gestión completa de entidades
4. **🏗️ Coordinador de Unidades**: Gestión de unidades organizacionales
5. **🎯 Especialista en ODS**: Gestión de Objetivos de Desarrollo Sostenible
6. **🎯 Planificador Estratégico**: Gestión de objetivos estratégicos
7. **🇵🇪 Analista de PND**: Gestión del Plan Nacional de Desarrollo
8. **📋 Gestor de Planes**: Gestión de planes institucionales
9. **📊 Coordinador de Programas**: Gestión de programas
10. **📈 Analista de Proyectos**: Gestión de proyectos

### Permisos por Categoría:
- **👀 Visualización**: `view [módulo]` - Solo lectura
- **⚡ Gestión**: `manage [módulo]` - CRUD completo
- **📄 Reportes**: `generate reports` - Generación de PDFs
- **🏠 Dashboard**: `view dashboard` - Acceso al panel principal

---

## 🎯 VALOR AGREGADO DEL SISTEMA

### 🔐 **Seguridad y Control de Acceso**
- **Control granular de acceso** con roles y permisos específicos
- **Trazabilidad completa** de todas las operaciones
- **Autenticación robusta** con validaciones de seguridad
- **Páginas de error personalizadas** (403, 404, 500)

### 📊 **Gestión de Datos Avanzada**
- **Reportería profesional** en formato PDF para todos los módulos
- **Tablas interactivas** con funcionalidades empresariales:
  - Paginación, búsqueda y filtrado en tiempo real
  - Exportación múltiple (CSV, Excel, JSON, PDF)
  - Ordenación multicritério y control de columnas
  - Impresión optimizada y vista responsive
- **Modales inteligentes** para operaciones sin perder contexto

### 🎨 **Experiencia de Usuario**
- **Interfaz moderna y profesional** con AdminLTE
- **Componentes reutilizables** para consistencia visual
- **Navegación intuitiva** con breadcrumbs y menús organizados
- **Responsive design** para todos los dispositivos
- **Feedback visual** y manejo elegante de errores

### 🛠️ **Arquitectura Técnica**
- **Backend robusto** con Laravel y mejores prácticas
- **Frontend optimizado** con Vite, Bootstrap 5 y DataTables
- **Componentes modulares** para facilitar mantenimiento
- **Assets optimizados** para rendimiento en producción
- **Código limpio y documentado** para escalabilidad

### 📈 **Escalabilidad y Mantenimiento**
- **Arquitectura modular** para agregar nuevos módulos fácilmente
- **Sistema de permisos flexible** para nuevos roles
- **Componentes reutilizables** que aceleran desarrollo
- **Configuración centralizada** para cambios globales
- **Documentación completa** con historias de usuario

### 🌐 **Integración Institucional**
- **Alineación con estándares** internacionales (ODS)
- **Integración con políticas** nacionales (PND)
- **Planificación estratégica** completa e integrada
- **Seguimiento de proyectos** desde concepción hasta ejecución

El sistema está diseñado para gestionar de manera integral la planificación estratégica institucional, proporcionando herramientas avanzadas de análisis de datos, reportería ejecutiva y una experiencia de usuario de nivel empresarial. La arquitectura técnica garantiza escalabilidad, mantenibilidad y rendimiento óptimo para organizaciones de cualquier tamaño.
