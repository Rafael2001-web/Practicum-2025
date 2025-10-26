# 📊 **DIAGRAMA ENTIDAD-RELACIÓN (E-R) CONCEPTUAL**
## Sistema de Gestión de Planificación Institucional

---

## 🏗️ **MODELO CONCEPTUAL DE ENTIDADES**

### 👥 **ENTIDAD: Usuario**
```
┌─────────────────────────────┐
│          USUARIO            │
├─────────────────────────────┤
│ • ID                        │ [Identificador único]
│ • Nombre                    │ [Nombre completo]
│ • Email                     │ [Correo electrónico único]
│ • Contraseña               │ [Clave de acceso]
│ • Fecha Registro           │ [Cuando se registró]
└─────────────────────────────┘
```

### 🏢 **ENTIDAD: Unidad Organizacional**
```
┌─────────────────────────────┐
│      UNIDAD_ORGANIZACIONAL  │
├─────────────────────────────┤
│ • ID_Unidad                │ [Identificador único]
│ • Macrosector              │ [Clasificación mayor]
│ • Sector                   │ [Clasificación específica]
│ • Estado                   │ [Activa/Inactiva]
└─────────────────────────────┘
```

### 🏛️ **ENTIDAD: Entidad Ejecutora**
```
┌─────────────────────────────┐
│       ENTIDAD_EJECUTORA     │
├─────────────────────────────┤
│ • ID_Entidad               │ [Identificador único]
│ • Código                   │ [Código oficial]
│ • Sub_Sector               │ [Clasificación sectorial]
│ • Nivel_Gobierno           │ [Nacional/Regional/Local]
│ • Estado                   │ [Activa/Inactiva]
│ • Fecha_Creación           │ [Cuando fue creada]
└─────────────────────────────┘
```

### 📋 **ENTIDAD: Plan Estratégico**
```
┌─────────────────────────────┐
│       PLAN_ESTRATEGICO      │
├─────────────────────────────┤
│ • ID_Plan                  │ [Identificador único]
│ • Código                   │ [Código del plan]
│ • Nombre                   │ [Denominación oficial]
│ • Presupuesto              │ [Monto asignado]
│ • Fecha_Inicio             │ [Inicio de vigencia]
│ • Fecha_Fin                │ [Fin de vigencia]
│ • Estado                   │ [Vigente/Vencido/Borrador]
└─────────────────────────────┘
```

### 🎯 **ENTIDAD: Programa**
```
┌─────────────────────────────┐
│          PROGRAMA           │
├─────────────────────────────┤
│ • ID_Programa              │ [Identificador único]
│ • Nombre                   │ [Denominación del programa]
│ • Descripción              │ [Detalle del programa]
│ • Fecha_Creación           │ [Cuando fue creado]
└─────────────────────────────┘
```

### 🚀 **ENTIDAD: Proyecto**
```
┌─────────────────────────────┐
│          PROYECTO           │
├─────────────────────────────┤
│ • ID_Proyecto              │ [Identificador único]
│ • Código                   │ [Código oficial]
│ • Nombre                   │ [Denominación del proyecto]
│ • Descripción              │ [Detalle completo]
│ • Sector                   │ [Sector de intervención]
│ • Fecha_Inicio             │ [Inicio de ejecución]
│ • Fecha_Fin                │ [Fin de ejecución]
│ • Presupuesto              │ [Monto asignado]
│ • Estado                   │ [Borrador/Activo/Finalizado]
└─────────────────────────────┘
```

### 🌍 **ENTIDAD: ODS (Objetivo Desarrollo Sostenible)**
```
┌─────────────────────────────┐
│             ODS             │
├─────────────────────────────┤
│ • ID_ODS                   │ [Identificador único]
│ • Número_ODS               │ [1-17]
│ • Nombre                   │ [Denominación oficial]
│ • Descripción              │ [Detalle del objetivo]
└─────────────────────────────┘
```

