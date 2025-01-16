<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Spolkové Země</title>

    <style>

        .mapa_kontejnerik img, .vlajka_kontejnerik img {
            max-width: 100%;
            max-height: 300px;
            display: block;
            margin: 0 auto;
        }

        .mapa_kontejnerik, .vlajka_kontejnerik {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container py-4">
        <h1 class="text-center"><?= esc($bundesland->name) ?></h1> 

        <div class="row my-4">

            <div class="col-md-6 mapa_kontejnerik">
                <div>
                    <h3 class="text-center">Mapa</h3>
                    <img src="<?= base_url('obrazky/mapy/' . esc($bundesland->mapy)) ?>" alt="Mapa <?= esc($bundesland->name) ?>">
                </div>
            </div>

            <div class="col-md-6 vlajka_kontejnerik">
                <div>
                    <h3 class="text-center">Vlajka</h3>
                    <img src="<?= base_url('obrazky/vlajky/' . esc($bundesland->vlajky)) ?>" alt="Vlajka <?= esc($bundesland->name) ?>">
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?= $this->endSection() ?>
