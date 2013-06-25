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
					<li><a href="Start.html">Start</a></li>
					<li><a href="Verplaatsen.html">Verplaatsen</a></li>
					<li><a href="Geschiedenis.html">Geschiedenis</a></li>
				</ul> 
			</nav>
		</p>
		<br>
		<br>
		<br>
		<p>
			<table border="10">
				<tr>
					<th>Datum van verplaatsing</th>
					<th>Van</th>
					<th>Naar</th>
					<th>Commentaar</th>
					<th>Bewerken</th>
					<th>Annuleren</th>
				</tr>
				<tr>
					<td>12-3</td>
					<td>7</td>
					<td>3</td>
					<td><img src="http://24fitclubheelsum.nl/wp-content/uploads/2013/04/vinkje.png" title="Dankje wel Nanda"></td>
					<td><button type="button">Bewerk</button></td>
					<td><button type="button">Annuleer</button></td>
				</tr>
				<tr>
					<td>28-5</td>
					<td>1</td>
					<td>5</td>
					<td><img src="http://www.zoninjeleven.nl/wp-content/uploads/2012/09/vinkje.gif"></td>
					<td><button type="button">Bewerk</button></td>
					<td><button type="button">Annuleer</button></td>
				</tr>
			</table>
		</p>
	</body>
</html>