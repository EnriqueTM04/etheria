<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconocimiento</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .certificate {
            width: 90%;
            margin: 20px auto;
            padding: 30px;
            border: 10px solid #E6AF2E; /* Color principal */
            border-radius: 15px;
            background: linear-gradient(135deg, #fff, #e8eaf6);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .certificate-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .certificate-header h1 {
            font-size: 3rem;
            color: #1a237e;
            margin: 0;
        }

        .certificate-header h2 {
            font-size: 1.5rem;
            color: #3949ab;
            margin: 5px 0;
        }

        .certificate-body {
            text-align: center;
            line-height: 1.8;
        }

        .certificate-body p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
            color: #1a237e;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .signature div {
            text-align: center;
            width: 30%;
        }

        .signature img {
            width: 150px;
            height: auto;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #757575;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="certificate-header">
            <h1>Certificado de Reconocimiento</h1>
            <h2>Otorgado a</h2>
        </div>
        <div class="certificate-body">
            <p class="highlight"><?= htmlspecialchars($reconocimiento->competidor ?? 'Nombre del competidor') ?></p>
            <p>Por su destacada participación en el evento</p>
            <p class="highlight"><?= htmlspecialchars($reconocimiento->evento ?? 'Nombre del evento') ?></p>
            <p>y su mérito:</p>
            <p class="highlight"><?= htmlspecialchars($reconocimiento->meritos ?? 'Sin mérito') ?></p>
            <p>Este reconocimiento es un testimonio de su esfuerzo, dedicación y excelencia.</p>
        </div>
        <div class="signature">
            <div>
                <img src="../../img/firma1.png" alt="Firma 1">
                <p>Israel Buitron Damaso</p>
                <p>Director de Club Leones</p>
            </div>
            <div>
                <img src="path/to/firma2.png" alt="Firma 2">
                <p>Raul Alcantara Jimenez</p>
                <p>Subdirector de Club Leones</p>
            </div>
        </div>
        <div class="footer">
            <p>Emitido el <?= date('d/m/Y') ?> | Club Leones Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
