<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

$leerlingnr = $_SESSION['leerlingnummer'];
$id = $_POST["verstopt"];

if (PDOdelete($id, $leerlingnr)) {
	header('Location: /Geschiedenis');
}
else{
	die;
}

?>