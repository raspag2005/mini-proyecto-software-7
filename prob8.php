<?php
$season = null;
$selectedDate = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectedDate = $_POST["date"];

    $month = (int)date("n", strtotime($selectedDate));
    $day = (int)date("j", strtotime($selectedDate));

    if (
        ($month == 12 && $day >= 21) ||
        ($month == 1) ||
        ($month == 2) ||
        ($month == 3 && $day <= 20)
    ) {
        $season = "Verano";
    }
    elseif (
        ($month == 3 && $day >= 21) ||
        ($month == 4) ||
        ($month == 5) ||
        ($month == 6 && $day <= 21)
    ) {
        $season = "Otoño";
    }
    elseif (
        ($month == 6 && $day >= 22) ||
        ($month == 7) ||
        ($month == 8) ||
        ($month == 9 && $day <= 22)
    ) {
        $season = "Invierno";
    }
    else {
        $season = "Primavera";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 8</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 8</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Selecciona una Fecha
                            </label>

                            <input
                                type="date"
                                name="date"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Determinar Estación
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar a Menú
                        </a>
                    </div>

                    <?php if ($season !== null) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Resultado</h5>

                            <p>
                                <strong>Fecha:</strong>
                                <?= date("F j, Y", strtotime($selectedDate)) ?>
                            </p>

                            <p class="mb-0">
                                <strong>Temporada:</strong>
                                <?= $season ?>
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