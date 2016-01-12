<?php

/*
 * Squelette : ../plugins-dist/textwheel/modeles/dist.html
 * Date :      Tue, 12 Jan 2016 07:50:05 GMT
 * Compile :   Tue, 12 Jan 2016 08:18:09 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/textwheel/modeles/dist.html
// Temps de compilation total: 0.581 ms
//

function html_060bc49740a31b5efff88f1a5a0458f8($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<tt>' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'modele', null),true)) .
'</tt>');

	return analyse_resultat_skel('html_060bc49740a31b5efff88f1a5a0458f8', $Cache, $page, '../plugins-dist/textwheel/modeles/dist.html');
}
?>