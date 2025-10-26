# 🎨 **GUÍA PRÁCTICA: CREACIÓN DE DIAGRAMAS EN DRAW.IO**

## 📋 **ÍNDICE DE DIAGRAMAS A CREAR**

1. **🔍 DIAGRAMA E-R CONCEPTUAL** - Modelo de negocio abstracto
2. **🔧 DIAGRAMA FÍSICO DE BD** - Implementación técnica MySQL

---

## 🔍 **PARTE 1: DIAGRAMA E-R CONCEPTUAL EN DRAW.IO**

### **🚀 Configuración Inicial**
1. Ve a **https://app.diagrams.net/**
2. **Create New Diagram** → **"Entity Relationship"**
3. Nombre: `"Sistema_Planificacion_ER_CONCEPTUAL"`

### **🎨 Configuración de Estilos**
- **Entidades:** Rectángulos con esquinas redondeadas, color azul claro `#E3F2FD`
- **Atributos:** Lista simple dentro de entidades
- **Relaciones:** Líneas con etiquetas, diamantes para N:M

### **📦 PASO 1: Crear Entidades Conceptuales**

#### **Entidad USUARIO**
```
┌─────────────────────────────┐
│          USUARIO            │
├─────────────────────────────┤
│ • ID                        │
│ • Nombre                    │
│ • Email                     │
│ • Contraseña               │
│ • Fecha_Registro           │
└─────────────────────────────┘
```

#### **Entidad UNIDAD_ORGANIZACIONAL**
```
┌─────────────────────────────┐
│   UNIDAD_ORGANIZACIONAL     │
├─────────────────────────────┤
│ • ID_Unidad                │
│ • Macrosector              │
│ • Sector                   │
│ • Estado                   │
└─────────────────────────────┘
```

#### **Entidad ENTIDAD_EJECUTORA**
```
┌─────────────────────────────┐
│    ENTIDAD_EJECUTORA        │
├─────────────────────────────┤
│ • ID_Entidad               │
│ • Código                   │
│ • Sub_Sector               │
│ • Nivel_Gobierno           │
│ • Estado                   │
│ • Fecha_Creación           │
└─────────────────────────────┘
```

#### **Entidad PLAN_ESTRATEGICO**
```
┌─────────────────────────────┐
│     PLAN_ESTRATEGICO        │
├─────────────────────────────┤
│ • ID_Plan                  │
│ • Código                   │
│ • Nombre                   │
│ • Presupuesto              │
│ • Fecha_Inicio             │
│ • Fecha_Fin                │
│ • Estado                   │
└─────────────────────────────┘
```

#### **Entidad PROGRAMA**
```
┌─────────────────────────────┐
│          PROGRAMA           │
├─────────────────────────────┤
│ • ID_Programa              │
│ • Nombre                   │
│ • Descripción              │
│ • Fecha_Creación           │
└─────────────────────────────┘
```

#### **Entidad PROYECTO**
```
┌─────────────────────────────┐
│          PROYECTO           │
├─────────────────────────────┤
│ • ID_Proyecto              │
│ • Código                   │
│ • Nombre                   │
│ • Descripción              │
│ • Sector                   │
│ • Fecha_Inicio             │
│ • Fecha_Fin                │
│ • Presupuesto              │
│ • Estado                   │
└─────────────────────────────┘
```

#### **Entidad ODS**
```
┌─────────────────────────────┐
│             ODS             │
├─────────────────────────────┤
│ • ID_ODS                   │
│ • Número_ODS               │
│ • Nombre                   │
│ • Descripción              │
└─────────────────────────────┘
```

#### **Entidad PND**
```
┌─────────────────────────────┐
│             PND             │
├─────────────────────────────┤
│ • ID_PND                   │
│ • Eje_Estratégico          │
│ • Número_Objetivo          │
│ • Descripción              │
└─────────────────────────────┘
```

#### **Entidad OBJETIVO_ESTRATEGICO**
```
┌─────────────────────────────┐
│   OBJETIVO_ESTRATEGICO      │
├─────────────────────────────┤
│ • ID_Objetivo              │
│ • Descripción              │
│ • Estado                   │
│ • Fecha_Registro           │
└─────────────────────────────┘
```

### **🔗 PASO 2: Crear Relaciones Conceptuales**

#### **Relaciones 1:N (Una línea simple con "crow's foot")**
1. **UNIDAD_ORGANIZACIONAL (1) → ENTIDAD_EJECUTORA (N)**
   - Etiqueta: "PERTENECE"
   - Cardinalidad: 1:N