### 🇵🇪 **ENTIDAD: PND (Plan Nacional Desarrollo)**
```
┌─────────────────────────────┐
│             PND             │
├─────────────────────────────┤
│ • ID_PND                   │ [Identificador único]
│ • Eje_Estratégico          │ [Eje del plan nacional]
│ • Número_Objetivo          │ [1-10]
│ • Descripción              │ [Detalle del objetivo]
└─────────────────────────────┘
```

### 🎯 **ENTIDAD: Objetivo Estratégico Institucional**
```
┌─────────────────────────────┐
│    OBJETIVO_ESTRATEGICO     │
├─────────────────────────────┤
│ • ID_Objetivo              │ [Identificador único]
│ • Descripción              │ [Detalle del objetivo]
│ • Estado                   │ [Activo/Inactivo]
│ • Fecha_Registro           │ [Cuando fue definido]
└─────────────────────────────┘
```

---

## 🔗 **RELACIONES CONCEPTUALES**

### 🏢 **JERARQUÍA ORGANIZACIONAL**

#### **R1: PERTENECE** (Entidad → Unidad)
- **Cardinalidad:** N:1 (Muchas entidades pertenecen a una unidad)
- **Descripción:** Cada entidad ejecutora pertenece a una unidad organizacional

#### **R2: FORMULA** (Entidad → Plan)
- **Cardinalidad:** 1:N (Una entidad formula muchos planes)
- **Descripción:** Cada entidad puede formular múltiples planes estratégicos

#### **R3: DESARROLLA** (Plan → Programa)
- **Cardinalidad:** 1:N (Un plan desarrolla muchos programas)
- **Descripción:** Cada plan se ejecuta a través de múltiples programas

#### **R4: EJECUTA** (Programa → Proyecto)
- **Cardinalidad:** 1:N (Un programa ejecuta muchos proyectos)
- **Descripción:** Cada programa se materializa en múltiples proyectos

#### **R5: RESPONSABLE** (Usuario → Proyecto)
- **Cardinalidad:** 1:N (Un usuario es responsable de muchos proyectos)
- **Descripción:** Cada usuario puede ser responsable de múltiples proyectos

### 🎯 **ALINEACIÓN ESTRATÉGICA**

#### **R6: CONTRIBUYE_ODS** (Plan ↔ ODS)
- **Cardinalidad:** N:M (Muchos planes contribuyen a muchos ODS)
- **Atributos:** Porcentaje_Contribución
- **Descripción:** Los planes contribuyen a objetivos de desarrollo sostenible

#### **R7: ALINEA_PND** (Plan ↔ PND)
- **Cardinalidad:** N:M (Muchos planes se alinean con muchos objetivos PND)
- **Atributos:** Nivel_Alineación
- **Descripción:** Los planes se alinean con objetivos del plan nacional

#### **R8: PERSIGUE_OBJETIVO** (Plan ↔ Objetivo_Estratégico)
- **Cardinalidad:** N:M (Muchos planes persiguen muchos objetivos estratégicos)
- **Atributos:** Prioridad
- **Descripción:** Los planes persiguen objetivos estratégicos institucionales

#### **R9: IMPACTA_ODS** (Proyecto ↔ ODS)
- **Cardinalidad:** N:M (Muchos proyectos impactan muchos ODS)
- **Atributos:** Impacto_Esperado, Indicadores
- **Descripción:** Los proyectos generan impacto directo en los ODS

#### **R10: REFERENCIA_ESTRATEGICA** (PND ↔ ODS)
- **Cardinalidad:** N:M (Muchos objetivos PND referencian muchos ODS)
- **Atributos:** Nivel_Alineación, Justificación
- **Descripción:** Alineación oficial entre plan nacional y agenda global

---

## 📊 **DIAGRAMA E-R CONCEPTUAL COMPLETO**

