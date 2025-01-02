// controller.js - Controlador
const CompetenciaController = (() => {
    // Inicializar eventos
    const inicializarEventos = () => {
        const btnReporte = document.getElementById("btnReporte");
        btnReporte.addEventListener("click", generarReportePDF);
    };

    // Generar el reporte en PDF
    const generarReportePDF = () => {
        const mejoresLugares = CompetenciaModel.obtenerMejoresLugares();

        // Crear instancia de jsPDF
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Título del reporte
        doc.setFont("helvetica", "bold");
        doc.setFontSize(16);
        doc.text("Reporte de los Mejores Lugares", 20, 20);

        // Contenido del reporte
        doc.setFont("helvetica", "normal");
        doc.setFontSize(12);
        mejoresLugares.forEach((lugar, index) => {
            const texto = `${index + 1}° Lugar: ${lugar.nombre} (${lugar.puntaje} puntos)`;
            doc.text(texto, 20, 40 + index * 10); // Aumenta la posición Y para cada línea
        });

        // Guardar el archivo como PDF
        doc.save("reporte_mejores_lugares.pdf");
    };

    // Inicializar controlador
    const inicializar = () => {
        inicializarEventos();
    };

    return {
        inicializar,
    };
})();

// Iniciar el controlador al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    CompetenciaController.inicializar();
});
