<?php
$evenSum = null;
$oddSum = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $evenSum = 0;
    $oddSum = 0;

    for ($i = 1; $i <= 200; $i++) {

        if ($i % 2 == 0) {
            $evenSum += $i;
        } else {
            $oddSum += $i;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem 4</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 4</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <p class="text-center mb-4">
                            Haz click al boton para calcular la suma de números pares e impares de 1 a 200.
                        </p>

                        <button type="submit" class="btn btn-primary w-100">
                            Calcular
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar a Menú
                        </a>
                    </div>

                    <?php if ($evenSum !== null && $oddSum !== null) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Resultados</h5>

                            <p>
                                <strong>Suma de números pares:</strong>
                                <?= $evenSum ?>
                            </p>

                            <p class="mb-0">
                                <strong>Suma de números impares:</strong>
                                <?= $oddSum ?>
                            </p>

                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>