```mermaid
erDiagram
    USUARIO {
        string ID PK "Identificador único"
        string Nombre "Nombre completo"
        string Email UK "Correo electrónico único"
        string Contraseña "Clave de acceso"
        date Fecha_Registro "Cuando se registró"
    }
    
    UNIDAD_ORGANIZACIONAL {
        string ID_Unidad PK "Identificador único"
        string Macrosector "Clasificación mayor"
        string Sector "Clasificación específica"
        string Estado "Activa/Inactiva"
    }
    
    ENTIDAD_EJECUTORA {
        string ID_Entidad PK "Identificador único"
        string Código UK "Código oficial"
        string Sub_Sector "Clasificación sectorial"
        string Nivel_Gobierno "Nacional/Regional/Local"
        string Estado "Activa/Inactiva"
        date Fecha_Creación "Cuando fue creada"
    }
    
    PLAN_ESTRATEGICO {
        string ID_Plan PK "Identificador único"
        string Código UK "Código del plan"
        string Nombre "Denominación oficial"
        decimal Presupuesto "Monto asignado"
        date Fecha_Inicio "Inicio de vigencia"
        date Fecha_Fin "Fin de vigencia"
        string Estado "Vigente/Vencido/Borrador"
    }
    
    PROGRAMA {
        string ID_Programa PK "Identificador único"
        string Nombre "Denominación del programa"
        string Descripción "Detalle del programa"
        date Fecha_Creación "Cuando fue creado"
    }
    
    PROYECTO {
        string ID_Proyecto PK "Identificador único"
        string Código UK "Código oficial"
        string Nombre "Denominación del proyecto"
        string Descripción "Detalle completo"
        string Sector "Sector de intervención"
        date Fecha_Inicio "Inicio de ejecución"
        date Fecha_Fin "Fin de ejecución"
        decimal Presupuesto "Monto asignado"
        string Estado "Borrador/Activo/Finalizado"
    }
    
    ODS {
        string ID_ODS PK "Identificador único"
        integer Número_ODS "1-17"
        string Nombre "Denominación oficial"
        string Descripción "Detalle del objetivo"
    }
    
    PND {
        string ID_PND PK "Identificador único"
        string Eje_Estratégico "Eje del plan nacional"
        integer Número_Objetivo "1-10"
        string Descripción "Detalle del objetivo"
    }
    
    OBJETIVO_ESTRATEGICO {
        string ID_Objetivo PK "Identificador único"
        string Descripción "Detalle del objetivo"
        string Estado "Activo/Inactivo"
        date Fecha_Registro "Cuando fue definido"
    }

    %% JERARQUÍA ORGANIZACIONAL (1:N)
    UNIDAD_ORGANIZACIONAL ||--o{ ENTIDAD_EJECUTORA : "PERTENECE (N:1)"
    ENTIDAD_EJECUTORA ||--o{ PLAN_ESTRATEGICO : "FORMULA (1:N)"
    PLAN_ESTRATEGICO ||--o{ PROGRAMA : "DESARROLLA (1:N)"
    PROGRAMA ||--o{ PROYECTO : "EJECUTA (1:N)"
    USUARIO ||--o{ PROYECTO : "RESPONSABLE (1:N)"
    
    %% ALINEACIÓN ESTRATÉGICA (N:M)
    PLAN_ESTRATEGICO }|--|| CONTRIBUYE_ODS : "Porcentaje_Contribución"
    CONTRIBUYE_ODS }|--|| ODS : ""
    
    PLAN_ESTRATEGICO }|--|| ALINEA_PND : "Nivel_Alineación"
    ALINEA_PND }|--|| PND : ""
    
    PLAN_ESTRATEGICO }|--|| PERSIGUE_OBJETIVO : "Prioridad"
    PERSIGUE_OBJETIVO }|--|| OBJETIVO_ESTRATEGICO : ""
    
    PROYECTO }|--|| IMPACTA_ODS : "Impacto_Esperado, Indicadores"
    IMPACTA_ODS }|--|| ODS : ""
    
    PND }|--|| REFERENCIA_ESTRATEGICA : "Nivel_Alineación, Justificación"
    REFERENCIA_ESTRATEGICA }|--|| ODS : ""
```

