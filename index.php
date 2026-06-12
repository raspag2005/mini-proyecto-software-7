<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header text-center bg-primary text-white">
                    <h1 class="h4 mb-0">Mini Proyecto</h1>
                </div>

                <div class="card-body">

                    <div class="d-grid gap-3 col-8 mx-auto">

                        <?php
                        for ($i = 1; $i <= 9; $i++) {
                        ?>
                            <a href="prob<?= $i ?>.php"
                               class="btn btn-light border w-100 py-3">
                                Problema <?= $i ?>
                            </a>
                        <?php
                        }
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<?php include 'footer.php'; ?>
</body>
</html>