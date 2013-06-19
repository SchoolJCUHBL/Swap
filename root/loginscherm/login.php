<?php
session_start();

//very stupleerlingnummer way to acquire connection
require_once("connect.php");

//get the posted values
$leerlingnummer = htmlspecialchars($_POST['leerlingnummer'],ENT_QUOTES);

// MD5 is not even remotely secure
$password = md5($_POST['password']); 

$sql = 'SELECT leerlingnummer, password, activated FROM members WHERE leerlingnummer = :leerlingnummer';

$statement = $conn_business->prepare($sql);
$statement->bindParam(':leerlingnummer', $leerlingnummer, PDO::PARAM_STR);

$output = 'login error';

if ($statement->execute() && $row = $statement->fetch())
{
    if ( $row['password'] === $password )
    {
        // use account confirmed
        if ( $row['activated'] !== 0 ) {
            $output = 'not activated';
            $_SESSION['leerlingnummer'] = $leerlingnummer;
        }

        $output = 'logged in';
    }
}

echo $output;

?>