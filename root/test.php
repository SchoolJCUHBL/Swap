<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtoolsv2.php");

	$leerlingnr = "334455";
	$datum = "2013-09-16";
	$dag = date('D', strtotime($datum));
	$vanuur = 4;
	$naaruur = 8;
	$commentaar = "ermagherd";

	if (PDOuniversal(1, "",$leerlingnr, $datum, $dag, $vanuur, $naaruur, $commentaar, 0)) {
		echo "Success";
	}
	else {
		echo "Fail";
	}
?>