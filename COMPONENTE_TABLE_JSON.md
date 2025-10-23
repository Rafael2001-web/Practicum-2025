# Componente Table - Funcionalidad de Exportación Mejorada

## Descripción
Se ha mejorado el componente `x-table` con funcionalidades avanzadas de exportación:
- **JSON Export**: Exportar datos en formato JSON limpio
- **CSV Mejorado**: Exportar CSV sin columnas de acciones
- **Print Optimizado**: Impresión sin columnas de acciones y sin emojis
- **Filtro de Columnas**: Exclusión automática de columnas tipo "actions"

## Uso del Componente

### Habilitar el botón JSON
Para habilitar el botón de exportación JSON, simplemente agrega el parámetro `:json="true"` al componente:

```blade
<x-table 
    :headers="[
        ['label' => 'ID', 'type' => 'text'],
        ['label' => 'Código', 'type' => 'text'],
        ['label' => 'Subsector', 'type' => 'text'],
        ['label' => 'Nivel de Gobierno', 'type' => 'text'],
        ['label' => 'Estado', 'type' => 'badge'],
        ['label' => 'Fecha de Creación', 'type' => 'date'],
        ['label' => 'Fecha de Actualización', 'type' => 'date'],
        ['label' => 'Acciones', 'type' => 'actions']
    ]"
    :csv="false"
    :print="false"
    :json="true"
    id="entidades-table"
>
    {{-- Contenido de la tabla --}}
</x-table>
```

## Parámetros del Componente

| Parámetro | Tipo | Defecto | Descripción |
|-----------|------|---------|-------------|
| `json` | boolean | `false` | Habilita/deshabilita el botón de exportación JSON |
| `csv` | boolean | `true` | Habilita/deshabilita el botón de exportación CSV |
| `print` | boolean | `true` | Habilita/deshabilita el botón de impresión |

## 🔧 Nuevas Características

### ✅ Exclusión Automática de Columnas de Acciones
- **CSV**, **JSON** y **Print** ignoran automáticamente columnas con `type: 'actions'`
- No es necesaria configuración adicional
- Las columnas de acciones (botones, enlaces) no aparecen en las exportaciones

### ✅ Limpieza de Emojis y Caracteres Especiales
- Todos los formatos de exportación limpian automáticamente:
  - Emojis Unicode
  - Caracteres especiales de formato
  - Espacios múltiples
  - Caracteres que pueden romper archivos CSV/JSON

### ✅ Print Optimizado
- Elimina columnas de acciones
- Aplica estilos de impresión profesionales
- Incluye fecha de generación
- Formato responsive para diferentes tamaños de papel

## Características del Archivo JSON

### Estructura del archivo JSON exportado:
```json
{
    "exported_at": "2025-10-22T15:30:45.123Z",
    "total_records": 3,
    "data": [
        {
            "ID": 1,
            "Código": "ENT001",
            "Subsector": "Educación",
            "Nivel de Gobierno": "Nacional",
            "Estado": "Activo",
            "Fecha de Creación": "22/10/2025"
        }
    ]
}
```
**Nota**: La columna "Acciones" NO aparece en el JSON exportado.

### Limpieza de Datos
La función de exportación JSON incluye limpieza automática de datos:

1. **Eliminación de emojis**: Se remueven todos los emojis Unicode
2. **Caracteres especiales**: Se eliminan caracteres de formato que pueden causar problemas
3. **Espacios múltiples**: Se normalizan los espacios en blanco
4. **Conversión de tipos**: 
   - Números se detectan y convierten automáticamente
   - Booleanos (`true`/`false`) se convierten al tipo boolean
   - Fechas se mantienen como strings

### Datos Filtrados
- Solo se exportan las filas actualmente **visibles/filtradas** en la tabla
- Si hay búsquedas activas, solo se incluyen los resultados que coinciden
- La paginación no afecta la exportación (se exportan todos los registros filtrados)

## Ejemplo Completo

