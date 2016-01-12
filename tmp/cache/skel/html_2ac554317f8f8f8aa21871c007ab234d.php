<?php

/*
 * Squelette : squelettes/inc/inc-bas.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:05 GMT
 * Boucles :   _art_visites, _rubriques_chemin, _syndic_rub, _syndic_test
 */ 

function BOUCLE_art_visiteshtml_2ac554317f8f8f8aa21871c007ab234d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_art_visites';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.visites",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-bas.html','html_2ac554317f8f8f8aa21871c007ab234d','_art_visites',12,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'<strong>' .
interdire_scripts($Pile[$SP]['visites']) .
' /</strong>');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_art_visites @ squelettes/inc/inc-bas.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubriques_cheminhtml_2ac554317f8f8f8aa21871c007ab234d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!($id_rubrique = intval(@$Pile[0]['id_rubrique'])))
		return '';
	include_spip('inc/rubriques');
	$hierarchie = calcul_hierarchie_in($id_rubrique,false);
	if (!$hierarchie) return "";
	
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubriques_chemin';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-bas.html','html_2ac554317f8f8f8aa21871c007ab234d','_rubriques_chemin',18,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'
		<a href="' .
interdire_scripts(generer_url_public('backend', (	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public|spip|ecrire:syndiquer_rubrique') .
'"><img src="' .
find_in_path('styles/img/rss.png') .
'" alt="' .
_T('public|spip|ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])),'60')) .
'&nbsp;</span></a>
');
		$t0 .= ((strlen($t1) && strlen($t0)) ? ' ' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_chemin @ squelettes/inc/inc-bas.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_syndic_rubhtml_2ac554317f8f8f8aa21871c007ab234d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_syndic_rub';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-bas.html','html_2ac554317f8f8f8aa21871c007ab234d','_syndic_rub',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<a href="' .
interdire_scripts(generer_url_public('backend', (	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public|spip|ecrire:syndiquer_rubrique') .
'"><img src="' .
find_in_path('styles/img/rss.png') .
'" alt="' .
_T('public|spip|ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])),'60')) .
'</span></a>
');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_syndic_rub @ squelettes/inc/inc-bas.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_syndic_testhtml_2ac554317f8f8f8aa21871c007ab234d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic';
		$command['id'] = '_syndic_test';
		$command['from'] = array('syndic' => 'spip_syndic');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('syndic.statut','publie,prop','publie',''), 
			array('=', 'syndic.syndication', "'oui'"));
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
		array('squelettes/inc/inc-bas.html','html_2ac554317f8f8f8aa21871c007ab234d','_syndic_test',28,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('ecrire:titre_sites_syndiques');
	$l2 = _T('ecrire:titre_sites_syndiques');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		<a href="' .
interdire_scripts(generer_url_public('opml', '')) .
'" rel="nofollow" title="OPML : ' .
$l1 .
'"><img src="' .
find_in_path('styles/img/opml-icon.png') .
'" alt="' .
$l1 .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;OPML</span></a>
	<big>&nbsp;
		<b><a href="http://' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'.wikipedia.org/wiki/OPML">?</a></b>
	</big>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_syndic_test @ squelettes/inc/inc-bas.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-bas.html
// Temps de compilation total: 29.056 ms
//

function html_2ac554317f8f8f8aa21871c007ab234d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div id="bas">
	<a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public|spip|ecrire:accueil_site') .
'">' .
_T('public|spip|ecrire:accueil_site') .
'</a> | 
	<a href="' .
vider_url(urlencode_1738(generer_url_entite('1', 'auteur', '', '', true))) .
'" title="' .
_T('public|spip|ecrire:info_contact') .
'">' .
_T('public|spip|ecrire:info_contact') .
'</a> | 
	<a href="' .
interdire_scripts(generer_url_public('plan', '')) .
'" title="' .
_T('public|spip|ecrire:plan_site') .
'">' .
_T('public|spip|ecrire:plan_site') .
'</a>
		' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null)) ?'' :' ')))))!=='' ?
		($t1 . (	' | <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login', ''),'url',self())) .
	'" rel="nofollow" class=\'login_modal\'>' .
	_T('public|spip|ecrire:lien_connecter') .
	'</a>')) :
		'') .
(($t1 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('ecrire')?" ":""))))!=='' ?
		($t1 . (	'| <a href="' .
	interdire_scripts(eval('return '.'_DIR_RESTREINT_ABS'.';')) .
	'">' .
	_T('public|spip|ecrire:espace_prive') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null)) ?' ' :'')))))!=='' ?
		($t1 . (	' | <a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array(),
	array('squelettes/inc/inc-bas.html','html_2ac554317f8f8f8aa21871c007ab234d','',1,$GLOBALS['spip_lang'])) .
	'" rel="nofollow">' .
	_T('public|spip|ecrire:icone_deconnecter') .
	'</a>')) :
		'') .
