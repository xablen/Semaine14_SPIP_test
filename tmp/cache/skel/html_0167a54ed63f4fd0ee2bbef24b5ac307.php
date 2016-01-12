<?php

/*
 * Squelette : squelettes/inc/inc-sommaire-edito.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:25 GMT
 * Boucles :   _articles_edito, _articles_edito2, _rub_first, _rubriques_edito
 */ 

function BOUCLE_articles_editohtml_0167a54ed63f4fd0ee2bbef24b5ac307(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_edito';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), (!(is_array(@$Pile[0]['lang'])?count(@$Pile[0]['lang']):strlen(@$Pile[0]['lang'])) ? '' : ((is_array(@$Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')))), 
			array('=', 'L2.titre', "'Editorial'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-edito.html','html_0167a54ed63f4fd0ee2bbef24b5ac307','_articles_edito',20,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect, $Pile[0]) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre($Pile[$SP]['chapo'], $connect, $Pile[0]) ? (	(($t3 = strval(interdire_scripts(propre($Pile[$SP]['chapo'], $connect, $Pile[0]))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public|spip|ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
	'" >' .
	_T('public|spip|ecrire:suite') .
	'</a></div>
	</div><!-- fin chapo -->')) :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_edito @ squelettes/inc/inc-sommaire-edito.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_edito2html_0167a54ed63f4fd0ee2bbef24b5ac307(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_edito2';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), (!(is_array(@$Pile[0]['lang'])?count(@$Pile[0]['lang']):strlen(@$Pile[0]['lang'])) ? '' : ((is_array(@$Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')))), 
			array('=', 'L2.titre', "'Editorial'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-edito.html','html_0167a54ed63f4fd0ee2bbef24b5ac307','_articles_edito2',60,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect, $Pile[0]) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre($Pile[$SP]['chapo'], $connect, $Pile[0]) ? (	(($t3 = strval(interdire_scripts(propre($Pile[$SP]['chapo'], $connect, $Pile[0]))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public|spip|ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
	'" >' .
	_T('public|spip|ecrire:suite') .
	'</a></div>
	</div><!-- fin chapo -->')) :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_edito2 @ squelettes/inc/inc-sommaire-edito.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rub_firsthtml_0167a54ed63f4fd0ee2bbef24b5ac307(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rub_first';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0), (!(is_array(@$Pile[0]['lang'])?count(@$Pile[0]['lang']):strlen(@$Pile[0]['lang'])) ? '' : ((is_array(@$Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-edito.html','html_0167a54ed63f4fd0ee2bbef24b5ac307','_rub_first',44,$GLOBALS['spip_lang'])
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
interdire_scripts((propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0]) ? (	(($t2 = strval(interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect, $Pile[0]))))!=='' ?
			((	'<h3 class="edito-titre descriptif-site">' .
		interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
		'</h3>
		<div class="chapo descriptif_site">') . $t2 . '</div>') :
			'') .
	'
	'):(	(($t2 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
			((	'<h3 class="edito-titre"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></h3>') :
			'') .
	'
        ' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0'))))!=='' ?
			((	'<span style="float:right;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></span>') :
			'') .
	'
        ' .
	(($t2 = strval(interdire_scripts(((($a = propre($Pile[$SP]['descriptif'], $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0]))))))!=='' ?
			((	'<div class="chapo ' .
		interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
		'">
        	') . $t2 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
        </div>') :
			'') .
	'
'))) .
'
	');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rub_first @ squelettes/inc/inc-sommaire-edito.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubriques_editohtml_0167a54ed63f4fd0ee2bbef24b5ac307(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubriques_edito';
		$command['from'] = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("rubriques.id_rubrique");
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['join'] = array('L1' => array('rubriques','id_objet','id_rubrique','L1.objet='.sql_quote('rubrique')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), (!(is_array(@$Pile[0]['lang'])?count(@$Pile[0]['lang']):strlen(@$Pile[0]['lang'])) ? '' : ((is_array(@$Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')))), 
			array('=', 'L2.titre', "'Editorial'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-edito.html','html_0167a54ed63f4fd0ee2bbef24b5ac307','_rubriques_edito',8,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'
      ' .
(($t1 = strval(interdire_scripts(((($a = propre($Pile[$SP]['descriptif'], $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0]))))))!=='' ?
		((	'<div class="chapo ' .
	interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
	'">') . $t1 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
       </div>') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_edito @ squelettes/inc/inc-sommaire-edito.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-sommaire-edito.html
// Temps de compilation total: 52.363 ms
//

function html_0167a54ed63f4fd0ee2bbef24b5ac307($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'   
' .
(($t1 = BOUCLE_rubriques_editohtml_0167a54ed63f4fd0ee2bbef24b5ac307($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
' . $t1 . (	'

	' .
		(($t3 = BOUCLE_articles_editohtml_0167a54ed63f4fd0ee2bbef24b5ac307($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				('
	' . $t3 . '
	') :
				'') .
		'

')) :
		((	'

	' .
	(($t2 = BOUCLE_rub_firsthtml_0167a54ed63f4fd0ee2bbef24b5ac307($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			('
	' . $t2 . (	'

	' .
			(($t4 = BOUCLE_articles_edito2html_0167a54ed63f4fd0ee2bbef24b5ac307($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					('
	' . $t4 . '
	') :
					'') .
			'

	')) :
			((	'
	' .
		
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-install') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-sommaire-edito.html\',\'html_0167a54ed63f4fd0ee2bbef24b5ac307\',\'\',83,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	'))) .
	'
	'))) .
'
    ');

	return analyse_resultat_skel('html_0167a54ed63f4fd0ee2bbef24b5ac307', $Cache, $page, 'squelettes/inc/inc-sommaire-edito.html');
}
?>