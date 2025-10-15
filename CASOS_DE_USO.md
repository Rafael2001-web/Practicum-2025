# Casos de Uso - Sistema SIPEIP 2.0
*Sistema de Planificación Estratégica Institucional Participativa*

## 📋 Índice
1. [Actores del Sistema](#actores-del-sistema)
2. [Cases de Uso por Actor](#casos-de-uso-por-actor)
3. [Casos de Uso Detallados](#casos-de-uso-detallados)
4. [Diagramas de Flujo](#diagramas-de-flujo)

---

## 🎭 Actores del Sistema - Asignación Específica por CRUD

### 1. **👑 Administrador del Sistema**
- **CRUD Principal**: **Usuarios** 
- **Permisos Especiales**: 
  - ✅ **CRUD COMPLETO**: Usuarios (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Todos los demás CRUDs (para supervisión)
- **Descripción**: Administrador principal con gestión exclusiva de usuarios y supervisión general
- **Responsabilidad**: Gestión de accesos, roles y seguridad del sistema

### 2. **🏢 Gestor de Entidades**
- **CRUD Principal**: **Entidades**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Entidades (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Programas (para verificar relaciones)
- **Descripción**: Especialista en administración de entidades públicas
- **Responsabilidad**: Mantener actualizado el catálogo de entidades del sector público

### 3. **🏗️ Coordinador de Unidades**
- **CRUD Principal**: **Unidades**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Unidades (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Usuarios, Entidades (para contexto organizacional)
- **Descripción**: Responsable de la estructura organizacional interna
- **Responsabilidad**: Gestión de unidades organizacionales y estructura interna

### 4. **🎯 Especialista en ODS**
- **CRUD Principal**: **ODS (Objetivos de Desarrollo Sostenible)**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: ODS (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Objetivos Estratégicos, Planes (para alineación)
- **Descripción**: Experto en Agenda 2030 y desarrollo sostenible
- **Responsabilidad**: Alineación institucional con los ODS de la ONU

### 5. **🎯 Planificador Estratégico**
- **CRUD Principal**: **Objetivos Estratégicos**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Objetivos Estratégicos (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: ODS, PND, Planes (para alineación estratégica)
- **Descripción**: Especialista en planificación estratégica institucional
- **Responsabilidad**: Definir y mantener objetivos estratégicos alineados

### 6. **🇵🇪 Analista de PND**
- **CRUD Principal**: **PND (Plan Nacional de Desarrollo)**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: PND (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Objetivos Estratégicos, Planes (para coherencia nacional)
- **Descripción**: Especialista en políticas nacionales de desarrollo
- **Responsabilidad**: Mantener coherencia con el Plan Nacional de Desarrollo

### 7. **📋 Gestor de Planes**
- **CRUD Principal**: **Planes**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Planes (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Objetivos Estratégicos, PND, ODS, Programas (para alineación)
- **Descripción**: Coordinador de planes institucionales y operativos
- **Responsabilidad**: Gestión integral de la planificación institucional

### 8. **📊 Coordinador de Programas**
- **CRUD Principal**: **Programas**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Programas (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Entidades, Planes (para vinculación correcta)
- **Descripción**: Especialista en programas institucionales y su ejecución
- **Responsabilidad**: Gestión de programas vinculados a entidades

### 9. **📈 Analista de Proyectos**
- **CRUD Principal**: **Proyectos**
- **Permisos**:
  - ✅ **CRUD COMPLETO**: Proyectos (Crear, Ver, Editar, Eliminar)
  - 👀 **SOLO LECTURA**: Planes, Programas, Usuarios (para asignaciones)
- **Descripción**: Especialista en gestión y seguimiento de proyectos
- **Responsabilidad**: Administrar portafolio de proyectos institucionales

### 10. **👁️ Supervisor General**
- **CRUD Principal**: **Ninguno (Solo Supervisión)**
- **Permisos**:
  - 👀 **SOLO LECTURA**: TODOS los CRUDs (supervisión completa)
  - 📊 **REPORTES**: Acceso a todos los reportes del sistema
- **Descripción**: Supervisor con visión integral del sistema
- **Responsabilidad**: Monitoreo, reportes y supervisión general

---

## 📝 Casos de Uso por Actor - Asignación Específica

### **👑 Administrador del Sistema**
- **CU-01**: ✅ Gestionar Usuarios (CRUD Completo)
- **CU-02**: 👀 Consultar Entidades (Solo Lectura)
- **CU-03**: 👀 Consultar Unidades (Solo Lectura)
- **CU-04**: 👀 Consultar Objetivos Estratégicos (Solo Lectura)
- **CU-05**: 👀 Consultar ODS (Solo Lectura)
- **CU-06**: 👀 Consultar PND (Solo Lectura)
- **CU-07**: 👀 Consultar Planes (Solo Lectura)
- **CU-08**: 👀 Consultar Programas (Solo Lectura)
- **CU-09**: 👀 Consultar Proyectos (Solo Lectura)

### **🏢 Gestor de Entidades**
- **CU-02**: ✅ Gestionar Entidades (CRUD Completo)
- **CU-08**: 👀 Consultar Programas (Solo Lectura - para verificar relaciones)

### **🏗️ Coordinador de Unidades**
- **CU-03**: ✅ Gestionar Unidades (CRUD Completo)
- **CU-01**: 👀 Consultar Usuarios (Solo Lectura - para contexto)
- **CU-02**: 👀 Consultar Entidades (Solo Lectura - para contexto)

### **🎯 Especialista en ODS**
- **CU-05**: ✅ Gestionar ODS (CRUD Completo)
- **CU-04**: 👀 Consultar Objetivos Estratégicos (Solo Lectura - para alineación)
- **CU-07**: 👀 Consultar Planes (Solo Lectura - para alineación)

### **🎯 Planificador Estratégico**
- **CU-04**: ✅ Gestionar Objetivos Estratégicos (CRUD Completo)
- **CU-05**: 👀 Consultar ODS (Solo Lectura - para alineación)
- **CU-06**: 👀 Consultar PND (Solo Lectura - para alineación)
- **CU-07**: 👀 Consultar Planes (Solo Lectura - para alineación)

### **🇵🇪 Analista de PND**
- **CU-06**: ✅ Gestionar PND (CRUD Completo)
- **CU-04**: 👀 Consultar Objetivos Estratégicos (Solo Lectura - para coherencia)
- **CU-07**: 👀 Consultar Planes (Solo Lectura - para coherencia)

### **📋 Gestor de Planes**
- **CU-07**: ✅ Gestionar Planes (CRUD Completo)
- **CU-04**: 👀 Consultar Objetivos Estratégicos (Solo Lectura - para alineación)
- **CU-05**: 👀 Consultar ODS (Solo Lectura - para alineación)
- **CU-06**: 👀 Consultar PND (Solo Lectura - para alineación)
- **CU-08**: 👀 Consultar Programas (Solo Lectura - para alineación)

### **📊 Coordinador de Programas**
- **CU-08**: ✅ Gestionar Programas (CRUD Completo)
- **CU-02**: 👀 Consultar Entidades (Solo Lectura - para vinculación)
- **CU-07**: 👀 Consultar Planes (Solo Lectura - para vinculación)

### **📈 Analista de Proyectos**
- **CU-09**: ✅ Gestionar Proyectos (CRUD Completo)
- **CU-07**: 👀 Consultar Planes (Solo Lectura - para vinculación)
- **CU-08**: 👀 Consultar Programas (Solo Lectura - para vinculación)
- **CU-01**: 👀 Consultar Usuarios (Solo Lectura - para asignaciones)

### **👁️ Supervisor General**
- **CU-01**: 👀 Consultar Usuarios (Solo Lectura)
- **CU-02**: 👀 Consultar Entidades (Solo Lectura)
- **CU-03**: 👀 Consultar Unidades (Solo Lectura)
- **CU-04**: 👀 Consultar Objetivos Estratégicos (Solo Lectura)
- **CU-05**: 👀 Consultar ODS (Solo Lectura)
- **CU-06**: 👀 Consultar PND (Solo Lectura)
- **CU-07**: 👀 Consultar Planes (Solo Lectura)
- **CU-08**: 👀 Consultar Programas (Solo Lectura)
- **CU-09**: 👀 Consultar Proyectos (Solo Lectura)
- **CU-10**: 📊 Generar Reportes Integrales

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

## 📊 Matriz de Permisos por Actor

| CRUD/Actor | 👑 Admin | 🏢 Gest.Ent | 🏗️ Coord.Unid | 🎯 Esp.ODS | 🎯 Plan.Estrat | 🇵🇪 Anal.PND | 📋 Gest.Planes | 📊 Coord.Prog | 📈 Anal.Proy | 👁️ Supervisor |
|------------|----------|-------------|---------------|------------|---------------|--------------|----------------|---------------|-------------|---------------|
| **Usuarios** | ✅ CRUD | ❌ | 👀 Lectura | ❌ | ❌ | ❌ | ❌ | ❌ | 👀 Lectura | 👀 Lectura |
| **Entidades** | 👀 Lectura | ✅ CRUD | 👀 Lectura | ❌ | ❌ | ❌ | ❌ | 👀 Lectura | ❌ | 👀 Lectura |
| **Unidades** | 👀 Lectura | ❌ | ✅ CRUD | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | 👀 Lectura |
| **ODS** | 👀 Lectura | ❌ | ❌ | ✅ CRUD | 👀 Lectura | ❌ | 👀 Lectura | ❌ | ❌ | 👀 Lectura |
| **Obj. Estratégicos** | 👀 Lectura | ❌ | ❌ | 👀 Lectura | ✅ CRUD | 👀 Lectura | 👀 Lectura | ❌ | ❌ | 👀 Lectura |
| **PND** | 👀 Lectura | ❌ | ❌ | ❌ | 👀 Lectura | ✅ CRUD | 👀 Lectura | ❌ | ❌ | 👀 Lectura |
| **Planes** | 👀 Lectura | ❌ | ❌ | 👀 Lectura | 👀 Lectura | 👀 Lectura | ✅ CRUD | 👀 Lectura | 👀 Lectura | 👀 Lectura |
| **Programas** | 👀 Lectura | 👀 Lectura | ❌ | ❌ | ❌ | ❌ | 👀 Lectura | ✅ CRUD | 👀 Lectura | 👀 Lectura |
| **Proyectos** | 👀 Lectura | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ❌ | ✅ CRUD | 👀 Lectura |

### **Leyenda:**
- ✅ **CRUD**: Create, Read, Update, Delete (Permisos completos)
- 👀 **Lectura**: Solo consulta (Read only)
- ❌ **Sin Acceso**: No tiene permisos
- 📊 **Reportes**: Acceso especial a reportes

### **Principios de Asignación:**
1. **🎯 Un actor = Un CRUD principal** (responsabilidad única)
2. **👀 Lectura cruzada** solo para contexto necesario
3. **🔒 Seguridad por segregación** de funciones
4. **📊 Supervisor** tiene visión completa pero sin modificación

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