<?php
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sum = 0;

    for ($i = 1; $i <= 100; $i++) {
        $sum += $i;
    }

    $result = $sum;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 3</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <p class="text-center mb-4">
                            Haz clic al botón para calcular la suma de los números entre 1 a 100
                        </p>

                        <button type="submit" class="btn btn-primary w-100">
                            Calcular
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar al Menú
                        </a>
                    </div>

                    <?php if ($result !== null) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Resultado</h5>

                            <p class="mb-0">
                                La suma de los números entre 1 a 100 es:
                                <strong><?= $result ?></strong>
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