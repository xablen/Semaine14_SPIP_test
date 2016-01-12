<?php

/*
 * Squelette : ../plugins-dist/mediabox/prive/squelettes/contenu/configurer_mediabox.html
 * Date :      Tue, 12 Jan 2016 07:50:23 GMT
 * Compile :   Tue, 12 Jan 2016 09:12:27 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/mediabox/prive/squelettes/contenu/configurer_mediabox.html
// Temps de compilation total: 3.309 ms
//

function html_22abde96fd20f06b48f4c40eccc0d9b1($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('configurer', '_mediabox')?" ":""))) .
'
<h1 class="grostitre">' .
_T('mediabox:titre_page_configurer_box') .
'</h1>
<div class="ajax">
	' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_MEDIABOX',
	array(),
	array('../plugins-dist/mediabox/prive/squelettes/contenu/configurer_mediabox.html','html_22abde96fd20f06b48f4c40eccc0d9b1','',4,$GLOBALS['spip_lang'])) .
'
</div>');

	return analyse_resultat_skel('html_22abde96fd20f06b48f4c40eccc0d9b1', $Cache, $page, '../plugins-dist/mediabox/prive/squelettes/contenu/configurer_mediabox.html');
}
?>