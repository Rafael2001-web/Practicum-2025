# Pendientes - Examen Complexivo (Enero 2026)

Fecha: 2026-02-10

## Modulo de Seguimiento y Actividades (EPIC-13)

### Pendientes funcionales
- Reportes de actividades en formatos XLS, CSV y XML con filtros por estado y fechas (RF-097, HU-49, TAR-132).
- Alertas por desviaciones y actividades en riesgo (RF-098, HU-50, TAR-133). Estado: en progreso (dashboard con lista de riesgo).
- Tablero de seguimiento de actividades con visualizacion de alertas (HU-50, TAR-134). Estado: en progreso.
- Regla configurable de cumplimiento de objetivo por indicadores (AND/OR) y estado de cumplimiento por periodo (RF-099). Estado: en progreso (logica implementada en dashboard, falta configuracion).
- Evidencia de 3 escenarios de cumplimiento por regla (AND/OR/otros) en reporte o tablero. Estado: completado (dashboard).
- Auditoria con campo explicito de modulo en los registros (RF-096). Estado: completado (se agrega campo modulo).
- Mensajes de error orientados a usuario final en validaciones y acciones (RNF-003.4, RNF-003.5). Estado: completado (mensajes personalizados en actividades).

### Pendientes tecnicos
- Normalizar exportaciones desde tablas (CSV/XLS/XML) y agregar rutas/controlador.
- Definir estructura de indicadores por objetivo (si se requiere entidad o configuracion adicional).
- Completar permisos diferenciados Planificador/Aprobador para acciones especificas (TAR-135). Estado: completado.

## Entregables de Arquitectura Empresarial
- Diagrama de Motivacion (Archimate) actualizado.
- Arquitectura de Negocio (Archimate) actualizada.
- Arquitectura de Aplicacion (Archimate) actualizada.
- Arquitectura de Tecnologia (Archimate) actualizada.
- Flujo de valor (Archimate).
- Mapa de capacidades.
- Procesos de negocio.

## Entregables de Ingenieria y Arquitectura de Software
- Actualizar diagrama de casos de uso (incluye modulo de actividades/seguimiento).
- Actualizar diagrama de clases (incluye Actividad, auditoria y relaciones).
- Actualizar diagrama de componentes (MVC con actividades/indicadores).
- Actualizar diagrama de despliegue.
- Verificar actualizacion de requisitos en documentos ya existentes.

## Desarrollo de aplicaciones y bases de datos
- Actualizar diagrama logico de BDD (incluye actividades, auditoria y pivots).
- Actualizar modelo fisico BDD (.sql) si falta regenerar el script.
- Verificar frontend y backend con cambios finales del modulo.
- Validar programacion orientada a objetos (relaciones y uso de modelos).

## Validaciones adicionales
- Verificar respuesta de interfaz en menos de 5 segundos (RNF-001.5).
- Verificar comunicaciones seguras para integraciones externas (RNF-002.7).

## Notas
- Documento de referencia: docs/EXAMEN_COMPLEXIVO.md
- Estado actual: indicadores visibles en actividades (index/show) y resumen en dashboard.
