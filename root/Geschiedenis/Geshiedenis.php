<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

$resultaat = PDOselectLN($_SESSION['leerlingnummer']);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/global/style.css">
		<title>Geschiedenis LL</title>
	</head>

	<body>
		<?php Constructheader("Geschiedenis"); ?>
		<p>
			<nav id="menu">
				<ul>
					<li><a href="index.php">Start</a></li>
					<li><a href="index.php">Verplaatsen</a></li>
					<li><a href="Geshiedenis.php">Geschiedenis</a></li>
				</ul> 
			</nav>
		</p>
		<br>
		<br>
		<br>
		<br>
		<br>
		<p>
			<table border="10" ALIGN="center">
				<tr>
					<th>Datum van verplaatsing</th>
					<th>Van</th>
					<th>Naar</th>
					<th>Commentaar</th>
                    <th>Geaccepteerd</th>
					<th>Wijzigen</th>
					<th>Annuleren</th>
				</tr>
<?php
	foreach($resultaat as $row) {
	echo '<tr>';
	echo '<td><center>'.$row['datum'].'</center></td>';
	echo '<td><center>'.$row['vanuur'].'</center></td>';
	echo '<td><center>'.$row['naaruur'].'</center></td>';
	echo '<td><center>'.$row['commentaar'].'</center></td>';
	echo '<td><center>';
	if ($row['OK']==1){
		echo '<img src="http://24fitclubheelsum.nl/wp-content/uploads/2013/04/vinkje.png" WIDTH=40 HEIGHT=40 title="Dankje wel Nanda">';
	}
	else{
		echo '<img src="http://www.zoninjeleven.nl/wp-content/uploads/2012/09/vinkje.gif" WIDTH=40 HEIGHT=40>';
	}
	echo '</center></td>';
	echo "<td><center><form action='null' method='post'>
	<input type='hidden' name='verstopt' value=".$row['id'].">
	<input type='submit' name='wijzig' value='wijzig'>
	</form></center></td>";
	echo "<td><center><form action='verwijderen.php' method='post'>
	<input type='hidden' name='verstopt' value=".$row['id'].">
	<input type='submit' name='verwijder' value='Annuleer'></form></center></td>";
	echo '</tr>';
	}
?>
			</table>
		</p>
	</body>
</html>