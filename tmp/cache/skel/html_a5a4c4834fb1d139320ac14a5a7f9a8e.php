<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:03:01 GMT
 * Boucles :   _libs
 */ 

function BOUCLE_libshtml_a5a4c4834fb1d139320ac14a5a7f9a8e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['sourcemode'] = 'table';

	$command['source'] = array(svp_lister_librairies(''));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_libs';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur",
		".cle");
		$command['orderby'] = array('.cle');
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
		array('../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html','html_a5a4c4834fb1d139320ac14a5a7f9a8e','_libs',3,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<dt>' .
interdire_scripts(safehtml($Pile[$SP]['cle'])) .
'</dt>
	' .
(($t1 = strval(interdire_scripts(joli_repertoire(safehtml($Pile[$SP]['valeur'])))))!=='' ?
		('<dd>' . $t1 . '</dd>') :
		'') .
'
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_libs @ ../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html
// Temps de compilation total: 17.966 ms
//

function html_a5a4c4834fb1d139320ac14a5a7f9a8e($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
recuperer_fond( 'prive/squelettes/navigation/configurer' , array('exec' => 'admin_plugin' ), array('compil'=>array('../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html','html_a5a4c4834fb1d139320ac14a5a7f9a8e','',1,$GLOBALS['spip_lang'])), _request('connect')) .
'

' .
(($t1 = BOUCLE_libshtml_a5a4c4834fb1d139320ac14a5a7f9a8e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		boite_ouvrir(_T('public|spip|ecrire:plugin_librairies_installees'), 'basic highlight') .
		'
<dl>
	') . $t1 . (	'
</dl>
' .
		boite_fermer() .
		'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_a5a4c4834fb1d139320ac14a5a7f9a8e', $Cache, $page, '../plugins-dist/svp/prive/squelettes/navigation/svp_admin_plugin.html');
}
?>