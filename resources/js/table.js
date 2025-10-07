document.addEventListener("DOMContentLoaded", () => {
    // Agregar estilos CSS para responsive
    addTableStyles();
    
    // Inicializar todas las tablas
    document.querySelectorAll("table[data-table]").forEach(initTable);
});

// Función para agregar estilos CSS dinámicamente
function addTableStyles() {
    if (document.getElementById('table-responsive-styles')) return; // Ya existe
    
    const style = document.createElement('style');
    style.id = 'table-responsive-styles';
    style.textContent = `
        /* Estilos personalizados para tabla responsive */
        .overflow-x-auto {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
            scroll-behavior: smooth;
        }

        .overflow-x-auto::-webkit-scrollbar {
            height: 8px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Responsividad para móvil */
        @media (max-width: 767px) {
            .overflow-x-auto {
                border-left: 3px solid #3b82f6;
                border-right: 3px solid #3b82f6;
            }
            
            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #3b82f6;
            }
            
            .overflow-x-auto::-webkit-scrollbar-track {
                background: #dbeafe;
            }
            
            /* Padding más pequeño en móvil */
            table th, table td {
                padding: 0.75rem 1rem !important;
            }
        }

        /* Animaciones */
        .sort-arrow {
            transition: all 0.2s ease;
        }

        .sortable:hover .sort-arrow {
            transform: scale(1.1);
            opacity: 1 !important;
        }
        
        /* Toggle de columnas */
        [id$="-toggle-columns"] svg {
            transition: transform 0.2s ease;
        }

        [id$="-toggle-columns"][aria-expanded="true"] svg {
            transform: rotate(180deg);
        }
    `;
    document.head.appendChild(style);
}

function initTable(table) {
    // Configuración
    let rowsPerPage = 10;
    let currentPage = 1;
    table.dataset.currentPage = 1;
    table._allRows = Array.from(table.tBodies[0].querySelectorAll("tr"));
    table._filteredRows = table._allRows.slice();
    let sortOrder = {}; // {col: 'asc'|'desc'}
    const tbody = table.tBodies[0];
    const rows = Array.from(tbody.querySelectorAll("tr"));
    const headers = table.querySelectorAll("th.sortable");
    const searchInput = document.querySelector(
        `#${table.dataset.table}-search`
    );
    const paginationSelect = document.querySelector(
        `#${table.dataset.table}-rows-per-page`
    );
    const exportCsvBtn = document.querySelector(
        `#${table.dataset.table}-export-csv`
    );
    const printBtn = document.querySelector(`#${table.dataset.table}-print`);
    const columnToggles = document.querySelectorAll(
        `[data-toggle-col-${table.dataset.table}]`
    );

    // Ordenación
    headers.forEach((th, index) => {
        th.addEventListener("click", () => {
            const type = th.dataset.type || "string";
            sortOrder[index] = sortOrder[index] === "asc" ? "desc" : "asc";
            sortTableByColumn(table, index, type, sortOrder[index]);
            updateSortArrows(table, index, sortOrder[index]);
            goToPage(table, 1);
        });
    });

    // Búsqueda
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            filterTable(table, searchInput.value);
            goToPage(table, 1);
        });
    }

    // Paginación
    if (paginationSelect) {
        paginationSelect.addEventListener("change", () => {
            rowsPerPage = parseInt(paginationSelect.value, 10);
            goToPage(table, 1);
        });
    }

    // Exportar CSV
    if (exportCsvBtn) {
        exportCsvBtn.addEventListener("click", () => exportTableToCSV(table));
    }

    // Print
    if (printBtn) {
        printBtn.addEventListener("click", () => printTable(table));
    }

    // Mostrar/ocultar columnas
    columnToggles.forEach((toggle, idx) => {
        toggle.addEventListener("change", () => {
            toggleColumn(table, idx, toggle.checked);
        });
    });

    // Selección de filas
    rows.forEach((row) => {
        row.addEventListener("click", () => {
            row.classList.toggle("selected");
        });
    });

    // Inicializar paginación
    goToPage(table, 1);

    // Inicializar funcionalidades responsive
    initResponsiveFeatures(table);
}

