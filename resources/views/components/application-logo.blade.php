<svg {{ $attributes->merge(['class' => 'fill-current']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
    <!-- Círculo base -->
    <circle cx="100" cy="100" r="90" fill="currentColor" opacity="0.1"/>
    
    <!-- Diseño del logo SIPeIP -->
    <g stroke="currentColor" stroke-width="3" fill="none">
        <!-- Documento principal -->
        <rect x="60" y="50" width="80" height="100" rx="5" ry="5"/>
        
        <!-- Líneas del documento -->
        <line x1="75" y1="70" x2="125" y2="70"/>
        <line x1="75" y1="85" x2="125" y2="85"/>
        <line x1="75" y1="100" x2="125" y2="100"/>
        <line x1="75" y1="115" x2="105" y2="115"/>
        
        <!-- Icono de planificación (gráfico) -->
        <polyline points="75,120 85,110 95,125 105,115 115,130"/>
        <circle cx="85" cy="110" r="2" fill="currentColor"/>
        <circle cx="95" cy="125" r="2" fill="currentColor"/>
        <circle cx="105" cy="115" r="2" fill="currentColor"/>
        <circle cx="115" cy="130" r="2" fill="currentColor"/>
    </g>
    
    <!-- Texto SIPeIP (simplificado) -->
    <text x="100" y="175" text-anchor="middle" font-family="Arial, sans-serif" font-size="14" font-weight="bold" fill="currentColor">
        SIPeIP
    </text>
</svg>