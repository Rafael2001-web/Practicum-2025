# ⚙️ REQUISITOS FUNCIONALES Y NO FUNCIONALES - SISTEMA DE GESTIÓN PRACTICUM 2025

---

## 📋 **ESPECIFICACIÓN DE REQUISITOS FUNCIONALES**

### **Formato de Documentación:**
- **ID Requisito**: Identificador único (RF-001, RF-002, etc.)
- **Nombre**: Título descriptivo del requisito
- **Característica/Funcionalidad**: Categoría funcional del requisito
- **Descripción**: Detalle completo del comportamiento esperado
- **Requisito Asociado/Dependencia**: Relación con otros requisitos
- **Proceso al que Pertenece**: Proceso de negocio vinculado

---

## 🎯 **REQUISITOS FUNCIONALES IDENTIFICADOS**

| **ID Requisito** | **Nombre** | **Característica/Funcionalidad** | **Descripción** | **Requisito Asociado/Dependencia** | **Proceso al que Pertenece** |
|------------------|------------|-----------------------------------|-----------------|-----------------------------------|------------------------------|
| **RF-001** | Autenticación de Usuario | Autenticar Usuarios | El sistema debe permitir la autenticación de usuarios mediante credenciales válidas (usuario/contraseña) con validación en base de datos | - | Gestión de Usuarios |
| **RF-002** | Gestión de Roles y Permisos | Gestionar Permisos | El sistema debe permitir asignar roles específicos a usuarios con permisos granulares por módulo y funcionalidad | RF-001 | Gestión de Usuarios |
| **RF-003** | Creación de Usuarios | Crear Usuarios | El sistema debe permitir al administrador crear nuevos usuarios con información básica (nombre, correo, G10, rol inicial) | RF-002 | Gestión de Usuarios |
| **RF-004** | Modificación de Usuarios | Modificar Usuarios | El sistema debe permitir modificar información de usuarios existentes, incluyendo cambios de rol y estado | RF-003, RF-002 | Gestión de Usuarios |
| **RF-005** | Control de Acceso por Roles | Controlar Acceso | El sistema debe restringir acceso a funcionalidades según roles y permisos asignados | RF-002 | Gestión de Usuarios |
| **RF-006** | Cierre de Sesión | Cerrar Sesión | El sistema debe permitir el cierre seguro de sesiones de usuario | RF-001 | Gestión de Usuarios |
| **RF-007** | Registro de Entidades del Estado | Registrar Entidades | El sistema debe permitir registrar entidades del Estado con código único, nombre, subsector, nivel de gobierno y fechas | - | Gestión de Entidades |
| **RF-008** | Validación de Código de Entidad | Validar Códigos | El sistema debe validar la unicidad del código de entidad y no permitir duplicados | RF-007 | Gestión de Entidades |
| **RF-009** | Modificación de Entidades | Modificar Entidades | El sistema debe permitir modificar datos de entidades registradas excepto el código único | RF-007, RF-008 | Gestión de Entidades |
| **RF-010** | Cambio de Estado de Entidades | Cambiar Estado | El sistema debe permitir cambiar el estado de entidades entre activo e inactivo con registro de historial | RF-009 | Gestión de Entidades |
| **RF-011** | Estructura Jerárquica de Entidades | Estructurar Jerarquías | El sistema debe organizar entidades en estructura jerárquica con macrosectores y sectores | RF-007 | Gestión de Entidades |
| **RF-012** | Páginas de Error Personalizadas | Mostrar Errores | El sistema debe mostrar páginas de error personalizadas para códigos 403, 404 y 500 con navegación de regreso | - | Gestión de Interfaz |
| **RF-013** | Gestión de Perfil Personal | Gestionar Perfil | El sistema debe permitir a usuarios consultar y modificar su información personal y cambiar contraseña | RF-001 | Gestión de Usuarios |
| **RF-014** | Creación de Planes Institucionales | Crear Planes | El sistema debe permitir crear planes institucionales con información básica, cronograma y objetivos | - | Gestión de Planes |
| **RF-015** | Versionado de Planes | Versionar Planes | El sistema debe mantener versiones de planes institucionales con control de cambios y comparación | RF-014 | Gestión de Planes |
| **RF-016** | Seguimiento de Planes | Monitorear Planes | El sistema debe permitir monitorear el progreso de planes con cronogramas e hitos definidos | RF-014, RF-015 | Gestión de Planes |
| **RF-017** | Vinculación Plan-Objetivos | Vincular Plan-Objetivos | El sistema debe vincular planes institucionales con objetivos estratégicos de la entidad | RF-014, RF-025 | Gestión de Planes |
| **RF-018** | Validación Normativa Automática | Validar Normativas | El sistema debe validar automáticamente que planes y proyectos cumplan normativas del PND | RF-014, RF-029 | Validación Normativa |
| **RF-019** | Validación de Alineación ODS | Validar Alineación ODS | El sistema debe validar que proyectos estén alineados con Objetivos de Desarrollo Sostenible | RF-018, RF-035 | Validación Normativa |
| **RF-020** | Sistema de Alertas Automáticas | Generar Alertas | El sistema debe generar alertas automáticas por vencimientos, cambios importantes y falta de cumplimiento | RF-018, RF-019 | Notificaciones |
| **RF-021** | Notificaciones Configurables | Configurar Notificaciones | El sistema debe permitir configurar tipos de notificaciones por usuario y enviarlas por email y dashboard | RF-020 | Notificaciones |
| **RF-022** | Historial de Notificaciones | Mantener Historial | El sistema debe mantener un historial completo de notificaciones enviadas con estado de lectura | RF-021 | Notificaciones |
| **RF-023** | Gestión de Objetivos Estratégicos | Gestionar Objetivos | El sistema debe permitir crear y gestionar objetivos estratégicos con clasificación por áreas | - | Gestión de Objetivos |
| **RF-024** | Indicadores SMART | Definir Indicadores | El sistema debe definir indicadores SMART para objetivos con metas cuantificables y fechas límite | RF-023 | Gestión de Objetivos |
| **RF-025** | Dashboard de Indicadores | Mostrar Indicadores | El sistema debe mostrar dashboard con seguimiento en tiempo real de indicadores de objetivos | RF-024 | Gestión de Objetivos |
| **RF-026** | Consulta de Objetivos | Consultar Objetivos | El sistema debe permitir consultar objetivos estratégicos con filtros por área, estado y período | RF-023 | Gestión de Objetivos |
| **RF-027** | Exportación de Objetivos | Exportar Objetivos | El sistema debe permitir exportar información de objetivos en formatos Excel, PDF y CSV | RF-026 | Gestión de Objetivos |
| **RF-028** | Gráficos de Progreso | Generar Gráficos | El sistema debe generar gráficos visuales del progreso de objetivos estratégicos | RF-025 | Gestión de Objetivos |
| **RF-029** | Gestión del PND | Gestionar PND | El sistema debe mantener estructura jerárquica del Plan Nacional de Desarrollo actualizada | - | Gestión del PND |
| **RF-030** | Versionado del PND | Versionar PND | El sistema debe controlar versiones del PND con registro de cambios y fechas de actualización | RF-029 | Gestión del PND |
| **RF-031** | Notificaciones de Cambios PND | Notificar Cambios PND | El sistema debe notificar automáticamente cambios en el PND a usuarios relevantes | RF-030, RF-021 | Gestión del PND |
| **RF-032** | Búsqueda en PND | Buscar en PND | El sistema debe permitir búsqueda y filtrado de lineamientos del PND por palabras clave | RF-029 | Gestión del PND |
| **RF-033** | Filtrado por Ejes y Políticas | Filtrar por Ejes | El sistema debe filtrar contenido del PND por ejes estratégicos y políticas específicas | RF-032 | Gestión del PND |
| **RF-034** | Exportación de Lineamientos | Exportar Lineamientos | El sistema debe exportar lineamientos específicos del PND en formatos requeridos | RF-032, RF-033 | Gestión del PND |
| **RF-035** | Catálogo de ODS | Mantener Catálogo ODS | El sistema debe mantener catálogo completo de los 17 Objetivos de Desarrollo Sostenible | - | Gestión de ODS |
| **RF-036** | Búsqueda de ODS | Buscar ODS | El sistema debe permitir búsqueda de ODS por categorías, palabras clave y temas | RF-035 | Gestión de ODS |
| **RF-037** | Interfaz Visual de ODS | Proporcionar Interfaz ODS | El sistema debe proporcionar interfaz visual para navegación intuitiva de ODS | RF-035, RF-036 | Gestión de ODS |
| **RF-038** | Metas Específicas por ODS | Definir Metas ODS | El sistema debe permitir definir metas institucionales específicas para cada ODS relevante | RF-035 | Gestión de ODS |
| **RF-039** | Indicadores Medibles ODS | Implementar Indicadores ODS | El sistema debe implementar indicadores medibles para seguimiento de metas ODS | RF-038 | Gestión de ODS |
| **RF-040** | Dashboard de Seguimiento ODS | Mostrar Dashboard ODS | El sistema debe mostrar dashboard de seguimiento del progreso en ODS institucionales | RF-039 | Gestión de ODS |
| **RF-041** | Vinculación Proyecto-ODS | Vincular Proyectos-ODS | El sistema debe permitir vincular proyectos con ODS correspondientes y calcular contribución | RF-035, RF-052 | Gestión de Proyectos |
| **RF-042** | Matriz de Contribución ODS | Crear Matriz ODS | El sistema debe crear matriz de contribución de proyectos por cada ODS vinculado | RF-041 | Gestión de Proyectos |
| **RF-043** | Reportes de Impacto ODS | Generar Reportes ODS | El sistema debe generar reportes de impacto institucional por ODS | RF-042 | Gestión de Proyectos |
| **RF-044** | Gestión de Programas | Gestionar Programas | El sistema debe permitir crear y gestionar programas institucionales con clasificación por tipos | - | Gestión de Programas |
| **RF-045** | Estados de Programa | Implementar Estados | El sistema debe implementar workflow de estados para programas con transiciones controladas | RF-044 | Gestión de Programas |
| **RF-046** | Asignación de Presupuesto | Asignar Presupuesto | El sistema debe permitir asignar presupuesto y recursos a programas con seguimiento | RF-044 | Gestión de Programas |
| **RF-047** | Cronograma de Programas | Crear Cronogramas | El sistema debe crear cronogramas con hitos para programas institucionales | RF-044, RF-046 | Gestión de Programas |
| **RF-048** | Asignación de Responsables | Asignar Responsables | El sistema debe asignar responsables específicos por programa con notificaciones | RF-044, RF-021 | Gestión de Programas |
| **RF-049** | Vinculación Programa-Plan | Vincular Programa-Plan | El sistema debe vincular programas con planes institucionales asegurando coherencia estratégica | RF-044, RF-014 | Gestión de Programas |
| **RF-050** | Matriz de Coherencia | Crear Matriz Coherencia | El sistema debe crear matriz de coherencia entre programas y estrategias institucionales | RF-049 | Gestión de Programas |
| **RF-051** | Dashboard de Alineación | Mostrar Dashboard | El sistema debe mostrar dashboard de alineación estratégica de programas | RF-050 | Gestión de Programas |
| **RF-052** | Gestión de Proyectos | Gestionar Proyectos | El sistema debe permitir crear y gestionar proyectos completos con toda su documentación | - | Gestión de Proyectos |
| **RF-053** | Clasificación de Proyectos | Clasificar Proyectos | El sistema debe clasificar proyectos por tipos, sectores y categorías predefinidas | RF-052 | Gestión de Proyectos |
| **RF-054** | Carga de Documentos | Cargar Documentos | El sistema debe permitir cargar y gestionar documentos asociados a proyectos | RF-052 | Gestión de Proyectos |
| **RF-055** | Validación de Integridad | Validar Integridad | El sistema debe validar integridad y completitud de información de proyectos | RF-052, RF-053 | Gestión de Proyectos |
| **RF-056** | Estados de Proyecto | Implementar Estados | El sistema debe implementar workflow de estados para proyectos con transiciones | RF-052 | Gestión de Proyectos |
| **RF-057** | Seguimiento de Avance | Realizar Seguimiento | El sistema debe realizar seguimiento de avance físico y financiero de proyectos | RF-056 | Gestión de Proyectos |
| **RF-058** | Alertas de Desviación | Generar Alertas | El sistema debe generar alertas automáticas por desviaciones en cronograma o presupuesto | RF-057, RF-020 | Gestión de Proyectos |
| **RF-059** | Vinculación Proyecto-Programa | Vincular Proyecto-Programa | El sistema debe vincular proyectos con programas institucionales correspondientes | RF-052, RF-044 | Gestión de Proyectos |
| **RF-060** | Matriz de Contribución Múltiple | Crear Matriz Múltiple | El sistema debe crear matriz de contribución de proyectos a múltiples objetivos | RF-059, RF-041 | Gestión de Proyectos |
| **RF-061** | Reportes de Alineación | Generar Reportes | El sistema debe generar reportes de alineación estratégica completa de proyectos | RF-060 | Gestión de Proyectos |
| **RF-062** | Generación de Reportes PDF | Generar Reportes PDF | El sistema debe generar reportes institucionales consolidados en formato PDF | - | Reportería |
| **RF-063** | Filtros Configurables | Configurar Filtros | El sistema debe permitir filtros configurables para personalización de reportes | RF-062 | Reportería |
| **RF-064** | Reportes Consolidados | Crear Reportes | El sistema debe crear reportes consolidados con información de múltiples módulos | RF-062, RF-063 | Reportería |
| **RF-065** | Programación Automática | Programar Reportes | El sistema debe programar generación automática de reportes periódicos | RF-062 | Reportería |
| **RF-066** | Exportación por Módulo | Exportar por Módulo | El sistema debe permitir exportación específica por módulo del sistema | - | Exportación de Datos |
| **RF-067** | Múltiples Formatos | Soportar Formatos | El sistema debe soportar exportación en formatos Excel, CSV, JSON y XML | RF-066 | Exportación de Datos |
| **RF-068** | Exportación Programada | Programar Exportación | El sistema debe permitir programar exportaciones automáticas recurrentes | RF-066, RF-067 | Exportación de Datos |
| **RF-069** | Dashboard Ejecutivo | Proporcionar Dashboard | El sistema debe proporcionar dashboard ejecutivo personalizable para alta dirección | - | Dashboard Ejecutivo |
| **RF-070** | KPIs en Tiempo Real | Mostrar KPIs | El sistema debe mostrar KPIs institucionales actualizados en tiempo real | RF-069 | Dashboard Ejecutivo |
| **RF-071** | Gráficos Interactivos | Incluir Gráficos | El sistema debe incluir gráficos interactivos en dashboard con drill-down | RF-069, RF-070 | Dashboard Ejecutivo |
| **RF-072** | Tablas con DataTables | Implementar Tablas | El sistema debe implementar tablas interactivas con paginación, búsqueda y ordenamiento | - | Gestión de Interfaz |
| **RF-073** | Exportación de Tablas | Exportar Tablas | El sistema debe permitir exportación directa desde tablas en múltiples formatos | RF-072 | Gestión de Interfaz |
| **RF-074** | Configuración de Columnas | Configurar Columnas | El sistema debe permitir configurar visibilidad y orden de columnas en tablas | RF-072 | Gestión de Interfaz |
| **RF-075** | Modales Interactivos | Implementar Modales | El sistema debe implementar modales para confirmaciones, detalles y formularios | - | Gestión de Interfaz |
| **RF-076** | Navegación por Teclado | Soportar Navegación | El sistema debe soportar navegación completa por teclado en modales | RF-075 | Gestión de Interfaz |
| **RF-077** | Exportación Flexible | Ofrecer Exportación | El sistema debe ofrecer opciones flexibles de exportación con formatos personalizables | RF-066, RF-067 | Exportación de Datos |
| **RF-078** | Validación de Exportación | Validar Exportación | El sistema debe validar integridad de datos antes de exportación | RF-077 | Exportación de Datos |
| **RF-079** | Arquitectura MVC | Implementar MVC | El sistema debe implementar arquitectura MVC estricta con separación clara de responsabilidades | - | Arquitectura Técnica |
| **RF-080** | APIs RESTful | Desarrollar APIs | El sistema debe desarrollar APIs RESTful para todos los módulos del sistema | RF-079 | Arquitectura Técnica |
| **RF-081** | Patrones de Código | Establecer Patrones | El sistema debe establecer patrones de código y guías de estilo consistentes | RF-079, RF-080 | Arquitectura Técnica |
| **RF-082** | Base de Datos Estructurada | Configurar Base Datos | El sistema debe configurar estructura de base de datos optimizada y normalizada | RF-079 | Arquitectura Técnica |
| **RF-083** | Componentes Reutilizables | Desarrollar Componentes | El sistema debe desarrollar componentes UI reutilizables con patrones consistentes | RF-079 | Desarrollo Frontend |
| **RF-084** | Guías de Estilo | Crear Guías | El sistema debe crear guías de estilo y patrones de diseño para interfaz | RF-083 | Desarrollo Frontend |
| **RF-085** | Tests Automatizados | Implementar Tests | El sistema debe implementar suite completa de tests automatizados | RF-079, RF-080 | Calidad de Software |
| **RF-086** | Logs de Auditoría | Implementar Logs | El sistema debe implementar logs completos de auditoría para todas las operaciones | - | Auditoría y Seguridad |
| **RF-087** | Trazabilidad de Cambios | Mantener Trazabilidad | El sistema debe mantener trazabilidad completa de cambios con usuario y fecha | RF-086 | Auditoría y Seguridad |
| **RF-088** | Sistema de Backup | Implementar Backup | El sistema debe implementar backup automático de datos críticos | RF-086 | Auditoría y Seguridad |
| **RF-089** | Monitoreo de Rendimiento | Monitorear Rendimiento | El sistema debe monitorear rendimiento y generar alertas por problemas | RF-079 | Monitoreo del Sistema |
| **RF-090** | Documentación Técnica | Mantener Documentación | El sistema debe mantener documentación técnica completa y actualizada | RF-079, RF-080 | Documentación |
| **RF-091** | Gestión de Actividades | Gestionar Actividades | El sistema debe permitir crear, editar y eliminar lógicamente actividades asociadas a proyectos, objetivos e indicadores | RF-052, RF-023 | Gestión de Actividades |
| **RF-092** | Asociación de Actividades | Asociar Actividades | El sistema debe permitir asociar cada actividad a uno o más objetivos válidos y a un proyecto/programa | RF-091, RF-052 | Gestión de Actividades |
| **RF-093** | Monitoreo de Avance | Monitorear Avance | El sistema debe calcular y actualizar el avance real de actividades con base en indicadores definidos | RF-091 | Gestión de Actividades |
| **RF-094** | Indicadores de Actividad | Calcular Indicadores | El sistema debe calcular indicadores de avance, variación de tiempo y cumplimiento de plazo para cada actividad | RF-093 | Gestión de Actividades |
| **RF-095** | Estado Reportado | Determinar Estado | El sistema debe determinar automáticamente el estado reportado de la actividad (NO INICIADA, EN_RIESGO, COMPLETADA) según reglas de tiempo y avance | RF-094 | Gestión de Actividades |
| **RF-096** | Auditoría de Actividades | Registrar Auditoría | El sistema debe registrar usuario, fecha, hora y acción al crear, actualizar o eliminar lógicamente una actividad | RF-086 | Auditoría y Seguridad |
| **RF-097** | Reportes de Actividades | Generar Reportes | El sistema debe generar reportes de actividades en PDF, XLS, CSV y XML | RF-062, RF-067 | Reportería |
| **RF-098** | Monitoreo y Alertas | Generar Alertas | El sistema debe detectar retrasos o desviaciones de actividades y generar alertas para acciones correctivas | RF-093, RF-058 | Gestión de Actividades |
| **RF-099** | Regla de Cumplimiento | Evaluar Cumplimiento | El sistema debe evaluar el cumplimiento de objetivos con reglas configurables (AND/OR) según indicadores cumplidos | RF-094 | Gestión de Objetivos |
| **RF-100** | Acceso por Roles | Controlar Acceso | El sistema debe aplicar permisos diferenciados para Planificador y Aprobador en la gestión de actividades | RF-002, RF-091 | Gestión de Actividades |

