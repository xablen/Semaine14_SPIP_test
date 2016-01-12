<?php

/*
 * Squelette : squelettes/article.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:02 GMT
 * Boucles :   _rubriques_body, _rubriques_chemin, _traductions, _articles_auteur, _auteurs, _mots_eclus, _articles_mots, _mots, _Forums_Boucle, _forums_fils, _forums, _articles_rubrique, _rub_en_cours, _article_principal
 */ 

function BOUCLE_rubriques_bodyhtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	include_spip('inc/rubriques');
	$hierarchie = calcul_hierarchie_in($id_rubrique,true);
	if (!$hierarchie) return "";
	
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubriques_body';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$command['where'] = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_rubriques_body',11,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'rub' .
$Pile[$SP]['id_rubrique']);
		$t0 .= ((strlen($t1) && strlen($t0)) ? ' ' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_body @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubriques_cheminhtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	include_spip('inc/rubriques');
	$hierarchie = calcul_hierarchie_in($id_rubrique,true);
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
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_rubriques_chemin',30,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
              <b class=\'separateur\'>&gt;</b> 
              <a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])),'60')) .
'</a>
            ');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_chemin @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_traductionshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_traductions';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.lang",
		"articles.id_article",
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
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP]['id_trad'])))), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'])));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_traductions',37,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'
              ' .
(($t1 = strval(traduire_nom_langue(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		((	'<div dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">') . $t1 . (	' : <a href="' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/spip.php?action=converser&amp;redirect=' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'%2F' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'&amp;var_lang=' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">')) :
		'') .
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		($t1 . '</a></div>') :
		'') .
'
            ');
		$t0 .= ((strlen($t1) && strlen($t0)) ? '<br />' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_traductions @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_auteurhtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_auteur';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')));
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'])));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_articles_auteur',83,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
						<li>	
							<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
						</li>
							');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_auteur @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_auteurshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteurs';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.id_auteur",
		"auteurs.nom");
		$command['orderby'] = array('auteurs.nom');
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
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_auteurs',79,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:articles_auteur');
	$l2 = _T('public|spip|ecrire:suite');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
				<h4><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'" title="' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a></h4>	
					' .
