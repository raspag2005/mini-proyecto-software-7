<?php
$gradeCount = null;
$results = false;

$average = 0;
$stdDev = 0;
$min = 0;
$max = 0;

if (isset($_POST['setCount'])) {
    $gradeCount = (int)$_POST['gradeCount'];
}

if (isset($_POST['calculate'])) {

    $grades = $_POST['grades'];

    $count = count($grades);

    $sum = 0;

    foreach ($grades as $grade) {
        $sum += $grade;
    }

    $average = $sum / $count;

    $sumSquares = 0;

    foreach ($grades as $grade) {
        $sumSquares += pow($grade - $average, 2);
    }

    $variance = $sumSquares / $count;
    $stdDev = sqrt($variance);

    $min = min($grades);
    $max = max($grades);

    $results = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 7</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 7</h2>
                </div>

                <div class="card-body">

                    <?php if ($gradeCount === null && !$results) { ?>

                        <form method="post">

                            <div class="mb-3">
                                <label class="form-label">
                                    Ingrese cuantas notas quiere ingresar.
                                </label>

                                <input
                                    type="number"
                                    name="gradeCount"
                                    class="form-control"
                                    min="1"
                                    max="30"
                                    required>
                            </div>

                            <button type="submit"
                                    name="setCount"
                                    class="btn btn-primary w-100">
                                Continuar
                            </button>

                        </form>

                    <?php } ?>

                    <?php if ($gradeCount !== null) { ?>

                        <form method="post">

                            <input type="hidden"
                                   name="gradeCount"
                                   value="<?= $gradeCount ?>">

                            <?php for ($i = 1; $i <= $gradeCount; $i++) { ?>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Nota <?= $i ?>
                                    </label>

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="grades[]"
                                        class="form-control"
                                        min="0"
                                        max="100"
                                        required>
                                </div>

                            <?php } ?>

                            <button type="submit"
                                    name="calculate"
                                    class="btn btn-primary w-100">
                                Calcular Estadísticas
                            </button>

    <div class="d-grid mt-3">
        <a href="prob7.php" class="btn btn-primary w-100">
            Regresar
        </a>
    </div>
 
                        </form>

                    <?php } ?>

                    <?php if ($results) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Results</h5>
                            <strong>Notas: </strong>
                            <?php
                            echo implode(", ", $grades);
                            ?>
                            <br><br>
                            <p>
                                <strong>Average:</strong>
                                <?= number_format($average, 2) ?>
                            </p>

                            <p>
                                <strong>Standard Deviation:</strong>
                                <?= number_format($stdDev, 2) ?>
                            </p>

                            <p>
                                <strong>Minimum Grade:</strong>
                                <?= number_format($min, 2) ?>
                            </p>

                            <p class="mb-0">
                                <strong>Maximum Grade:</strong>
                                <?= number_format($max, 2) ?>
                            </p>
<div class="d-grid mt-3">
    <a href="prob7.php" class="btn btn-primary">
        Intentar de nuevo
    </a>
</div>
                        </div>

                    <?php } ?>
                    
                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar a Menú
                        </a>
                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>