---

## ⚡ REQUISITOS NO FUNCIONALES

### RNF-001: RENDIMIENTO

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-001.1 | Tiempo de respuesta | Las páginas deben cargar en menos de 3 segundos | < 3 seg | HU-042 |
| RNF-001.2 | Capacidad de usuarios | El sistema debe soportar 100 usuarios concurrentes | 100 usuarios | Todas |
| RNF-001.3 | Procesamiento de datos | Las tablas deben manejar hasta 10,000 registros sin degradación | 10K registros | HU-039 |
| RNF-001.4 | Exportación eficiente | La exportación de datos debe completarse en menos de 30 segundos | < 30 seg | HU-039, RF-011.2 |
| RNF-001.5 | Respuesta de transacciones | Las acciones en la GUI deben responder en menos de 5 segundos | < 5 seg | HU-042 |

### RNF-002: SEGURIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-002.1 | Autenticación segura | Las contraseñas deben cumplir políticas de seguridad | Mín 8 caracteres | HU-001, HU-002 |
| RNF-002.2 | Sesiones seguras | Las sesiones deben expirar después de inactividad | 30 min inactividad | HU-002, HU-003 |
| RNF-002.3 | Control de acceso | Todas las rutas deben validar permisos | 100% rutas protegidas | HU-035 |
| RNF-002.4 | Encriptación de datos | Los datos sensibles deben estar encriptados | Encriptación AES-256 | Todas |
| RNF-002.5 | Auditoría de acciones | El sistema debe registrar acciones críticas | Log de todas las operaciones | Todas |
| RNF-002.6 | Patrones de seguridad | El sistema debe aplicar prácticas seguras de programación (validación, sanitización, CSRF) | 100% formularios protegidos | Todas |
| RNF-002.7 | Comunicaciones seguras | Las comunicaciones externas deben usar TLS/HTTPS y certificados válidos | 100% endpoints externos | Todas |

