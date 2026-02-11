# Examen Complexivo - Enero 2026 - TI

**NOMBRES ESTUDIANTE:**

**FECHA:**

**TIEMPO DE DESARROLLO:** 5 HORAS

---

## ESCENARIO CASO PRÁCTICO

Dentro del caso de estudio de examen complexivo cuyo tema es **"Sistema Integral de Planificación e Inversión Pública (SIPeIP)"**, Ud. ha identificado módulos o componentes a nivel general que deberían satisfacer los procesos alineados al marco legal ecuatoriano y a los Objetivos de Desarrollo Sostenible (ODS), el Plan Nacional de Desarrollo (PND), y la gestión de metas, indicadores y presupuesto.

Una vez definida la línea base del proyecto y desarrollado el caso, Ud. hasta diciembre del 2025 hizo la entrega de una propuesta de solución documentada que le permite gestionar el proyecto y gestionar el producto.

Sin embargo, a partir del mes de enero del 2026 los Stakeholders, indican que existen nuevas necesidades que no fueron consideradas inicialmente y se le solicita a Ud. en base a su experiencia proporcione un alcance a la propuesta de solución documentada.

---

## NECESIDADES

Luego de una reunión entre los involucrados del proyecto, se recaban y listan las siguientes necesidades las cuales servirán para determinar alcance, proponer la participación de nuevos o los mismos recursos, definir los tiempos y establecer costos. Entre las nuevas necesidades constan:

1. Que exista un módulo o componente a nivel de sistema que permita **monitorear constantemente el avance de actividades e indicadores** para ajustar estrategias y priorizar acciones cuando existan desviaciones en los proyectos.

2. **Integrar los nuevos requisitos y módulos** a los diagramas previamente realizados.

3. Toda funcionalidad del sistema y transacción de negocio debe **responder a las acciones que realizan los usuarios sobre la GUI en menos de 5 segundos**.

4. Los nuevos componentes deben desarrollarse aplicando **patrones y recomendaciones de programación que incrementen la seguridad de datos**.

5. Para las comunicaciones externas entre servidores de datos, API's externas, aplicación móvil y cliente deben tener en cuenta el **uso de protocolos de y/o certificados de seguridad**.

6. El sistema debe proporcionar **mensajes de error que sean informativos y orientados a usuario final** para mejorar la usabilidad.

---

## Especificación Funcional – Gestión de seguimiento y actividades

El nuevo módulo y/o funcionalidad debe permitir a los usuarios autorizados **crear, editar, eliminar lógicamente actividades**. Las actividades deberán estar asociadas a Proyectos, objetivos e indicadores, incluyendo reportes y auditoría completa.

### Roles y Permisos

Los usuarios con sus roles asignados tendrán permisos para realizar las siguientes acciones:

**Usuario con rol Planificador:**
- Crea y elimina lógicamente las actividades.

**Usuario con rol Aprobador:**
- Actualiza y realiza seguimiento de las actividades.

### Consideraciones de reglas de acceso

- Los usuarios solo pueden visualizar el estado de actividades
- Planificación Institucional y Auditoría cuentan con permisos de lectura transversal.

Considere que se requiere **monitorear el avance real de las actividades**, identificando retrasos o desviaciones para tomar acciones correctivas oportunas.

---

## Registro de Actividades

Para el registro de actividades considere como base tener lo siguiente:

| Campo | Reglas / Observaciones |
|-------|------------------------|
| Código de actividad por Proyecto | Único por proyecto (ej. ACT001, ACT002, ACT003…) |
| Objetivo con el que se asocia | |
| Nombre de actividad | Obligatorio |
| Descripción de actividad | Opcional |
| Responsable | Usuario o persona quien ejecutará la actividad |
| Estado actividad inicial | (PLANIFICADA) |
| Prioridad | Valor de registro de 1 a 5 |
| Fecha inicio actividad planificada | Obligatorio |
| Fecha fin actividad planificada | Obligatorio |
| Fecha inicio real actividad planificada | Se llena al iniciar o ejecutar la actividad |
| Fecha fin real actividad planificada | Se llena al finalizar o completar la actividad |
| Duración planificada días | Planificación inicial asignada |
| Estado activo/inactivo | Estado de actividad, usado para eliminación lógica |

---

## Monitoreo de Avance Real de Actividades

Para el monitoreo de avance real de las actividades debe considerar lo siguiente:

Actualizar los datos de las actividades acorde a los indicadores, usando fórmula y unidad de medida.

### INDICADOR 1: Indicador de Avance

- **Nombre:** Avance de la actividad
- **Fórmula:** `avance_real / avance_planificado * 100`
- **Unidad de medida indicador:** porcentaje (%)
- **Meta:** 100%

### INDICADOR 2: Indicador de tiempo

- **Nombre:** Variación de Tiempo
- **Fórmula:** `fecha_real_fin - fecha_planificada_fin`
- **Unidad de medida de indicador:** días
- **Meta:** ≤ 0

### INDICADOR 3: Indicador de Tiempo

- **Nombre:** Cumplimiento de Plazo
- **Fórmula:** Si `fecha_real_fin ≤ fecha_planificada_fin` entonces estado reportado = "Completada", CASO CONTRARIO "En Riesgo"

Para el indicador 3, se debe actualizar el **estado reportado de la actividad**, el cual debe calcularse en base al Indicador de Tiempo usando los valores: **EN_RIESGO**, **COMPLETADA**, **NO INICIADA** (cuando el porcentaje de avance de la actividad es 0).

---

## Auditoría

Para el registro de datos de auditoría, se debe considerar que:

Al crear, actualizar o eliminar lógicamente la actividad se registre el **usuario**, **fecha y hora de acción** y **cuál es la acción realizada**.

