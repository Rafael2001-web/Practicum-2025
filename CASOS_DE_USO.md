# Casos de Uso - Sistema SIPEIP 2.0
*Sistema de Planificación Estratégica Institucional Participativa*

## 📋 Índice
1. [Actores del Sistema](#actores-del-sistema)
2. [Cases de Uso por Actor](#casos-de-uso-por-actor)
3. [Casos de Uso Detallados](#casos-de-uso-detallados)
4. [Diagramas de Flujo](#diagramas-de-flujo)

---

## 🎭 Actores del Sistema

### 1. **Desarrollador/Soporte Técnico**
- **Descripción**: Personal técnico responsable del mantenimiento, desarrollo y soporte del sistema
- **Responsabilidades**: 
  - Gestión de usuarios del sistema
  - Mantenimiento de entidades
  - Configuración de unidades organizacionales
  - Soporte técnico general

### 2. **Administrador del Sistema (TI)**
- **Descripción**: Administrador principal con acceso completo al sistema
- **Responsabilidades**:
  - Gestión completa de usuarios
  - Gestión de entidades públicas
  - Gestión de unidades organizacionales
  - Supervisión general del sistema

### 3. **Revisor Institucional**
- **Descripción**: Personal encargado de la revisión y validación de contenido estratégico
- **Responsabilidades**:
  - Gestión de objetivos estratégicos
  - Alineación con objetivos institucionales
  - Gestión de ODS (Objetivos de Desarrollo Sostenible)
  - Gestión de PND (Plan Nacional de Desarrollo)
  - Gestión de planes institucionales
  - Gestión de programas institucionales

### 4. **Técnico de Planificación**
- **Descripción**: Especialista en planificación estratégica y proyectos
- **Responsabilidades**:
  - Gestión de programas
  - Ingreso y seguimiento de planes

### 5. **Planificador Institucional**
- **Descripción**: Responsable de la planificación estratégica a nivel institucional
- **Responsabilidades**:
  - Gestión integral de la planificación institucional

### 6. **Autoridad Validante**
- **Descripción**: Personal con autoridad para aprobar y validar elementos estratégicos
- **Responsabilidades**:
  - Validación final de elementos del sistema

### 7. **Auditor/Control Interno**
- **Descripción**: Personal encargado del control y auditoría interna
- **Responsabilidades**:
  - Gestión de reportes
  - Gestión de recursos para auditoría
  - Descarga de reportes del sistema

### 8. **Usuario Externo**
- **Descripción**: Usuarios externos que consultan información pública
- **Responsabilidades**:
  - Ingreso de planes (según permisos)
  - Consulta de información pública

---

## 📝 Casos de Uso por Actor

### **Desarrollador/Soporte Técnico**
- CU-01: Gestionar Usuarios
- CU-02: Gestionar Entidades  
- CU-03: Gestionar Unidades

### **Administrador del Sistema (TI)**
- CU-01: Gestionar Usuarios
- CU-02: Gestionar Entidades
- CU-03: Gestionar Unidades

### **Revisor Institucional**
- CU-04: Gestionar Objetivos Estratégicos
- CU-05: Gestionar ODS
- CU-06: Gestionar PND
- CU-07: Gestionar Planes
- CU-08: Gestionar Programas

### **Técnico de Planificación**
- CU-08: Gestionar Programas
- CU-09: Ingresar Planes

### **Planificador Institucional**
- CU-10: Coordinar Planificación Institucional

### **Autoridad Validante**
- CU-11: Validar Elementos Estratégicos

### **Auditor/Control Interno**
- CU-12: Gestionar Reportes
- CU-13: Gestionar Recursos
- CU-14: Descargar Reportes

### **Usuario Externo**
- CU-09: Ingresar Planes (limitado)
- CU-15: Consultar Información Pública

---

## 🔍 Casos de Uso Detallados

### **CU-01: Gestionar Usuarios**
- **Actor Principal**: Desarrollador/Soporte Técnico, Administrador del Sistema
- **Descripción**: Permite crear, visualizar, editar y eliminar usuarios del sistema
- **Precondiciones**: Usuario autenticado con permisos administrativos
- **Flujo Principal**:
  1. El actor accede al módulo de usuarios
  2. Visualiza la lista de usuarios existentes
  3. Puede realizar las siguientes acciones:
     - Crear nuevo usuario (nombre, email, rol, contraseña)
     - Editar información de usuario existente
     - Eliminar usuario (si no tiene dependencias)
     - Ver detalles completos del usuario
- **Postcondiciones**: Los cambios se reflejan en el sistema inmediatamente

### **CU-02: Gestionar Entidades**
- **Actor Principal**: Desarrollador/Soporte Técnico, Administrador del Sistema
- **Descripción**: Administrar las entidades públicas del sistema
- **Precondiciones**: Usuario autenticado con permisos administrativos
- **Flujo Principal**:
  1. El actor accede al módulo de entidades
  2. Visualiza entidades con código, subsector, nivel de gobierno y estado
  3. Puede realizar acciones:
     - Crear nueva entidad (código, subsector, nivel gobierno, estado, fechas)
     - Editar información de entidad
     - Eliminar entidad (si no tiene programas asociados)
     - Ver detalles completos de la entidad
- **Postcondiciones**: Las entidades quedan disponibles para asociar a programas

### **CU-03: Gestionar Unidades**
- **Actor Principal**: Desarrollador/Soporte Técnico, Administrador del Sistema
- **Descripción**: Administrar las unidades organizacionales
- **Flujo Principal**:
  1. Acceso al módulo de unidades
  2. Gestión de unidades con nombre, descripción y estado
  3. Operaciones CRUD completas
  4. Visualización de detalles individuales

### **CU-04: Gestionar Objetivos Estratégicos**
- **Actor Principal**: Revisor Institucional
- **Descripción**: Administrar objetivos estratégicos institucionales
- **Flujo Principal**:
  1. Acceso al módulo de objetivos estratégicos
  2. Creación con nombre, descripción, indicadores y metas
  3. Alineación con estrategia institucional
  4. Seguimiento y actualización

### **CU-05: Gestionar ODS**
- **Actor Principal**: Revisor Institucional
- **Descripción**: Gestionar Objetivos de Desarrollo Sostenible
- **Flujo Principal**:
  1. Acceso al módulo ODS
  2. Gestión de objetivos alineados con agenda 2030
  3. Definición de metas e indicadores
  4. Seguimiento de cumplimiento

### **CU-06: Gestionar PND**
- **Actor Principal**: Revisor Institucional
- **Descripción**: Administrar elementos del Plan Nacional de Desarrollo
- **Flujo Principal**:
  1. Acceso al módulo PND
  2. Gestión de componentes del plan nacional
  3. Alineación con políticas públicas
  4. Seguimiento de implementación

### **CU-07: Gestionar Planes**
- **Actor Principal**: Revisor Institucional
- **Descripción**: Administrar planes institucionales
- **Flujo Principal**:
  1. Acceso al módulo de planes
  2. Creación con nombre, descripción, fechas, presupuesto
  3. Asignación de responsables
  4. Seguimiento de ejecución

### **CU-08: Gestionar Programas**
- **Actor Principal**: Revisor Institucional, Técnico de Planificación
- **Descripción**: Administrar programas institucionales
- **Flujo Principal**:
  1. Acceso al módulo de programas
  2. Creación vinculada a entidades responsables
  3. Definición de objetivos y actividades
  4. Seguimiento de implementación

### **CU-09: Ingresar Planes**
- **Actor Principal**: Técnico de Planificación, Usuario Externo (limitado)
- **Descripción**: Ingreso de nuevos planes al sistema
- **Flujo Principal**:
  1. Acceso al formulario de planes
  2. Ingreso de información requerida
  3. Validación de datos
  4. Envío para revisión/aprobación

### **CU-10: Coordinar Planificación Institucional**
- **Actor Principal**: Planificador Institucional
- **Descripción**: Coordinación integral de la planificación
- **Flujo Principal**:
  1. Supervisión de todos los módulos de planificación
  2. Coordinación entre diferentes áreas
  3. Seguimiento de avances
  4. Reportes integrales

### **CU-11: Validar Elementos Estratégicos**
- **Actor Principal**: Autoridad Validante
- **Descripción**: Aprobación final de elementos estratégicos
- **Flujo Principal**:
  1. Revisión de elementos pendientes de validación
  2. Evaluación de cumplimiento de criterios
  3. Aprobación o solicitud de correcciones
  4. Registro de decisiones

### **CU-12: Gestionar Reportes**
- **Actor Principal**: Auditor/Control Interno
- **Descripción**: Administración del sistema de reportes
- **Flujo Principal**:
  1. Configuración de parámetros de reportes
  2. Definición de periodicidad
  3. Asignación de responsables
  4. Seguimiento de generación

### **CU-13: Gestionar Recursos**
- **Actor Principal**: Auditor/Control Interno
- **Descripción**: Administración de recursos para auditoría
- **Flujo Principal**:
  1. Inventario de recursos disponibles
  2. Asignación de recursos a procesos
  3. Seguimiento de utilización
  4. Optimización de recursos

### **CU-14: Descargar Reportes**
- **Actor Principal**: Auditor/Control Interno
- **Descripción**: Descarga de reportes del sistema
- **Flujo Principal**:
  1. Selección de tipo de reporte
  2. Configuración de parámetros
  3. Generación del reporte
  4. Descarga en formato requerido (PDF, Excel)

### **CU-15: Consultar Información Pública**
- **Actor Principal**: Usuario Externo
- **Descripción**: Consulta de información pública disponible
- **Flujo Principal**:
  1. Acceso a sección pública
  2. Navegación por información disponible
  3. Búsqueda de contenido específico
  4. Visualización de resultados

---

## 🔄 Diagramas de Flujo

### **Flujo General del Sistema**
```
[Inicio] → [Autenticación] → [Selección de Módulo] → [Operación CRUD] → [Validación] → [Confirmación] → [Fin]
```

### **Flujo de Gestión (CRUD Estándar)**
```
[Lista] → [Acción] → {Crear|Ver|Editar|Eliminar} → [Formulario/Vista] → [Validación] → [Guardado] → [Confirmación]
```

### **Flujo de Validación Institucional**
```
[Elemento Creado] → [Revisión Técnica] → [Revisión Institucional] → [Validación de Autoridad] → [Aprobado/Rechazado]
```

---

## 📊 Matriz de Actor-Caso de Uso

| Caso de Uso | Dev/Soporte | Admin TI | Revisor | Técnico Plan | Planificador | Autoridad | Auditor | Usuario Ext |
|-------------|-------------|----------|---------|--------------|--------------|-----------|---------|-------------|
| CU-01 Usuarios | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-02 Entidades | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-03 Unidades | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-04 Obj. Estratégicos | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-05 ODS | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-06 PND | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-07 Planes | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ | ❌ | ❌ |
| CU-08 Programas | ❌ | ❌ | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ |
| CU-09 Ingresar Planes | ❌ | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ | ✅ |
| CU-10 Coord. Institucional | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ | ❌ | ❌ |
| CU-11 Validar Elementos | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ | ❌ |
| CU-12 Gest. Reportes | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ |
| CU-13 Gest. Recursos | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ |
| CU-14 Desc. Reportes | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ | ❌ |
| CU-15 Consulta Pública | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ |

---

## 🎯 Conclusiones

Este documento define los casos de uso del Sistema SIPEIP 2.0 basado en:

1. **Análisis del diagrama de actores** proporcionado
2. **Funcionalidad actual** del sistema Laravel implementado
3. **Roles y responsabilidades** observados en el sistema
4. **Flujos de trabajo** identificados en los CRUDs

### **Recomendaciones para Mejoras:**

1. **Implementar sistema de roles y permisos** más granular
2. **Agregar flujos de aprobación** para elementos críticos
3. **Desarrollar dashboard específico** para cada tipo de actor
4. **Implementar notificaciones** para cambios importantes
5. **Agregar auditoría completa** de acciones del sistema

---

*Documento generado para el Sistema SIPEIP 2.0 - Versión 1.0*
*Fecha: Octubre 2025*