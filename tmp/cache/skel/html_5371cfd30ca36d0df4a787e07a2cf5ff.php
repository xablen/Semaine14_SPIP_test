<?php

/*
 * Squelette : ../plugins-dist/svp/prive/objets/contenu/depot.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:09 GMT
 * Boucles :   _contenu_depot
 */ 

function BOUCLE_contenu_depothtml_5371cfd30ca36d0df4a787e07a2cf5ff(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_contenu_depot';
		$command['from'] = array('depots' => 'spip_depots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("depots.titre",
		"depots.xml_paquets",
		"depots.url_archives",
		"depots.type",
		"depots.url_serveur",
		"depots.url_brouteur",
		"depots.descriptif");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'depots.id_depot', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)),'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/objets/contenu/depot.html','html_5371cfd30ca36d0df4a787e07a2cf5ff','_contenu_depot',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:info_nom');
	$l2 = _T('svp:label_xml_depot');
	$l3 = _T('svp:bulle_telecharger_fichier_depot');
	$l4 = _T('svp:label_url_archives');
	$l5 = _T('svp:label_type_depot');
	$l6 = _T('svp:label_url_serveur');
	$l7 = _T('svp:label_url_brouteur');
	$l8 = _T('public|spip|ecrire:info_descriptif');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
<div class="champ contenu_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
	<div class=\'label\'>' .
$l1 .
'</div>
	<div dir=\'' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'\' class=\'' .
'titre\'>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</div>
</div>
<div class="champ contenu_ps">
	<div class=\'label\'>' .
$l2 .
'&nbsp;:</div>
	<div dir=\'' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'\' class=\'' .
'ps\'>
		<p><a href="' .
interdire_scripts($Pile[$SP]['xml_paquets']) .
'" title="' .
$l3 .
'">' .
interdire_scripts($Pile[$SP]['xml_paquets']) .
'</a></p>
	</div>
</div>
<div class="champ contenu_ps">
	<div class=\'label\'>' .
$l4 .
'&nbsp;:</div>
	<div dir=\'' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'\' class=\'' .
'ps\'><p>' .
vider_url($Pile[$SP]['url_archives']) .
'</p></div>
</div>
' .
(($t1 = strval(interdire_scripts(svp_traduire_type_depot(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<div class="champ contenu_ps">
	<div class=\'label\'>' .
	$l5 .
	'</div>
	<div dir=\'' .
	lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
	'\' class=\'' .
	'type\'><p>') . $t1 . (	'</p></div>
	' .
	(($t2 = strval(vider_url($Pile[$SP]['url_serveur'])))!=='' ?
			((	'<div class=\'label\'>' .
		$l6 .
		'&nbsp;:</div>
	<div dir=\'' .
		lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
		'\' class=\'' .
		'ps\'><p>') . $t2 . '</p></div>') :
			'') .
	'
	' .
	(($t2 = strval(vider_url($Pile[$SP]['url_brouteur'])))!=='' ?
			((	'<div class=\'label\'>' .
		$l7 .
		'&nbsp;:</div>
	<div dir=\'' .
		lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
		'\' class=\'' .
		'ps\'><p>') . $t2 . '</p></div>') :
			'') .
	'
</div>')) :
		'') .
'
<div class="champ contenu_texte' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['descriptif']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
	<div class=\'label\'>' .
$l8 .
'</div>
	<div dir=\'' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'\' class=\'' .
'texte\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])) .
'</div>
</div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_contenu_depot @ ../plugins-dist/svp/prive/objets/contenu/depot.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/objets/contenu/depot.html
// Temps de compilation total: 18.037 ms
//

function html_5371cfd30ca36d0df4a787e07a2cf5ff($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_contenu_depothtml_5371cfd30ca36d0df4a787e07a2cf5ff($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_5371cfd30ca36d0df4a787e07a2cf5ff', $Cache, $page, '../plugins-dist/svp/prive/objets/contenu/depot.html');
}
?>