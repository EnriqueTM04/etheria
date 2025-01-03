<main>
    <h1>Reportes</h1>
    <h2>Generar Reportes</h2>
    <?php if (!empty($reportes)): ?>
        <ul>
            <?php foreach ($reportes as $reporte): ?>
                <li>
                    <br><br>
                    <p><strong>Tipo de Reporte:</strong> <?= htmlspecialchars($reporte->tipoReporte) ?></p>
                    <p><strong>Posicion:</strong> <?= htmlspecialchars($reporte->mejoresLugares) ?></p>
                    <p><strong>Datos Competidor:</strong> <?= htmlspecialchars($reporte->datosCompetidores) ?></p>
                    <a class="button" href="/generar-reporte?id=<?= $reporte->id ?>">Generar PDF</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron reportes para los criterios especificados.</p>
    <?php endif; ?>
</main>

