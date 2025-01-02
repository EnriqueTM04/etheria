<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .report {
            width: 90%;
            margin: 20px auto;
            padding: 30px;
            border: 5px solid #1e88e5;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #1e88e5;
            margin: 0;
        }

        .header p {
            font-size: 1.2rem;
            color: #666;
        }

        .content {
            margin-top: 20px;
            line-height: 1.6;
        }

        .content p {
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
            color: #1e88e5;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #757575;
        }
    </style>
</head>
<body>
    <div class="report">
        <div class="header">
            <h1>Reporte General</h1>
            <p>Detalles del reporte generado</p>
        </div>
        <div class="content">
            <p><span class="highlight">Tipo de Reporte:</span> <?= htmlspecialchars($reporte->tipoReporte ?? 'N/A') ?></p>
            <p><span class="highlight">Mejores Lugares:</span> <?= htmlspecialchars($reporte->mejoresLugares ?? 'N/A') ?></p>
            <p><span class="highlight">Datos de Competidores:</span> <?= htmlspecialchars($reporte->datosCompetidores ?? 'N/A') ?></p>
        </div>
        <div class="footer">
            <p>Generado el <?= date('d/m/Y') ?> | Organización Oficial</p>
        </div>
    </div>
</body>
</html>
