<main>
    <h1>Reportes</h1>
    <button id="mostrar-botones">Generar reportes</button>

    <div id="reportes-lista" style="display: none;">
        <?php if (!empty($reportes)): ?>
            <?php foreach ($reportes as $reporte): ?>
                <div>
                    <p><strong>Tipo de Reporte:</strong> <?= htmlspecialchars($reporte->tipoReporte) ?></p>
                    <a href="/descargar-reporte?id=<?= $reporte->id ?>" class="button">Generar PDF</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron reportes con "primer lugar", "segundo lugar" o "tercer lugar".</p>
        <?php endif; ?>
    </div>
</main>

<script>
    document.getElementById('mostrar-botones').addEventListener('click', function() {
        document.getElementById('reportes-lista').style.display = 'block';
    });
</script>
