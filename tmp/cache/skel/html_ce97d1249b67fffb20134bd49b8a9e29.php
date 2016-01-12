<?php

/*
 * Squelette : squelettes/auteur.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:12:33 GMT
 * Boucles :   _articles, _auteurs, _auteur_principal
 */ 

function BOUCLE_articleshtml_ce97d1249b67fffb20134bd49b8a9e29(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.titre",
		"articles.id_article",
		"articles.lang",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.date");
		$command['orderby'] = array('articles.titre');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/auteur.html','html_ce97d1249b67fffb20134bd49b8a9e29','_articles',39,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'
			<h3><a href="' .
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
'</a></h3>
			<div class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
			</div>
		');
		$t0 .= ((strlen($t1) && strlen($t0)) ? '<br />' : '') . $t1;
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles @ squelettes/auteur.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_auteurshtml_ce97d1249b67fffb20134bd49b8a9e29(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteurs';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens','L2' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array("auteurs.id_auteur");
		$command['select'] = array("auteurs.nom",
		"auteurs.id_auteur");
		$command['orderby'] = array('auteurs.nom');
		$command['where'] = 
			array(
quete_condition_statut('L2.statut','!','publie',''), 
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''));
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
		array('squelettes/auteur.html','html_ce97d1249b67fffb20134bd49b8a9e29','_auteurs',55,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
						<ul>
							<li>
								<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a>	
							</li>
						</ul>
						');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteurs @ squelettes/auteur.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_auteur_principalhtml_ce97d1249b67fffb20134bd49b8a9e29(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteur_principal';
		$command['from'] = array('auteurs' => 'spip_auteurs');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.id_auteur",
		"auteurs.lang",
		"auteurs.nom",
		"auteurs.bio",
		"auteurs.url_site",
		"auteurs.nom_site",
		"auteurs.email");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'auteurs.id_auteur', sql_quote(@$Pile[0]['id_auteur'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/auteur.html','html_ce97d1249b67fffb20134bd49b8a9e29','_auteur_principal',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

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
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))) .
' - [' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
']</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0]))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend', ''),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',9,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' auteur aut' .
$Pile[$SP]['id_auteur'] .
'">
<div id="page" class="auteur">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<div class="cartouche">
		' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			<h1 class="">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</h1>
			<div class="texte">
				' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['bio'], $connect, $Pile[0]))))!=='' ?
		((	'<div  class="bio">') . $t1 . '</div>') :
		'') .
'
				' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<b>' .
	interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])) .
	' : <a href="') . $t1 . (	'">' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'</a></b><br />')) :
		'') .
'
				' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		($t1 . '<br />') :
		'') .
'
				<br />
				' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_ECRIRE_AUTEUR',
	array($Pile[$SP]['id_auteur'],@$Pile[0]['id_article'],$Pile[$SP]['email']),
	array('squelettes/auteur.html','html_ce97d1249b67fffb20134bd49b8a9e29','_auteur_principal',27,$GLOBALS['spip_lang']))))!=='' ?
		((	'<h2 id="message">' .
	_T('public|spip|ecrire:info_envoyer_message_prive') .
	'</h2>') . $t1) :
		'') .
'
			</div><!-- texte -->
		</div><!-- cartouche -->
		<!-- Articles de l\'auteur -->
		<h2>' .
_T('public|spip|ecrire:articles_auteur') .
'</h2>
		' .
(($t1 = BOUCLE_articleshtml_ce97d1249b67fffb20134bd49b8a9e29($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		('
		')) .
'
	</div><!-- bloc-contenu -->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',53,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

		' .
(($t1 = BOUCLE_auteurshtml_ce97d1249b67fffb20134bd49b8a9e29($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<!-- Tous les auteurs -->
			<div class="menu">
				<ul class="titre">
					<li><b>' .
		_T('public|spip|ecrire:icone_tous_auteur') .
		'</b>
						') . $t1 . '
					</li>
				</ul>
			</div><!-- menu -->
		') :
		'') .
'
	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',72,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',73,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteur_principal @ squelettes/auteur.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/auteur.html
// Temps de compilation total: 45.258 ms
//

function html_ce97d1249b67fffb20134bd49b8a9e29($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_auteur_principalhtml_ce97d1249b67fffb20134bd49b8a9e29($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_auteur\' => ' . argumenter_squelette(@$Pile[0]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_ce97d1249b67fffb20134bd49b8a9e29\',\'\',79,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
'))) .
'
 ');

	return analyse_resultat_skel('html_ce97d1249b67fffb20134bd49b8a9e29', $Cache, $page, 'squelettes/auteur.html');
}
?>