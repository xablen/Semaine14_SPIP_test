<?php

/*
 * Squelette : notifications/article_publie.html
 * Date :      Tue, 12 Jan 2016 07:48:51 GMT
 * Compile :   Tue, 12 Jan 2016 08:19:40 GMT
 * Boucles :   _art
 */ 

function BOUCLE_arthtml_d63d27e1216aa6c9003b8f15632e183d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_art';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in)) : 
			array('=', 'articles.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('notifications/article_publie.html','html_d63d27e1216aa6c9003b8f15632e183d','_art',8,$GLOBALS['spip_lang'])
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
vide($Pile['vars'][$_zzz=(string)'auteurs'] = recuperer_fond('modeles/lesauteurs', array('objet'=>'article','id_objet' => $Pile[$SP]['id_article'],'id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('notifications/article_publie.html','html_d63d27e1216aa6c9003b8f15632e183d','_art',0,$GLOBALS['spip_lang'])), '')) .
filtre_nettoyer_titre_email_dist(_T('info_publie_1',array('nom_site_spip' => interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])), 'titre' => interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))) .
'

' .
_T('public|spip|ecrire:info_publie_2') .
'

' .
_T('info_publie_01',array('titre' => interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])), 'connect_nom' => interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'nom', null))))) .
'

' .
(($t1 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))!=='' ?
		('** ' . $t1 . ' **') :
		'') .
((table_valeur($Pile["vars"], (string)'auteurs', null))  ?
		(' ' . (	'
' .
	_T('info_les_auteurs_1',array('les_auteurs' => table_valeur($Pile["vars"], (string)'auteurs', null))))) :
		'') .
(($t1 = strval(_T('date_fmt_nomjour_date',array('nomjour' => interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))), 'date' => interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))))!=='' ?
		('
' . $t1) :
		'') .
'

' .
interdire_scripts(textebrut(couper(concat(propre($Pile[$SP]['chapo'], $connect, $Pile[0]),interdire_scripts(propre($Pile[$SP]['texte'], $connect, $Pile[0]))),'700'))) .
'

' .
(($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))))))!=='' ?
		('-> ' . $t1) :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_art @ notifications/article_publie.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette notifications/article_publie.html
// Temps de compilation total: 20.620 ms
//

function html_d63d27e1216aa6c9003b8f15632e183d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type: text/plain' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_arthtml_d63d27e1216aa6c9003b8f15632e183d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
'<' . '?php header("X-Spip-Filtre: '.'supprimer_tags|filtrer_entites|trim' . '"); ?'.'>');

	return analyse_resultat_skel('html_d63d27e1216aa6c9003b8f15632e183d', $Cache, $page, 'notifications/article_publie.html');
}
?>