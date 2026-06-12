<?php
$counts = [
    "kid" => 0,
    "teen" => 0,
    "adult" => 0,
    "older" => 0
];
$numbers = array();

$total = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    for ($i = 1; $i <= 5; $i++) {
        $age = (int)$_POST["age$i"];
        $total++;
        array_push($numbers, $age);
        if ($age >= 0 && $age <= 12) {
            $counts["kid"]++;
        } elseif ($age <= 17) {
            $counts["teen"]++;
        } elseif ($age <= 64) {
            $counts["adult"]++;
        } else {
            $counts["older"]++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 5</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 5</h2>
                </div>

                <div class="card-body">

                    <?php if ($total > 0) { ?>

                        <div class="alert alert-success mt-4">

                            <h5 class="mb-3">Resultados</h5>
                            <strong>Edades puestas: </strong>
                            <?php
                            echo implode(", ", $numbers);
                            $labels = [
                                "kid" => "Niño (0–12)",
                                "teen" => "Adolescente (13–17)",
                                "adult" => "Adulto (18–64)",
                                "older" => "Adulto Mayor (65+)"
                            ];

                            foreach ($counts as $key => $value) {
                                $percent = ($value / 5) * 100;
                            ?>

                                <p class="mb-1">
                                    <strong><?= $labels[$key] ?>:</strong>
                                    <?= $value ?>
                                </p>

                                <div class="progress mb-3">
                                    <div class="progress-bar"
                                         role="progressbar"
                                         style="width: <?= $percent ?>%">
                                        <?= $percent ?>%
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                    <?php } ?>
                    <form method="post">

                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <div class="mb-3">
                                <label class="form-label">Edad de Persona <?= $i ?></label>
                                <input type="number" name="age<?= $i ?>" class="form-control" min="0" max="130" required>
                            </div>
                        <?php } ?>

                        <button type="submit" class="btn btn-primary w-100">
                            Analizar
                        </button>

                    </form>

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