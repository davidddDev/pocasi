<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
    <link rel="styleshett" href="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>">
    <style>
        .navbar-purple {
            background-color: #6f42c1;
        }

        .navbar-purple .navbar-brand,
        .navbar-purple .nav-link {
            color: white;
        }

        .navbar-purple .nav-link:hover {
            color: #d1c4e9;
        }
    </style>
    <title>Navbar</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/bundesland') ?>">Projekt Počasí</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bundesland') ?>">Bundesland</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('stations-list') ?>">Seznam stanic</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </nav>


</body>

</html>
