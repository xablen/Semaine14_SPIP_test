<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/inclure/plugin_detail.html
 * Date :      Tue, 12 Jan 2016 07:49:49 GMT
 * Compile :   Tue, 12 Jan 2016 09:10:54 GMT
 * Boucles :   _pluginsdetail
 */ 

function BOUCLE_pluginsdetailhtml_dd7da27b2b072284fe8cb9f0d842e043(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'paquets';
		$command['id'] = '_pluginsdetail';
		$command['from'] = array('paquets' => 'spip_paquets');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("paquets.description",
		"paquets.lien_doc",
		"paquets.actif",
		"paquets.lien_demo",
		"paquets.auteur",
		"paquets.credit",
		"paquets.licence",
		"paquets.version",
		"paquets.constante",
		"paquets.src_archive",
		"paquets.prefixe",
		"paquets.dependances");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'paquets.id_paquet', sql_quote(@$Pile[0]['id_paquet'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/squelettes/inclure/plugin_detail.html','html_dd7da27b2b072284fe8cb9f0d842e043','_pluginsdetail',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('svp:bulle_aller_documentation');
	$l2 = _T('svp:lien_documentation');
	$l3 = _T('svp:bulle_aller_demonstration');
	$l4 = _T('svp:lien_demo');
	$l5 = _T('public:par_auteur');
	$l6 = _T('public|spip|ecrire:plugin_info_credit');
	$l7 = _T('public|spip|ecrire:intitule_licence');
	$l8 = _T('public|spip|ecrire:version');
	$l9 = _T('svp:label_prefixe');
	$l10 = _T('public|spip|ecrire:repertoire_plugins');
	$l11 = _T('public|spip|ecrire:plugin_info_necessite');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<dl class="description">
		<dd class="desc">
			' .
interdire_scripts(propre(extraire_multi(svp_importer_charset($Pile[$SP]['description'])))) .
'
			' .
(($t1 = strval(interdire_scripts($Pile[$SP]['lien_doc'])))!=='' ?
		('<em class="site">
				<a href="' . $t1 . (	'" class="spip_out" title="' .
	$l1 .
	'">' .
	$l2 .
	'</a>
			</em>')) :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['actif'] == 'oui')) ?' ' :''))))!=='' ?
		($t1 . (	'
				' .
	(($t2 = strval(interdire_scripts(svp_calculer_url_demo($Pile[$SP]['lien_demo']))))!=='' ?
			(' - <em class="site">
					<a href="' . $t2 . (	'" class="spip_out" title="' .
		$l3 .
		'">' .
		$l4 .
		'</a>
				</em>')) :
			'') .
	'
			')) :
		'') .
'
		</dd>
		' .
(($t1 = strval(interdire_scripts(svp_importer_charset(svp_afficher_credits($Pile[$SP]['auteur'])))))!=='' ?
		((	'<dt class="auteurs">' .
	$l5 .
	'</dt>
		<dd class="auteurs">') . $t1 . '</dd>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(svp_importer_charset(svp_afficher_credits($Pile[$SP]['credit'])))))!=='' ?
		((	'<dt class="credits">' .
	$l6 .
	'</dt>
		<dd class="credits">') . $t1 . '</dd>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(svp_importer_charset(svp_afficher_credits($Pile[$SP]['licence'],',')))))!=='' ?
		((	'<dt class="licence">' .
	$l7 .
	'</dt>
		<dd class="licence">') . $t1 . '</dd>') :
		'') .
'
	</dl>
	' .
(($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('webmestre')?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
	<dl class="tech">
		<dt>' .
	$l8 .
	'</dt>
		<dd>' .
	interdire_scripts(denormaliser_version($Pile[$SP]['version'])) .
	(($t2 = strval(interdire_scripts(((($a = abs(version_svn_courante(concat(constant($Pile[$SP]['constante']),(	interdire_scripts($Pile[$SP]['src_archive']) .
		'/'))))) OR (is_string($a) AND strlen($a))) ? $a : ''))))!=='' ?
			(' SVN [' . $t2 . ']') :
			'') .
	'</dd>
		<dt>' .
	$l9 .
	'</dt>
		<dd>' .
	interdire_scripts(strtolower($Pile[$SP]['prefixe'])) .
	'</dd>
		<dt>' .
	$l10 .
	'</dt>
		<dd>' .
	interdire_scripts(joli_repertoire(concat(constant($Pile[$SP]['constante']),(	interdire_scripts($Pile[$SP]['src_archive']) .
		'/')))) .
	'</dd>
		' .
	(($t2 = strval(interdire_scripts(svp_afficher_dependances($Pile[$SP]['dependances'],'necessite',', ','pluginspip'))))!=='' ?
			((	'<dt>' .
		$l11 .
		'</dt>
		<dd>') . $t2 . '</dd>') :
			'') .
	'
	</dl>')) :
		'') .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_pluginsdetail @ ../plugins-dist/svp/prive/squelettes/inclure/plugin_detail.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/inclure/plugin_detail.html
// Temps de compilation total: 27.345 ms
//

function html_dd7da27b2b072284fe8cb9f0d842e043($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="details">' .
BOUCLE_pluginsdetailhtml_dd7da27b2b072284fe8cb9f0d842e043($Cache, $Pile, $doublons, $Numrows, $SP) .
'</div>
');

	return analyse_resultat_skel('html_dd7da27b2b072284fe8cb9f0d842e043', $Cache, $page, '../plugins-dist/svp/prive/squelettes/inclure/plugin_detail.html');
}
?>