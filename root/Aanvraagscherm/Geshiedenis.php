<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
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
					<th>Bewerken</th>
					<th>Annuleren</th>
				</tr>
				<tr>
					<td><center>12-3-2013</center></td>
					<td><center>7</center></td>
					<td><center>3</center></td>
					<td><center><img src="http://24fitclubheelsum.nl/wp-content/uploads/2013/04/vinkje.png" WIDTH=40 HEIGHT=40 title="Dankje wel Nanda"></center></td>
					<td><center><button type="button"><a href="index.php">Bewerk</button></center></td>
					<td><center><button type="button" onClick="alert('Deze functie werkt nog niet. Jammer joh!')">Annuleer</button></center></td>
				</tr>
				<tr>
					<td><center>28-5-2013</center></td>
					<td><center>1</center></td>
					<td><center>5</center></td>
					<td><center><img src="http://www.zoninjeleven.nl/wp-content/uploads/2012/09/vinkje.gif" WIDTH=40 HEIGHT=40></center></td>
					<td><center><button type="button"><a href="index.php">Bewerk</button></center></td>
					<td><center><button type="button" onClick="alert('Deze functie werkt nog niet. Jammer joh!')">Annuleer</button></center></td>
				</tr>
			</table>
		</p>
	</body>
</html>