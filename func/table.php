<?php
/*
 * 	Tabellenfunktion von NoMoKeTo
 *	Webseite: http://www.nomoketo.de
 */
function output_table($d) {
    $w=array_fill($f=0,$c=count($d[0]),0);
    foreach($d as $r)for($i=0;$i<$c;$i++)if(strlen($r[$i])>$w[$i])$w[$i]=strlen($r[$i]);
    $t='+';
    foreach($w as $v)$t.=str_repeat('-', $v+2).'+';
    echo $t;
    foreach($d as $r){
        echo "\n|";
        for($i=0;$i<$c;$i++)echo ' '.$r[$i].str_repeat(' ',$w[$i]-strlen($r[$i])).' |';
        if(!$f++)echo "\n$t";
    }
    echo "\n$t\n";
}