2. **ENTIDAD_EJECUTORA (1) → PLAN_ESTRATEGICO (N)**
   - Etiqueta: "FORMULA"
   - Cardinalidad: 1:N

3. **PLAN_ESTRATEGICO (1) → PROGRAMA (N)**
   - Etiqueta: "DESARROLLA"
   - Cardinalidad: 1:N

4. **PROGRAMA (1) → PROYECTO (N)**
   - Etiqueta: "EJECUTA"
   - Cardinalidad: 1:N

5. **USUARIO (1) → PROYECTO (N)**
   - Etiqueta: "RESPONSABLE"
   - Cardinalidad: 1:N

#### **Relaciones N:M (Con diamante en el medio)**
1. **PLAN_ESTRATEGICO ↔ ODS**
   - Diamante: "CONTRIBUYE_ODS"
   - Atributos: Porcentaje_Contribución
   - Cardinalidad: N:M

2. **PLAN_ESTRATEGICO ↔ PND**
   - Diamante: "ALINEA_PND"
   - Atributos: Nivel_Alineación
   - Cardinalidad: N:M

3. **PLAN_ESTRATEGICO ↔ OBJETIVO_ESTRATEGICO**
   - Diamante: "PERSIGUE_OBJETIVO"
   - Atributos: Prioridad
   - Cardinalidad: N:M

4. **PROYECTO ↔ ODS**
   - Diamante: "IMPACTA_ODS"
   - Atributos: Impacto_Esperado, Indicadores
   - Cardinalidad: N:M

5. **PND ↔ ODS**
   - Diamante: "REFERENCIA_ESTRATEGICA"
   - Atributos: Nivel_Alineación, Justificación
   - Cardinalidad: N:M

### **📐 PASO 3: Layout Conceptual**
```
[USUARIO] ──1:N──→ [PROYECTO] ──N:M── ◊IMPACTA_ODS◊ ──N:M── [ODS]
                        ↑                                    ↑
                        N:1                                  N:M
                        │                                    │
[UNIDAD_ORG] ──1:N─→ [ENTIDAD_EJEC] ──1:N─→ [PLAN_ESTRAT]──┘
                                                │
                                                N:M
                                                │
                     ◊ALINEA_PND◊ ──N:M─── [PND] ──N:M── ◊REF_ESTRAT◊
                                                │
                                                N:M
                                                │
                  [OBJETIVO_ESTRAT] ──N:M── ◊PERSIGUE_OBJ◊
```

---

## 🔧 **PARTE 2: DIAGRAMA FÍSICO DE BD EN DRAW.IO**

### **🚀 Configuración Inicial**
1. **Create New Diagram** → **"Entity Relationship"**
2. Nombre: `"Sistema_Planificacion_BD_FISICO"`

### **🎨 Configuración de Estilos Físicos**
- **Tablas:** Rectángulos con header coloreado
- **Primary Keys:** 🔑 icono, texto en negrita
- **Foreign Keys:** 🔗 icono, texto en cursiva
- **Índices:** 📊 icono
- **Tipos de datos:** Especificar MySQL exactos

### **📦 PASO 1: Crear Tablas Físicas**

#### **Tabla users**
```sql
┌─────────────────────────────────────────┐
│                 users                   │ [#4CAF50]
├─────────────────────────────────────────┤
│ 🔑 id                BIGINT AUTO_INC   │ [PK]
│    name              VARCHAR(255)      │ [NOT NULL]
│    email             VARCHAR(255)      │ [UNIQUE, NOT NULL]
│    email_verified_at TIMESTAMP         │ [NULL]
│    password          VARCHAR(255)      │ [NOT NULL]
│    remember_token    VARCHAR(100)      │ [NULL]
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
```

#### **Tabla unidad**
```sql
┌─────────────────────────────────────────┐
│                unidad                   │ [#2196F3]
├─────────────────────────────────────────┤
│ 🔑 idUnidad          BIGINT AUTO_INC   │ [PK]
│    macrosector       VARCHAR(255)      │ [NOT NULL]
│    sector            VARCHAR(255)      │ [NOT NULL]
│    estado            VARCHAR(255)      │ [NOT NULL]
└─────────────────────────────────────────┘
```

