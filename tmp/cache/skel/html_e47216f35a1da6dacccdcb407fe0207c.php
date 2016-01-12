<?php

/*
 * Squelette : squelettes-dist/article.html
 * Date :      Tue, 12 Jan 2016 07:50:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:22:50 GMT
 * Boucles :   _ariane, _articles_rubrique, _principale
 */ 

function BOUCLE_arianehtml_e47216f35a1da6dacccdcb407fe0207c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		$command['id'] = '_ariane';
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
		array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_ariane',27,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')) .
'</a>');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_ariane @ squelettes-dist/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_rubriquehtml_e47216f35a1da6dacccdcb407fe0207c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_rubrique';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_articles_rubrique',69,$GLOBALS['spip_lang'])
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
'"' .
(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a></li>
					');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_rubrique @ squelettes-dist/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_principalehtml_e47216f35a1da6dacccdcb407fe0207c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_principale';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.id_article",
		"articles.surtitre",
		"articles.soustitre",
		"articles.date",
		"articles.url_site",
		"articles.nom_site",
		"articles.ps");
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
		array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie6"> <![endif]-->
<!--[if IE 7 ]> <html dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js"> <!--<![endif]-->
<head>
  <script type=\'text/javascript\'>/*<![CDATA[*/(function(H){H.className=H.className.replace(/\\bno-js\\b/,\'js\')})(document.documentElement);/*]]>*/</script>
  <title>' .
(($t1 = strval(interdire_scripts(textebrut(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
'</title>
  ' .
(($t1 = strval(interdire_scripts(attribut_html(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], is_numeric('150')?intval('150'):500, $connect, !is_numeric('150')?'150':null)))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
  ' .
(($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))))))!=='' ?
		('<link rel="canonical" href="' . $t1 . '" />') :
		'') .
'
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>

<body class="pas_surlignable page_article">
<div class="page">

	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/header') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/nav') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',20,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
	<div class="main">
		
		<div class="wrapper hfeed">
		<div class="content hentry" id="content">
			<p class="arbo"><a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public|spip|ecrire:accueil_site') .
'</a>' .
BOUCLE_arianehtml_e47216f35a1da6dacccdcb407fe0207c($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</p>
	
			<div class="cartouche clearfix">
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<p class="surtitre">') . $t1 . '</p>') :
		'') .
'
				<h1 class="surlignable">' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','*'))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</h1>
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<p class="soustitre">') . $t1 . '</p>') :
		'') .
'
				<p class="info-publi"><abbr class="published" title="' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'">' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</abbr>' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('objet'=>'article','id_objet' => $Pile[$SP]['id_article'],'id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',29,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="sep">, </span><span class="auteurs">' .
	_T('public|spip|ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'</p>
				
				' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/article_traductions', array('lang' => $GLOBALS["spip_lang"] ,
	'id_article'=>$Pile[$SP]['id_article'],
	'id'=>$Pile[$SP]['id_article'],
	'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',35,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'</div>
			
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['chapo'], $connect, $Pile[0]),'672','*')))))!=='' ?
		((	'<div class="chapo surlignable">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect, $Pile[0]),'672','*')))))!=='' ?
		((	'<div class="texte surlignable clearfix">') . $t1 . '</div>') :
		'') .
'
		
			' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<hr /><p class="hyperlien">' .
	_T('public|spip|ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['ps'], $connect, $Pile[0]),'672','*')))))!=='' ?
		((	'<div class="ps surlignable"><hr />') . $t1 . '</div>') :
		'') .
'
		
			
			' .
recuperer_fond( 'inclure/documents' , array_merge($Pile[0],array('id_article' => $Pile[$SP]['id_article'] )), array('compil'=>array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',37,$GLOBALS['spip_lang'])), _request('connect')) .
'
	
			' .
((quete_petitions($Pile[$SP]['id_article'],'articles','_principale','', $Cache))  ?
		(' ' . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/petition') . ', array_merge('.var_export($Pile[0],1).',array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',38,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>') :
		'') .
'
			
			' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<div class="notes"><hr />' . $t1 . '</div>') :
		'') .
'
			
			
			' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/forum') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',52,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
			' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_FORUM',
	array($Pile[$SP]['id_article'],@$Pile[0]['id_forum'],@$Pile[0]['ajouter_mot'],@$Pile[0]['ajouter_groupe'],@$Pile[0]['forcer_previsu'],$Pile[$SP]['id_article'],@$Pile[0]['id_breve'],$Pile[$SP]['id_rubrique'],@$Pile[0]['id_syndic']),
	array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',44,$GLOBALS['spip_lang'], 'articles',4))))!=='' ?
		((	'<h2 class="forum-titre">' .
	_T('forum:form_pet_message_commentaire') .
	'</h2>
			') . $t1) :
		'') .
'
	
		</div><!--.content-->
		</div><!--.wrapper-->
	
	
		<div class="aside">
		
			' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/navsub') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',61,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
			' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',62,$GLOBALS['spip_lang'])) .
'
	
			 
			' .
(($t1 = BOUCLE_articles_rubriquehtml_e47216f35a1da6dacccdcb407fe0207c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<div class="menu">
				<h2>' .
		_T('public|spip|ecrire:meme_rubrique') .
		'</h2>
				<ul>
					') . $t1 . '
				</ul>
			</div>
			') :
		'') .
'
	
			
			' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/article_mots', array('lang' => $GLOBALS["spip_lang"] ,
	'id_article'=>$Pile[$SP]['id_article'],
	'id'=>$Pile[$SP]['id_article'],
	'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/article.html','html_e47216f35a1da6dacccdcb407fe0207c','_principale',81,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'</div><!--.aside-->
	</div><!--.main-->

	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/footer') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes-dist/article.html\',\'html_e47216f35a1da6dacccdcb407fe0207c\',\'\',86,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--.page-->
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
		spip_log(intval(1000*$timer)."ms BOUCLE_principale @ squelettes-dist/article.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes-dist/article.html
// Temps de compilation total: 75.711 ms
//

function html_e47216f35a1da6dacccdcb407fe0207c($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_e47216f35a1da6dacccdcb407fe0207c($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_e47216f35a1da6dacccdcb407fe0207c', $Cache, $page, 'squelettes-dist/article.html');
}
?>