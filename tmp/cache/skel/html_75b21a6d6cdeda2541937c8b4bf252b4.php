<?php

/*
 * Squelette : ../prive/squelettes/inclure/cfg.html
 * Date :      Tue, 12 Jan 2016 07:48:45 GMT
 * Compile :   Tue, 12 Jan 2016 09:07:06 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/inclure/cfg.html
// Temps de compilation total: 6.265 ms
//

function html_75b21a6d6cdeda2541937c8b4bf252b4($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cfg_link\'>' .
(($t1 = strval(interdire_scripts(((tester_url_ecrire(@$Pile[0]['script'])) ?' ' :''))))!=='' ?
		((	'<a href="' .
	generer_url_ecrire(interdire_scripts(@$Pile[0]['script'])) .
	'"
	title="' .
	_T('public|spip|ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(attribut_html(typo(supprimer_numero(@$Pile[0]['nom']), "TYPO", $connect, $Pile[0]))) .
	'"><img
	src="' .
	interdire_scripts(chemin_image('cfg-16.png')) .
	'" width="16" height="16"
	alt="' .
	_T('public|spip|ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(attribut_html(typo(supprimer_numero(@$Pile[0]['nom']), "TYPO", $connect, $Pile[0]))) .
	'" /></a>') . $t1) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_75b21a6d6cdeda2541937c8b4bf252b4', $Cache, $page, '../prive/squelettes/inclure/cfg.html');
}
?>