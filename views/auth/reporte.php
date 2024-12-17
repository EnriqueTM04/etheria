
    <main>
    <?php if (!empty($reportes)): ?>
        <ul>
            <?php foreach ($reportes as $reporte): ?>
                <div class="previsualizacion-reporte">
                    <li>
                    <strong>Competidor:</strong> <?= htmlspecialchars($reporte->competidor ?? 'Sin nombre') ?><br>
                    <strong>Evento:</strong> <?= htmlspecialchars($reporte->evento ?? 'Sin descripción') ?>
                    </li>
                </div>
                
                <br>
                <a href="/descargar-reporte?id=<?= $reporte->id ?>" class="button">Descargar Reporte (PDF)</a>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron reportes".</p>
    <?php endif; ?>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/model.js"></script>
    <script src="js/controller.js"></script>
</body>
</html>