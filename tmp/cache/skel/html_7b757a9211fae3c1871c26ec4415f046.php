<?php

/*
 * Squelette : squelettes/plan.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:12:14 GMT
 * Boucles :   _langue_contexte_exclus, _langues, _articles_racine, _articles, _sous_rubriques, _rubriques, _secteurs
 */ 

function BOUCLE_langue_contexte_exclushtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'rubriques'.'contexte'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_langue_contexte_exclus';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques'.'contexte')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_langue_contexte_exclus',24,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_langue_contexte_exclus @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_langueshtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'rubriques'.'contexte'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_langues';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.lang",
		"rubriques.id_rubrique",
		"rubriques.titre");
		$command['orderby'] = array('rubriques.lang');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques'.'contexte')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_langues',25,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(traduire_nom_langue(unique(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])),'lang')))!=='' ?
		((	'
				<li lang="' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">
					<a href="spip.php?action=converser&amp;redirect=' .
	self() .
	'&amp;var_lang=' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" hreflang="' .
	spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'">') . $t1 . '</a>
				</li>
			') :
		'');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_langues @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_racinehtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_racine';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_articles_racine',45,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
						<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a></li>
					');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_racine @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articleshtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_articles',57,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
										<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a></li>
									');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_sous_rubriqueshtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$save_numrows = (isset($Numrows['_rubriques']) ? $Numrows['_rubriques'] : array());
	$t0 = (($t1 = BOUCLE_rubriqueshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
					<ul>
						' . $t1 . '
					</ul>
				') :
		'');
	$Numrows['_rubriques'] = ($save_numrows);
	return $t0;
}


function BOUCLE_rubriqueshtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubriques';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_rubriques',52,$GLOBALS['spip_lang'])
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
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
								' .
(($t1 = BOUCLE_articleshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
								<ul>
									' . $t1 . '
								</ul>
								') :
		'') .
'
								' .
BOUCLE_sous_rubriqueshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP) .
'
							</li>
						');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_secteurshtml_7b757a9211fae3c1871c26ec4415f046(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_secteurs';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"0+rubriques.titre AS num1",
		"rubriques.titre");
		$command['orderby'] = array('rubriques.lang DESC', 'num1', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/plan.html','html_7b757a9211fae3c1871c26ec4415f046','_secteurs',39,$GLOBALS['spip_lang'])
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
(($t1 = strval(traduire_nom_langue(unique(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])),'langues')))!=='' ?
		('<h2>' . $t1 . '</h2>') :
		'') .
'
				<div class="plan-archives" style="clear:both;">
				' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logo_right spip_logos\" alt=\"\" style=\"float:right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0')) .
'
				<h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a></h3>
				</div>
				' .
(($t1 = BOUCLE_articles_racinehtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
				<ul>
					' . $t1 . '
				</ul>
				') :
		'') .
'
					' .
(($t1 = BOUCLE_rubriqueshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
					<ul>
						' . $t1 . '
					</ul>
				') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_secteurs @ squelettes/plan.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/plan.html
// Temps de compilation total: 38.962 ms
//

function html_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
'] : ' .
_T('public|spip|ecrire:plan_site') .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' plan">
<div id="page">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
			' .
BOUCLE_langue_contexte_exclushtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_langueshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div id="sommaire">
			<h4>' .
		_T('public|spip|ecrire:info_langues') .
		'</h4>
			<ul>
			') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		<h2>' .
_T('public|spip|ecrire:plan_site') .
'</h2>
		<div id="plan">
			' .
BOUCLE_secteurshtml_7b757a9211fae3c1871c26ec4415f046($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		</div><!-- plan -->
	</div><!-- bloc-contenu -->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',79,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',80,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',81,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',84,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/plan.html\',\'html_7b757a9211fae3c1871c26ec4415f046\',\'\',85,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_7b757a9211fae3c1871c26ec4415f046', $Cache, $page, 'squelettes/plan.html');
}
?>