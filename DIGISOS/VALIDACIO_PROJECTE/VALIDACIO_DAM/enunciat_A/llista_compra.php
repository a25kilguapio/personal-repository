<?php
include 'connexio.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de la compra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

    <h2 class="text-center">Llista de la compra</h2>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action="insertar.php" method="POST">

                <div class="form-group">
                    <label for="item">Item:</label>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="producte"
                        name="producte"
                        placeholder="Introdueix el nom de l'article"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="cantidad">Quantitat:</label>

                    <input 
                        type="number" 
                        class="form-control" 
                        id="quantitat"
                        name="quantitat"
                        placeholder="Introdueix la quantitat"
                        required
                    >
                </div>

                <input 
                    type="submit" 
                    class="btn btn-primary" 
                    value="Afegir a la llista"
                >

            </form>

        </div>
    </div>

    <hr>

    <h3>Lista de la compra:</h3>

    <ul id="lista">

        <?php

        // CONSULTA SQL
        $sql = "SELECT * FROM LLISTA ORDER BY data DESC";

        $resultat = $conn->query($sql);

        // MOSTRAR RESULTATS
        if ($resultat->num_rows > 0) {

            while($fila = $resultat->fetch_assoc()) {

                echo "<li>";

                echo "<span class='badge bg-primary'>"
                        . $fila['quantitat'] .
                     "</span> ";

                echo $fila['producte'];

                echo " <small>a les "
                        . date("H:i", strtotime($fila['data'])) .
                     "</small>";

                echo "</li>";
            }
        } else {

            echo "<li>No hi ha productes</li>";
        }

        ?>

    </ul>

</div>

</body>
</html>