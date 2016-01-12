<?php

/*
 * Squelette : squelettes/modeles/lesauteurs.html
 * Date :      Tue, 12 Jan 2016 07:50:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:44:30 GMT
 * Boucles :   _auteurs
 */ 

function BOUCLE_auteurshtml_f884567ee49b69d7c5b80c3ab05b7b32(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteurs';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array("auteurs.id_auteur");
		$command['select'] = array("auteurs.nom",
		"auteurs.id_auteur");
		$command['orderby'] = array('auteurs.nom');
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/modeles/lesauteurs.html','html_f884567ee49b69d7c5b80c3ab05b7b32','_auteurs',9,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = (
'
<span class="vcard author"><a class="url fn spip_in" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a></span>');
		$t0 .= ((strlen($t1) && strlen($t0)) ? ', ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteurs @ squelettes/modeles/lesauteurs.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/modeles/lesauteurs.html
// Temps de compilation total: 32.503 ms
//

function html_f884567ee49b69d7c5b80c3ab05b7b32($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
BOUCLE_auteurshtml_f884567ee49b69d7c5b80c3ab05b7b32($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_f884567ee49b69d7c5b80c3ab05b7b32', $Cache, $page, 'squelettes/modeles/lesauteurs.html');
}
?>