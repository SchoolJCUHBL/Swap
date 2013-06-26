<?php

//laat een error zien als er iets mis is, niks bijzonders
	function ArgError() {
		echo "Error Bad Arguments !";
		exit();
	}

//functie voor het snel genereren van dropdown menu's, deze is te gebruiken door:
// require_once API.php   in je php bestand te zetten
// EZDropMenu(test, 9); maakt een dropdown menu met $_POST name "test" met waarden van 1 tot 9
// LongDropmenu(test, 2, 9); maakt een dropdown menu met $_POST name "test" met waarden van 2 tot 9
// de begin waarde default dus naar 1, naast de uren kiezen kunnen we dit evt ook voor datums gebruiken.

	function EZDropMenu($name, $end) {
		DropMenu($name, 1, $end, 0);
	}
	
	function DropMenu($name, $start, $end, $selected) {
		if (is_string($name) && is_numeric($end) && is_numeric($start)) {
			//Deze for loop bouwt het dropdown menu.
			echo "<select name=" , $name , ">";
			for ($i = $start; $i <= $end; $i++) {
				echo "<option value=";
				echo $i;
				if ($i == $selected && $selected != 0) { echo " selected"; }
				echo ">$i","e","</option>";
			}
			echo "</select>";
		}
		else {
			ArgError();
		}
	}
	
	function Constructheader($header) {
		echo "<header class='constructedheader'><IMG src='/global/hbllogo.png' class='constructedheader'><h1 class='constructedheader'>$header</h1></header><hr>";
	}
	
?>