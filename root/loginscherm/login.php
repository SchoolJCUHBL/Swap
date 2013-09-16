<?php
session_start();

//very stupleerlingnummer way to acquire connection
$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');

//get the posted values
$leerlingnummer = $_POST['leerlingnummer'];

$password = $_POST['password']; 

$sql = 'SELECT * FROM inlog WHERE leerlingnummer = :leerlingnummer';

$statement = $db->prepare($sql);
$statement->bindParam(':leerlingnummer', $leerlingnummer, PDO::PARAM_STR);

if ($statement->execute() && $row = $statement->fetch())
{
	$db = NULL;
	// $row['password'] === $password 
    if (crypt($password, $row['password']) === $row['password'])
    {
		$_SESSION['MOD'] = $row['Moderator'];
		$_SESSION['leerlingnummer'] = $leerlingnummer;
		if (!$_SESSION['MOD']) {
			header('Location: /Geschiedenis');
			exit();
		}
		else {
			header('Location: /Goedkeurscherm');
			exit();
		}
    }
	else {
		header('Location: /Loginscherm');
		exit();
	}
}
else {
		header('Location: /Loginscherm');
		exit();
}
?>