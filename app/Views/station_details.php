<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detaily stanice</title>
</head>
<body class="bg-dark text-light">
    <div class="container py-4">

        <div class="p-3 text-center rounded mb-4" style="background-color: #6f42c1;">
            <h1 class="text-light mb-0">Detaily stanice: <?= esc($station->place) ?></h1>
        </div>

        <div class="card bg-secondary mb-4">
            <div class="card-body">
                <p class="text-white"><strong>Latitude:</strong> <?= esc($station->geo_latitude) ?></p>
                <p class="text-white"><strong>Longitude:</strong> <?= esc($station->geo_longtitude) ?></p>
                <p class="text-white"><strong>Výška:</strong> <?= esc($station->height) ?> m</p>
            </div>
        </div>

        <h2 class="text-center mb-3">Naměřené údaje</h2>
        <div class="table-responsive">
            <table class="table table-dark table-bordered table-striped">
                <thead style="background-color: #6f42c1;">
                    <tr class="text-center text-light">
                        <th>ID</th>
                        <th>Datum</th>
                        <th>Minimální teplota (2m)</th>
                        <th>Maximální teplota (2m)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($measurements as $measurement): ?>
                        <tr>
                            <td class="fw-bold text-center"><?= esc($measurement['id']) ?></td>
                            <td class="text-center"><?= esc(date('d-m-Y', strtotime($measurement['date']))) ?></td>
                            <td class="text-center"><?= esc($measurement['min_2m']) ?> °C</td>
                            <td class="text-center"><?= esc($measurement['max_2m']) ?> °C</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?= $this->endSection() ?>