' | 
	<a href="' .
interdire_scripts(generer_url_public('statistiques', '')) .
'" title="' .
_T('public|spip|ecrire:titre_statistiques') .
'">' .
_T('public|spip|ecrire:titre_statistiques') .
'</a> | 
	<span style="white-space: nowrap;">' .
_T('public|spip|ecrire:info_visiteurs') .
' : 
	' .
BOUCLE_art_visiteshtml_2ac554317f8f8f8aa21871c007ab234d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-affvisit') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_2ac554317f8f8f8aa21871c007ab234d\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'></span>

	<p>
		<a href="' .
interdire_scripts(generer_url_public('backend', '')) .
'" rel="nofollow" title="' .
_T('public|spip|ecrire:bouton_radio_syndication') .
' ' .
traduire_nom_langue(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])) .
'"><img src="' .
find_in_path('styles/img/rss.png') .
'" alt="' .
_T('public|spip|ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span style="text-transform: uppercase;">&nbsp;' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'&nbsp;</span></a>

' .
BOUCLE_rubriques_cheminhtml_2ac554317f8f8f8aa21871c007ab234d($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
BOUCLE_syndic_rubhtml_2ac554317f8f8f8aa21871c007ab234d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	<big>&nbsp;
		<b><a href="http://' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'.wikipedia.org/wiki/Really_Simple_Syndication">?</a></b>
	</big>
' .
BOUCLE_syndic_testhtml_2ac554317f8f8f8aa21871c007ab234d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</p>
	
	<p>
		<a href="http://www.spip.net" title="' .
_T('public|spip|ecrire:site_realise_avec_spip') .
' ' .
spip_version() .
'"> ' .
_T('public|spip|ecrire:site_realise_avec_spip') .
' ' .
interdire_scripts('3.1.0') .
'</a> + 
		<a href="http://edu.ca.edu/rubrique43.html" title="' .
_T('spip:squelette') .
' AHUNTSIC - ' .
calcul_version_squelette() .
'">AHUNTSIC</a>
	</p>



' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas_cc') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_2ac554317f8f8f8aa21871c007ab234d\',\'\',44,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


' .
(($t1 = strval(interdire_scripts(((filtre_info_plugin_dist("visiteurs_connectes", "est_actif")) ?' ' :''))))!=='' ?
		($t1 . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-visiteurs') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_2ac554317f8f8f8aa21871c007ab234d\',\'\',47,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(((filtre_info_plugin_dist("couteau_suisse", "est_actif")) ?' ' :''))))!=='' ?
		($t1 . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('fonds/visiteurs_connectes') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_2ac554317f8f8f8aa21871c007ab234d\',\'\',48,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>') :
		'') .
' 


</div><!-- fin bas -->

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas_menu-lang') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_2ac554317f8f8f8aa21871c007ab234d\',\'\',53,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	' .
interdire_scripts(@$Pile[0]['spip_cron']) .
'
');

	return analyse_resultat_skel('html_2ac554317f8f8f8aa21871c007ab234d', $Cache, $page, 'squelettes/inc/inc-bas.html');
}
?>