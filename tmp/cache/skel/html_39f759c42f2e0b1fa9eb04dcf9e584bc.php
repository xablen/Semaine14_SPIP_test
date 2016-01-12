<?php

/*
 * Squelette : ../plugins-dist/petitions/prive/configurer/petitionner.html
 * Date :      Tue, 12 Jan 2016 07:50:12 GMT
 * Compile :   Tue, 12 Jan 2016 08:03:09 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/petitions/prive/configurer/petitionner.html
// Temps de compilation total: 2.881 ms
//

function html_39f759c42f2e0b1fa9eb04dcf9e584bc($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'ajax\'>
' .
executer_balise_dynamique('FORMULAIRE_ACTIVER_PETITION_ARTICLE',
	array(@$Pile[0]['id_article']),
	array('../plugins-dist/petitions/prive/configurer/petitionner.html','html_39f759c42f2e0b1fa9eb04dcf9e584bc','',2,$GLOBALS['spip_lang'])) .
'</div>');

	return analyse_resultat_skel('html_39f759c42f2e0b1fa9eb04dcf9e584bc', $Cache, $page, '../plugins-dist/petitions/prive/configurer/petitionner.html');
}
?>