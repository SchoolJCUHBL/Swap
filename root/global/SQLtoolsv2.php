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
					$sql = "UPDATE Wissels SET OK=:OK WHERE id=:id"
					break;
				default:
					throw new Exception('no mode set!')
			}
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':datum', $datum);
			$stmt->bindParam(':dag', $dag);
			$stmt->bindParam(':vanuur', $vanuur);
			$stmt->bindParam(':naaruur', $naaruur);
			$stmt->bindParam(':commentaar', $commentaar);
			$stmt->bindParam(':OK', $accept);
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