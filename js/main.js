function checkDevice() {
    if (window.innerWidth < 768) {
        document.getElementById('columna1').style.display = 'none'; // Ocultar columna 1
        document.getElementById('columna2').style.width = '100%'; // Ajustar ancho de columna 2
    } else {
        document.getElementById('columna1').style.display = 'block'; // Mostrar columna 1 en pantallas más grandes
        document.getElementById('columna2').style.width = '50%'; // Ajustar ancho de columna 2 a 50%
    }
}

// Asignar eventos después de definir la función
window.onload = checkDevice;
window.onresize = checkDevice;
