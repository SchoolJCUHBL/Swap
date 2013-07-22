<?php
function PDOinsert($lrlngnr, $password, $voornaam, $achternaam, $MOD) {
	$blowfish_salt = bin2hex(openssl_random_pseudo_bytes(22));
	$hash = crypt($password, "$2a$12$".$blowfish_salt);
		
	try {
		//connect database
		$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
		//prepare het statement zodat injection onmogelijk is.
		$stmt = $db->prepare("INSERT INTO inlog (leerlingnummer, password, voornaam, achternaam, Moderator) VALUES (:leerlingnummer, :password, :voornaam, :achternaam, :Moderator)");
		//bind de parameters aan het statement
		$stmt->bindParam(':leerlingnummer', $lrlngnr);
			$stmt->bindParam(':password', $hash);
			$stmt->bindParam(':voornaam', $voornaam);
			$stmt->bindParam(':achternaam', $achternaam);
			$stmt->bindParam(':Moderator', $MOD);
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