### RNF-003: USABILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-003.1 | Interfaz intuitiva | La interfaz debe ser fácil de usar sin capacitación | < 5 min aprendizaje | HU-037, HU-038 |
| RNF-003.2 | Responsive design | La interfaz debe funcionar en dispositivos móviles | 100% responsive | HU-037, HU-039 |
| RNF-003.3 | Accesibilidad | El sistema debe cumplir estándares de accesibilidad | WCAG 2.1 AA | HU-040, HU-042 |
| RNF-003.4 | Mensajes claros | Los errores deben mostrar mensajes comprensibles | Mensajes en español | HU-036, HU-042 |
| RNF-003.5 | Mensajes orientados a usuario | Las validaciones y errores deben indicar causa y acción sugerida | Mensajes con guía de acción | HU-036, HU-042 |

### RNF-004: COMPATIBILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-004.1 | Navegadores web | Debe funcionar en Chrome, Firefox, Safari, Edge | 4 navegadores principales | Todas |
| RNF-004.2 | Versiones de navegador | Debe soportar versiones de los últimos 2 años | Últimas 2 versiones | Todas |
| RNF-004.3 | Dispositivos móviles | Debe funcionar en tablets y smartphones | iOS/Android | HU-037 |
| RNF-004.4 | Resoluciones de pantalla | Debe adaptarse a resoluciones desde 320px | 320px - 4K | HU-037, HU-039 |

