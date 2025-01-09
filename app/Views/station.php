<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode</title>
</head>
<body class="bg-dark text-light">
    <div class="container py-4">
        <h1 class="text-center mb-4">Přehled meteorologických stanic ve spolkové zemi: <?= esc($bundesland->name) ?></h1>

        <div class="row">
        <?php foreach ($stations as $station): ?>
            <div class="col-md-4">
                <div class="card bg-secondary text-light mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($station->place) ?></h5>
                        <p class="card-text">
                            <strong>Latitude:</strong> <?= esc($station->geo_latitude) ?><br>
                            <strong>Longitude:</strong> <?= esc($station->geo_longtitude) ?><br>
                            <strong>Height:</strong> <?= esc($station->height) ?>m<br>
                        </p>
                        <a href="<?= site_url('station/details/'.$station->S_ID) ?>" class="btn btn-secondary" style="background-color: #6f42c1; border-color: #6f42c1;">Zobrazit detaily</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

<?= $this->endSection() ?>