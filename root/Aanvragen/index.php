<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="aanvraagscherm.css">
		<link rel="stylesheet" type="text/css" href="/global/style.css">
		<title>Aanvragen</title>
	</head>

	<body>
		<?php Constructheader("Aanvragen"); ?>
		
		<nav id="menu">
			<ul>
				<li><?php if (!$_SESSION['MOD']) { echo '<a href="/Geschiedenis">Geschiedenis';} else { echo '<a href="/Goedkeurscherm">StudiePanel'; } ?></a></li>
				<li><a href="/Logout">Uitloggen</a></li>
			</ul> 
		</nav>

		<br>
		<br>
		<br> 
    
		<form name="input" action="insturen.php" method="POST">
  			<?php
				if ($_SESSION['MOD']) {
					echo '<input type="text" name="nummer" value="" maxlength="6" placeholder="leerlingnummer"><br><br>';
				}
			?>
            
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
