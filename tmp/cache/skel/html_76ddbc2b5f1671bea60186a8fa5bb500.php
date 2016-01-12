<?php

/*
 * Squelette : squelettes/agenda.html
 * Date :      Tue, 12 Jan 2016 13:27:09 GMT
 * Compile :   Tue, 12 Jan 2016 13:27:13 GMT
 * Boucles :   _langue_contexte_exclus, _langues, _article_langue, _archive
 */ 

function BOUCLE_langue_contexte_exclushtml_76ddbc2b5f1671bea60186a8fa5bb500(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		array('squelettes/agenda.html','html_76ddbc2b5f1671bea60186a8fa5bb500','_langue_contexte_exclus',25,$GLOBALS['spip_lang'])
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
		spip_log(intval(1000*$timer)."ms BOUCLE_langue_contexte_exclus @ squelettes/agenda.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_langueshtml_76ddbc2b5f1671bea60186a8fa5bb500(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		array('squelettes/agenda.html','html_76ddbc2b5f1671bea60186a8fa5bb500','_langues',26,$GLOBALS['spip_lang'])
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
		spip_log(intval(1000*$timer)."ms BOUCLE_langues @ squelettes/agenda.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_article_languehtml_76ddbc2b5f1671bea60186a8fa5bb500(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$command['pagination'] = array((isset($Pile[0]['debut_article_langue']) ? $Pile[0]['debut_article_langue'] : null), 10);

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'.'archives'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article_langue';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
		"articles.date_redac",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date_redac');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array('<', 'TIMESTAMPDIFF(HOUR,articles.date_redac,NOW())/24', "1"), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles'.'archives')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/agenda.html','html_76ddbc2b5f1671bea60186a8fa5bb500','_article_langue',41,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_article_langue']['compteur_boucle'] = 0;
	$Numrows['_article_langue']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_article_langue']) ? $Pile[0]['debut_article_langue'] : _request('debut_article_langue');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_article_langue'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_article_langue']['total']-1)/(10))*(10)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_article_langue']['total'] : $debut_boucle + 9), $Numrows['_article_langue']['total'] - 1);
	$Numrows['_article_langue']['grand_total'] = $Numrows['_article_langue']['total'];
	$Numrows['_article_langue']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_article_langue']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_article_langue']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_article_langue']['compteur_boucle']++;
		if ($Numrows['_article_langue']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_article_langue']['compteur_boucle']-1 > $fin_boucle) break;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
    <hr />
        <h4>' .
nom_jour(normaliser_date($Pile[$SP]['date_redac'])) .
' ' .
affdate(normaliser_date($Pile[$SP]['date_redac'])) .
(($t1 = strval(((heures(normaliser_date($Pile[$SP]['date_redac'])) != '0') ? (	(($t2 = strval(heures(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
			($t2 . ':') :
			'') .
	(($t2 = strval(minutes(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
			($t2 . (	' ' .
		_T('public|spip|ecrire:heures'))) :
			'')):'')))!=='' ?
		(' — ' . $t1) :
		'') .
'</h4>
    <hr />
      ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
      <h3><a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a></h3>
      ' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		('<div class="sous-titre">' . $t1 . '</div>') :
		'') .
'
      <div class="detail">
      </div><!-- detail -->
      ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect, $Pile[0]) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))!=='' ?
			((	'<div class="">') . $t2 . (	'</div>
		<div class="suite"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'" title="...' .
		_T('public|spip|ecrire:suite') .
		' : ' .
		interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
		'" >' .
		_T('public|spip|ecrire:suite') .
		'</a></div>')) :
			'') .
	'
		'):(	interdire_scripts((propre($Pile[$SP]['chapo'], $connect, $Pile[0]) ? (	(($t3 = strval(interdire_scripts(propre($Pile[$SP]['chapo'], $connect, $Pile[0]))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public|spip|ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
			'" >' .
			_T('public|spip|ecrire:suite') .
			'</a></div>')) :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'300'))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public|spip|ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
			'" >' .
			_T('public|spip|ecrire:suite') .
			'</a></div>')) :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="texte">
	<div class="extrait">' . $t1 . '</div><!-- fin extrait -->
      </div>') :
		'') .
'
      <br />
    ');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_article_langue @ squelettes/agenda.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_archivehtml_76ddbc2b5f1671bea60186a8fa5bb500(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'.'archives'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_archive';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date_redac",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date_redac DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles'.'archives')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/agenda.html','html_76ddbc2b5f1671bea60186a8fa5bb500','_archive',77,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_archive']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_archive']['compteur_boucle']++;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		' .
(($t1 = strval(unique(annee(normaliser_date($Pile[$SP]['date_redac'])))))!=='' ?
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
(($t1 = strval(nom_mois(unique(affdate(normaliser_date($Pile[$SP]['date_redac']),'Y-m')))))!=='' ?
		((	'
			' .
	(unique(annee(normaliser_date($Pile[$SP]['date_redac'])),'nouvelle') ? '':'</ul></li>') .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_archive @ squelettes/agenda.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/agenda.html
// Temps de compilation total: 116.907 ms
//

function html_76ddbc2b5f1671bea60186a8fa5bb500($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

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
_T('public|spip|ecrire:icone_agenda') .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

	<div id="bloc-contenu">
		' .
BOUCLE_langue_contexte_exclushtml_76ddbc2b5f1671bea60186a8fa5bb500($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_langueshtml_76ddbc2b5f1671bea60186a8fa5bb500($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
_T('public|spip|ecrire:icone_agenda') .
'</h2>

    ' .
(($t1 = BOUCLE_article_languehtml_76ddbc2b5f1671bea60186a8fa5bb500($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
    ' . $t1 . '
    ') :
		('
    ')) .
'

    <hr />
		
	
		<h3>' .
_T('public|spip|ecrire:info_visites_par_mois') .
'</h3>
	' .
(($t1 = BOUCLE_archivehtml_76ddbc2b5f1671bea60186a8fa5bb500($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',107,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',108,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',109,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',112,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/agenda.html\',\'html_76ddbc2b5f1671bea60186a8fa5bb500\',\'\',113,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_76ddbc2b5f1671bea60186a8fa5bb500', $Cache, $page, 'squelettes/agenda.html');
}
?>