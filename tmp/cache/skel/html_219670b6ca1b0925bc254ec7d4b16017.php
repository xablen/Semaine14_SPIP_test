<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/contenu/charger_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:33 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/contenu/charger_plugin.html
// Temps de compilation total: 9.167 ms
//

function html_219670b6ca1b0925bc254ec7d4b16017($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('ajouter', '_plugins')?" ":""))) .
'
<h1 class="grostitre">' .
_T('public|spip|ecrire:icone_admin_plugin') .
'</h1>



' .
barre_onglets('plugins','charger_plugin') .
'



<div class="onglets_simple second clearfix">
	<ul>
		<li><strong>' .
_T('svp:titre_plugins') .
'</strong></li>
		<li><a' .
(($t1 = strval(generer_url_ecrire('depots')))!=='' ?
		(' href="' . $t1 . '"') :
		'') .
'>' .
_T('svp:titre_depots') .
'</a></li>
	</ul>
</div>


' .
(!(test_plugins_auto(''))  ?
		(' ' . (	'
<div class=\'notice\'>
	<h3>' .
	_T('svp:erreur_dir_plugins_auto_titre') .
	'</h3>
	' .
	_T('svp:erreur_dir_plugins_auto') .
	'
</div>')) :
		'') .
'


<div class="ajax">
	' .
executer_balise_dynamique('FORMULAIRE_CHARGER_PLUGIN',
	array(),
	array('../plugins-dist/svp/prive/squelettes/contenu/charger_plugin.html','html_219670b6ca1b0925bc254ec7d4b16017','',22,$GLOBALS['spip_lang'])) .
'
</div>

' .
((test_plugins_auto(''))  ?
		(' ' . (	'
<div class=\'ajax\'>
	' .
	executer_balise_dynamique('FORMULAIRE_CHARGER_PLUGIN_ARCHIVE',
	array(),
	array('../plugins-dist/svp/prive/squelettes/contenu/charger_plugin.html','html_219670b6ca1b0925bc254ec7d4b16017','',23,$GLOBALS['spip_lang'])) .
	'
</div>')) :
		'') .
'
');

	return analyse_resultat_skel('html_219670b6ca1b0925bc254ec7d4b16017', $Cache, $page, '../plugins-dist/svp/prive/squelettes/contenu/charger_plugin.html');
}
?>