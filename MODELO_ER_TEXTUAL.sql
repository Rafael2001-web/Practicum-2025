/*
DIAGRAMA ENTIDAD-RELACIÓN - SISTEMA DE PLANIFICACIÓN
====================================================

Este archivo contiene la representación textual del modelo E-R
que puedes usar para crear el diagrama visual en draw.io

ENTIDADES PRINCIPALES:
*/

-- JERARQUÍA ORGANIZACIONAL
UNIDAD {
  idUnidad (PK)
  nombre
  descripcion
  estado
}

ENTIDAD {
  idEntidad (PK)
  idUnidad (FK) → UNIDAD.idUnidad
  nombre
  descripcion
  estado
  fechaRegistro
}

PLAN {
  idPlan (PK)
  idEntidad (FK) → ENTIDAD.idEntidad
  nombre
  descripcion
  fechaInicio
  fechaFin
  estado
  presupuesto
}

PROGRAMA {
  idPrograma (PK)
  idPlan (FK) → PLAN.idPlan
  idEntidad (FK) → ENTIDAD.idEntidad
  nombre
  descripcion
  fechaInicio
  fechaFin
  estado
  presupuesto
}

PROYECTO {
  id (PK)
  idPrograma (FK) → PROGRAMA.idPrograma
  user_id (FK) → USERS.id
  nombre
  descripcion
  fechaInicio
  fechaFin
  estado
  presupuesto
  created_at
  updated_at
}

ACTIVIDAD {
  id (PK)
  proyecto_id (FK) → PROYECTO.id
  codigo
  nombre
  descripcion
  responsable
  estado
  prioridad
  fecha_inicio_planificada
  fecha_fin_planificada
  fecha_inicio_real
  fecha_fin_real
  duracion_planificada_dias
  avance_planificado
  avance_real
  variacion_tiempo_dias
  estado_reportado
  activo
  created_at
  updated_at
}

-- MARCOS ESTRATÉGICOS
ODS {
  idOds (PK)
  odsnum
  nombre
  descripcion
}

PND {
  idPnd (PK)
  eje
  objetivoN
  descripcion
}

OBJETIVOS_ESTRATEGICOS {
  idobjEstrategico (PK)
  descripcion
  estado
  fechaRegistro
}

-- SISTEMA DE USUARIOS
USERS {
  id (PK)
  name
  email
  email_verified_at
  password
  remember_token
  created_at
  updated_at
}

ROLES {
  id (PK)
  name
  guard_name
  created_at
  updated_at
}

PERMISSIONS {
  id (PK)
  name
  guard_name
  created_at
  updated_at
}

ACTIVIDAD_AUDITORIAS {
  id (PK)
  actividad_id (FK) → ACTIVIDAD.id
  user_id (FK) → USERS.id
  accion
  detalle
  created_at
  updated_at
}

-- TABLAS DE RELACIÓN (PIVOT)
PLAN_ODS {
  idPlan (FK) → PLAN.idPlan
  idOds (FK) → ODS.idOds
  porcentaje_contribucion
  descripcion_contribucion
  created_at
  updated_at
}

PLAN_PND {
  idPlan (FK) → PLAN.idPlan
  idPnd (FK) → PND.idPnd
  nivel_alineacion
  descripcion_alineacion
  created_at
  updated_at
}

PLAN_OBJETIVOS_ESTRATEGICOS {
  idPlan (FK) → PLAN.idPlan
  idobjEstrategico (FK) → OBJETIVOS_ESTRATEGICOS.idobjEstrategico
  prioridad
  nivel_alineacion
  impacto_esperado
  created_at
  updated_at
}

PROYECTO_ODS {
  proyecto_id (FK) → PROYECTO.id
  idOds (FK) → ODS.idOds
  impacto_esperado
  indicadores
  nivel_impacto
  created_at
  updated_at
}

ACTIVIDAD_OBJETIVOS_ESTRATEGICOS {
  actividad_id (FK) → ACTIVIDAD.id
  idobjEstrategico (FK) → OBJETIVOS_ESTRATEGICOS.idobjEstrategico
  created_at
  updated_at
}

PND_ODS_ALIGNMENT {
  idPnd (FK) → PND.idPnd
  idOds (FK) → ODS.idOds
  nivel_alineacion
  justificacion
  created_at
  updated_at
}

MODEL_HAS_ROLES {
  role_id (FK) → ROLES.id
  model_type
  model_id
}

MODEL_HAS_PERMISSIONS {
  permission_id (FK) → PERMISSIONS.id
  model_type
  model_id
}

ROLE_HAS_PERMISSIONS {
  permission_id (FK) → PERMISSIONS.id
  role_id (FK) → ROLES.id
}

/*
RELACIONES PRINCIPALES:
====================

1:N RELACIONES:
- UNIDAD → ENTIDAD
- ENTIDAD → PLAN
- PLAN → PROGRAMA
- PROGRAMA → PROYECTO
- USERS → PROYECTO
- PROYECTO → ACTIVIDAD
- ACTIVIDAD → ACTIVIDAD_AUDITORIAS
- USERS → ACTIVIDAD_AUDITORIAS

N:M RELACIONES:
- PLAN ←→ ODS (via PLAN_ODS)
- PLAN ←→ PND (via PLAN_PND)
- PLAN ←→ OBJETIVOS_ESTRATEGICOS (via PLAN_OBJETIVOS_ESTRATEGICOS)
- PROYECTO ←→ ODS (via PROYECTO_ODS)
- PND ←→ ODS (via PND_ODS_ALIGNMENT)
- USERS ←→ ROLES (via MODEL_HAS_ROLES)
- ROLES ←→ PERMISSIONS (via ROLE_HAS_PERMISSIONS)
- ACTIVIDAD ←→ OBJETIVOS_ESTRATEGICOS (via ACTIVIDAD_OBJETIVOS_ESTRATEGICOS)

CARDINALIDADES:
- UNIDAD (1) → ENTIDAD (N)
- ENTIDAD (1) → PLAN (N)
- ENTIDAD (1) → PROGRAMA (N)
- PLAN (1) → PROGRAMA (N)
- PROGRAMA (1) → PROYECTO (N)
- USERS (1) → PROYECTO (N)
*/
