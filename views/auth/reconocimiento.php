
    <main>

    <h2>Reconocimientos - Primer Lugar</h2>
    <?php if (!empty($reconocimientos)): ?>
        <ul>
            <?php foreach ($reconocimientos as $reconocimiento): ?>
                <div class="previsualizacion-reconocimiento">
                    <li>
                    <strong>Competidor:</strong> <?= htmlspecialchars($reconocimiento->competidor ?? 'Sin nombre') ?><br>
                    <strong>Evento:</strong> <?= htmlspecialchars($reconocimiento->evento ?? 'Sin descripción') ?>
                    </li>
                </div>
                
                <br>
                <a href="/descargar-reconocimiento?id=<?= $reconocimiento->id ?>" class="button">Descargar Reconocimiento (PDF)</a>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron reconocimientos para "Primer lugar".</p>
    <?php endif; ?>

    </main>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/model.js"></script>
    <script src="js/controller_reconocimiento.js"></script>
