<?php

/*
 * Squelette : ../prive/squelettes/navigation/rubrique.html
 * Date :      Tue, 12 Jan 2016 07:48:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:00:16 GMT
 * Boucles :   _nav
 */ 

function BOUCLE_navhtml_c4eeb9b6db715dfce02f11fb04f369c4(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'rubrique'));

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_nav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/squelettes/navigation/rubrique.html','html_c4eeb9b6db715dfce02f11fb04f369c4','_nav',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
boite_ouvrir('', 'info') .
pipeline( 'boite_infos' , array('data' => '', 'args' => array('type' => 'rubrique', 'id' => interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_rubrique', null),true)))) ) .
boite_fermer() .
'

<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_EDITER_LOGO',
	array('rubrique',$Pile[$SP]['id_rubrique'],'',@serialize($Pile[0])),
	array('../prive/squelettes/navigation/rubrique.html','html_c4eeb9b6db715dfce02f11fb04f369c4','_nav',5,$GLOBALS['spip_lang'])) .
'</div>

' .
pipeline( 'afficher_config_objet' , array('args' => array('type' => 'rubrique', 'id' => $Pile[$SP]['id_rubrique']), 'data' => '') ));
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_nav @ ../prive/squelettes/navigation/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/squelettes/navigation/rubrique.html
// Temps de compilation total: 12.369 ms
//

function html_c4eeb9b6db715dfce02f11fb04f369c4($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_navhtml_c4eeb9b6db715dfce02f11fb04f369c4($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'rubrique_edit')) ?' ' :''))))!=='' ?
			($t2 . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/navigation/rubrique_edit') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/navigation/rubrique.html\',\'html_c4eeb9b6db715dfce02f11fb04f369c4\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>') :
			'') .
	'
')));

	return analyse_resultat_skel('html_c4eeb9b6db715dfce02f11fb04f369c4', $Cache, $page, '../prive/squelettes/navigation/rubrique.html');
}
?>