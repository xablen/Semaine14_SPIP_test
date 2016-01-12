<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/inc-select_categorie.html
 * Date :      Tue, 12 Jan 2016 07:49:52 GMT
 * Compile :   Tue, 12 Jan 2016 09:05:14 GMT
 * Boucles :   _categories
 */ 

function BOUCLE_categorieshtml_50c64232b57e2f298c48fcecddf75f22(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['sourcemode'] = 'table';

	$command['source'] = array(interdire_scripts(calcul_svp_categories('ordre_cle','')));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_categories';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur",
		".cle");
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
		"DATA",
		$command,
		array('../plugins-dist/svp/formulaires/inc-select_categorie.html','html_50c64232b57e2f298c48fcecddf75f22','_categories',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	' .
(($t1 = strval(interdire_scripts((((safehtml($Pile[$SP]['cle']) != 'aucune')) ?' ' :''))))!=='' ?
		($t1 . (	' 
	<option value="' .
	interdire_scripts(safehtml($Pile[$SP]['cle'])) .
	'"' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true) == interdire_scripts(safehtml($Pile[$SP]['cle'])))) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'selected="selected"') :
			'') .
	'>
		' .
	interdire_scripts(safehtml($Pile[$SP]['valeur'])) .
	'
	</option>')) :
		'') .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_categories @ ../plugins-dist/svp/formulaires/inc-select_categorie.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/inc-select_categorie.html
// Temps de compilation total: 7.421 ms
//

function html_50c64232b57e2f298c48fcecddf75f22($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_categorieshtml_50c64232b57e2f298c48fcecddf75f22($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<select name="categorie" id="categorie">
	<option value="toute_categorie"' .
		(($t3 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true) == 'toute_categorie')) ?' ' :''))))!=='' ?
				(' ' . $t3 . 'selected="selected"') :
				'') .
		'>
		' .
		_T('svp:option_categorie_toute') .
		'
	</option>
') . $t1 . '
</select>
') :
		'') .
'
');

	return analyse_resultat_skel('html_50c64232b57e2f298c48fcecddf75f22', $Cache, $page, '../plugins-dist/svp/formulaires/inc-select_categorie.html');
}
?>