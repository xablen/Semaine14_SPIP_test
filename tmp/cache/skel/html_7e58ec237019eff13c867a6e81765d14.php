<?php

/*
 * Squelette : squelettes/inc/inc-menu-principal.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:26:36 GMT
 * Boucles :   _article, _rubrique, _art_agenda, _site
 */ 

function BOUCLE_articlehtml_7e58ec237019eff13c867a6e81765d14(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.titre');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-menu-principal.html','html_7e58ec237019eff13c867a6e81765d14','_article',5,$GLOBALS['spip_lang'])
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
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></li>') :
		'') .
'
			');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_article @ squelettes/inc/inc-menu-principal.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubriquehtml_7e58ec237019eff13c867a6e81765d14(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubrique';
		$command['from'] = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("rubriques.id_rubrique");
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array('L1' => array('rubriques','id_objet','id_rubrique','L1.objet='.sql_quote('rubrique')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-menu-principal.html','html_7e58ec237019eff13c867a6e81765d14','_rubrique',8,$GLOBALS['spip_lang'])
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
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	(($t2 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
			($t2 . '/') :
			'') .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></li>') :
		'') .
'
			');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique @ squelettes/inc/inc-menu-principal.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_art_agendahtml_7e58ec237019eff13c867a6e81765d14(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_art_agenda';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.lang",
		"articles.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-menu-principal.html','html_7e58ec237019eff13c867a6e81765d14','_art_agenda',14,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<li id="menu-principal-agenda"><a class="lien" href="' .
interdire_scripts(generer_url_public('agenda', '')) .
'" title="' .
_T('public|spip|ecrire:icone_agenda') .
'"  accesskey="2">' .
_T('public|spip|ecrire:icone_agenda') .
'</a></li>
			');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_art_agenda @ squelettes/inc/inc-menu-principal.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_sitehtml_7e58ec237019eff13c867a6e81765d14(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic';
		$command['id'] = '_site';
		$command['from'] = array('syndic' => 'spip_syndic');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('syndic.statut','publie,prop','publie',''));
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
		array('squelettes/inc/inc-menu-principal.html','html_7e58ec237019eff13c867a6e81765d14','_site',20,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:nouveautes_web');
	$l2 = _T('public|spip|ecrire:sites_web');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'<li id="menu-principal-sites"><a href="' .
interdire_scripts(generer_url_public('site', '')) .
'" title="' .
$l1 .
'">' .
$l2 .
'</a></li>');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_site @ squelettes/inc/inc-menu-principal.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-menu-principal.html
// Temps de compilation total: 29.719 ms
//

function html_7e58ec237019eff13c867a6e81765d14($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<div class="menu" id="menu-principal">
		<ul>
			<li id="menu-principal-accueil"><a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public|spip|ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'" accesskey="0">' .
_T('public|spip|ecrire:accueil_site') .
'</a></li>

			' .
BOUCLE_articlehtml_7e58ec237019eff13c867a6e81765d14($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			' .
BOUCLE_rubriquehtml_7e58ec237019eff13c867a6e81765d14($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-contact"><a href="' .
vider_url(urlencode_1738(generer_url_entite('1', 'auteur', '', '', true))) .
'" title="' .
_T('public|spip|ecrire:info_contact') .
'"  accesskey="7">' .
_T('public|spip|ecrire:info_contact') .
'</a></li>
			
			' .
BOUCLE_art_agendahtml_7e58ec237019eff13c867a6e81765d14($Cache, $Pile, $doublons, $Numrows, $SP) .
'			

			<li id="menu-principal-plan"><a href="' .
interdire_scripts(generer_url_public('plan', '')) .
'" title="' .
_T('public|spip|ecrire:plan_site') .
'" accesskey="3">' .
_T('public|spip|ecrire:plan_site') .
'</a></li>

			' .
BOUCLE_sitehtml_7e58ec237019eff13c867a6e81765d14($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-resume"><a href="' .
interdire_scripts(generer_url_public('resume', '')) .
'" title="' .
_T('public|spip|ecrire:en_resume') .
'" accesskey="5">' .
_T('public|spip|ecrire:en_resume') .
'</a></li>
			
	
			' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes/inc/inc-menu-principal.html','html_7e58ec237019eff13c867a6e81765d14','',0,$GLOBALS['spip_lang']))))!=='' ?
		((	'<li id="menu-principal-recherche">
			<div class="menu" id="menu-recherche">
				<h3 class="structure">' .
	_T('public|spip|ecrire:info_rechercher') .
	'</h3>
					<ul>
						<li>
					') . $t1 . (	'			
						</li>			
					</ul>
			</div><!-- menu-recherche -->
			</li>')) :
		'') .
'
		</ul>
	</div>');

	return analyse_resultat_skel('html_7e58ec237019eff13c867a6e81765d14', $Cache, $page, 'squelettes/inc/inc-menu-principal.html');
}
?>