#### **Tabla entidad**
```sql
┌─────────────────────────────────────────┐
│               entidad                   │ [#2196F3]
├─────────────────────────────────────────┤
│ 🔑 idEntidad         BIGINT AUTO_INC   │ [PK]
│ 🔗 idUnidad          BIGINT            │ [FK] → unidad.idUnidad
│    codigo            INTEGER           │ [UNIQUE, NOT NULL]
│    subSector         VARCHAR(255)      │ [NOT NULL]
│    nivelGobierno     VARCHAR(255)      │ [NOT NULL]
│    estado            VARCHAR(255)      │ [NOT NULL]
│    fechaCreacion     DATE              │ [NOT NULL]
│    fechaActualizacion DATE             │ [NULL]
└─────────────────────────────────────────┘
│ 📊 INDEX: entidad_idunidad_index        │
│ 📊 CONSTRAINT: entidad_idunidad_foreign │
└─────────────────────────────────────────┘
```

#### **Tabla plan**
```sql
┌─────────────────────────────────────────┐
│                 plan                    │ [#FF9800]
├─────────────────────────────────────────┤
│ 🔑 idPlan            BIGINT AUTO_INC   │ [PK]
│ 🔗 idEntidad         BIGINT            │ [FK] → entidad.idEntidad
│    codigo            VARCHAR(255)      │ [UNIQUE, NOT NULL]
│    nombre            VARCHAR(255)      │ [NOT NULL]
│    presupuesto       DECIMAL(12,2)     │ [NULL]
│    fecha_inicio      DATE              │ [NULL]
│    fecha_fin         DATE              │ [NULL]
│    estado            VARCHAR(255)      │ [DEFAULT: 'borrador']
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
```

#### **Tabla programa**
```sql
┌─────────────────────────────────────────┐
│              programa                   │ [#FF9800]
├─────────────────────────────────────────┤
│ 🔑 idPrograma        BIGINT AUTO_INC   │ [PK]
│ 🔗 idPlan            BIGINT            │ [FK] → plan.idPlan
│ 🔗 idEntidad         BIGINT            │ [FK] → entidad.idEntidad
│    nombre            VARCHAR(255)      │ [NOT NULL]
│    descripcion       VARCHAR(255)      │ [NULL]
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
```

#### **Tabla proyectos**
```sql
┌─────────────────────────────────────────┐
│              proyectos                  │ [#E91E63]
├─────────────────────────────────────────┤
│ 🔑 id                BIGINT AUTO_INC   │ [PK]
│ 🔗 idPrograma        BIGINT            │ [FK] → programa.idPrograma
│ 🔗 user_id           BIGINT            │ [FK] → users.id
│    codigo            VARCHAR(255)      │ [UNIQUE, NOT NULL]
│    nombre            VARCHAR(255)      │ [NOT NULL]
│    descripcion       TEXT              │ [NULL]
│    sector            VARCHAR(255)      │ [NULL]
│    fecha_inicio      DATE              │ [NULL]
│    fecha_fin         DATE              │ [NULL]
│    presupuesto       DECIMAL(12,2)     │ [NULL]
│    estado            VARCHAR(255)      │ [DEFAULT: 'borrador']
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
```

#### **Tabla ods**
```sql
┌─────────────────────────────────────────┐
│                 ods                     │ [#4CAF50]
├─────────────────────────────────────────┤
│ 🔑 idOds             BIGINT AUTO_INC   │ [PK]
│    odsnum            INTEGER           │ [NOT NULL]
│    nombre            VARCHAR(255)      │ [NOT NULL]
│    descripcion       TEXT              │ [NOT NULL]
└─────────────────────────────────────────┘
```

#### **Tabla pnd**
```sql
┌─────────────────────────────────────────┐
│                 pnd                     │ [#4CAF50]
├─────────────────────────────────────────┤
│ 🔑 idPnd             BIGINT AUTO_INC   │ [PK]
│    eje               VARCHAR(255)      │ [NOT NULL]
│    objetivoN         INTEGER           │ [NOT NULL]
│    descripcion       TEXT              │ [NOT NULL]
└─────────────────────────────────────────┘
```

#### **Tabla objestrategicos**
```sql
┌─────────────────────────────────────────┐
│           objestrategicos               │ [#4CAF50]
├─────────────────────────────────────────┤
│ 🔑 idobjEstrategico  BIGINT AUTO_INC   │ [PK]
│    fechaRegistro     DATE              │ [NOT NULL]
│    descripcion       TEXT              │ [NOT NULL]
│    estado            VARCHAR(255)      │ [NOT NULL]
└─────────────────────────────────────────┘
```

