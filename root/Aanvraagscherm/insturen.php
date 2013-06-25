<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");

$leerlingnr = "223322";
$datum = $_POST["datum"];
$dag = date(D, $datum);
$vanuur = $_POST["vanUur"];
$naaruur = $_POST["naarUur"];
$commentaar = $_POST["Opmerking"];

if ($resultaat = PDOinsert($leerlingnr, $datum, $dag, $vanuur, $naaruur, $commentaar)) {
	header('Location: /Aanvraagscherm/Geshiedenis.php');
}
else{
	die;
}

?>