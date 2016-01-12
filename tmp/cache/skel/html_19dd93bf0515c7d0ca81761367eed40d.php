<?php

/*
 * Squelette : ../prive/squelettes/navigation/rubrique_edit.html
 * Date :      Tue, 12 Jan 2016 07:48:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:00:02 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/navigation/rubrique_edit.html
// Temps de compilation total: 0.136 ms
//

function html_19dd93bf0515c7d0ca81761367eed40d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '';

	return analyse_resultat_skel('html_19dd93bf0515c7d0ca81761367eed40d', $Cache, $page, '../prive/squelettes/navigation/rubrique_edit.html');
}
?>