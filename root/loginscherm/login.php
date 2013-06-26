<?php
session_start();

//very stupleerlingnummer way to acquire connection
$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');

//get the posted values
$leerlingnummer = htmlspecialchars($_POST['leerlingnummer'],ENT_QUOTES);


$password = $_POST['password']; 

$sql = 'SELECT * FROM inlog WHERE leerlingnummer = :leerlingnummer';

$statement = $db->prepare($sql);
$statement->bindParam(':leerlingnummer', $leerlingnummer, PDO::PARAM_STR);

if ($statement->execute() && $row = $statement->fetch())
{

    if ( $row['password'] === $password )
    {
		$_SESSION['MOD'] = $row['MOD'];
		$_SESSION['leerlingnummer'] = $leerlingnummer;
        header('Location: /Geschiedenis');
		exit();
    }
	else {
		echo 'login error';
	}
}
else {
		echo 'login error';
}
?>