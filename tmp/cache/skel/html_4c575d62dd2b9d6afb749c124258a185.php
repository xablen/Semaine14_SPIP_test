<?php

/*
 * Squelette : ../prive/style_prive.css.html
 * Date :      Tue, 12 Jan 2016 07:48:50 GMT
 * Compile :   Tue, 12 Jan 2016 07:57:44 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/style_prive.css.html
// Temps de compilation total: 3.948 ms
//

function html_4c575d62dd2b9d6afb749c124258a185($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<'.'?php header("X-Spip-Cache: 360000"); ?'.'>'.'<'.'?php header("Cache-Control: max-age=360000"); ?'.'>'.'<'.'?php header("X-Spip-Statique: oui"); ?'.'>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars'][$_zzz=(string)'fond'] = substr(find_in_theme('style_prive.css.html'),strlen(constant('_DIR_RACINE')),intval('-5'))) .
'
' .
recuperer_fond( table_valeur($Pile["vars"], (string)'fond', null) , array_merge($Pile[0],array()), array('compil'=>array('../prive/style_prive.css.html','html_4c575d62dd2b9d6afb749c124258a185','',2,$GLOBALS['spip_lang'])), _request('connect')));

	return analyse_resultat_skel('html_4c575d62dd2b9d6afb749c124258a185', $Cache, $page, '../prive/style_prive.css.html');
}
?>