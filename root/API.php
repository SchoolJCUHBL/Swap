<?php

//laat een error zien als er iets mis is, niks bijzonders
	function ArgError() {
		echo "Error Bad Arguments !";
		exit();
	}

//functie voor het snel genereren van dropdown menu's, deze is te gebruiken door:
// require_once API.php   in je php bestand te zetten
// EZDropMenu(test, 9); maakt een dropdown menu met $_POST name "test" met waarden van 1 tot 9
// LongDropmenu(test, 2, 9); maakt een dropdown menu met $_POST name "test" met waarden van 2 tot 9
// de begin waarde default dus naar 1, naast de uren kiezen kunnen we dit evt ook voor datums gebruiken.

	function EZDropMenu($name, $end) {
		DropMenu($name, 1, $end);
	}
	
	function DropMenu($name, $start, $end) {
		if (is_string($name) && is_numeric($end) && is_numeric($start)) {
			//Deze for loop bouwt het dropdown menu.
			echo "<select name=" , $name , ">";
			for ($i = $start; $i <= $end; $i++) {
				echo "<option value=" , $i , ">$i</option>";
			}
			echo "</select>";
		}
		else {
			ArgError();
		}
	}
	
	//PDO insert functie
	function PDOinsert($lrlngnr, $datum, $dag, $vanuur, $naaruur, $commentaar) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("INSERT INTO Wissels (leerlingnummer, datum, dag, vanuur, naaruur, commentaar, OK) VALUES (:leerlingnummer, :datum, :dag, :vanuur, :naaruur, :commentaar, 0)");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':datum', $datum);
			$stmt->bindParam(':dag', $dag);
			$stmt->bindParam(':vanuur', $vanuur);
			$stmt->bindParam(':naaruur', $naaruur);
			$stmt->bindParam(':commentaar', $commentaar);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
	}
	
	//PDO select functie
	function PDOselect($lrlngnr) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("SELECT * FROM Wissels WHERE leerlingnummer = :leerlingnummer");
			//bind de parameter aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
	}
	
	//PDO update functie
	function PDOupdate($id, $lrlngnr, $datum, $vanuur, $naaruur, $commentaar) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("UPDATE Wissels SET vanuur=:vanuur, naaruur=:naaruur, commentaar=:commentaar, OK=0 WHERE leerlingnummer=:leerlingnummer AND id=:id");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':vanuur', $vanuur);
			$stmt->bindParam(':naaruur', $naaruur);
			$stmt->bindParam(':commentaar', $commentaar);
			$stmt->bindParam(':id', $id);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
	}
	
	//PDO delete functie opzich zou het id hier genoeg zijn maar om zeker alleen deze persoon te hebben doen we het leerlingnummer ook
	function PDOdelete($id, $lrlngnr) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("DELETE FROM Wissels WHERE leerlingnummer=:leerlingnummer AND id=:id");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':id', $id);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
	}
	
		//PDO accept functie
	function PDOaccept($id, $lrlngnr, $accept) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("UPDATE Wissels SET OK=:OK WHERE leerlingnummer=:leerlingnummer AND id=:id");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':OK', $accept);
			$stmt->bindParam(':id', $id);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
	}
	
	function Constructheader($header) {
		echo "<header><IMG src="hbllogo.jpg" height="64" width="154"><h1>$header</h1></header>"
	}
	
?>