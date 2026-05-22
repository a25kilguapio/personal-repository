<?php
include "connexio.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alumne = $_POST['alumne'];
    $aula = $_POST['aula'];
    $problema = $_POST['problema'];
    $prioritat = $_POST['prioritat'];

    $sql = $conn->prepare("INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES (?, ?, ?, ?, NOW())");
    $sql->bind_param("ssss",$alumne, $aula, $problema, $prioritat);
    $sql->execute();
    

    header("Location: incidencies_aula.php");
    exit;
    
}