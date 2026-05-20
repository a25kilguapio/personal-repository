<?php

require_once 'connexio.php';

$usuari = $_POST['usuari'];
$missatge = $_POST['missatge'];

$sql = "INSERT INTO XAT (missatge, usuari)
        VALUES (?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $missatge, $usuari);

$stmt->execute();

header("Location: xat.php");

exit();

?>