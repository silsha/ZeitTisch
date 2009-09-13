<?php
/*
 *	ZeitTisch
 *	=============
 *		by Felix 'silsha' Arndt
 *	
 *	http://silsha.github.com/ZeitTisch
 *
 *	Author: Felix Arndt <silsha23@gmail.com>
 *	Licence: MIT-Licence
 */
 
 	$late = FALSE;		// FALSE: Tasche wird ein Tag im Vorraus gepackt
 						// TRUE:  Tasche wird erst am Schultag gepackt
	
	// Schulfächer der einzelnen Tage eintragen
	$monday 	= array("WiKu","WiKu","Deutsch",NULL,"Sport","Sport");
	$tuesday 	= array("Physik","Mathe","Geschichte","Erdkunde","Englisch","Chemie","Ethik","Ethik");
	$wednesday	= array(NULL,"Kunst","Mathe","Mathe","Chemie","Geschichte");
	$thursday	= array("Erdkunde",NULL,"Englisch","Deutsch","Deutsch","Sozialkunde","WiKu","WiKu");
	$friday		= array("Physik","Biologie","Englisch","Mathe","Deutsch");

	// Arbeitsmaterialien für die einzelnen Fächer eintragen
	$need['Deutsch'] 		= array("Deutschbuch","Deutsch Arbeitsheft");
	$need['Mathe']			= array("Mathebuch");
	$need['Englisch']		= array("Englischbuch","Englisch Arbeitsheft");
	$need['Erdkunde']		= array("Erdkundebuch");
	$need['Geschichte']		= array("Geschichtsbuch");
	$need['Biologie']		= array("Biologiebuch");
	$need['Sozialkunde']	= array("Sozialkundebuch");
	$need['WiKu']			= array("Wirtschaftskundebuch");
	$need['Ethik']			= array("Ethikbuch");

?>
