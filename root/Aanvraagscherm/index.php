<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="aanvraagscherm.css">
		<link rel="stylesheet" type="text/css" href="/global/style.css">
		<title>Aanvraagscherm</title>
	</head>

	<body>
		<?php Constructheader("Test"); ?>
		
		<nav id="menu">
			<ul>
				<li><a href="Start.html">Start</a></li>
				<li><a href="Verplaatsen.html">Verplaatsen</a></li>
				<li><a href="Annuleren.html">Annuleren</a></li>
			</ul> 
		</nav>

		<br>
		<br>
		<br> 
    
		<form name="info" method="POST">
  			<input type="date" name="datum">
  			
  			<br>
			<br>

			Van het 
			<select name="vanUur">
				<option value="1">1e</option>
				<option value="2">2e</option>
				<option value="3">3e</option>
				<option value="4">4e</option>
				<option value="5">5e</option>
				<option value="6">6e</option>
				<option value="7">7e</option>
				<option value="8">8e</option>
				<option value="9">9e</option>
			</select>
			naar het 
			<select name="naarUur">
				<option value="1">1e</option>
				<option value="2">2e</option>
				<option value="3">3e</option>
				<option value="4">4e</option>
				<option value="5">5e</option>
				<option value="6">6e</option>
				<option value="7">7e</option>
				<option value="8">8e</option>
				<option value="9">9e</option>
			</select>
			uur
  
			<br>
			<br>
	
			Opmerking (evt.)

			<br>
	
			<textarea name="Opmerking" rows=6 cols=24 maxlength=150 placeholder="max 150 tekens"></textarea>

			<br>

			<input type="reset" value="Herstellen" /> &nbsp;   
			<input type="submit" value="Verzenden">
		</form>
	</body>
</html>
