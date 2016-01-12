<?php

/*
 * Squelette : ../prive/squelettes/contenu/configurer_identite.html
 * Date :      Tue, 12 Jan 2016 07:48:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:06:56 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/contenu/configurer_identite.html
// Temps de compilation total: 14.421 ms
//

function html_22aa39343a6925036ebebe316c1eac34($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<h1 class="grostitre">' .
_T('public|spip|ecrire:titre_identite_site') .
'</h1>
' .
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('configurer', '_identite')?" ":""))) .
'
<div class=\'ajax\'>
' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_IDENTITE',
	array(),
	array('../prive/squelettes/contenu/configurer_identite.html','html_22aa39343a6925036ebebe316c1eac34','',4,$GLOBALS['spip_lang'])) .
'
</div>
<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_EDITER_LOGO',
	array('site','0','',array('image_reduire' => '395')),
	array('../prive/squelettes/contenu/configurer_identite.html','html_22aa39343a6925036ebebe316c1eac34','',7,$GLOBALS['spip_lang'])) .
'</div>');

	return analyse_resultat_skel('html_22aa39343a6925036ebebe316c1eac34', $Cache, $page, '../prive/squelettes/contenu/configurer_identite.html');
}
?>