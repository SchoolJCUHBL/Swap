<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
require_once($_SERVER['DOCUMENT_ROOT']."/global/SQLtoolsv2.php");
session_start();

if (!isset($_SESSION['leerlingnummer'])){
	header('Location: /Loginscherm');
}

if (isset($_POST['id'])) {
	if ($_POST['OK'] == 0) {
		PDOuniversal(7, $_POST['id'], "", "", "", "", "", "", 1);
	}
	else{
		PDOuniversal(7, $_POST['id'], "", "", "", "", "", "", 0);
	}
}

if (isset($_POST['datum'])){
$datum = $_POST['datum'];
$resultaat = PDOuniversal(3, "", "", $datum, "", "", "", "", "");
}

?>
<DOCTYPE html>
<html> 
	<head lang="nl">
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/global/style.css">
		<link rel="stylesheet" type="text/css" href="style2.css">
		<title>Goedkeuren</title>
	</head>
	<body>
		<?php Constructheader("StudiePanel"); ?>
		<nav id="menu">
			<ul>
				<li><a href="/Aanvragen">Verplaatsen</a></li>
				<li><a href="/Logout">Uitloggen</a></li>
			</ul>
		</nav>	
		<br><br><br>
        <form name="input" method="POST">
  			<input type="date" name="datum" value="<?php if (!isset($_POST['datum'])) { echo date('Y-m-d'); } else { echo $datum; }?>">
            <input type="submit" value="Verzenden">
            </form>
		<div id="ruilen1">
			<table border="1">
            	<tr>
					<th>Leerling</th>
					<th>Van</th>
					<th>Naar</th>
					<th>Commentaar</th>
                    <th>Geaccepteerd</th>
					<th>Wijzigen</th>
				</tr>
				<?php
					if (isset($_POST['datum'])) {
						$db = new PDO('mysql:host=localhost;port=3307;dbname=hblwissels','root','usbw');
						$statement = $db->prepare('SELECT voornaam, achternaam FROM inlog WHERE leerlingnummer = :leerlingnummer');
						foreach($resultaat as $row) {
						echo '<tr>';
						$statement->bindParam(':leerlingnummer', $row['leerlingnummer'], PDO::PARAM_STR);
						$statement->execute();
						$table = $statement->fetch();
						
						echo '<td><center>'.$table['voornaam']." ".$table['achternaam'].'</center></td>';
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
						echo "<td><center><form name='hidden' method='POST'>
						<input type='hidden' name='datum' value=\"".$datum."\">
						<input type='hidden' name='id' value=".$row['id'].">
						<input type='hidden' name='OK' value=".$row['OK'].">
						<input type='submit' value='wijzig'>
						</form></center></td>";
						echo '</tr>';
						}
					}
				?>
			</table>
		</div>
	</body>
</html>