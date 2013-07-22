<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

$id = $_POST['id'];

if ($_POST['OK'] === 0) {
	if (PDOaccept($id, 1)) {
		header('Location: /Geschiedenis');
	}
}
else{
	if (PDOaccept($id, 0)) {
		header('Location: /Goedkeurscherm');
	}
}

?>