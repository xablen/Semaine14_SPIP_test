<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/extra/depot.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   _extra_depot
 */ 

function BOUCLE_extra_depothtml_05714670dd8f3a72e5a16eda8b1b6257(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'depot'));

	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_extra_depot';
		$command['from'] = array('depots' => 'spip_depots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("depots.id_depot");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'depots.id_depot', sql_quote(@$Pile[0]['id_depot'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/squelettes/extra/depot.html','html_05714670dd8f3a72e5a16eda8b1b6257','_extra_depot',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
' .
vide($Pile['vars'][$_zzz=(string)'exclusion'] = concat('id_depot!=',$Pile[$SP]['id_depot'])) .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/objets/liste/depots') . ', array_merge('.var_export($Pile[0],1).',array(\'titre\' => ' . argumenter_squelette(_T('svp:titre_liste_autres_depots')) . ',
	\'par\' => ' . argumenter_squelette('titre') . ',
	\'pas\' => ' . argumenter_squelette('10') . ',
	\'where\' => ' . argumenter_squelette(table_valeur($Pile["vars"], (string)'exclusion', null)) . ',
	\'affichage\' => ' . argumenter_squelette('simplifie') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/prive/squelettes/extra/depot.html\',\'html_05714670dd8f3a72e5a16eda8b1b6257\',\'\',3,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_extra_depot @ ../plugins-dist/svp/prive/squelettes/extra/depot.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/extra/depot.html
// Temps de compilation total: 6.024 ms
//

function html_05714670dd8f3a72e5a16eda8b1b6257($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_extra_depothtml_05714670dd8f3a72e5a16eda8b1b6257($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		('
')) .
'
');

	return analyse_resultat_skel('html_05714670dd8f3a72e5a16eda8b1b6257', $Cache, $page, '../plugins-dist/svp/prive/squelettes/extra/depot.html');
}
?>