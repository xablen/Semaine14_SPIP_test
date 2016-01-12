<?php

/*
 * Squelette : squelettes/resume.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:21:23 GMT
 * Boucles :   _langue_contexte_exclus, _langues, _archive
 */ 

function BOUCLE_langue_contexte_exclushtml_3c92c30bfff37f837ad27bbea4977d3c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'.'contexte'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_langue_contexte_exclus';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles'.'contexte')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/resume.html','html_3c92c30bfff37f837ad27bbea4977d3c','_langue_contexte_exclus',26,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_langue_contexte_exclus @ squelettes/resume.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_langueshtml_3c92c30bfff37f837ad27bbea4977d3c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'.'contexte'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_langues';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.lang",
		"articles.id_article",
		"articles.titre");
		$command['orderby'] = array('articles.lang');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles'.'contexte')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/resume.html','html_3c92c30bfff37f837ad27bbea4977d3c','_langues',27,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

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
		spip_log(intval(1000*$timer)."ms BOUCLE_langues @ squelettes/resume.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_archivehtml_3c92c30bfff37f837ad27bbea4977d3c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_archive';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/resume.html','html_3c92c30bfff37f837ad27bbea4977d3c','_archive',45,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_archive']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_archive']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		' .
(($t1 = strval(interdire_scripts(unique(annee(normaliser_date($Pile[$SP]['date']))))))!=='' ?
		((	'
			' .
	(($Numrows['_archive']['compteur_boucle'] > '1') ? '</ul></li></ul></div>':'') .
	'
			<div id="plan">
			<h3>') . $t1 . '</h3>

			<ul>
		') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(nom_mois(unique(affdate(normaliser_date($Pile[$SP]['date']),'Y-m'))))))!=='' ?
		((	'
			' .
	interdire_scripts((unique(annee(normaliser_date($Pile[$SP]['date'])),'nouvelle') ? '':'</ul></li>')) .
	'
			  <li>') . $t1 . '
  				<ul>
		') :
		'') .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_archive @ squelettes/resume.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/resume.html
// Temps de compilation total: 31.786 ms
//

function html_3c92c30bfff37f837ad27bbea4977d3c($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

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
'] : Archives</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

	<div id="bloc-contenu">
		' .
BOUCLE_langue_contexte_exclushtml_3c92c30bfff37f837ad27bbea4977d3c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_langueshtml_3c92c30bfff37f837ad27bbea4977d3c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
_T('public|spip|ecrire:en_resume') .
'</h2>
		<h3>' .
_T('public|spip|ecrire:info_visites_par_mois') .
' ' .
(($t1 = strval(traduire_nom_langue(unique(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),'langues')))!=='' ?
		('<em>' . $t1 . '</em>') :
		'') .
'</h3>
	
	' .
(($t1 = BOUCLE_archivehtml_3c92c30bfff37f837ad27bbea4977d3c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
				</ul>
			  </li>
			</ul>
			</div><!-- plan -->
	') :
		'') .
'
	</div><!-- bloc-contenu -->

	
        

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',75,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',76,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',77,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',80,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/resume.html\',\'html_3c92c30bfff37f837ad27bbea4977d3c\',\'\',81,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_3c92c30bfff37f837ad27bbea4977d3c', $Cache, $page, 'squelettes/resume.html');
}
?>