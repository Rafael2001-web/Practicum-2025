# ⚙️ REQUISITOS FUNCIONALES - SISTEMA DE GESTIÓN PRACTICUM 2025

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
| **RF-001** | Autenticación de Usuario | Seguridad y Control de Acceso | El sistema debe permitir la autenticación de usuarios mediante credenciales válidas (usuario/contraseña) con validación en base de datos | - | Gestión de Usuarios |
| **RF-002** | Autenticación de Doble Factor | Seguridad y Control de Acceso | El sistema debe implement autenticación de doble factor mediante código enviado por correo electrónico o token temporal | RF-001 | Gestión de Usuarios |
| **RF-003** | Gestión de Roles y Permisos | Seguridad y Control de Acceso | El sistema debe permitir asignar roles específicos a usuarios con permisos granulares por módulo y funcionalidad | RF-001 | Gestión de Usuarios |
| **RF-004** | Creación de Usuarios | Gestión de Usuarios | El sistema debe permitir al administrador crear nuevos usuarios con información básica (nombre, correo, G10, rol inicial) | RF-003 | Gestión de Usuarios |
| **RF-005** | Modificación de Usuarios | Gestión de Usuarios | El sistema debe permitir modificar información de usuarios existentes, incluyendo cambios de rol y estado | RF-004, RF-003 | Gestión de Usuarios |
| **RF-006** | Activación/Desactivación de Usuarios | Gestión de Usuarios | El sistema debe permitir cambiar el estado de usuarios entre activo e inactivo sin eliminar registros | RF-005 | Gestión de Usuarios |
| **RF-007** | Registro de Entidades del Estado | Gestión de Entidades | El sistema debe permitir registrar entidades del Estado con código único, nombre, subsector, nivel de gobierno y fechas | - | Gestión de Entidades |
| **RF-008** | Validación de Código de Entidad | Gestión de Entidades | El sistema debe validar la unicidad del código de entidad y no permitir duplicados | RF-007 | Gestión de Entidades |
| **RF-009** | Modificación de Entidades | Gestión de Entidades | El sistema debe permitir modificar datos de entidades registradas excepto el código único | RF-007, RF-008 | Gestión de Entidades |
| **RF-010** | Cambio de Estado de Entidades | Gestión de Entidades | El sistema debe permitir cambiar el estado de entidades entre activo e inactivo con registro de historial | RF-009 | Gestión de Entidades |
| **RF-011** | Estructura Jerárquica de Entidades | Gestión de Entidades | El sistema debe organizar entidades en estructura jerárquica con macrosectores y sectores | RF-007 | Gestión de Entidades |
| **RF-012** | Páginas de Error Personalizadas | Interfaz de Usuario | El sistema debe mostrar páginas de error personalizadas para códigos 403, 404 y 500 con navegación de regreso | - | Gestión de Interfaz |
| **RF-013** | Gestión de Perfil Personal | Gestión de Usuarios | El sistema debe permitir a usuarios consultar y modificar su información personal y cambiar contraseña | RF-001 | Gestión de Usuarios |
| **RF-014** | Creación de Planes Institucionales | Planificación Estratégica | El sistema debe permitir crear planes institucionales con información básica, cronograma y objetivos | - | Gestión de Planes |
| **RF-015** | Versionado de Planes | Planificación Estratégica | El sistema debe mantener versiones de planes institucionales con control de cambios y comparación | RF-014 | Gestión de Planes |
| **RF-016** | Seguimiento de Planes | Planificación Estratégica | El sistema debe permitir monitorear el progreso de planes con cronogramas e hitos definidos | RF-014, RF-015 | Gestión de Planes |
| **RF-017** | Vinculación Plan-Objetivos | Planificación Estratégica | El sistema debe vincular planes institucionales con objetivos estratégicos de la entidad | RF-014, RF-023 | Gestión de Planes |
| **RF-018** | Validación Normativa Automática | Validación y Cumplimiento | El sistema debe validar automáticamente que planes y proyectos cumplan normativas del PND | RF-014, RF-032 | Validación Normativa |
| **RF-019** | Validación de Alineación ODS | Validación y Cumplimiento | El sistema debe validar que proyectos estén alineados con Objetivos de Desarrollo Sostenible | RF-018, RF-038 | Validación Normativa |
| **RF-020** | Sistema de Alertas Automáticas | Notificaciones | El sistema debe generar alertas automáticas por vencimientos, cambios importantes y falta de cumplimiento | RF-018, RF-019 | Notificaciones |
| **RF-021** | Notificaciones Configurables | Notificaciones | El sistema debe permitir configurar tipos de notificaciones por usuario y enviarlas por email y dashboard | RF-020 | Notificaciones |
| **RF-022** | Historial de Notificaciones | Notificaciones | El sistema debe mantener un historial completo de notificaciones enviadas con estado de lectura | RF-021 | Notificaciones |
| **RF-023** | Gestión de Objetivos Estratégicos | Planificación Estratégica | El sistema debe permitir crear y gestionar objetivos estratégicos con clasificación por áreas | - | Gestión de Objetivos |
| **RF-024** | Indicadores SMART | Planificación Estratégica | El sistema debe definir indicadores SMART para objetivos con metas cuantificables y fechas límite | RF-023 | Gestión de Objetivos |
| **RF-025** | Dashboard de Indicadores | Reportería y Dashboard | El sistema debe mostrar dashboard con seguimiento en tiempo real de indicadores de objetivos | RF-024 | Gestión de Objetivos |
| **RF-026** | Consulta de Objetivos | Consulta y Reportes | El sistema debe permitir consultar objetivos estratégicos con filtros por área, estado y período | RF-023 | Gestión de Objetivos |
| **RF-027** | Exportación de Objetivos | Consulta y Reportes | El sistema debe permitir exportar información de objetivos en formatos Excel, PDF y CSV | RF-026 | Gestión de Objetivos |
| **RF-028** | Gráficos de Progreso | Reportería y Dashboard | El sistema debe generar gráficos visuales del progreso de objetivos estratégicos | RF-025 | Gestión de Objetivos |
| **RF-029** | Gestión del PND | Gestión del PND | El sistema debe mantener estructura jerárquica del Plan Nacional de Desarrollo actualizada | - | Gestión del PND |
| **RF-030** | Versionado del PND | Gestión del PND | El sistema debe controlar versiones del PND con registro de cambios y fechas de actualización | RF-029 | Gestión del PND |
| **RF-031** | Notificaciones de Cambios PND | Gestión del PND | El sistema debe notificar automáticamente cambios en el PND a usuarios relevantes | RF-030, RF-021 | Gestión del PND |
| **RF-032** | Búsqueda en PND | Consulta y Reportes | El sistema debe permitir búsqueda y filtrado de lineamientos del PND por palabras clave | RF-029 | Gestión del PND |
| **RF-033** | Filtrado por Ejes y Políticas | Consulta y Reportes | El sistema debe filtrar contenido del PND por ejes estratégicos y políticas específicas | RF-032 | Gestión del PND |
| **RF-034** | Exportación de Lineamientos | Consulta y Reportes | El sistema debe exportar lineamientos específicos del PND en formatos requeridos | RF-032, RF-033 | Gestión del PND |
| **RF-035** | Catálogo de ODS | Gestión de ODS | El sistema debe mantener catálogo completo de los 17 Objetivos de Desarrollo Sostenible | - | Gestión de ODS |
| **RF-036** | Búsqueda de ODS | Gestión de ODS | El sistema debe permitir búsqueda de ODS por categorías, palabras clave y temas | RF-035 | Gestión de ODS |
| **RF-037** | Interfaz Visual de ODS | Gestión de ODS | El sistema debe proporcionar interfaz visual para navegación intuitiva de ODS | RF-035, RF-036 | Gestión de ODS |
| **RF-038** | Metas Específicas por ODS | Gestión de ODS | El sistema debe permitir definir metas institucionales específicas para cada ODS relevante | RF-035 | Gestión de ODS |
| **RF-039** | Indicadores Medibles ODS | Gestión de ODS | El sistema debe implementar indicadores medibles para seguimiento de metas ODS | RF-038 | Gestión de ODS |
| **RF-040** | Dashboard de Seguimiento ODS | Reportería y Dashboard | El sistema debe mostrar dashboard de seguimiento del progreso en ODS institucionales | RF-039 | Gestión de ODS |
| **RF-041** | Vinculación Proyecto-ODS | Gestión de Proyectos | El sistema debe permitir vincular proyectos con ODS correspondientes y calcular contribución | RF-035, RF-055 | Gestión de Proyectos |
| **RF-042** | Matriz de Contribución ODS | Gestión de Proyectos | El sistema debe crear matriz de contribución de proyectos por cada ODS vinculado | RF-041 | Gestión de Proyectos |
| **RF-043** | Reportes de Impacto ODS | Reportería y Dashboard | El sistema debe generar reportes de impacto institucional por ODS | RF-042 | Gestión de Proyectos |
| **RF-044** | Gestión de Programas | Gestión de Programas | El sistema debe permitir crear y gestionar programas institucionales con clasificación por tipos | - | Gestión de Programas |
| **RF-045** | Estados de Programa | Gestión de Programas | El sistema debe implementar workflow de estados para programas con transiciones controladas | RF-044 | Gestión de Programas |
| **RF-046** | Asignación de Presupuesto | Gestión de Programas | El sistema debe permitir asignar presupuesto y recursos a programas con seguimiento | RF-044 | Gestión de Programas |
| **RF-047** | Cronograma de Programas | Gestión de Programas | El sistema debe crear cronogramas con hitos para programas institucionales | RF-044, RF-046 | Gestión de Programas |
| **RF-048** | Asignación de Responsables | Gestión de Programas | El sistema debe asignar responsables específicos por programa con notificaciones | RF-044, RF-021 | Gestión de Programas |
| **RF-049** | Vinculación Programa-Plan | Gestión de Programas | El sistema debe vincular programas con planes institucionales asegurando coherencia estratégica | RF-044, RF-014 | Gestión de Programas |
| **RF-050** | Matriz de Coherencia | Gestión de Programas | El sistema debe crear matriz de coherencia entre programas y estrategias institucionales | RF-049 | Gestión de Programas |
| **RF-051** | Dashboard de Alineación | Reportería y Dashboard | El sistema debe mostrar dashboard de alineación estratégica de programas | RF-050 | Gestión de Programas |
| **RF-052** | Gestión de Proyectos | Gestión de Proyectos | El sistema debe permitir crear y gestionar proyectos completos con toda su documentación | - | Gestión de Proyectos |
| **RF-053** | Clasificación de Proyectos | Gestión de Proyectos | El sistema debe clasificar proyectos por tipos, sectores y categorías predefinidas | RF-052 | Gestión de Proyectos |
| **RF-054** | Carga de Documentos | Gestión de Proyectos | El sistema debe permitir cargar y gestionar documentos asociados a proyectos | RF-052 | Gestión de Proyectos |
| **RF-055** | Validación de Integridad | Gestión de Proyectos | El sistema debe validar integridad y completitud de información de proyectos | RF-052, RF-053 | Gestión de Proyectos |
| **RF-056** | Estados de Proyecto | Gestión de Proyectos | El sistema debe implementar workflow de estados para proyectos con transiciones | RF-052 | Gestión de Proyectos |
| **RF-057** | Seguimiento de Avance | Gestión de Proyectos | El sistema debe realizar seguimiento de avance físico y financiero de proyectos | RF-056 | Gestión de Proyectos |
| **RF-058** | Alertas de Desviación | Gestión de Proyectos | El sistema debe generar alertas automáticas por desviaciones en cronograma o presupuesto | RF-057, RF-020 | Gestión de Proyectos |
| **RF-059** | Vinculación Proyecto-Programa | Gestión de Proyectos | El sistema debe vincular proyectos con programas institucionales correspondientes | RF-052, RF-044 | Gestión de Proyectos |
| **RF-060** | Matriz de Contribución Múltiple | Gestión de Proyectos | El sistema debe crear matriz de contribución de proyectos a múltiples objetivos | RF-059, RF-041 | Gestión de Proyectos |
| **RF-061** | Reportes de Alineación | Reportería y Dashboard | El sistema debe generar reportes de alineación estratégica completa de proyectos | RF-060 | Gestión de Proyectos |
| **RF-062** | Generación de Reportes PDF | Reportería y Dashboard | El sistema debe generar reportes institucionales consolidados en formato PDF | - | Reportería |
| **RF-063** | Filtros Configurables | Reportería y Dashboard | El sistema debe permitir filtros configurables para personalización de reportes | RF-062 | Reportería |
| **RF-064** | Reportes Consolidados | Reportería y Dashboard | El sistema debe crear reportes consolidados con información de múltiples módulos | RF-062, RF-063 | Reportería |
| **RF-065** | Programación Automática | Reportería y Dashboard | El sistema debe programar generación automática de reportes periódicos | RF-062 | Reportería |
| **RF-066** | Exportación por Módulo | Consulta y Reportes | El sistema debe permitir exportación específica por módulo del sistema | - | Exportación de Datos |
| **RF-067** | Múltiples Formatos | Consulta y Reportes | El sistema debe soportar exportación en formatos Excel, CSV, JSON y XML | RF-066 | Exportación de Datos |
| **RF-068** | Exportación Programada | Consulta y Reportes | El sistema debe permitir programar exportaciones automáticas recurrentes | RF-066, RF-067 | Exportación de Datos |
| **RF-069** | Dashboard Ejecutivo | Reportería y Dashboard | El sistema debe proporcionar dashboard ejecutivo personalizable para alta dirección | - | Dashboard Ejecutivo |
| **RF-070** | KPIs en Tiempo Real | Reportería y Dashboard | El sistema debe mostrar KPIs institucionales actualizados en tiempo real | RF-069 | Dashboard Ejecutivo |
| **RF-071** | Gráficos Interactivos | Reportería y Dashboard | El sistema debe incluir gráficos interactivos en dashboard con drill-down | RF-069, RF-070 | Dashboard Ejecutivo |
| **RF-072** | Tablas con DataTables | Interfaz de Usuario | El sistema debe implementar tablas interactivas con paginación, búsqueda y ordenamiento | - | Gestión de Interfaz |
| **RF-073** | Exportación de Tablas | Interfaz de Usuario | El sistema debe permitir exportación directa desde tablas en múltiples formatos | RF-072 | Gestión de Interfaz |
| **RF-074** | Configuración de Columnas | Interfaz de Usuario | El sistema debe permitir configurar visibilidad y orden de columnas en tablas | RF-072 | Gestión de Interfaz |
| **RF-075** | Modales Interactivos | Interfaz de Usuario | El sistema debe implementar modales para confirmaciones, detalles y formularios | - | Gestión de Interfaz |
| **RF-076** | Navegación por Teclado | Interfaz de Usuario | El sistema debe soportar navegación completa por teclado en modales | RF-075 | Gestión de Interfaz |
| **RF-077** | Exportación Flexible | Consulta y Reportes | El sistema debe ofrecer opciones flexibles de exportación con formatos personalizables | RF-066, RF-067 | Exportación de Datos |
| **RF-078** | Validación de Exportación | Consulta y Reportes | El sistema debe validar integridad de datos antes de exportación | RF-077 | Exportación de Datos |
| **RF-079** | Arquitectura MVC | Arquitectura del Sistema | El sistema debe implementar arquitectura MVC estricta con separación clara de responsabilidades | - | Arquitectura Técnica |
| **RF-080** | APIs RESTful | Arquitectura del Sistema | El sistema debe desarrollar APIs RESTful para todos los módulos del sistema | RF-079 | Arquitectura Técnica |
| **RF-081** | Patrones de Código | Arquitectura del Sistema | El sistema debe establecer patrones de código y guías de estilo consistentes | RF-079, RF-080 | Arquitectura Técnica |
| **RF-082** | Base de Datos Estructurada | Arquitectura del Sistema | El sistema debe configurar estructura de base de datos optimizada y normalizada | RF-079 | Arquitectura Técnica |
| **RF-083** | Componentes Reutilizables | Interfaz de Usuario | El sistema debe desarrollar componentes UI reutilizables con patrones consistentes | RF-079 | Desarrollo Frontend |
| **RF-084** | Guías de Estilo | Interfaz de Usuario | El sistema debe crear guías de estilo y patrones de diseño para interfaz | RF-083 | Desarrollo Frontend |
| **RF-085** | Tests Automatizados | Arquitectura del Sistema | El sistema debe implementar suite completa de tests automatizados | RF-079, RF-080 | Calidad de Software |
| **RF-086** | Logs de Auditoría | Auditoría y Seguridad | El sistema debe implementar logs completos de auditoría para todas las operaciones | - | Auditoría y Seguridad |
| **RF-087** | Trazabilidad de Cambios | Auditoría y Seguridad | El sistema debe mantener trazabilidad completa de cambios con usuario y fecha | RF-086 | Auditoría y Seguridad |
| **RF-088** | Sistema de Backup | Auditoría y Seguridad | El sistema debe implementar backup automático de datos críticos | RF-086 | Auditoría y Seguridad |
| **RF-089** | Monitoreo de Rendimiento | Arquitectura del Sistema | El sistema debe monitorear rendimiento y generar alertas por problemas | RF-079 | Monitoreo del Sistema |
| **RF-090** | Documentación Técnica | Arquitectura del Sistema | El sistema debe mantener documentación técnica completa y actualizada | RF-079, RF-080 | Documentación |

