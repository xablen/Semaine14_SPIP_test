<?php

/*
 * Squelette : squelettes/inc/inc-meta.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:04 GMT
 * Boucles :   _lien_webfonts, _keywords_recap, _author_recap, _recap_auteursDC, _recap_subjectDC, _keywords_site, _site_head, _keywords_rubrique, _subjectDC_rub, _rubrique_head, _keywords_mot, _mot_head, _keywords_breve, _breve_head, _author, _keywords_article, _auteursDC, _subjectDC, _article_head
 */ 

function BOUCLE_lien_webfontshtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_lien_webfonts';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.descriptif");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('=', 'mots.titre', "'polices'"));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_lien_webfonts',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= interdire_scripts(replace($Pile[$SP]['descriptif'],'&','%26'));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_lien_webfonts @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_recaphtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_keywords_recap';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_recap',55,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_recap @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_author_recaphtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_author_recap';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens','L2' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array("auteurs.id_auteur");
		$command['select'] = array("auteurs.nom");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('L2.statut','!','publie',''), 
quete_condition_postdates('L2.date',''), 
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'auteurs.id_auteur', "1"));
		$command['join'] = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article','id_objet','L1.objet='.sql_quote('article')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_author_recap',58,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_author_recap @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_recap_auteursDChtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_recap_auteursDC';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens','L2' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array("auteurs.id_auteur");
		$command['select'] = array("auteurs.nom");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('L2.statut','!','publie',''), 
quete_condition_postdates('L2.date',''), 
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'auteurs.id_auteur', "1"));
		$command['join'] = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article','id_objet','L1.objet='.sql_quote('article')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_recap_auteursDC',63,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])))) .
