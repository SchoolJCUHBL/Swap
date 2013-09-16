<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtoolsv2.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

$id = $_POST['id'];
$lrlngnr = $_SESSION['leerlingnummer'];
$datum = $_POST["datum"];
$dag = date('D', strtotime($datum));
$vanuur = $_POST["vanUur"];
$naaruur = $_POST["naarUur"];
$commentaar = $_POST["Opmerking"];

if (PDOuniversal(5, $id, $lrlngnr, "", "", $vanuur, $naaruur, $commentaar, "")) {
	header('Location: /Geschiedenis');
}
else{
	die;
}

?>