```blade
{{-- Vista: resources/views/entidades/index.blade.php --}}
<x-app-layout>
    @section('title', 'Entidades')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Entidades') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="bg-white">
                        <x-table 
                            :headers="[
                                ['label' => 'ID', 'type' => 'number'],
                                ['label' => 'Código', 'type' => 'text'],
                                ['label' => 'Subsector', 'type' => 'text'],
                                ['label' => 'Nivel de Gobierno', 'type' => 'text'],
                                ['label' => 'Estado', 'type' => 'badge'],
                                ['label' => 'Fecha de Creación', 'type' => 'date'],
                                ['label' => 'Fecha de Actualización', 'type' => 'date'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            :json="true"
                            id="entidades-table"
                        >
                            <tbody>
                                @foreach ($entidades as $entidad)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                                            {{ $entidad->idEntidad }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $entidad->codigo }}
                                        </td>
                                        {{-- Más columnas... --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

## Estilo del Botón
El botón JSON tiene un estilo verde distintivo para diferenciarlo de los otros botones:
- **Color**: Verde (`bg-green-600` / `hover:bg-green-700`)
- **Icono**: Documento con flecha de descarga
- **Texto**: "EXPORT JSON"

## Compatibilidad
- **Navegadores**: Funciona en todos los navegadores modernos que soporten HTML5
- **Dispositivos**: Responsive, funciona en móviles y escritorio
- **Formato**: El archivo generado es JSON válido según RFC 7159

## 🎯 Casos de Uso
1. **Integración con APIs**: Los datos exportados pueden usarse directamente en otras aplicaciones
2. **Backup de datos**: Crear respaldos de información en formato estructurado  
3. **Análisis de datos**: Importar en herramientas de análisis que soporten JSON/CSV
4. **Reportes automatizados**: Generar reportes programáticamente
5. **Impresión limpia**: Documentos físicos sin botones ni elementos innecesarios

## 📋 Resumen de Mejoras Implementadas

### ✅ CSV Export
- ✅ Ignora columnas tipo "actions"
- ✅ Limpia emojis y caracteres especiales  
- ✅ Incluye solo datos filtrados/visibles
- ✅ Headers limpios

### ✅ JSON Export  
- ✅ Ignora columnas tipo "actions"
- ✅ Limpia emojis y caracteres especiales
- ✅ Conversión automática de tipos de datos
- ✅ Metadatos incluidos (fecha, total de registros)
- ✅ Formato JSON válido

### ✅ Print Function
- ✅ Ignora columnas tipo "actions"  
- ✅ Limpia emojis y caracteres especiales
- ✅ Estilos profesionales de impresión
- ✅ Fecha de generación automática
- ✅ Header personalizado
- ✅ Formato responsive

## 🔧 Implementación Técnica

### Identificación de Columnas de Acciones
```javascript
// El sistema detecta automáticamente columnas con:
th.dataset.type === 'actions'

// En la vista Blade:
['label' => 'Acciones', 'type' => 'actions']
```

### Limpieza de Texto
```javascript
function cleanTextForJSON(text) {
    return text
        .replace(/[\u{1F600}-\u{1F64F}]|[\u{1F300}-\u{1F5FF}]|[\u{1F680}-\u{1F6FF}]|[\u{1F1E0}-\u{1F1FF}]|[\u{2600}-\u{26FF}]|[\u{2700}-\u{27BF}]/gu, '')
        .replace(/[\u{FE00}-\u{FE0F}]|[\u{200D}]|[\u{20E3}]/gu, '')
        .replace(/\s+/g, ' ')
        .trim();
}
```

## 🚀 Resultado Final
- **CSV**: Solo datos relevantes, sin botones de acción, texto limpio
- **JSON**: Estructura perfecta para APIs, sin elementos de UI  
- **Print**: Documentos profesionales listos para impresión física
- **Automático**: No requiere configuración adicional, funciona con cualquier tabla