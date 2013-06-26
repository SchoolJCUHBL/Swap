<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

$resultaat = PDOselectID($POST['id'], $_SESSION['leerlingnummer']);
$resultaat as $row
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="aanvraagscherm.css">
		<link rel="stylesheet" type="text/css" href="/global/style.css">
		<title>Aanpassen</title>
	</head>

	<body>
		<?php Constructheader("Aanpassen"); ?>
		
		<nav id="menu">
			<ul>
				<li><a href="/Geschiedenis">Geschiedenis</a></li>
				<li><a href="/Logout">Uitloggen</a></li>
			</ul> 
		</nav>

		<br>
		<br>
		<br> 
    
		<form name="input" action="veranderen.php" method="POST">
  			<input type="date" name="datum"  readonly = "readonly" value="<?php echo $row['datum'];?>">
  			<input type="hidden" name=id value="<?php echo $row['id'] ?>">
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
	
			<textarea name="Opmerking" rows=6 cols=24 maxlength=150 placeholder="max 150 tekens"><?php echo $row['opmerking']; ?></textarea>

			<br>

			<input type="reset" value="Herstellen" /> &nbsp;   
			<input type="submit" value="Verzenden">
		</form>
	</body>
</html>
