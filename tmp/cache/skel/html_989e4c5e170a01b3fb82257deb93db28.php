<?php

/*
 * Squelette : ../plugins-dist/compagnon/compagnon/article_redaction.html
 * Date :      Tue, 12 Jan 2016 07:50:01 GMT
 * Compile :   Tue, 12 Jan 2016 08:03:10 GMT
 * Boucles :   _article_en_redaction
 */ 

function BOUCLE_article_en_redactionhtml_989e4c5e170a01b3fb82257deb93db28(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article_en_redaction';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.lang",
		"articles.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'articles.statut', "'prepa'"), 
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/compagnon/compagnon/article_redaction.html','html_989e4c5e170a01b3fb82257deb93db28','_article_en_redaction',1,$GLOBALS['spip_lang'])
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
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'fermer', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
' .
	boite_ouvrir(_T('compagnon:c_article_redaction'), 'compagnon') .
	'

' .
	_T('compagnon:c_article_redaction_texte') .
	'

' .
	boite_pied() .
	'
	<span class="target" data-target="#navigation li.editer_statut"></span>
	' .
	bouton_action(filtre_ok_aleatoire_dist(''),invalideur_session($Cache, generer_action_auteur('compagnon',(	'compris/' .
			interdire_scripts(invalideur_session($Cache, @$Pile[0]['id']))),invalideur_session($Cache, parametre_url(self(),'fermer','oui')))),'ajax') .
	'
' .
	boite_fermer() .
	'
')) :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_article_en_redaction @ ../plugins-dist/compagnon/compagnon/article_redaction.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/compagnon/compagnon/article_redaction.html
// Temps de compilation total: 8.131 ms
//

function html_989e4c5e170a01b3fb82257deb93db28($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_article_en_redactionhtml_989e4c5e170a01b3fb82257deb93db28($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_989e4c5e170a01b3fb82257deb93db28', $Cache, $page, '../plugins-dist/compagnon/compagnon/article_redaction.html');
}
?>