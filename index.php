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
 include('config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
		 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>ZeitTisch</title>
		<meta name="Copyright" content="(c) 2009 Felix Arndt" />
		<meta name="Author" content="Felix 'silsha' Arndt" />
		<link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="css/iphone.css" />
		<link rel="stylesheet" media="screen" href="css/style.css" />
		<meta name="viewport" content="width=320" />
	</head>
	<body>
		<?php
			echo '<div class="table"><table border="0" width="100%" />';
				echo '<tr><th>Montag</th><th>Dienstag</th><th>Mittwoch</th><th>Donnerstag</th><th>Freitag</th></tr>';
				for($i=0;$i < max(count($monday), count($tuesday), count($wednesday), count($thursday), count($friday));$i++){
					echo '<tr><td>'.$monday[$i].'</td><td>'.$tuesday[$i].'</td><td>'.$wednesday[$i].'</td><td>'.$thursday[$i].'</td><td>'.$friday[$i].'</td></tr>';
				}
			echo '</table></div><br />';
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
    
			echo 'Letzter Schultag: '.$tage[$last].'<br />';
			echo 'N&auml;chster Schultag: '.$tage[$next].'<br /><br />';
			
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
	    echo '<table border="0" width="100%">';
	    echo '<tr><th width="50%">Einpacken</th><th width="50%">Auspacken</th></tr>';
	for($i=0; $i < max(count($in),count($out)); $i++){
    echo '<tr><td>'.$in[$i].'</td><td>'.$out[$i].'</td></tr>';}
    echo '</table>';
}
		?>
	</body>
</html>
