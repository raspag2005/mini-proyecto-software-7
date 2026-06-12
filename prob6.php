<?php
$budget = null;
$gynecology = null;
$traumatology = null;
$pediatry = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $budget = (float)$_POST["budget"];

    if ($budget > 0) {
        $gynecology = $budget * 0.40;
        $traumatology = $budget * 0.35;
        $pediatry = $budget * 0.25;
    } else {
        $error = "Poner un valor positivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 6</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 6</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Presupuesto total del hospital
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                min="0.01"
                                name="budget"
                                class="form-control"
                                required>
                        </div>

                    <?php if ($budget !== null && !isset($error)) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Distribuición de presupuesto</h5>

                            <p>
                                <strong>Ginecología (40%):</strong>
                                $<?= number_format($gynecology, 2) ?>
                            </p>

                            <p>
                                <strong>Traumatología (35%):</strong>
                                $<?= number_format($traumatology, 2) ?>
                            </p>

                            <p>
                                <strong>Pediatría (25%):</strong>
                                $<?= number_format($pediatry, 2) ?>
                            </p>

                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                <canvas id="budgetChart"></canvas>
                            </div>
                        </div>

                        <script>
                        const ctx = document.getElementById('budgetChart');

                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: [
                                    'Ginecología',
                                    'Traumatología',
                                    'Pediatría'
                                ],
                                datasets: [{
                                    data: [
                                        <?= $gynecology ?>,
                                        <?= $traumatology ?>,
                                        <?= $pediatry ?>
                                    ],
                                    backgroundColor: [
                                        '#0d6efd',
                                        '#198754',
                                        '#ffc107'
                                    ]
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                        </script>

                    <?php } ?>
                    <br>
                        <button type="submit" class="btn btn-primary w-100">
                            Calcular Distribución
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar al Menú
                        </a>
                    </div>

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