### RNF-005: MANTENIBILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-005.1 | Código limpio | El código debe seguir estándares de Laravel | PSR-12 compliance | HU-043 |
| RNF-005.2 | Documentación | Todas las funciones deben estar documentadas | 100% documentación | HU-043, HU-044 |
| RNF-005.3 | Componentes reutilizables | Los componentes UI deben ser modulares | Reutilización > 80% | HU-041, HU-043 |
| RNF-005.4 | Estructura organizada | Los archivos deben seguir convenciones | Estructura MVC estricta | HU-043, HU-044 |

### RNF-006: ESCALABILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-006.1 | Crecimiento de datos | El sistema debe manejar crecimiento de datos | 10x crecimiento anual | Todas |
| RNF-006.2 | Nuevos módulos | Debe permitir agregar módulos fácilmente | < 1 día integración | HU-043 |
| RNF-006.3 | Usuarios adicionales | Debe escalar a más usuarios sin rediseño | Hasta 1000 usuarios | Todas |
| RNF-006.4 | Funcionalidades | Debe permitir nuevas funcionalidades sin impacto | Sin downtime | HU-041 |

### RNF-007: DISPONIBILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-007.1 | Tiempo de actividad | El sistema debe estar disponible 99% del tiempo | 99% uptime | Todas |
| RNF-007.2 | Recuperación de errores | Debe recuperarse automáticamente de errores menores | < 5 min recuperación | HU-036, HU-042 |
| RNF-007.3 | Backup de datos | Debe realizar respaldos automáticos diarios | Backup diario | Todas |
| RNF-007.4 | Tolerancia a fallos | Debe manejar fallos sin pérdida de datos | 0% pérdida datos | Todas |

