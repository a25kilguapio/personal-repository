<?php

include 'connexio.php';

$producte = $_POST['producte'];
$quantitat = $_POST['quantitat'];

$sql = "INSERT INTO LLISTA (producte, quantitat, data)
        VALUES (?, ?, NOW())";

$stmt = $conn->prepare($sql);

// BIND PARAMS
$stmt->bind_param("si", $producte, $quantitat);

// EXECUTAR
$stmt->execute();

header("Location: llista_compra.php");

exit();

?>