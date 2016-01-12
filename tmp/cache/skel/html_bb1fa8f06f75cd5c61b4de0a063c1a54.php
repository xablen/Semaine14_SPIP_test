<?php

/*
 * Squelette : squelettes/inc/inc-syndic.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:26:35 GMT
 * Boucles :   _art_syndic2, _art_syndic, _sites
 */ 

function BOUCLE_art_syndic2html_bb1fa8f06f75cd5c61b4de0a063c1a54(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic_articles';
		$command['id'] = '_art_syndic2';
		$command['from'] = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("syndic_articles.date",
		"syndic_articles.titre",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.descriptif");
		$command['orderby'] = array('syndic_articles.date DESC');
		$command['where'] = 
			array(
quete_condition_statut('L1.statut','publie,prop','publie',''), 
quete_condition_statut('syndic_articles.statut','publie,prop','publie',''));
		$command['join'] = array('L1' => array('syndic_articles','id_syndic'));
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-syndic.html','html_bb1fa8f06f75cd5c61b4de0a063c1a54','_art_syndic2',28,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:form_prop_nom_site');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
            <li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(supprimer_numero($Pile[$SP]['titre']))))!=='' ?
		((	'<a href="' .
	vider_url($Pile[$SP]['url']) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))))!=='' ?
			((	'title="' .
		$l1 .
		' : ') . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<span style="text-align: right;"><a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out" style="text-align: right; color: maroon; margin-top:-.7em">') . $t1 . ' </a></span>') :
		'') .
'
             </li>
            ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_art_syndic2 @ squelettes/inc/inc-syndic.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_art_syndichtml_bb1fa8f06f75cd5c61b4de0a063c1a54(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic_articles';
		$command['id'] = '_art_syndic';
		$command['from'] = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("syndic_articles.date",
		"syndic_articles.titre",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.descriptif");
		$command['orderby'] = array('syndic_articles.date DESC');
		$command['join'] = array('L1' => array('syndic_articles','id_syndic'));
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('L1.statut','publie,prop','publie',''), 
quete_condition_statut('syndic_articles.statut','publie,prop','publie',''), 
			array('=', 'L1.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-syndic.html','html_bb1fa8f06f75cd5c61b4de0a063c1a54','_art_syndic',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:form_prop_nom_site');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
            <li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(supprimer_numero($Pile[$SP]['titre']))))!=='' ?
		((	'<a href="' .
	vider_url($Pile[$SP]['url']) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))))!=='' ?
			((	'title="' .
		$l1 .
		' : ') . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<span style="text-align: right;"><a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out" style="text-align: right; color: maroon; margin-top:-.5em">') . $t1 . '</a></span>') :
		'') .
'
            </li>
            ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_art_syndic @ squelettes/inc/inc-syndic.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_siteshtml_bb1fa8f06f75cd5c61b4de0a063c1a54(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic';
		$command['id'] = '_sites';
		$command['from'] = array('syndic' => 'spip_syndic');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("syndic.nom_site",
		"syndic.url_site",
		"syndic.descriptif");
		$command['orderby'] = array('syndic.nom_site');
		$command['join'] = array();
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('syndic.statut','publie,prop','publie',''), 
			array('=', 'syndic.syndication', "'non'"), 
			array('=', 'syndic.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-syndic.html','html_bb1fa8f06f75cd5c61b4de0a063c1a54','_sites',52,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
            <li>
                ' .
(($t1 = strval(interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
            </li>            
            ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_sites @ squelettes/inc/inc-syndic.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-syndic.html
// Temps de compilation total: 31.520 ms
//

function html_bb1fa8f06f75cd5c61b4de0a063c1a54($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Sur le Web -->


    ' .
(($t1 = BOUCLE_art_syndichtml_bb1fa8f06f75cd5c61b4de0a063c1a54($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
		interdire_scripts(generer_url_public('site', '')) .
		'" title="' .
		_T('public|spip|ecrire:autres_sites') .
		'">' .
		_T('public|spip|ecrire:nouveautes_web') .
		'</a>
          <ul>

            ') . $t1 . '

          </ul>
        </li>
      </ul>
      </div><!-- menu -->                
    ') :
		((	'


    ' .
	(($t2 = BOUCLE_art_syndic2html_bb1fa8f06f75cd5c61b4de0a063c1a54($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
			interdire_scripts(generer_url_public('site', '')) .
			'" title="' .
			_T('public|spip|ecrire:autres_sites') .
			'">' .
			_T('public|spip|ecrire:nouveautes_web') .
			'</a>
          <ul>

            ') . $t2 . '

          </ul>
        </li>
      </ul>
      </div><!-- menu -->                
    ') :
			'') .
	'

    '))) .
'
      	

    ' .
(($t1 = BOUCLE_siteshtml_bb1fa8f06f75cd5c61b4de0a063c1a54($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
		interdire_scripts(generer_url_public('site', '')) .
		'" title="' .
		_T('public|spip|ecrire:autres_sites') .
		'">' .
		_T('public|spip|ecrire:sites_web') .
		'</a>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
      </div><!-- menu -->
    ') :
		'') .
'

    ');

	return analyse_resultat_skel('html_bb1fa8f06f75cd5c61b4de0a063c1a54', $Cache, $page, 'squelettes/inc/inc-syndic.html');
}
?>