### RNF-008: PORTABILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-008.1 | Independencia de SO | Debe ejecutarse en Windows, Linux, macOS | 3 sistemas operativos | HU-044 |
| RNF-008.2 | Base de datos | Debe soportar MySQL, PostgreSQL | 2 motores BD | Todas |
| RNF-008.3 | Servidores web | Debe funcionar con Apache, Nginx | 2 servidores web | Todas |
| RNF-008.4 | Contenedores | Debe ser deployable en Docker | Dockerfile incluido | HU-044 |

### RNF-009: INTEROPERABILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-009.1 | APIs RESTful | Debe exponer APIs para integración | API REST completa | Futuras integraciones |
| RNF-009.2 | Formatos estándar | Debe exportar en formatos estándar | CSV, JSON, XML, PDF | HU-039, RF-011.2 |
| RNF-009.3 | Importación de datos | Debe permitir importación masiva | CSV, Excel import | Futuras mejoras |
| RNF-009.4 | Integración externa | Debe integrarse con sistemas externos | APIs de terceros | Futuras integraciones |

### RNF-010: CUMPLIMIENTO Y REGULACIONES

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-010.1 | Protección de datos | Debe cumplir con leyes de protección de datos | GDPR/LOPD compliance | HU-032, RNF-002 |
| RNF-010.2 | Estándares gubernamentales | Debe alinearse con estándares gubernamentales | Normas gubernamentales | HU-019, HU-020 |
| RNF-010.3 | Auditoría externa | Debe soportar auditorías externas | Logs auditables | RNF-002.5 |
| RNF-010.4 | Retención de datos | Debe cumplir políticas de retención | Políticas institucionales | Todas |

