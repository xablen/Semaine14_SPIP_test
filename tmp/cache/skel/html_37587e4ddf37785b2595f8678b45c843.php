<?php

/*
 * Squelette : squelettes/inc/inc-affvisit.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:05 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/inc/inc-affvisit.html
// Temps de compilation total: 1.352 ms
//

function html_37587e4ddf37785b2595f8678b45c843($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = strval(affvisit('')))!=='' ?
		('<strong>' . $t1 . '</strong>') :
		'');

	return analyse_resultat_skel('html_37587e4ddf37785b2595f8678b45c843', $Cache, $page, 'squelettes/inc/inc-affvisit.html');
}
?>