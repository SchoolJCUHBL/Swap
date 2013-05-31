<?php
require_once("/global/API.php");
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="/global/style.css">
		<title>Index</title>
	</head>

	<body>
	<?php Constructheader($header); ?>
    	<p>
			<?php 
            // tijdelijke testcode om te laten zien hoe deze twee functies werken
                EZDropMenu("test", 9); 
                echo "<br>";
                DropMenu("test2", 3, 9);
                echo "<br>";
                DropMenu("test3", 23, 31);
                echo "<br>";
                EZDropMenu("test3", 100);
            ?>
        </p>
        <p>
        	Een beetje test text.
        </p>
	</body>
</html>
