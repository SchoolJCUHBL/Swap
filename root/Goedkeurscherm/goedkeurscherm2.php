<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}
$resultaat = PDOselectDate($datum);
?>
<DOCTYPE html>
<html> 
	<head lang="nl">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style2.css">
		<title>Goedkeuren</title>
	</head>
	<body>
		<img src="HBL_Logo.png">
		<nav id="menu">
			<ul>
				<li><a href="#">Goedkeurscherm</a></li>
				<li><a href="#">Ander Scherm</a></li>
				<li><a href="#">Ander Scherm</a></li>
			</ul>
		</nav>	
		<br><br><br>
		<h1>Goedkeurscherm</h1>
		<div id="ruilen1">
			<table border="1">
				<?php
					foreach($resultaat as $row) {
					echo '<tr>';
					echo '<td><center>'.$row['naam'].'</center></td>';
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
					echo "<td><center><form action='aanpassen.php' method='post'>
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
		</div>
	</body>
</html>