<?php

/*
 * Squelette : squelettes/inc/inc-bas_menu-lang.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:28 GMT
 * Boucles :   _langues
 */ 

function BOUCLE_langueshtml_9491858aea5af6033788aa1936ebca8d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_langues';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array('rubriques.lang');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0), 
			array('NOT', 
			array('=', 'rubriques.lang', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'lang', null),true)),'','varchar(10) NOT NULL DEFAULT \'\''))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-bas_menu-lang.html','html_9491858aea5af6033788aa1936ebca8d','_langues',18,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(traduire_nom_langue(unique(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))))!=='' ?
		((	'
		<span lang="' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'">| 
		<a href="spip.php?action=converser&amp;var_lang=' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'&amp;redirect=/" rel="alternate"  title="' .
	_T('public|spip|ecrire:accueil_site') .
	' : ' .
	traduire_nom_langue(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">') . $t1 . '</a>
		</span>
') :
		'');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_langues @ squelettes/inc/inc-bas_menu-lang.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-bas_menu-lang.html
// Temps de compilation total: 6.689 ms
//

function html_9491858aea5af6033788aa1936ebca8d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_langueshtml_9491858aea5af6033788aa1936ebca8d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
	<div id="menu-lang">
		<span class="structure">' .
		_T('public|spip|ecrire:info_langues') .
		' : </span>
		' .
		(($t3 = strval(traduire_nom_langue(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
				('<strong class="langue_contexte">' . $t3 . '</strong>') :
				'') .
		'
') . $t1 . '
	</div>
') :
		'') .
'

');

	return analyse_resultat_skel('html_9491858aea5af6033788aa1936ebca8d', $Cache, $page, 'squelettes/inc/inc-bas_menu-lang.html');
}
?>