(($t1 = BOUCLE_articles_auteurhtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
					<h3><em>' .
		$l1 .
		'</em></h3>
					<ul>
						') . $t1 . (	'
						<li><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
		'" title="' .
		$l2 .
		'">[...]</a></li>
					</ul>
					')) :
		'') .
'
				');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteurs @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_mots_eclushtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'mots'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_mots_eclus';
		$command['from'] = array('mots' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.id_mot");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('REGEXP', 'mots.type', "'^_config'"), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_mots_eclus',99,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_mots_eclus @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_motshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_mots';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')));
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_articles_mots',107,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
								<li>
									<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" title="' .
interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
								</li>
							');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_mots @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_motshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'mots'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_mots';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("mots.id_mot",
		"mots.titre");
		$command['orderby'] = array('mots.titre');
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_mots',100,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:info_articles_lies_mot');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

		$t0 .= (
'
					<li>
							<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" title="' .
$l1 .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
						' .
(($t1 = BOUCLE_articles_motshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		'') .
'						
					</li>
				');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_mots @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_Forums_Bouclehtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$save_numrows = (isset($Numrows['_forums_fils']) ? $Numrows['_forums_fils'] : array());
	$t0 = (($t1 = BOUCLE_forums_filshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}


function BOUCLE_forums_filshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'forum';
		$command['id'] = '_forums_fils';
		$command['from'] = array('forum' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_objet AS id_article");
		$command['orderby'] = array('forum.date_heure');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('forum.statut','publie,prop','publie',''), 
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_forums_fils',145,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:par_auteur');
	$l2 = _T('public|spip|ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
						<ul>
							<li>
								<div class="forum">
									<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
									<div class="forum-chapo">
										<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(liens_nofollow(safehtml(typo(interdit_html($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))) .
'</div>
										' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))))!=='' ?
		((	', ' .
	$l1 .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
									</div><!-- forum-chapo -->
									<div class=" forum-item">
										' .
interdire_scripts(liens_nofollow(safehtml(propre(interdit_html($Pile[$SP]['texte']), $connect, $Pile[0])))) .
'
										' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(liens_nofollow(safehtml(typo(interdit_html(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false))), "TYPO", $connect, $Pile[0])))) .
	'</a></div>')) :
		'') .
'
										' .
(($t1 = strval(filtre_url_reponse_forum(spip_htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(calcul_parametres_forum($Pile[0],$Pile[$SP]['id_forum'],'forums',$Pile[$SP]['id_forum']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
									</div><!-- forum-item -->
								</div><!-- forum -->
							</li>
						</ul>
							' .
BOUCLE_Forums_Bouclehtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_forums_fils @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_forumshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['pagination'] = array((isset($Pile[0]['debut_forums']) ? $Pile[0]['debut_forums'] : null), 20);
	if (!isset($command['table'])) {
		$command['table'] = 'forum';
		$command['id'] = '_forums';
		$command['from'] = array('forum' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_objet AS id_article");
		$command['orderby'] = array('forum.date_heure DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('forum.statut','publie,prop','publie',''), 
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'forum.objet', sql_quote('article')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_forums',126,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_forums']['compteur_boucle'] = 0;
	$Numrows['_forums']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_forums']) ? $Pile[0]['debut_forums'] : _request('debut_forums');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_forums'] = quete_debut_pagination('id_forum',$Pile[0]['@id_forum'] = substr($debut_boucle,1),20,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_forums']['total']-1)/(20))*(20)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_forums']['total'] : $debut_boucle + 19), $Numrows['_forums']['total'] - 1);
	$Numrows['_forums']['grand_total'] = $Numrows['_forums']['total'];
	$Numrows['_forums']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_forums']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_forums']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:par_auteur');
	$l2 = _T('public|spip|ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_forums']['compteur_boucle']++;
		if ($Numrows['_forums']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_forums']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
				<li>
					<div class="forum-fil">
						<div class="forum">
							<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
							<div class="forum-chapo">
								<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(liens_nofollow(safehtml(typo(interdit_html($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))) .
'</div>
								' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))))!=='' ?
		((	', ' .
	$l1 .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
							</div><!-- forum-chapo -->
							<div class=" forum-item" style="background-color: #ffe;">
								' .
interdire_scripts(liens_nofollow(safehtml(propre(interdit_html($Pile[$SP]['texte']), $connect, $Pile[0])))) .
'
								' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(liens_nofollow(safehtml(typo(interdit_html(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false))), "TYPO", $connect, $Pile[0])))) .
	'</a></div>')) :
		'') .
'
								' .
(($t1 = strval(filtre_url_reponse_forum(spip_htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(calcul_parametres_forum($Pile[0],$Pile[$SP]['id_forum'],'forums',$Pile[$SP]['id_forum']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
							</div><!-- forum-item -->
						</div><!-- forum -->
						' .
(($t1 = BOUCLE_forums_filshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'') .
'
					</div><!-- forum-fil -->
				</li>
			');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_forums @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_rubriquehtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$command['pagination'] = array((isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : null), 15);

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_rubrique';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+articles.titre AS num",
		"articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('NOT', 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT'))), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_articles_rubrique',190,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_articles_rubrique']['compteur_boucle'] = 0;
	$Numrows['_articles_rubrique']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : _request('debut_articles_rubrique');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_rubrique'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),15,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_rubrique']['total']-1)/(15))*(15)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_articles_rubrique']['total'] : $debut_boucle + 14), $Numrows['_articles_rubrique']['total'] - 1);
	$Numrows['_articles_rubrique']['grand_total'] = $Numrows['_articles_rubrique']['total'];
	$Numrows['_articles_rubrique']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_rubrique']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_articles_rubrique']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_articles_rubrique']['compteur_boucle']++;
		if ($Numrows['_articles_rubrique']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_rubrique']['compteur_boucle']-1 > $fin_boucle) break;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
							<li>
								<a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
							</li>
							');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_rubrique @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rub_en_courshtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_rub_en_cours';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
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
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_rub_en_cours',212,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], 'oui', $Pile[$SP]['titre']);
		$t0 .= (
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',213,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rub_en_cours @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_article_principalhtml_acfb689da8b7f0df9e71fabce85f186f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article_principal';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_trad",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.id_secteur",
		"articles.surtitre",
		"articles.soustitre",
		"articles.date",
		"articles.chapo",
		"articles.texte",
		"articles.ps",
		"articles.url_site",
		"articles.nom_site");
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
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_article_principal',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], 'oui', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
	<title>' .
interdire_scripts(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
' - [' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
']</title>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' article sect' .
$Pile[$SP]['id_secteur'] .
' ' .
BOUCLE_rubriques_bodyhtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP) .
' art' .
$Pile[$SP]['id_article'] .
'">
<div id="page" class="article art' .
$Pile[$SP]['id_article'] .
'">
<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

    <div id="bloc-contenu">
      <div class="article-info-rubrique">
        <h5>
        <a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public|spip|ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'">' .
_T('public|spip|ecrire:accueil_site') .
'</a>
        ' .
(($t1 = BOUCLE_rubriques_cheminhtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
            ' . $t1) :
		'') .
'
        </h5>

        ' .
(($t1 = BOUCLE_traductionshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
            <div class="petit-info" style="text-align:right">' .
		_T('public|spip|ecrire:titre_langue_trad_article') .
		' 
            ') . $t1 . '
            </div>
        ') :
		'') .
'
        
        <div class="ligne-debut"></div><!-- ligne-debut -->
      </div><!-- article-info-rubrique -->
      
      <div class="cartouche">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'160','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<div  class="surtitre">') . $t1 . '</div>') :
		'') .
'
			<h1 class="titre-article">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<div class="sous-titre">') . $t1 . '</div>') :
		'') .
'
      		<div class="detail">
				' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span class="date">' . $t1) :
		'') .
' ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . '</span>') :
		'') .
' 
				' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('objet'=>'article','id_objet' => $Pile[$SP]['id_article'],'id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_article_principal',52,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public|spip|ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
     		 </div><!-- detail -->
				
      </div><!-- cartouche -->


		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['chapo'], $connect, $Pile[0]),'560','0')))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect, $Pile[0]),'560','0')))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['ps'], $connect, $Pile[0]))))!=='' ?
		((	'<div class="ps">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<div class="notes">' . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<div class="chapo">' .
	_T('public|spip|ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : calculer_url($Pile[$SP]['url_site'],'','url', $connect))) .
	'</a></div>')) :
		'') .
