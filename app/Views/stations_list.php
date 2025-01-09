<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam stanic</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .card {
            margin: 20px;
            background-color: #6c757d; /* bg-secondary */
            color: #fff;
            border: 1px solid #6c757d;
        }
    </style>
</head>

<body>

    <div class="container py-4">
        <div class="row">
            <?php foreach ($stations as $station): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($station->place) ?></h5>
                            <p>
                                <strong>Latitude:</strong> <?= esc($station->geo_latitude) ?><br>
                                <strong>Longitude:</strong> <?= esc($station->geo_longtitude) ?><br>
                                <strong>Height:</strong> <?= esc($station->height) ?> m<br>
                                <strong>Bundesland:</strong> <?= esc($station->bundesland_name) ?><br>
                                <strong>Vlajka:</strong> <img src="<?= base_url('obrazky/vlajky/' . $station->vlajka) ?>" alt="<?= esc($station->bundesland_name) ?>" style="width: 20px; height: 20px;">
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>

<?= $this->endSection() ?>