// Función para inicializar características responsive
function initResponsiveFeatures(table) {
    const tableId = table.dataset.table;
    
    // Toggle columns visibility on mobile
    const toggleBtn = document.getElementById(`${tableId}-toggle-columns`);
    const columnsContainer = document.getElementById(`${tableId}-columns-container`);
    
    if (toggleBtn && columnsContainer) {
        toggleBtn.addEventListener('click', function() {
            const isVisible = !columnsContainer.classList.contains('hidden');
            
            if (isVisible) {
                columnsContainer.classList.add('hidden');
                this.setAttribute('aria-expanded', 'false');
            } else {
                columnsContainer.classList.remove('hidden');
                this.setAttribute('aria-expanded', 'true');
            }
        });
        
        // Inicializar el estado
        toggleBtn.setAttribute('aria-expanded', 'false');
    }
    
    // Mejorar scroll horizontal
    const tableContainer = document.getElementById(`${tableId}-table-container`);
    if (tableContainer) {
        // Agregar indicadores de scroll para mejor UX
        addScrollIndicators(tableContainer);
    }
}

// Función para agregar indicadores de scroll
function addScrollIndicators(container) {
    let scrollTimeout;
    
    container.addEventListener('scroll', function() {
        // Mostrar indicador de que se está scrolleando
        this.style.borderColor = '#3b82f6';
        
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            this.style.borderColor = '';
        }, 1000);
    });
    
    // Verificar si necesita scroll al cargar y redimensionar
    function checkScrollNeed() {
        const needsScroll = container.scrollWidth > container.clientWidth;
        if (needsScroll) {
            container.setAttribute('data-scrollable', 'true');
        } else {
            container.removeAttribute('data-scrollable');
        }
    }
    
    checkScrollNeed();
    window.addEventListener('resize', checkScrollNeed);
}

// Ordenar columnas asc/desc
function sortTableByColumn(table, columnIndex, type = "string", order = "asc") {
    const rows = table._filteredRows;
    rows.sort((rowA, rowB) => {
        let cellA = rowA.cells[columnIndex].innerText.trim();
        let cellB = rowB.cells[columnIndex].innerText.trim();
        if (type === "number") {
            cellA = parseFloat(cellA) || 0;
            cellB = parseFloat(cellB) || 0;
        }
        if (order === "asc") {
            return type === "number"
                ? cellA - cellB
                : cellA.localeCompare(cellB);
        } else {
            return type === "number"
                ? cellB - cellA
                : cellB.localeCompare(cellA);
        }
    });
    // Reordena en el DOM solo las filas filtradas
    rows.forEach((row) => table.tBodies[0].appendChild(row));
}

// Filtrar filas por búsqueda
function filterTable(table, searchTerm) {
    const term = searchTerm.toLowerCase();
    table._filteredRows = table._allRows.filter((row) => {
        const text = row.innerText.toLowerCase();
        return text.includes(term);
    });
}

// Paginación
function goToPage(table, pageNum) {
    const rows = table._filteredRows;
    const paginationSelect = document.querySelector(
        `#${table.dataset.table}-rows-per-page`
    );
    const rowsPerPage = paginationSelect
        ? parseInt(paginationSelect.value, 10)
        : 10;

    table.dataset.currentPage = pageNum;

    rows.forEach((row, idx) => {
        const start = (pageNum - 1) * rowsPerPage;
        const end = pageNum * rowsPerPage;
        row.style.display = idx >= start && idx < end ? "" : "none";
    });

    // Oculta las filas que no están en _filteredRows
    table._allRows.forEach((row) => {
        if (!rows.includes(row)) row.style.display = "none";
    });

    renderPagination(table, rows.length, rowsPerPage, pageNum);
    updateRowInfo(table, pageNum);
}

