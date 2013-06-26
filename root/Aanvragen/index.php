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
    
		<form name="input" action="insturen.php" method="POST">
  			<input type="date" name="datum" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d', strtotime('+3 week')); ?>" value="<?php echo date('Y-m-d');?>">
  			
  			<br>
			<br>

			Van het <?php
			EZDropMenu("vanUur", 9);
			?>
			naar het 
			<?php
			EZDropMenu("naarUur", 9);
			?>
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
