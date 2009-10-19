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
 
error_reporting(0);
include('func/table.php'); 	// Tabellenfunktion
include('config.php');		// Konfiguration
date_default_timezone_set('Europe/Berlin'); // Zeitzone

$table[] = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag");	// Wochentage
for($i=0;$i < max(count($monday), count($tuesday), count($wednesday), count($thursday), count($friday));$i++){
	$table[] = array($monday[$i],$tuesday[$i],$wednesday[$i],$thursday[$i],$friday[$i]);
}
output_table($table);

$tag = date("w");		// Wochentag herausfinden
$stunde = date("G");	// Stunde herausfinden

if($auto == TRUE AND $stunde <= 12){
	$late = TRUE;}
if($auto == FALSE AND $stunde > 12){
	$late = FALSE;}
$tage = array("Sonntag","Montag","Dienstag","Mittwoch", "Donnerstag","Freitag","Samstag");
if(!$late){
	if($tag == 5 OR $tag == 6){$next=1;}else{$next=$tag+1;} 	// Folgetag herausfinden
	if($tag == 6 OR $tag == 0){$last = 5;} else {$last = $tag;}  // Letzter Schultag herausfinden
}else{
	if($tag == 0 OR $tag == 6){$next=1;}else{$next=$tag;}
	if($tag == 0 OR $tag == 1){$last = 5;} else {$last = $tag-1;}
}
print "Letzter Schultag:   ".$tage[$last]."\nNaechster Schultag: ".$tage[$next]."\n\n";

	switch($next){
		case 1: $day = $monday; break;
		case 2: $day = $tuesday; break;
		case 3: $day = $wednesday; break;
		case 4: $day = $thursday; break;
		case 5: $day = $friday; break;
	}
    switch($last){
        case 1: $dayl = $monday; break;
        case 2: $dayl = $tuesday; break;
        case 3: $dayl = $wednesday; break;
        case 4: $dayl = $thursday; break;
        case 5: $dayl = $friday; break;
    }
    
    $day = array_unique($day);
    $dayl = array_unique($dayl);
    
    $inout[] = array("Einpacken","Auspacken");
    for($i = 0; $i < count($day); $i++){									// Einpackliste
    	for($j = 0; $j < count($need[$day[$i]]); $j++){
    		if(isset($need[$day[$i]][$j])){
    			if(!in_array($day[$i], $dayl)){
    				$in[] = $need[$day[$i]][$j];
    			}
    		}
    	}
    }
    
    for($i = 0; $i < count($dayl); $i++){									// Auspackliste
    	for($j = 0; $j < count($need[$dayl[$i]]); $j++){
    		if(isset($need[$dayl[$i]][$j])){
    			if(!in_array($dayl[$i], $day)){
    				$out[] = $need[$dayl[$i]][$j];
    			}
    		}
    	}
    }
if(count($in) != 0 OR count($out) != 0){    
    for($i=0; $i < max(count($in),count($out)); $i++){
    $inout[] = array($in[$i],$out[$i]);}
    output_table($inout);
}
print "\n";
?>