---

## Cálculo de cumplimiento del indicador

El sistema debe calcular el cumplimiento del indicador por periodo (valor actual vs meta) y su estado cumplimiento:

**Estado Cumplimiento:** No iniciado / En progreso / Cumplido / No cumplido (según regla).

### Regla "Indicadores cumplidos ⇒ Objetivo cumplido"

El sistema debe determinar automáticamente el estado del objetivo en base al estado de sus indicadores (INDICADOR 1 AL 3), considerando una regla configurable:

- **Regla 1:** Regla por defecto (AND): un objetivo se cumple si TODOS sus indicadores están cumplidos. Estado Cumplimiento = **Cumplido**

- **Regla 2:** Regla alternativa (OR): un objetivo se cumple si AL MENOS UNO de sus indicadores está cumplido. Estado Cumplimiento = **En Progreso**

- **Regla 3:** En todos los demás casos, el Estado Cumplimiento = **No cumplido**

---

## Evidencia de cumplimiento del objetivo

Debe crear como mínimo obligatoriamente **3 escenarios** donde se visualice a nivel de reporte o tablero de seguimiento la evidencia de cumplimiento del indicador en base a cada una de las 3 reglas mostrando por objetivo:
- Actividades relacionadas
- Porcentaje de avance por actividad
- Actividades clasificada por estado reportado
- Indicadores cumplidos y mediciones

---

## Funcionalidades esenciales

1. Registro y monitoreo real de actividades.
2. Asociación de la actividad con proyectos/programas y objetivos.
3. Generación de reportes de actividades creadas, en al menos uno de los siguientes formatos: **PDF, XLS, CSV y XML**.
4. Para los registros de auditoría, se debe registrar cada acción realizada sobre el nuevo módulo y/o funcionalidad (fecha, usuario, módulo, acción).

---

## Validaciones de negocio

Entre las validaciones de negocio requeridas para el nuevo módulo y funcionalidades constan:

- **V-01:** La fecha de inicio ≤ fecha de fin.
- **V-02:** Una actividad no puede aprobarse sin estar asociada a un proyecto/programa y a objetivos válidos.
- **V-03:** El sistema debe permitir asociar cada actividad a uno o más objetivos.

---

## ENTREGABLES

En base al texto de este nuevo escenario dentro del estudio de caso a Ud. es importante que usted haga uso del trabajo previo para esta fase final del examen complexivo.

### Para el dominio de Arquitectura Empresarial

**Tiempo de desarrollo: 1 hora**

1. Diagrama de Motivación {Archimate}
2. Arquitectura de Negocio {Archimate}
3. Arquitectura de Aplicación {Archimate}
4. Arquitectura de Tecnología {Archimate}

### Para el dominio de arquitectura de software y desarrollo de aplicaciones empresariales

**Tiempo de desarrollo: 3.5 horas**

#### Recolección de Requisitos:
- Identificar las necesidades de los usuarios.
- Definir los requisitos específicos del módulo.

#### Planificación:
- Planifique las Épicas, Historias y Tareas respectivas

#### Diseño:
- Realice toda la documentación de Diseño requerida, acorde al Framework 4+1 usado.

#### Diseño de la Base de Datos:
- Crear tablas y relaciones necesarias para almacenar información sobre lubricantes y repuestos.

#### Desarrollo del Backend:
- Implementar la lógica de negocio.
- Crear endpoints, si fuese necesario, para las operaciones CRUD.

#### Desarrollo del Frontend:
- Diseñar interfaces de usuario para interactuar con el sistema.
- Asegurar una navegación intuitiva y eficiente.

#### Integración y Pruebas:
- Integrar el frontend con el backend.
- Realizar pruebas unitarias, de integración

---

## SUGERENCIA

Como sugerencia, en el día del Examen Complexivo, debe hacer uso de todos los recursos que trabajó en los talleres, por lo tanto, se requiere que usted desarrolle, actualice y organice la documentación de los entregables acorde a los dominios académicos.

---

## Entregables Dominio de Arquitectura Empresarial

1. Actualización de Diagrama de Motivación {Archimate}
2. Actualización del Mapa de Arquitectura de Negocio {Archimate}
3. Flujo de valor {Archimate}
4. Mapa de capacidades {Archimate}
5. Procesos de negocio {Archimate}

## Entregable Dominio Ingeniería y Arquitectura de Software

1. Documento de especificación de requisitos de usuario, funcionales, no funcionales.
2. Actualización de la Planificación del Sprint (Sprint del día del examen – Plantilla en Excel o herramienta en la Nube {Jira, Trello, Asana, Azure})
3. Actualización del Diagrama de casos de uso (Enterprise Architect)
4. Actualización del Diagrama de Clases (Enterprise Architect)
5. Actualización del Diagrama de Componentes (Arquitectura Lógica - MVC) (Enterprise Architect)
6. Actualización del Diagrama de Despliegue (Arquitectura Física) (Enterprise Architect)

## Desarrollo de aplicaciones empresariales y bases de datos

1. Actualización del Diagrama Lógico de BDD (Workbench, MySQL, PhpMyAdmin, u otro)
2. Actualización del Modelo Físico de BDD (.sql) - BDD Relacional
3. Front-end (Acorde al patrón MVC – Vista Estructural + Comportamiento) con cambios
4. Back-end (Acorde al patrón MVC – Controlador y Modelo) con cambios
5. Programación orientada a objetos (Herencia, Polimorfismo)
6. Funcionalidad de la aplicación

---

## CIERRE

Al finalizar el examen recuerde cargarlos a la carpeta determinada para cada estudiante y prepararse para la exposición y defensa de su propuesta en el horario establecido para la tarde de hoy.

**¡Éxitos!**
