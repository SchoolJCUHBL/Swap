<?php

//laat een error zien als er iets mis is, niks bijzonders
	function ArgError() {
		echo "Error Bad Arguments !";
		exit();
	}

//functie voor het snel genereren van dropdown menu's, deze is te gebruiken door:
// require_once API.php   in je php bestand te zetten
// DropMenu(test, 9); maakt een dropdown menu met $_POST name "test" met waarden van 1 tot 9
// Dropmenu(test, 2, 9); maakt een dropdown menu met $_POST name "test" met waarden van 2 tot 9
// de begin waarde default dus naar 1, naast de uren kiezen kunnen we dit evt ook voor datums gebruiken.
//
	function DropMenu() {
	
	//vang de argumenten en kijk of het er 2 of 3 zijn, en of het wel string+nummer of string+nummer+nummer is, anders call de error
	$numArgs = func_num_args();
	switch ($numArgs) {
		case 2:
			$name = func_get_arg(0);
			$end = func_get_arg(1);
			$start = 1;
			if (is_string($name) && is_numeric($end)) {
				break;
			}
			else {
				ArgError();
			}
		case 3:
			$name = func_get_arg(0);
			$start = func_get_arg(1);
			$end = func_get_arg(2);
			if (is_string($name) && is_numeric($end) && is_numeric($start)) {
				break;
			}
			else {
				ArgError();
			}
		default:
			ArgError();
	}
	
	//Deze for loop bouwt het dropdown menu.
	echo "<select name=" , $name , ">";
		for ($i = $start; $i <= $end; $i++) {
			echo "<option value=" , $i , ">$i</option>";
		}
	echo "</select>";
	}
	
	
	//PDO insert functie
	function PDOinsert($lrlngnr, $datum, $vanuur, $naaruur, $commentaar) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("INSERT INTO Wissels (leerlingnummer, datum, vanuur, naaruur, commentaar) VALUES (:leerlingnummer, :datum, :vanuur, :naaruur, :commentaar)");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':datum', $datum);
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
			$stmt = $db->prepare("UPDATE Wissels SET vanuur=:vanuur, naaruur=:naaruur, commentaar=:commentaar WHERE leerlingnummer=:leerlingnummer AND datum=:datum AND id=:id");
			//bind de parameters aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':datum', $datum);
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

?>