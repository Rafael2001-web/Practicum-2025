# 📋 REQUISITOS FUNCIONALES Y NO FUNCIONALES - SISTEMA DE GESTIÓN PRACTICUM 2025

---

## 🎯 REQUISITOS FUNCIONALES

### RF-001: AUTENTICACIÓN Y AUTORIZACIÓN

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-001.1 | Registro de usuarios | El sistema debe permitir el registro de nuevos usuarios con validación de datos únicos | Alta | HU-001 |
| RF-001.2 | Autenticación de usuarios | El sistema debe validar credenciales y gestionar sesiones de usuario | Alta | HU-002 |
| RF-001.3 | Cierre de sesión | El sistema debe permitir el cierre seguro de sesiones | Alta | HU-003 |
| RF-001.4 | Control de acceso por roles | El sistema debe restringir acceso según roles y permisos asignados | Alta | HU-035 |
| RF-001.5 | Gestión de permisos granular | El sistema debe validar permisos específicos para cada acción | Alta | HU-035 |

### RF-002: ADMINISTRACIÓN DEL SISTEMA

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-002.1 | CRUD de usuarios | El sistema debe permitir crear, leer, actualizar y eliminar usuarios | Alta | HU-004 |
| RF-002.2 | CRUD de roles | El sistema debe permitir gestionar roles del sistema | Alta | HU-005 |
| RF-002.3 | CRUD de permisos | El sistema debe permitir gestionar permisos individuales | Alta | HU-006 |
| RF-002.4 | Asignación de roles | El sistema debe permitir asignar/desasignar roles a usuarios | Alta | HU-004, HU-005 |
| RF-002.5 | Asignación de permisos | El sistema debe permitir asignar permisos específicos a roles | Alta | HU-005, HU-006 |

### RF-003: GESTIÓN DE ENTIDADES

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-003.1 | Visualización de entidades | El sistema debe mostrar listado paginado de entidades | Alta | HU-007 |
| RF-003.2 | CRUD de entidades | El sistema debe permitir gestión completa de entidades organizacionales | Alta | HU-008 |
| RF-003.3 | Validación de datos | El sistema debe validar unicidad de códigos y integridad de datos | Alta | HU-008 |
| RF-003.4 | Detalles de entidad | El sistema debe mostrar información completa de cada entidad | Media | HU-007 |

### RF-004: GESTIÓN DE UNIDADES

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-004.1 | Visualización de unidades | El sistema debe mostrar listado de unidades organizacionales | Alta | HU-010 |
| RF-004.2 | CRUD de unidades | El sistema debe permitir gestión completa de unidades | Alta | HU-011 |
| RF-004.3 | Relaciones organizacionales | El sistema debe mantener relaciones entre unidades y entidades | Media | HU-011 |
| RF-004.4 | Jerarquías organizacionales | El sistema debe soportar estructura jerárquica de unidades | Media | HU-010, HU-011 |

### RF-005: GESTIÓN DE OBJETIVOS DE DESARROLLO SOSTENIBLE (ODS)

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-005.1 | Catálogo de ODS | El sistema debe mantener catálogo completo de ODS | Alta | HU-013 |
| RF-005.2 | CRUD de ODS | El sistema debe permitir gestión de información de ODS | Alta | HU-014 |
| RF-005.3 | Vinculación con proyectos | El sistema debe permitir asociar ODS con proyectos | Media | HU-013, HU-029 |
| RF-005.4 | Seguimiento de metas | El sistema debe permitir seguimiento de metas ODS | Media | HU-013, HU-014 |

### RF-006: GESTIÓN DE OBJETIVOS ESTRATÉGICOS

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-006.1 | Planificación estratégica | El sistema debe gestionar objetivos estratégicos institucionales | Alta | HU-016, HU-017 |
| RF-006.2 | Alineación estratégica | El sistema debe mantener coherencia entre objetivos | Media | HU-017 |
| RF-006.3 | Indicadores de gestión | El sistema debe soportar definición de indicadores | Media | HU-016, HU-017 |

### RF-007: GESTIÓN DEL PLAN NACIONAL DE DESARROLLO (PND)

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-007.1 | Información del PND | El sistema debe mantener información actualizada del PND | Alta | HU-019, HU-020 |
| RF-007.2 | Alineación nacional | El sistema debe permitir alineación con políticas nacionales | Media | HU-019, HU-020 |
| RF-007.3 | Normatividad | El sistema debe asegurar cumplimiento normativo | Media | HU-020 |

### RF-008: GESTIÓN DE PLANES INSTITUCIONALES

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-008.1 | CRUD de planes | El sistema debe permitir gestión completa de planes | Alta | HU-022, HU-023 |
| RF-008.2 | Cronogramas | El sistema debe soportar definición de cronogramas | Media | HU-023 |
| RF-008.3 | Vinculación estratégica | El sistema debe vincular planes con objetivos estratégicos | Media | HU-023 |

### RF-009: GESTIÓN DE PROGRAMAS

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-009.1 | CRUD de programas | El sistema debe permitir gestión completa de programas | Alta | HU-025, HU-026 |
| RF-009.2 | Coordinación programática | El sistema debe facilitar coordinación entre programas | Media | HU-026 |
| RF-009.3 | Recursos y presupuestos | El sistema debe gestionar recursos asignados | Media | HU-026 |