'" />');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_recap_auteursDC @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_recap_subjectDChtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_recap_subjectDC';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_recap_subjectDC',65,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_recap_subjectDC @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_sitehtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_keywords_site';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_syndic'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('site')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_site',52,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_site @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_site_headhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic';
		$command['id'] = '_site_head';
		$command['from'] = array('syndic' => 'spip_syndic','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("syndic.id_syndic");
		$command['select'] = array("syndic.id_syndic",
		"syndic.descriptif");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('syndic','id_objet','id_syndic','L1.objet='.sql_quote('site')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('syndic.statut','publie,prop','publie',''), 
			array('=', 'syndic.id_syndic', sql_quote(@$Pile[0]['id_syndic'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('NOT', 
			array('IN', 'syndic.id_syndic', 
			array('SELF', 'syndic.id_syndic', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_site_head',49,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
  <!-- META site -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_sitehtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_site_head @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_rubriquehtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_keywords_rubrique';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_rubrique',40,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_rubrique @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_subjectDC_rubhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_subjectDC_rub';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_subjectDC_rub',46,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? '; ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_subjectDC_rub @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubrique_headhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubrique_head';
		$command['from'] = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("rubriques.id_rubrique");
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang",
		"rubriques.texte",
		"rubriques.date");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('rubriques','id_objet','id_rubrique','L1.objet='.sql_quote('rubrique')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('NOT', 
			array('IN', 'rubriques.id_rubrique', 
			array('SELF', 'rubriques.id_rubrique', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_rubrique_head',37,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<!-- META rubrique - META section -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_rubriquehtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect, null)))))))!=='' ?
		('<meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDC_rubhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique_head @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_mothtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_keywords_mot';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[$SP]['id_mot'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_mot',36,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_mot @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_mot_headhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_mot_head';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.id_mot",
		"mots.descriptif");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'mots.id_mot', sql_quote(@$Pile[0]['id_mot'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_mot_head',32,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'

	<!-- META mot-cle - META keyword -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_mothtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_mot_head @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_brevehtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_keywords_breve';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_breve'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('breve')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_breve',31,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ',' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_breve @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_breve_headhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'breves';
		$command['id'] = '_breve_head';
		$command['from'] = array('breves' => 'spip_breves','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("breves.id_breve");
		$command['select'] = array("breves.id_breve",
		"breves.titre",
		"breves.lang");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('breves','id_objet','id_breve','L1.objet='.sql_quote('breve')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('breves.statut','publie,prop','publie',''), 
			array('=', 'breves.id_breve', sql_quote(@$Pile[0]['id_breve'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('NOT', 
			array('IN', 'breves.id_breve', 
			array('SELF', 'breves.id_breve', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_breve_head',28,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<!-- META breve - META news item -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_brevehtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_breve_head @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_authorhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_author';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.nom");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_author',16,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ', ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_author @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_keywords_articlehtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_keywords_article';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_keywords_article',17,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? ', ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_keywords_article @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_auteursDChtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteursDC';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.nom");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_auteursDC',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = (
'
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])))) .
'" />');
		$t0 .= ((strlen($t1) && strlen($t0)) ? ' ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteursDC @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_subjectDChtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_subjectDC';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.titre");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_subjectDC',24,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = interdire_scripts(entites_html(textebrut(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))));
		$t0 .= ((strlen($t1) && strlen($t0)) ? '; ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_subjectDC @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_article_headhtml_f7a72f7c15527e9fefe562fecb18cf87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article_head';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.titre",
		"articles.lang",
		"articles.date");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('NOT', 
			array('IN', 'articles.id_article', 
			array('SELF', 'articles.id_article', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-meta.html','html_f7a72f7c15527e9fefe562fecb18cf87','_article_head',13,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
  <!-- META article -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect, null))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_authorhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Author" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_keywords_articlehtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />') :
		'') .
BOUCLE_auteursDChtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect, null)))))))!=='' ?
		('
  <meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDChtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_article_head @ squelettes/inc/inc-meta.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-meta.html
// Temps de compilation total: 99.137 ms
//

function html_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_lien_webfontshtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP) .
'

<!-- META DATA -->
	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	<meta http-equiv="Content-language" content="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta name="language" content="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
	<meta name="robots" content="index,follow" />
	<link rel="schema.DCTERMS"  href="http://purl.org/dc/terms/" />
	<link rel="schema.DC"       href="http://purl.org/dc/elements/1.1/" />
' .
(($t1 = BOUCLE_article_headhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = BOUCLE_breve_headhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((($t3 = BOUCLE_mot_headhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((($t4 = BOUCLE_rubrique_headhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					((($t5 = BOUCLE_site_headhtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
						$t5 :
						((	'  
	<!-- META pages recapitulatives - META summary pages -->
' .
					(($t6 = BOUCLE_keywords_recaphtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="keywords" content="' . $t6 . '" />') :
							'') .
					'
  ' .
					(($t6 = strval(interdire_scripts(attribut_html(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0])))))!=='' ?
							('<meta name="description" content="' . $t6 . '" />') :
							'') .
					'
  <meta name="author" content="' .
					BOUCLE_author_recaphtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP) .
					'" />
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
					(($t6 = strval(interdire_scripts(entites_html(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))))))!=='' ?
							('<meta name="DC.title" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
							('<meta name="DC.language" scheme="ISO639-1" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t6 . '" />') :
							'') .
					BOUCLE_recap_auteursDChtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP) .
					(($t6 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0]),'150')))))!=='' ?
							('
  <meta name="DC.description" content="' . $t6 . '" />') :
							'') .
					(($t6 = BOUCLE_recap_subjectDChtml_f7a72f7c15527e9fefe562fecb18cf87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="DC.subject" content="' . $t6 . '" />') :
							'') .
					(($t6 = strval(interdire_scripts(date_iso(normaliser_date(@$Pile[0]['date'])))))!=='' ?
							('
  <meta name="DC.date" scheme="ISO8601" content="' . $t6 . '" />') :
							'') .
					'

')))))))))))) .
'

' .
(($t1 = strval(interdire_scripts(((($a = extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',((($a = ((($a = table_valeur(@$Pile[0], (string)'favicon', null)) OR (is_string($a) AND strlen($a))) ? $a : find_in_path('favicon.ico'))) OR (is_string($a) AND strlen($a))) ? $a : 
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))),'32','32'),'32','32','center'),'ico')),'src')) OR (is_string($a) AND strlen($a))) ? $a : find_in_path('spip.ico')))))!=='' ?
		('  <link rel="shortcut icon" href="' . $t1 . '" type="image/x-icon" />') :
		'') .
'

' .
(($t1 = strval(interdire_scripts(generer_url_public('backend', ''))))!=='' ?
		((	'  <link rel="alternate" type="application/rss+xml" title="' .
	_T('public|spip|ecrire:syndiquer_site') .
	' : ' .
	interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
	'" href="') . $t1 . '" />') :
		'') .
'

');

	return analyse_resultat_skel('html_f7a72f7c15527e9fefe562fecb18cf87', $Cache, $page, 'squelettes/inc/inc-meta.html');
}
?>