'
		<br class="nettoyeur" />


		' .
recuperer_fond( 'inc/inc-art-documents' , array_merge($Pile[0],array('id_article' => $Pile[$SP]['id_article'] )), array('compil'=>array('squelettes/article.html','html_acfb689da8b7f0df9e71fabce85f186f','_article_principal',60,$GLOBALS['spip_lang'])), _request('connect')) .
'

		' .
(quete_petitions($Pile[$SP]['id_article'],'articles','_article_principal','', $Cache)  ?
		(' ' . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-petition') . ', array_merge('.var_export($Pile[0],1).',array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',61,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>') :
		'') .
'
		
		<!-- Derniers articles des auteurs de l\'article -->
		' .
(($t1 = BOUCLE_auteurshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<div class="ps" id="articles-recents-auteur">
				' . $t1 . '
			</div><!-- notes chapo -->
		') :
		'') .
'

		<!-- Mots cles -->
		' .
BOUCLE_mots_eclushtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_motshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="ps" id="mots-cles_associes">
			<h2>' .
		_T('public|spip|ecrire:mots_clefs') .
		'</h2>
			<ul title="' .
		_T('public|spip|ecrire:mots_clefs') .
		'">
				') . $t1 . '
			</ul>
		</div><!-- menu -->
		') :
		'') .
'

		<!-- Forums -->
		' .
(($t1 = strval(filtre_url_reponse_forum(spip_htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(calcul_parametres_forum($Pile[0],null,'articles',$Pile[$SP]['id_article']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre">
			<h5><a href="' . $t1 . (	'">' .
	_T('public|spip|ecrire:repondre_article') .
	'</a></h5>
		</div>')) :
		'') .
'
		' .
(($t1 = BOUCLE_forumshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public|spip|ecrire:forum') .
		'</h2>
			' .
		filtre_pagination_dist($Numrows["_forums"]["grand_total"],
 		'_forums',
		isset($Pile[0]['debut_forums'])?$Pile[0]['debut_forums']:intval(_request('debut_forums')),
		20, false, '', '', array()) .
		'
		<ul class="forum-total">
			') . $t1 . (	'
		</ul><!-- forum-total -->
		
		' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_forums"]["grand_total"],
 		'_forums',
		isset($Pile[0]['debut_forums'])?$Pile[0]['debut_forums']:intval(_request('debut_forums')),
		20, true, '', '', array())))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_forums']['total'] .
			'/' .
			(isset($Numrows['_forums']['grand_total'])
			? $Numrows['_forums']['grand_total'] : $Numrows['_forums']['total']) .
			' ' .
			_T('public|spip|ecrire:messages_forum') .
			'</div>
			</div>
			<div class="ligne2">
        		') . $t3 . '
			</div>
		</div><!-- pagination -->') :
				'') .
		'

		')) :
		'') .
'
	</div><!-- bloc-contenu -->
	
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
    <div id="encart"> 
      ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',188,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		<!-- Derniers articles dans la meme rubrique -->
		' .
(($t1 = BOUCLE_articles_rubriquehtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<div class="menu" id="articles_meme_rubrique">
			<h2 class="structure">' .
		_T('public|spip|ecrire:articles_recents') .
		'</h2>
				' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		15, false, '', '', array()) .
		'
				<ul>
					<li>
						<a href="' .
		spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'/' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">' .
		_T('public|spip|ecrire:meme_rubrique') .
		'</a>
						<ul>
							') . $t1 . (	'
						</ul>
					</li>
				</ul>
				' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		15, true, '', '', array()) .
		'
			</div><!-- menu -->
		')) :
		'') .
'

	</div><!-- encart -->
	
' .
BOUCLE_rub_en_courshtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',215,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>
');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_article_principal @ squelettes/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/article.html
// Temps de compilation total: 229.277 ms
//

function html_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_article_principalhtml_acfb689da8b7f0df9e71fabce85f186f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_article\' => ' . argumenter_squelette(@$Pile[0]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_acfb689da8b7f0df9e71fabce85f186f\',\'\',221,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
')));

	return analyse_resultat_skel('html_acfb689da8b7f0df9e71fabce85f186f', $Cache, $page, 'squelettes/article.html');
}
?>