### RF-010: GESTIÓN DE PROYECTOS

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-010.1 | CRUD de proyectos | El sistema debe permitir gestión completa de proyectos | Alta | HU-028, HU-029 |
| RF-010.2 | Seguimiento de avances | El sistema debe permitir seguimiento de estado y avances | Alta | HU-028 |
| RF-010.3 | Vinculación múltiple | El sistema debe vincular proyectos con programas y ODS | Media | HU-029 |

### RF-011: REPORTERÍA Y EXPORTACIÓN

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-011.1 | Reportes en PDF | El sistema debe generar reportes profesionales en PDF | Alta | HU-009, HU-012, HU-015, HU-018, HU-021, HU-024, HU-027, HU-030 |
| RF-011.2 | Exportación de datos | El sistema debe exportar datos en múltiples formatos | Alta | HU-039 |
| RF-011.3 | Reportes consolidados | El sistema debe generar reportes multi-módulo | Media | HU-033, HU-034 |
| RF-011.4 | Dashboards ejecutivos | El sistema debe proporcionar vistas ejecutivas | Media | HU-031, HU-033 |

### RF-012: INTERFAZ DE USUARIO AVANZADA

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-012.1 | Tablas interactivas | El sistema debe proporcionar tablas con funcionalidades avanzadas | Alta | HU-039 |
| RF-012.2 | Modales inteligentes | El sistema debe utilizar ventanas modales para operaciones contextuales | Media | HU-040 |
| RF-012.3 | Componentes reutilizables | El sistema debe implementar componentes UI consistentes | Media | HU-041 |
| RF-012.4 | Navegación intuitiva | El sistema debe proporcionar navegación clara y coherente | Alta | HU-038 |

### RF-013: DASHBOARD Y GESTIÓN PERSONAL

| **ID** | **Requisito** | **Descripción** | **Prioridad** | **HU Relacionada** |
|--------|---------------|------------------|---------------|-------------------|
| RF-013.1 | Dashboard personalizado | El sistema debe mostrar dashboard según rol del usuario | Alta | HU-031 |
| RF-013.2 | Gestión de perfil | El sistema debe permitir gestión de perfil personal | Media | HU-032 |
| RF-013.3 | Preferencias de usuario | El sistema debe mantener preferencias personalizadas | Baja | HU-032 |

---

## ⚡ REQUISITOS NO FUNCIONALES

### RNF-001: RENDIMIENTO

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-001.1 | Tiempo de respuesta | Las páginas deben cargar en menos de 3 segundos | < 3 seg | HU-042 |
| RNF-001.2 | Capacidad de usuarios | El sistema debe soportar 100 usuarios concurrentes | 100 usuarios | Todas |
| RNF-001.3 | Procesamiento de datos | Las tablas deben manejar hasta 10,000 registros sin degradación | 10K registros | HU-039 |
| RNF-001.4 | Exportación eficiente | La exportación de datos debe completarse en menos de 30 segundos | < 30 seg | HU-039, RF-011.2 |

### RNF-002: SEGURIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-002.1 | Autenticación segura | Las contraseñas deben cumplir políticas de seguridad | Mín 8 caracteres | HU-001, HU-002 |
| RNF-002.2 | Sesiones seguras | Las sesiones deben expirar después de inactividad | 30 min inactividad | HU-002, HU-003 |
| RNF-002.3 | Control de acceso | Todas las rutas deben validar permisos | 100% rutas protegidas | HU-035 |
| RNF-002.4 | Encriptación de datos | Los datos sensibles deben estar encriptados | Encriptación AES-256 | Todas |
| RNF-002.5 | Auditoría de acciones | El sistema debe registrar acciones críticas | Log de todas las operaciones | Todas |

### RNF-003: USABILIDAD

| **ID** | **Requisito** | **Descripción** | **Métrica** | **HU Relacionada** |
|--------|---------------|------------------|-------------|-------------------|
| RNF-003.1 | Interfaz intuitiva | La interfaz debe ser fácil de usar sin capacitación | < 5 min aprendizaje | HU-037, HU-038 |
| RNF-003.2 | Responsive design | La interfaz debe funcionar en dispositivos móviles | 100% responsive | HU-037, HU-039 |
| RNF-003.3 | Accesibilidad | El sistema debe cumplir estándares de accesibilidad | WCAG 2.1 AA | HU-040, HU-042 |
| RNF-003.4 | Mensajes claros | Los errores deben mostrar mensajes comprensibles | Mensajes en español | HU-036, HU-042 |

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

## 📊 MATRIZ DE TRAZABILIDAD

### Distribución de Requisitos por Prioridad

| **Prioridad** | **Funcionales** | **No Funcionales** | **Total** |
|---------------|-----------------|-------------------|-----------|
| **Alta** | 28 | 8 | 36 |
| **Media** | 18 | 12 | 30 |
| **Baja** | 1 | 20 | 21 |
| **TOTAL** | **47** | **40** | **87** |

### Cobertura por Módulo

| **Módulo** | **Requisitos Funcionales** | **% Cobertura** |
|------------|----------------------------|----------------|
| Autenticación y Autorización | 5 | 100% |
| Administración del Sistema | 5 | 100% |
| Gestión de Entidades | 4 | 100% |
| Gestión de Unidades | 4 | 100% |
| Gestión de ODS | 4 | 100% |
| Gestión de Objetivos Estratégicos | 3 | 100% |
| Gestión del PND | 3 | 100% |
| Gestión de Planes | 3 | 100% |
| Gestión de Programas | 3 | 100% |
| Gestión de Proyectos | 3 | 100% |
| Reportería y Exportación | 4 | 100% |
| Interfaz de Usuario | 4 | 100% |
| Dashboard y Gestión Personal | 3 | 100% |

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