---

---

## 📊 **RESUMEN DE REQUISITOS FUNCIONALES**

### **Distribución por Característica/Funcionalidad:**

| **Característica/Funcionalidad** | **Cantidad de Requisitos** | **Porcentaje** |
|-----------------------------------|----------------------------|----------------|
| Gestionar Proyectos | 12 requisitos | 13.3% |
| Generar Reportes | 12 requisitos | 13.3% |
| Planificar Estrategias | 10 requisitos | 11.1% |
| Gestionar Usuarios | 8 requisitos | 8.9% |
| Gestionar ODS | 8 requisitos | 8.9% |
| Consultar y Reportar | 8 requisitos | 8.9% |
| Gestionar Entidades | 5 requisitos | 5.6% |
| Gestionar Programas | 8 requisitos | 8.9% |
| Gestionar Interfaz | 7 requisitos | 7.8% |
| Desarrollar Arquitectura | 7 requisitos | 7.8% |
| Gestionar PND | 6 requisitos | 6.7% |
| Gestionar Notificaciones | 3 requisitos | 3.3% |
| Validar Cumplimiento | 2 requisitos | 2.2% |
| Auditar Seguridad | 3 requisitos | 3.3% |
| Otras Funcionalidades | 3 requisitos | 3.3% |

### **Distribución por Proceso de Negocio:**

