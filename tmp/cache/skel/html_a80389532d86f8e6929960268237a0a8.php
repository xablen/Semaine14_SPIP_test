<?php

/*
 * Squelette : squelettes/inc/inc-trad.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:22:49 GMT
 * Boucles :   _articles_langue, _articles
 */ 

function BOUCLE_articles_languehtml_a80389532d86f8e6929960268237a0a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_langue';
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
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-trad.html','html_a80389532d86f8e6929960268237a0a8','_articles_langue',5,$GLOBALS['spip_lang'])
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_langue @ squelettes/inc/inc-trad.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articleshtml_a80389532d86f8e6929960268237a0a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.lang",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.titre");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '0,3';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-trad.html','html_a80389532d86f8e6929960268237a0a8','_articles',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . (	(($t2 = strval(traduire_nom_langue(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
			(' - <dfn class="lang">' . $t2 . '</dfn>') :
			'') .
	'</span>')) :
		'') .
' 
          	    
              <a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'&amp;var_lang=' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect, null))))))!=='' ?
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles @ squelettes/inc/inc-trad.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-trad.html
// Temps de compilation total: 8.588 ms
//

function html_a80389532d86f8e6929960268237a0a8($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    ' .
BOUCLE_articles_languehtml_a80389532d86f8e6929960268237a0a8($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    ' .
(($t1 = BOUCLE_articleshtml_a80389532d86f8e6929960268237a0a8($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:info_multilinguisme') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public|spip|ecrire:info_langues') .
		'<br />
              <small>' .
		_T('public|spip|ecrire:articles_recents') .
		'</small>
            </b>
          <ul>

            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		''));

	return analyse_resultat_skel('html_a80389532d86f8e6929960268237a0a8', $Cache, $page, 'squelettes/inc/inc-trad.html');
}
?>