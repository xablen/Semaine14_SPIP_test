<?php

/*
 * Squelette : squelettes/inc/inc-breves.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:26:35 GMT
 * Boucles :   _breves_sommaire, _breves_rubriques
 */ 

function BOUCLE_breves_sommairehtml_11157eacea3e766769d2031f1e2eed04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'breves';
		$command['id'] = '_breves_sommaire';
		$command['from'] = array('breves' => 'spip_breves');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
		$command['orderby'] = array('breves.date_heure DESC');
		$command['join'] = array();
		$command['limit'] = '0,3';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('breves.statut','publie,prop','publie',''), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-breves.html','html_11157eacea3e766769d2031f1e2eed04','_breves_sommaire',19,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect, null))))))!=='' ?
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
		spip_log(intval(1000*$timer)."ms BOUCLE_breves_sommaire @ squelettes/inc/inc-breves.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_breves_rubriqueshtml_11157eacea3e766769d2031f1e2eed04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'breves';
		$command['id'] = '_breves_rubriques';
		$command['from'] = array('breves' => 'spip_breves');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
		$command['orderby'] = array('breves.date_heure DESC');
		$command['join'] = array();
		$command['limit'] = '0,10';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('breves.statut','publie,prop','publie',''), 
			array('=', 'breves.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-breves.html','html_11157eacea3e766769d2031f1e2eed04','_breves_rubriques',2,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect, null))))))!=='' ?
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
		spip_log(intval(1000*$timer)."ms BOUCLE_breves_rubriques @ squelettes/inc/inc-breves.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-breves.html
// Temps de compilation total: 12.277 ms
//

function html_11157eacea3e766769d2031f1e2eed04($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Breves -->
    ' .
(($t1 = BOUCLE_breves_rubriqueshtml_11157eacea3e766769d2031f1e2eed04($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:dernieres_breves') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public|spip|ecrire:nouvelles_breves') .
		'</b>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		((	'
    
    ' .
	(($t2 = BOUCLE_breves_sommairehtml_11157eacea3e766769d2031f1e2eed04($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
    <div class="menu">
    <h2 class="structure">' .
			_T('public|spip|ecrire:dernieres_breves') .
			'</h2>
      <ul>
        <li><b>' .
			_T('public|spip|ecrire:nouvelles_breves') .
			'</b>
          <ul>
            ') . $t2 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
			'') .
	'
    
    '))));

	return analyse_resultat_skel('html_11157eacea3e766769d2031f1e2eed04', $Cache, $page, 'squelettes/inc/inc-breves.html');
}
?>