| **Proceso de Negocio** | **Cantidad de Requisitos** | **Porcentaje** |
|------------------------|----------------------------|----------------|
| Gestión de Proyectos | 15 requisitos | 16.7% |
| Reportería | 8 requisitos | 8.9% |
| Gestión de Objetivos | 6 requisitos | 6.7% |
| Gestión de Usuarios | 6 requisitos | 6.7% |
| Gestión de ODS | 9 requisitos | 10.0% |
| Gestión de Programas | 8 requisitos | 8.9% |
| Gestión de Planes | 5 requisitos | 5.6% |
| Gestión de Entidades | 5 requisitos | 5.6% |
| Gestión del PND | 6 requisitos | 6.7% |
| Otros | 22 requisitos | 24.4% |

---

## 🎯 RESUMEN EJECUTIVO

### Requisitos Críticos para el Éxito del Proyecto

1. **Seguridad y Control de Acceso (RF-001, RNF-002)**: Fundamental para proteger la información institucional
2. **Gestión de Datos CRUD (RF-002 a RF-010)**: Core del sistema para manejo de información
3. **Reportería Profesional (RF-011)**: Esencial para la toma de decisiones
4. **Rendimiento Óptimo (RNF-001)**: Crítico para la adopción del usuario
5. **Interfaz Intuitiva (RF-012, RNF-003)**: Necesario para la productividad del usuario

### Factores de Riesgo

- **Rendimiento con grandes volúmenes de datos**: Requiere optimización continua
- **Seguridad de datos sensibles**: Necesita implementación robusta
- **Compatibilidad multi-navegador**: Requiere pruebas exhaustivas
- **Escalabilidad futura**: Debe considerarse en el diseño arquitectónico

### Recomendaciones de Implementación

1. **Fase 1**: Implementar requisitos de alta prioridad (autenticación, CRUD básico)
2. **Fase 2**: Desarrollar funcionalidades avanzadas (reportería, tablas interactivas)
3. **Fase 3**: Optimizar rendimiento y agregar funcionalidades complementarias
4. **Fase 4**: Implementar integraciones y APIs para interoperabilidad

---

*Este documento de requisitos está alineado con las 45 historias de usuario del sistema y proporciona una base técnica sólida para el desarrollo, testing y mantenimiento del Sistema de Gestión Practicum 2025.*
