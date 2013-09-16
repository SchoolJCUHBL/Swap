<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtoolsv2.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

$leerlingnr = $_SESSION['leerlingnummer'];
$id = $_POST["verstopt"];

if (PDOuniversal(6, $id, $leerlingnr, "", "", "", "", "", "")) {
	header('Location: /Geschiedenis');
}
else{
	die;
}

?>