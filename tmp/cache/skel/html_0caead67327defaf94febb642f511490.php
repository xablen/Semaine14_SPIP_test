<?php

/*
 * Squelette : squelettes/rubrique.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:12:11 GMT
 * Boucles :   _rubriques_body, _rubriques_chemin, _type_miniplan, _rubrique_principal
 */ 

function BOUCLE_rubriques_bodyhtml_0caead67327defaf94febb642f511490(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		array('squelettes/rubrique.html','html_0caead67327defaf94febb642f511490','_rubriques_body',12,$GLOBALS['spip_lang'])
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_body @ squelettes/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubriques_cheminhtml_0caead67327defaf94febb642f511490(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		array('squelettes/rubrique.html','html_0caead67327defaf94febb642f511490','_rubriques_chemin',29,$GLOBALS['spip_lang'])
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubriques_chemin @ squelettes/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_type_miniplanhtml_0caead67327defaf94febb642f511490(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_type_miniplan';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("L1.id_objet AS id_rubrique",
		"L1.id_objet AS id_secteur");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('mots','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'mots.titre', "'Rub_type_plan'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/rubrique.html','html_0caead67327defaf94febb642f511490','_type_miniplan',55,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		<div class="chapo" id="miniplan">   	
    	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('modeles/miniplan') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',57,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		</div><!-- chapo, miniplan -->
		');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_type_miniplan @ squelettes/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubrique_principalhtml_0caead67327defaf94febb642f511490(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubrique_principal';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
		"rubriques.id_secteur",
		"rubriques.texte",
		"rubriques.descriptif");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/rubrique.html','html_0caead67327defaf94febb642f511490','_rubrique_principal',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

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
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
'] : ' .
interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))) .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	<link rel="alternate" type="application/rss+xml" title="' .
_T('public|spip|ecrire:syndiquer_rubrique') .
' : ' .
interdire_scripts(entites_html(textebrut(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend', ''),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />

	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',10,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' rubrique sect' .
$Pile[$SP]['id_secteur'] .
' ' .
BOUCLE_rubriques_bodyhtml_0caead67327defaf94febb642f511490($Cache, $Pile, $doublons, $Numrows, $SP) .
' rub' .
$Pile[$SP]['id_rubrique'] .
'">
<div id="page" class="rubrique rub' .
$Pile[$SP]['id_rubrique'] .
'">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',20,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
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
(($t1 = BOUCLE_rubriques_cheminhtml_0caead67327defaf94febb642f511490($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
    ' . $t1 . '
	') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(couper(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])),'60'))))!=='' ?
		('<b class=\'separateur\'>&gt;</b> ' . $t1) :
		'') .
'
		</h5>
		<div class="ligne-debut"></div><!-- ligne-debut -->
    	' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0'))))!=='' ?
		('<div class="logo-liste-art">
    		' . $t1 . '
    	</div>') :
		'') .
'
    <h1 class="titre-article">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</h1>
	' .
(($t1 = strval(interdire_scripts(((($a = filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect, $Pile[0]),'560','0'))) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		((	'<div class="chapo ' .
	interdire_scripts(($Pile[$SP]['texte'] ? '':'')) .
	'" id="description">
        ') . $t1 . (	'
        ' .
	(($t2 = strval(interdire_scripts(calculer_notes())))!=='' ?
			('<div class="notes" style="padding: 0 1.5em;">' . $t2 . '</div>') :
			'') .
	'
	</div><!-- chapo -->')) :
		'') .
'
	

		' .
recuperer_fond( 'inc/inc-rub-documents' , array_merge($Pile[0],array('id_rubrique' => $Pile[$SP]['id_rubrique'] )), array('compil'=>array('squelettes/rubrique.html','html_0caead67327defaf94febb642f511490','_rubrique_principal',43,$GLOBALS['spip_lang'])), _request('connect')) .
'
	


		' .
(($t1 = BOUCLE_type_miniplanhtml_0caead67327defaf94febb642f511490($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
		') :
		((	'


		' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-rub-articles') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',63,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		'))) .
'
		
		<br class="nettoyeur" />
	</div><!-- bloc-contenu -->
	
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',76,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',78,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',80,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
  </div><!-- encart -->

<!-- *****************************************************************
	Navigation principale et rubriques (haut et/ou gauche)
	Main and Sections Navigation (top and/orleft) 
    ************************************************************* -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',88,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
<!-- *****************************************************************
	Pied de page - Footer
    ************************************************************* -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',92,$GLOBALS[\'spip_lang\'])), _request("connect"));
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique_principal @ squelettes/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/rubrique.html
// Temps de compilation total: 52.271 ms
//

function html_0caead67327defaf94febb642f511490($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_rubrique_principalhtml_0caead67327defaf94febb642f511490($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_rubrique\' => ' . argumenter_squelette(@$Pile[0]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/rubrique.html\',\'html_0caead67327defaf94febb642f511490\',\'\',98,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
')));

	return analyse_resultat_skel('html_0caead67327defaf94febb642f511490', $Cache, $page, 'squelettes/rubrique.html');
}
?>