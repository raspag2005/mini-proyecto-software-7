<?php
$multiples = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = (int)$_POST["n"];

    if ($n > 0) {
        for ($i = 1; $i <= $n; $i++) {
            $multiples[] = 4 * $i;
        }
    } 
    else {
        $error = "Todos los valores deben ser números positivos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema 2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Problema 2</h2>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Entra un número (n)</label>
                            <input type="number" name="n" class="form-control" min="1" max="99" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Generar
                        </button>

                    </form>

                    <div class="d-grid mt-3">
                        <a href="index.php" class="btn btn-secondary">
                            Regresar a Menú
                        </a>
                    </div>

                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger mt-3">
                            <?= $error ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($multiples)) { ?>

                        <div class="alert alert-success mt-4">

                            <h5>Resultado</h5>

                            <p><strong>Primeros <?= $n ?> múltiplos de 4:</strong></p>

                            <ul class="list-group">
                                <?php foreach ($multiples as $value) { ?>
                                    <li class="list-group-item">
                                        <?= $value ?>
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