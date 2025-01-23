<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam spolkových zemí</title>

    <style>
        .table-purple th {
            background-color: #6f42c1;
            color: white;
        }

        .custom-id {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .no-underline a {
            text-decoration: none;
        }

        .no-underline a:hover {
            text-decoration: underline;
        }

        .btn-fialove {
            background-color: #6f42c1;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 0.875rem;
        }

        .btn-fialove:hover {
            background-color: #5a379c;
            color: white;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container py-3">
        <h1 class="text-center mb-4">Seznam spolkových zemí</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive">
                    <?php
                        $table = new \CodeIgniter\View\Table();
                        $table->setHeading('Name', 'Vlajka/Mapa');
                    
                        foreach ($bundesland as $row) {
                            $linkName = anchor("station/}", esc($row->name), ['class' => 'text-light']);
                            $detailsTlacitko = anchor("bundesland/details/", 'Obrázky', ['class' => 'btn btn-fialove btn-sm']);
                    
                            $table->addRow(
                                "<span class='no-underline'>{$linkName}</span>",
                                $detailsTlacitko
                            );
                        }
                    
                        $template = [
                            'table_open' => '<table class="table table-striped table-dark table-bordered table-hover table-purple">',
                            'thead_open' => '<thead>',
                            'thead_close' => '</thead>',
                            'heading_row_start' => '<tr>',
                            'heading_row_end' => '</tr>',
                            'heading_cell_start' => '<th>',
                            'heading_cell_end' => '</th>',
                            'tbody_open' => '<tbody>',
                            'tbody_close' => '</tbody>',
                            'row_start' => '<tr>',
                            'row_end' => '</tr>',
                            'cell_start' => '<td>',
                            'cell_end' => '</td>',
                            'table_close' => '</table>'
                        ];
                    
                        $table->setTemplate($template);
                        echo $table->generate();
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?= $this->endSection() ?>