### 🔍 **VISTA SIMPLIFICADA DE JERARQUÍA ORGANIZACIONAL**

```mermaid
flowchart TD
    A[UNIDAD_ORGANIZACIONAL<br/>• Macrosector<br/>• Sector] 
    B[ENTIDAD_EJECUTORA<br/>• Código<br/>• Nivel_Gobierno]
    C[PLAN_ESTRATEGICO<br/>• Nombre<br/>• Presupuesto<br/>• Vigencia]
    D[PROGRAMA<br/>• Nombre<br/>• Descripción]
    E[PROYECTO<br/>• Código<br/>• Presupuesto<br/>• Estado]
    F[USUARIO<br/>• Nombre<br/>• Email]
    
    A -->|1:N PERTENECE| B
    B -->|1:N FORMULA| C
    C -->|1:N DESARROLLA| D
    D -->|1:N EJECUTA| E
    F -->|1:N RESPONSABLE| E
    
    style A fill:#E3F2FD
    style B fill:#E8F5E8
    style C fill:#FFF9C4
    style D fill:#FFE0B2
    style E fill:#FCE4EC
    style F fill:#F3E5F5
```

### 🎯 **VISTA DE ALINEACIÓN ESTRATÉGICA**

```mermaid
flowchart LR
    PLAN[PLAN_ESTRATEGICO]
    ODS[ODS<br/>17 Objetivos]
    PND[PND<br/>10 Objetivos]
    OBJ[OBJETIVO_ESTRATEGICO<br/>3 Institucionales]
    PROY[PROYECTO]
    
    PLAN -.->|N:M<br/>Contribuye| ODS
    PLAN -.->|N:M<br/>Se Alinea| PND
    PLAN -.->|N:M<br/>Persigue| OBJ
    PROY -.->|N:M<br/>Impacta| ODS
    PND -.->|N:M<br/>Referencia<br/>94.4% Alineado| ODS
    
    style PLAN fill:#FFF9C4
    style ODS fill:#4CAF50,color:#fff
    style PND fill:#2196F3,color:#fff
    style OBJ fill:#FF9800,color:#fff
    style PROY fill:#E91E63,color:#fff
```

---

## 🎯 **REGLAS DE NEGOCIO IDENTIFICADAS**

1. **RN1:** Cada entidad ejecutora debe pertenecer a una unidad organizacional
2. **RN2:** Un plan estratégico debe ser formulado por al menos una entidad
3. **RN3:** Un programa debe estar asociado a un plan estratégico
4. **RN4:** Un proyecto debe ejecutarse dentro de un programa
5. **RN5:** Todo proyecto debe tener un usuario responsable
6. **RN6:** Los planes deben contribuir al menos a un ODS
7. **RN7:** La suma de contribuciones a ODS por plan no debe exceder 100%
8. **RN8:** Los planes deben alinearse con al menos un objetivo del PND
9. **RN9:** Los proyectos deben reportar impacto esperado en los ODS
10. **RN10:** Existe alineación oficial entre PND y ODS (94.4% según documento)

---

## 🔍 **ENTIDADES DÉBILES IDENTIFICADAS**

- **Programa:** Depende existencialmente de Plan_Estratégico
- **Proyecto:** Depende existencialmente de Programa

---

## 🌟 **ATRIBUTOS DERIVADOS**

- **Total_Proyectos_Plan:** Calculado desde programas y proyectos
- **Presupuesto_Total_Programa:** Suma de presupuestos de proyectos
- **Porcentaje_Avance:** Calculado según estado de proyectos
- **Impacto_Acumulado_ODS:** Suma de impactos de todos los proyectos

---

*Este diagrama E-R conceptual representa la lógica de negocio del sistema sin considerar aspectos técnicos de implementación, enfocándose en las entidades, atributos esenciales y relaciones que rigen el dominio de la planificación institucional.*