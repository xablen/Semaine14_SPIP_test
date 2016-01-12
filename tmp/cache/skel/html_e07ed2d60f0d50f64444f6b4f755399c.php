<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/navigation/depots.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:01 GMT
 * Boucles :   _depot_existe
 */ 

function BOUCLE_depot_existehtml_e07ed2d60f0d50f64444f6b4f755399c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_depot_existe';
		$command['from'] = array('depots' => 'spip_depots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('>', 'depots.id_depot', "0"));
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/squelettes/navigation/depots.html','html_e07ed2d60f0d50f64444f6b4f755399c','_depot_existe',10,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('svp:bouton_actualiser_tout');
	$l2 = _T('svp:bulle_actualiser_tout_depot');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
    <div class="bouton">
        ' .
bouton_action($l1,invalideur_session($Cache, generer_action_auteur('actualiser_depot','tout',invalideur_session($Cache, self()))),'','',$l2) .
'
    </div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_depot_existe @ ../plugins-dist/svp/prive/squelettes/navigation/depots.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/navigation/depots.html
// Temps de compilation total: 41.566 ms
//

function html_e07ed2d60f0d50f64444f6b4f755399c($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
recuperer_fond( 'prive/squelettes/inclure/menu-navigation' , array_merge($Pile[0],array('menu' => 'menu_configuration' ,
	'bloc' => 'navigation' )), array('compil'=>array('../plugins-dist/svp/prive/squelettes/navigation/depots.html','html_e07ed2d60f0d50f64444f6b4f755399c','',2,$GLOBALS['spip_lang'])), _request('connect')) .
'
' .
boite_ouvrir('', 'info') .
_T('svp:info_boite_depot_gerer') .
'
' .
BOUCLE_depot_existehtml_e07ed2d60f0d50f64444f6b4f755399c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
boite_fermer() .
'
');

	return analyse_resultat_skel('html_e07ed2d60f0d50f64444f6b4f755399c', $Cache, $page, '../plugins-dist/svp/prive/squelettes/navigation/depots.html');
}
?>