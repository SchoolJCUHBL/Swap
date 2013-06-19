<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");

$leerlingnr = "101022"
$datum = $_POST["datum"];
$dag = date("D", $datum);
$vanuur = $_POST["vanUur"];
$naaruur = $_POST["naarUur"];
$commentaar = $_POST["Opmerking"];

if ($resultaat = PDOinsert($lrlngnr, $datum, $dag, $vanuur, $naaruur, $commentaar)) {
	header('Location: /Aanvraagscherm/Geshiedenis.htlm');
}
else{
	die
}

?>