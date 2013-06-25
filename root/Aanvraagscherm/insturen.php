<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

$leerlingnr = $_SESSION['leerlingnummer'];
$datum = $_POST["datum"];
$dag = date('D', strtotime($datum));
$vanuur = $_POST["vanUur"];
$naaruur = $_POST["naarUur"];
$commentaar = $_POST["Opmerking"];

if (PDOinsert($leerlingnr, $datum, $dag, $vanuur, $naaruur, $commentaar)) {
	header('Location: /Aanvraagscherm/Geshiedenis.php');
}
else{
	die;
}

?>