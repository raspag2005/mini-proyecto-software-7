<?php
$mean = $stdDev = $min = $max = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numbers = [
        (float)$_POST['num1'],
        (float)$_POST['num2'],
        (float)$_POST['num3'],
        (float)$_POST['num4'],
        (float)$_POST['num5']
    ];

    $valid = true;

    foreach ($numbers as $num) {
        if ($num <= 0) {
            $valid = false;
            break;
        }
    }

    if ($valid) {

        $min = min($numbers);
        $max = max($numbers);

        $mean = array_sum($numbers) / count($numbers);

        $sumSquares = 0;
        foreach ($numbers as $num) {
            $sumSquares += pow($num - $mean, 2);
        }

        $variance = $sumSquares / count($numbers);
        $stdDev = sqrt($variance);
    } else {
        $error = "Todos los valores deben ser números positivos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Problema 1</h2>
                </div>

                <div class="card-body">

                    <form method="post">
                    <?php if ($mean !== null) { ?>
                        <div class="alert alert-success mt-4">

                            <h4 class="alert-heading">
                                Resultados
                            </h4>

                            <p>
                                <strong>Números: </strong>
                                <?php
                                echo implode(", ", $numbers);
                                ?>
                            </p>

                            <p>
                                <strong>Media:</strong>
                                <?= number_format($mean, 2) ?>
                            </p>

                            <p>
                                <strong>Deviación Estándar:</strong>
                                <?= number_format($stdDev, 2) ?>
                            </p>

                            <p>
                                <strong>Número min:</strong>
                                <?= number_format($min, 2) ?>
                            </p>

                            <p class="mb-0">
                                <strong>Número max:</strong>
                                <?= number_format($max, 2) ?>
                            </p>

                        </div>
                    <?php } ?>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                        ?>
                            <div class="mb-3">
                                <label class="form-label">
                                    Número <?= $i ?>
                                </label>

                                <input
                                    type="number"
                                    step="any"
                                    min="0"
                                    name="num<?= $i ?>"
                                    class="form-control"
                                    required>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Calcular
                            </button>
                        
                            <a href="index.php" class="btn btn-secondary">
                                Regresar a Menú
                            </a>
                        </div>

                    </form>

                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger mt-4">
                            <?= $error ?>
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