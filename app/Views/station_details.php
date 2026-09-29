<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-top: 20px;
    }

    .pagination li {
        list-style: none;
    }

    .pagination a {
        display: block;
        padding: 8px 12px;
        background-color: #6f42c1;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination a:hover {
        background-color: #59359a;
    }

    .pagination .active a {
        background-color: #0d6efd;
    }
    </style>
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
                <p style="color: white;"><strong>Latitude:</strong> <?= esc($station->geo_latitude) ?></p>
                <p style="color: white;"><strong>Longitude:</strong> <?= esc($station->geo_longtitude) ?></p>
                <p style="color: white;"><strong>Výška:</strong> <?= esc($station->height) ?> m</p>
            </div>
        </div>

        <!-- FORMULÁŘ PRO SOFT DELETE -->
        <div class="card bg-secondary mb-4">
            <div class="card-body">
                <h4 class="card-title text-light mb-3">Smazat data za daný měsíc (Soft Delete)</h4>
                <form action="<?= site_url('station/delete-month') ?>" method="post" class="row g-3"
                    onsubmit="return confirm('Opravdu chcete smazat měřená data pro vybraný měsíc?');">
                    <?= csrf_field() ?>
                    <input type="hidden" name="station_id" value="<?= esc($station->S_ID) ?>">

                    <div class="col-md-4">
                        <label for="year" class="form-label text-light">Rok</label>
                        <input type="number" name="year" id="year" class="form-control" placeholder="např. 2023"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label for="month" class="form-label text-light">Měsíc</label>
                        <select name="month" id="month" class="form-select" required>
                            <?php for ($m = 1; $m <= 12; $m++): ?>
                            <option value="<?= $m ?>">Měsíc <?= $m ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-danger w-100">Smazat měsíc</button>
                    </div>
                </form>
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
                        <th>Vlhkost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($measurements as$measurement):?>
                    <tr>
                        <td class="fw-bold text-center"><?= esc($measurement['id']) ?></td>
                        <td class="text-center"><?= esc(date('d-m-Y', strtotime($measurement['date']))) ?></td>
                        <td class="text-center"><?= esc($measurement['min_2m']) ?> °C</td>
                        <td class="text-center"><?= esc($measurement['max_2m']) ?> °C</td>
                        <td class="text-center"><?= esc($measurement['humidity']) ?> %</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</body>

</html>

<?= $this->endSection() ?>