// Renderizar paginación
function renderPagination(table, totalRows, rowsPerPage, currentPage) {
    const pagination = document.querySelector(`#${table.dataset.table}-pagination`);
    if (!pagination) return;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    pagination.innerHTML = "";

    // Helper para crear botón
    function createBtn(label, page, disabled = false, active = false) {
        const btn = document.createElement("button");
        btn.className =
            "px-2 py-1 mx-1 rounded transition-colors duration-200 " +
            (active
                ? "bg-brand text-white font-bold shadow"
                : "bg-gray-200 text-gray-700 hover:bg-blue-100") +
            (disabled ? " opacity-50 cursor-not-allowed" : "");
        btn.textContent = label;
        if (!disabled && !active) {
            btn.addEventListener("click", () => goToPage(table, page));
        }
        return btn;
    }

    // Flecha doble izquierda (<<)
    pagination.appendChild(createBtn("<<", 1, currentPage === 1));
    // Flecha izquierda (<)
    pagination.appendChild(createBtn("<", Math.max(1, currentPage - 1), currentPage === 1));

    let startPage = 1;
    let endPage = totalPages;

    if (totalPages > 10) {
        if (currentPage <= 6) {
            startPage = 1;
            endPage = 10;
        } else if (currentPage + 4 >= totalPages) {
            startPage = totalPages - 9;
            endPage = totalPages;
        } else {
            startPage = currentPage - 5;
            endPage = currentPage + 4;
        }
    }

    // Puntos suspensivos al inicio
    if (startPage > 1) {
        const dots = document.createElement("span");
        dots.textContent = "...";
        dots.className = "mx-1 text-gray-500";
        pagination.appendChild(dots);
    }

    // Botones de página
    for (let i = startPage; i <= endPage; i++) {
        pagination.appendChild(createBtn(i, i, false, i === currentPage));
    }

    // Puntos suspensivos al final
    if (endPage < totalPages) {
        const dots = document.createElement("span");
        dots.textContent = "...";
        dots.className = "mx-1 text-gray-500";
        pagination.appendChild(dots);
    }

    // Flecha derecha (>)
    pagination.appendChild(createBtn(">", Math.min(totalPages, currentPage + 1), currentPage === totalPages));
    // Flecha doble derecha (>>)
    pagination.appendChild(createBtn(">>", totalPages, currentPage === totalPages));
}

// Exportar a CSV
function exportTableToCSV(table, filename = "export.csv") {
    const rows = Array.from(table.querySelectorAll("tr"));
    const csv = rows
        .map((row) => {
            const cols = Array.from(row.querySelectorAll("th, td"));
            return cols
                .map((c) => `"${c.innerText.replace(/"/g, '""')}"`)
                .join(",");
        })
        .join("\n");
    const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Imprimir tabla
function printTable(table) {
    const win = window.open("", "", "width=900,height=700");
    win.document.write("<html><head><title>Print Table</title></head><body>");
    win.document.write(table.outerHTML);
    win.document.write("</body></html>");
    win.document.close();
    win.print();
}

// Mostrar/ocultar columna
function toggleColumn(table, colIndex, show) {
    table.querySelectorAll("tr").forEach((row) => {
        if (row.cells[colIndex]) {
            row.cells[colIndex].style.display = show ? "" : "none";
        }
    });
    
    // Verificar si necesita scroll después del toggle
    const tableContainer = document.getElementById(`${table.dataset.table}-table-container`);
    if (tableContainer) {
        setTimeout(() => {
            const needsScroll = tableContainer.scrollWidth > tableContainer.clientWidth;
            if (needsScroll) {
                tableContainer.setAttribute('data-scrollable', 'true');
            } else {
                tableContainer.removeAttribute('data-scrollable');
            }
        }, 100);
    }
}

function updateSortArrows(table, columnIndex, order) {
    const headers = table.querySelectorAll("th.sortable");
    headers.forEach((th, idx) => {
        const arrow = th.querySelector(".sort-arrow");
        if (!arrow) return;
        if (idx === columnIndex) {
            arrow.innerHTML =
                order === "asc"
                    ? '<svg width="14" height="14" style="display:inline-block;vertical-align:middle;" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M5 15l7-7 7 7"/></svg>'
                    : '<svg width="14" height="14" style="display:inline-block;vertical-align:middle;" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>';
            arrow.classList.add("scale-110");
        } else {
            arrow.innerHTML = "";
            arrow.classList.remove("scale-110");
        }
    });
}

function updateRowInfo(table, pageNum) {
    const paginationSelect = document.querySelector(`#${table.dataset.table}-rows-per-page`);
    const rowsPerPage = paginationSelect ? parseInt(paginationSelect.value, 10) : 10;
    const rows = table._filteredRows || Array.from(table.tBodies[0].querySelectorAll("tr"));
    const totalRows = rows.length;
    const start = totalRows === 0 ? 0 : (pageNum - 1) * rowsPerPage + 1;
    const end = Math.min(pageNum * rowsPerPage, totalRows);
    const infoDiv = document.getElementById(`${table.dataset.table}-row-info`);
    if (infoDiv) {
        infoDiv.textContent = `${start} a ${end} de ${totalRows}`;
    }
}