---

## 📊 **RESUMEN DE REQUISITOS FUNCIONALES**

### **Distribución por Característica/Funcionalidad:**

| **Característica/Funcionalidad** | **Cantidad de Requisitos** | **Porcentaje** |
|-----------------------------------|----------------------------|----------------|
| Gestión de Proyectos | 12 requisitos | 13.3% |
| Reportería y Dashboard | 12 requisitos | 13.3% |
| Planificación Estratégica | 10 requisitos | 11.1% |
| Gestión de Usuarios | 8 requisitos | 8.9% |
| Gestión de ODS | 8 requisitos | 8.9% |
| Consulta y Reportes | 8 requisitos | 8.9% |
| Gestión de Entidades | 5 requisitos | 5.6% |
| Gestión de Programas | 8 requisitos | 8.9% |
| Interfaz de Usuario | 7 requisitos | 7.8% |
| Arquitectura del Sistema | 7 requisitos | 7.8% |
| Gestión del PND | 6 requisitos | 6.7% |
| Notificaciones | 3 requisitos | 3.3% |
| Validación y Cumplimiento | 2 requisitos | 2.2% |
| Auditoría y Seguridad | 3 requisitos | 3.3% |
| Otros | 3 requisitos | 3.3% |

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

## 🔗 **MATRIZ DE DEPENDENCIAS**

### **Requisitos Críticos (Sin Dependencias):**
- RF-001 (Autenticación de Usuario)
- RF-007 (Registro de Entidades del Estado)
- RF-012 (Páginas de Error Personalizadas)
- RF-014 (Creación de Planes Institucionales)
- RF-023 (Gestión de Objetivos Estratégicos)
- RF-029 (Gestión del PND)
- RF-035 (Catálogo de ODS)
- RF-044 (Gestión de Programas)
- RF-052 (Gestión de Proyectos)
- RF-079 (Arquitectura MVC)

### **Requisitos con Mayor Número de Dependencias:**
- RF-021 (Notificaciones Configurables) - 7 dependencias
- RF-041 (Vinculación Proyecto-ODS) - 6 dependencias
- RF-060 (Matriz de Contribución Múltiple) - 5 dependencias

---

*Este documento especifica todos los requisitos funcionales del sistema, proporcionando una base completa para el desarrollo, testing y validación del Sistema de Gestión Practicum 2025.*