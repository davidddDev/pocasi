<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
    <link rel="styleshett" href="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>">

    
    <title></title>
</head>
<body>

    <div class="container mt-3">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
