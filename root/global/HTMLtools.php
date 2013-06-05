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
		DropMenu($name, 1, $end);
	}
	
	function DropMenu($name, $start, $end) {
		if (is_string($name) && is_numeric($end) && is_numeric($start)) {
			//Deze for loop bouwt het dropdown menu.
			echo "<select name=" , $name , ">";
			for ($i = $start; $i <= $end; $i++) {
				echo "<option value=" , $i , ">$i</option>";
			}
			echo "</select>";
		}
		else {
			ArgError();
		}
	}
	
	function Constructheader($header) {
		echo "<header id='headerimg' class='constructedheader'><IMG src='/global/hbllogo.png'></header><header class='constructedheader'><h1>$header</h1></header>";
	}
	
?>
