<?php
	function PDOuniversal($mode, $id, $lrlngnr, $datum, $dag, $vanuur, $naaruur, $commentaar, $accept) {
		try {
			$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
			
			switch($mode) {
				case 1:
					$sql = "INSERT INTO Wissels (leerlingnummer, datum, dag, vanuur, naaruur, commentaar, OK) VALUES (:leerlingnummer, :datum, :dag, :vanuur, :naaruur, :commentaar, 0)";
					break;
				case 2:
					$sql = "SELECT * FROM Wissels WHERE leerlingnummer = :leerlingnummer";
					break;
				case 3:
					$sql = "SELECT * FROM Wissels WHERE datum = :datum ORDER BY vanuur, naaruur";
					break;
				case 4:
					$sql = "SELECT * FROM Wissels WHERE id=:id AND leerlingnummer=:leerlingnummer";
					break;
				case 5:
					$sql = "UPDATE Wissels SET vanuur=:vanuur, naaruur=:naaruur, commentaar=:commentaar, OK=0 WHERE leerlingnummer=:leerlingnummer AND id=:id";
					break;
				case 6:
					$sql = "DELETE FROM Wissels WHERE leerlingnummer=:leerlingnummer AND id=:id";
					break;
				case 7:
					$sql = "UPDATE Wissels SET OK=:OK WHERE id=:id";
					break;
				default:
					try{throw new Exception('no mode set!');} catch (Exception $r) {echo $r->getMessage();}
			}
			$stmt = $db->prepare($sql);
			if ($mode == 1 || $mode == 2 || $mode == 4 || $mode == 5 || $mode == 6) $stmt->bindParam(':leerlingnummer', $lrlngnr);
			if ($mode == 1 || $mode == 3) $stmt->bindParam(':datum', $datum);
			if ($mode == 1) $stmt->bindParam(':dag', $dag);
			if ($mode == 1 || $mode == 5) $stmt->bindParam(':vanuur', $vanuur);
			if ($mode == 1 || $mode == 5) $stmt->bindParam(':naaruur', $naaruur);
			if ($mode == 1 || $mode == 5) $stmt->bindParam(':commentaar', $commentaar);
			if ($mode == 4 || $mode == 5 || $mode == 6 || $mode == 7) $stmt->bindParam(':id', $id);
			if ($mode == 7) $stmt->bindParam(':OK', $accept);
			$resultaat = $stmt->execute();
			switch($mode) {
				case 2:
				case 3:
					$table = $stmt->fetchAll();
					$db = NULL;
					return $table;
				case 4:
					$table = $stmt->fetch();
					$db = NULL;
					return $table;
				default:
					$db = NULL;
					return $resultaat;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
?>