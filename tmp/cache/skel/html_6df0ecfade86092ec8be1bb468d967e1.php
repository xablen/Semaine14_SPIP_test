<?php

/*
 * Squelette : squelettes/styles.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:25 GMT
 * Boucles :   _polices_webfonts
 */ 

function BOUCLE_polices_webfontshtml_6df0ecfade86092ec8be1bb468d967e1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_polices_webfonts';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.texte");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('=', 'mots.titre', "'polices'"));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/styles.html','html_6df0ecfade86092ec8be1bb468d967e1','_polices_webfonts',72,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (($t1 = strval(interdire_scripts($Pile[$SP]['texte'])))!=='' ?
		('
<style type="text/css">
	' . $t1 . '
</style>
') :
		'');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_polices_webfonts @ squelettes/styles.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/styles.html
// Temps de compilation total: 18.438 ms
//

function html_6df0ecfade86092ec8be1bb468d967e1($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
	' .
(($t1 = strval(direction_css(find_in_path('spip_style.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'
	' .
(($t1 = strval(direction_css(find_in_path('spip_formulaires.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(direction_css(find_in_path('styles/base.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(find_in_path('styles/alter.css')))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(find_in_path('styles/habillages.css')))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(find_in_path('styles/perso.css')))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(find_in_path('styles/color.css')))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(direction_css(find_in_path('styles/print.css'))))!=='' ?
		((	'<link rel="stylesheet" href="' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '" type="text/css" media="print" />') :
		'') .
'


' .
'<'.'?php header("X-Spip-Filtre: insert_head_css_conditionnel"); ?'.'>'. pipeline('insert_head','<!-- insert_head -->') .
'
' .
(($t1 = strval(find_in_path('js/base.js')))!=='' ?
		((	'<script src="' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
' .
(($t1 = strval(find_in_path('js/perso.js')))!=='' ?
		((	'<script src="' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
	


<!--[if lte IE 6]>
	<style>
		#menu-rubriques a, #extra a { height: 1em; }
		#menu-rubriques li, #extra li { height: 1em; float: left; clear: both;width: 100%; }
	</style>
<![endif]-->

<!--[if IE]>
	<style>
		body * {zoom:1}
		#menu-principal *,
		#bloc-contenu * {zoom: 0}
		#menu-rubriques li { clear: none;}
	</style>
<![endif]-->

' .
BOUCLE_polices_webfontshtml_6df0ecfade86092ec8be1bb468d967e1($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_6df0ecfade86092ec8be1bb468d967e1', $Cache, $page, 'squelettes/styles.html');
}
?>