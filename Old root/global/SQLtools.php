<?php
	
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
		return $resultaat;
	}
	
	//PDO select functie
	function PDOselectLN($lrlngnr) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("SELECT * FROM Wissels WHERE leerlingnummer = :leerlingnummer");
			//bind de parameter aan het statement
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			//voer het statement uit
			$resultaat = $stmt->execute();
			$table = $stmt->fetchAll();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
		return $table;
	}
	
	function PDOselectDate($datum) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("SELECT * FROM Wissels WHERE datum = :datum ORDER BY vanuur, naaruur");
			//bind de parameter aan het statement
			$stmt->bindParam(':datum', $datum);
			//voer het statement uit
			$resultaat = $stmt->execute();
			$table = $stmt->fetchAll();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
		return $table;
	}
	
	function PDOselectID($id, $lrlngnr) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("SELECT * FROM Wissels WHERE id=:id AND leerlingnummer=:leerlingnummer");
			//bind de parameter aan het statement
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			//voer het statement uit
			$resultaat = $stmt->execute();
			$table = $stmt->fetch();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
		return $table;
	}
	
	//PDO update functie
	function PDOupdate($id, $lrlngnr, $vanuur, $naaruur, $commentaar) {
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
		return $resultaat;
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
		return $resultaat;
	}
	
		//PDO accept functie
	function PDOaccept($id, $accept) {
		try {
			//connect database
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			//prepare het statement zodat injection onmogelijk is.
			$stmt = $db->prepare("UPDATE Wissels SET OK=:OK WHERE id=:id");
			//bind de parameters aan het statement
			$stmt->bindParam(':OK', $accept);
			$stmt->bindParam(':id', $id);
			//voer het statement uit
			$resultaat = $stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$db = NULL;
		return $resultaat;
	}

?>
