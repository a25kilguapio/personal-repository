<?php
include "connexio.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumne = $conn->$_POST['alumne'];
    $aula = $conn->$_POST['aula'];
    $problema = $conn->$_POST['problema'];
    $prioritat = $conn->$_POST['prioritat'];

    $sql_insert = "INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data)
                   VALUES ('$alumne', '$aula', '$problema', '$prioritat', NOW())";
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Incidències d'aula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Registre d'incidències d'aula</h2>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="registrar_incidencia.php">
                <div class="form-group">
                    <label for="alumne">Alumne:</label>
                    <input type="text" class="form-control" id="alumne" name="alumne" placeholder="Nom de l'alumne" required>
                </div>

                <div class="form-group">
                    <label for="aula">Aula:</label>
                    <input type="text" class="form-control" id="aula" name="aula" placeholder="Exemple: Aula 201" required>
                </div>

                <div class="form-group">
                    <label for="problema">Problema:</label>
                    <input type="text" class="form-control" id="problema" name="problema" placeholder="Descriu breument la incidència" required>
                </div>

                <div class="form-group">
                    <label for="prioritat">Prioritat:</label>
                    <input type="text" class="form-control" id="prioritat" name="prioritat" placeholder="Alta, Mitjana o Baixa" required>
                </div>

                <input type="submit" class="btn btn-warning btn-block" value="Registrar incidència">
            </form>
        </div>
    </div>

    <hr>

    <h3>Incidències registrades</h3>
    <ul class="list-group">
        <?php
        $sql = "SELECT * FROM INCIDENCIES_AULA";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $prioritat_label = strtolower($fila['prioritat']) === 'alta' ? 'danger' : (strtolower($fila['prioritat']) === 'mitjana' ? 'warning' : 'default');
                ?>
                <li class="list-group-item mb-2 shadow-sm rounded">
                    <div class="clearfix">
                        <strong class="pull-left">Nom de l'alumne: <?php echo htmlspecialchars($fila['alumne']); ?></strong>
                        <span class="label label-<?php echo $prioritat_label; ?>" style="float:right;">
                            <?php echo htmlspecialchars($fila['prioritat']); ?>
                        </span>
                    </div>
                    <div class="mt-10">
                        <strong>Aula:</strong> 
                        <?php echo htmlspecialchars($fila['aula']); ?>
                    </div>
                    <div>
                        <strong>Problema:</strong> 
                        <?php echo htmlspecialchars($fila['problema']); ?>
                    </div>
                    <small class="text-muted">
                        Data: 
                        <?php echo $fila['data']; ?>
                    </small>
                </li>
                <?php
            }
        } else {
            echo "<li class='list-group-item'>No hi ha incidències registrades.</li>";
        }
        ?>
    </ul>
</div>
</body>
</html>