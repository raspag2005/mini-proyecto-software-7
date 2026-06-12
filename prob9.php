<?php
$powers = [];
$number = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $number = (int)$_POST["number"];

    if ($number >= 1 && $number <= 9) {

        for ($i = 1; $i <= 15; $i++) {
            $powers[$i] = pow($number, $i);
        }

    } else {
        $error = "Por favor seleccionar un número entre 1 y 9.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 9</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 9</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Ingrese un Número (1-9)
                            </label>

                            <input
                                type="number"
                                name="number"
                                class="form-control"
                                min="1"
                                max="9"
                                required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Generar Potencias
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar a Menú
                        </a>
                    </div>

                    <?php if (isset($error)) { ?>

                        <div class="alert alert-danger mt-4">
                            <?= $error ?>
                        </div>

                    <?php } ?>

                    <?php if (!empty($powers)) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Resultados</h5>

                            <p>
                                <strong>Primeras 15 potencias de <?= $number ?>:</strong>
                            </p>

                            <ul class="list-group">

                                <?php foreach ($powers as $power => $value) { ?>

                                    <li class="list-group-item">
                                        <?= $number ?><sup><?= $power ?></sup>
                                        =
                                        <?= number_format($value) ?>
                                    </li>

                                <?php } ?>

                            </ul>

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