### **🔗 PASO 2: Crear Tablas Pivot Físicas**

#### **Tabla plan_ods**
```sql
┌─────────────────────────────────────────┐
│               plan_ods                  │ [#FFC107]
├─────────────────────────────────────────┤
│ 🔑 id                BIGINT AUTO_INC   │ [PK]
│ 🔗 idPlan            BIGINT            │ [FK] → plan.idPlan
│ 🔗 idOds             BIGINT            │ [FK] → ods.idOds
│    porcentaje_contribucion DECIMAL(5,2)│ [NULL]
│    descripcion_contribucion TEXT       │ [NULL]
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
│ 📊 UNIQUE: unique_plan_ods(idPlan,idOds)│
│ 📊 INDEX: plan_ods_idplan_index         │
│ 📊 INDEX: plan_ods_idods_index          │
└─────────────────────────────────────────┘
```

#### **Tabla pnd_ods_alignment**
```sql
┌─────────────────────────────────────────┐
│           pnd_ods_alignment             │ [#FFC107]
├─────────────────────────────────────────┤
│ 🔑 id                BIGINT AUTO_INC   │ [PK]
│ 🔗 idPnd             BIGINT            │ [FK] → pnd.idPnd
│ 🔗 idOds             BIGINT            │ [FK] → ods.idOds
│    nivel_alineacion  VARCHAR(255)      │ [DEFAULT: 'Alto']
│    justificacion     TEXT              │ [NULL]
│    created_at        TIMESTAMP         │ [NULL]
│    updated_at        TIMESTAMP         │ [NULL]
└─────────────────────────────────────────┘
│ 📊 UNIQUE: unique_pnd_ods(idPnd,idOds)  │
│ 📊 INDEX: pnd_ods_alignment_idpnd_index │
│ 📊 INDEX: pnd_ods_alignment_idods_index │
└─────────────────────────────────────────┘
```

### **🔗 PASO 3: Crear Conexiones Físicas**

- **Líneas sólidas** para Foreign Keys
- **Etiquetas con tipos de relación:** CASCADE, SET NULL, RESTRICT
- **Cardinalidades específicas** basadas en constraints

### **📐 PASO 4: Layout Físico**
```
    [users] ──FK──→ [proyectos] ──FK──→ [proyecto_ods] ──FK──→ [ods]
                         ↑                                      ↑
                         FK                                     FK
                         │                                      │
[unidad] ──FK──→ [entidad] ──FK──→ [plan] ──FK──→ [plan_ods]──┘
                    ↑               ↑
                    FK              FK
                    │               │
            [programa] ────FK───────┘
                    
[pnd] ──FK──→ [pnd_ods_alignment] ──FK──→ [ods]
[objestrategicos] ──FK──→ [plan_objetivos_estrategicos] ──FK──→ [plan]
```

---

## 🎯 **PASO 5: EXPORTACIÓN Y ENTREGA**

### **Para Diagrama E-R Conceptual:**
1. **File → Export as → PNG** (resolución alta)
2. Nombre: `"Diagrama_ER_Conceptual_Sistema_Planificacion.png"`

### **Para Diagrama Físico:**
1. **File → Export as → PNG** (resolución alta)
2. Nombre: `"Diagrama_Fisico_BD_Sistema_Planificacion.png"`

### **Para Compartir:**
- **File → Share → Get Link**
- Enviar ambos enlaces a **daguaman@gmail.com**

---

## ✅ **CHECKLIST DE COMPLETITUD**

### **Diagrama E-R Conceptual:**
- [ ] 9 entidades principales identificadas
- [ ] Atributos esenciales (sin tipos de datos)
- [ ] 5 relaciones 1:N claramente marcadas
- [ ] 5 relaciones N:M con diamantes
- [ ] Cardinalidades especificadas
- [ ] Reglas de negocio documentadas

### **Diagrama Físico:**
- [ ] 23 tablas con tipos de datos MySQL específicos
- [ ] Primary Keys marcadas con 🔑
- [ ] Foreign Keys marcadas con 🔗
- [ ] Índices y constraints documentados
- [ ] Tablas pivot explícitas
- [ ] Especificaciones técnicas detalladas

---

*Con esta guía tendrás ambos diagramas profesionales y completos para tu documentación técnica del proyecto.*