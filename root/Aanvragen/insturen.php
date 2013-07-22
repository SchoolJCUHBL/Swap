<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

if ($_SESSION['MOD']){
	$leerlingnr = $_POST['nummer'];
}
else {
	$leerlingnr = $_SESSION['leerlingnummer'];
}
$datum = $_POST["datum"];
$dag = date('D', strtotime($datum));
$vanuur = $_POST["vanUur"];
$naaruur = $_POST["naarUur"];
$commentaar = $_POST["Opmerking"];

if (PDOinsert($leerlingnr, $datum, $dag, $vanuur, $naaruur, $commentaar)) {
	header('Location: /Geschiedenis');
}
else{
	die;
}

?>