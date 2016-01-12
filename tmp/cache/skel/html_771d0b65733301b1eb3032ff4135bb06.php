<?php

/*
 * Squelette : ../prive/squelettes/contenu/recherche.html
 * Date :      Tue, 12 Jan 2016 07:48:44 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:36 GMT
 * Boucles :   _tables, _tablesid, _num
 */ 

function BOUCLE_tableshtml_771d0b65733301b1eb3032ff4135bb06(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(liste_des_champs(''));
	$command['sourcemode'] = 'table';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_tables';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".cle");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('NOT', 
			array('=', 'cle', "'forum'")), 
			array('NOT', 
			array('=', 'cle', "'syndic_article'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../prive/squelettes/contenu/recherche.html','html_771d0b65733301b1eb3032ff4135bb06','_tables',18,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'table'] = interdire_scripts(table_objet($Pile[$SP]['cle'])))))!=='' ?
		('
	' . $t1) :
		'') .
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'statut'] = interdire_scripts((($Pile[$SP]['cle'] == 'article') ? interdire_scripts(invalideur_session($Cache, statuts_articles_visibles(table_valeur($GLOBALS["visiteur_session"], (string)'statut', null)))):'')))))!=='' ?
		('
	' . $t1 . '
	') :
		'') .
(($t1 = strval((trouver_fond(table_valeur($Pile["vars"], (string)'table', null),'prive/objets/liste/') ? recuperer_fond( (	'prive/objets/liste/' .
		table_valeur($Pile["vars"], (string)'table', null)) , array_merge($Pile[0],array('recherche' => interdire_scripts(table_valeur(@$Pile[0], (string)'recherche', null)) ,
	'statut' => table_valeur($Pile["vars"], (string)'statut', null) ,
	'par' => 'points' )), array('compil'=>array('../prive/squelettes/contenu/recherche.html','html_771d0b65733301b1eb3032ff4135bb06','_tables',0,$GLOBALS['spip_lang'])), _request('connect')):'')))!=='' ?
		($t1 . '
') :
		''));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_tables @ ../prive/squelettes/contenu/recherche.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_tablesidhtml_771d0b65733301b1eb3032ff4135bb06(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(liste_des_champs(''));
	$command['sourcemode'] = 'table';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_tablesid';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".cle");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('NOT', 
			array('=', 'cle', "'forum'")), 
			array('NOT', 
			array('=', 'cle', "'syndic_article'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../prive/squelettes/contenu/recherche.html','html_771d0b65733301b1eb3032ff4135bb06','_tablesid',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'table'] = interdire_scripts(table_objet($Pile[$SP]['cle'])))))!=='' ?
		('
		' . $t1) :
		'') .
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'statut'] = interdire_scripts((($Pile[$SP]['cle'] == 'article') ? interdire_scripts(invalideur_session($Cache, statuts_articles_visibles(table_valeur($GLOBALS["visiteur_session"], (string)'statut', null)))):'')))))!=='' ?
		('
		' . $t1 . '
		') :
		'') .
(($t1 = strval((trouver_fond(table_valeur($Pile["vars"], (string)'table', null),'prive/objets/liste/') ? inclure_liste_recherche_par_id(table_valeur($Pile["vars"], (string)'table', null),interdire_scripts(table_valeur(@$Pile[0], (string)'recherche', null)),table_valeur($Pile["vars"], (string)'statut', null),@serialize($Pile[0])):'')))!=='' ?
		($t1 . '
	') :
		''));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_tablesid @ ../prive/squelettes/contenu/recherche.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_numhtml_771d0b65733301b1eb3032ff4135bb06(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(is_numeric(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true)));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_num';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"CONDITION",
		$command,
		array('../prive/squelettes/contenu/recherche.html','html_771d0b65733301b1eb3032ff4135bb06','_num',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	' .
(($t1 = BOUCLE_tablesidhtml_771d0b65733301b1eb3032ff4135bb06($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
	' .
	wrap(_T('info_recherche_auteur_zero',array('cherche_auteur' => interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true)))),'<h3>') .
	'
	'))) .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_num @ ../prive/squelettes/contenu/recherche.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/squelettes/contenu/recherche.html
// Temps de compilation total: 46.084 ms
//

function html_771d0b65733301b1eb3032ff4135bb06($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true))))!=='' ?
		((	'<h1 class="grostitre">' .
	_T('public|spip|ecrire:info_resultat_recherche') .
	' &laquo;') . $t1 . '&raquo;</h1>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'<h1 class="grostitre">' .
	_T('public|spip|ecrire:info_rechercher') .
	'</h1>')) :
		'') .
'
' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE_ECRIRE',
	array(self(),'ajax'),
	array('../prive/squelettes/contenu/recherche.html','html_771d0b65733301b1eb3032ff4135bb06','',3,$GLOBALS['spip_lang'])) .
'<div class="nettoyeur"></div>

' .
(($t1 = BOUCLE_numhtml_771d0b65733301b1eb3032ff4135bb06($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = BOUCLE_tableshtml_771d0b65733301b1eb3032ff4135bb06($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((	'
' .
		wrap(_T('info_recherche_auteur_zero',array('cherche_auteur' => interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'recherche', null),true)))),'<h3>') .
		'
'))) .
	'
'))) .
'
');

	return analyse_resultat_skel('html_771d0b65733301b1eb3032ff4135bb06', $Cache, $page, '../prive/squelettes/contenu/recherche.html');
}
?>