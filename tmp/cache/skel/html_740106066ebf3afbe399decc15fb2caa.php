<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/navigation/charger_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:33 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/navigation/charger_plugin.html
// Temps de compilation total: 1.672 ms
//

function html_740106066ebf3afbe399decc15fb2caa($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
recuperer_fond( 'prive/squelettes/inclure/menu-navigation' , array_merge($Pile[0],array('menu' => 'menu_configuration' ,
	'bloc' => 'navigation' )), array('compil'=>array('../plugins-dist/svp/prive/squelettes/navigation/charger_plugin.html','html_740106066ebf3afbe399decc15fb2caa','',2,$GLOBALS['spip_lang'])), _request('connect')) .
'
' .
boite_ouvrir('', 'info') .
_T('svp:info_boite_charger_plugin') .
'
' .
boite_fermer() .
'
');

	return analyse_resultat_skel('html_740106066ebf3afbe399decc15fb2caa', $Cache, $page, '../plugins-dist/svp/prive/squelettes/navigation/charger_plugin.html');
}
?>