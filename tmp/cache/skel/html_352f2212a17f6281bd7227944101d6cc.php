<?php

/*
 * Squelette : ../plugins-dist/svp/prive/objets/infos/depot.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   _infos_depot
 */ 

function BOUCLE_infos_depothtml_352f2212a17f6281bd7227944101d6cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_infos_depot';
		$command['from'] = array('depots' => 'spip_depots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("depots.id_depot",
		"depots.nbr_paquets",
		"depots.nbr_plugins",
		"depots.nbr_autres",
		"depots.maj");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'depots.id_depot', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)),'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/objets/infos/depot.html','html_352f2212a17f6281bd7227944101d6cc','_infos_depot',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
<div class="infos">
	
	' .
vide($Pile['vars'][$_zzz=(string)'titre_info'] = interdire_scripts(_T(objet_info(entites_html(table_valeur(@$Pile[0], (string)'type', null),true),'texte_objet')))) .
'<div class="numero">
		' .
_T('public|spip|ecrire:titre_cadre_numero_objet', array('objet' => table_valeur($Pile["vars"], (string)'titre_info', null))) .
'
		<p>' .
$Pile[$SP]['id_depot'] .
'</p>
	</div>
    <div class="bouton">' .
bouton_action(_T('svp:bouton_actualiser'),invalideur_session($Cache, generer_action_auteur('actualiser_depot',invalideur_session($Cache, $Pile[$SP]['id_depot']),invalideur_session($Cache, self()))),'','',_T('svp:bulle_actualiser_depot')) .
'</div>
    <div class="bouton">' .
bouton_action(_T('svp:bouton_supprimer'),invalideur_session($Cache, generer_action_auteur('supprimer_depot',invalideur_session($Cache, $Pile[$SP]['id_depot']),invalideur_session($Cache, generer_url_ecrire('depots')))),'','',_T('svp:bulle_supprimer_depot')) .
'</div>

	
	<div class="liste compteurs">
		<ul class="liste-items">
			<li>' .
interdire_scripts(singulier_ou_pluriel($Pile[$SP]['nbr_paquets'],'svp:info_1_paquet','svp:info_nb_paquets')) .
'</li>
		' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['nbr_plugins'] > '0')) ?' ' :''))))!=='' ?
		($t1 . (	'
			<li>' .
	interdire_scripts(singulier_ou_pluriel($Pile[$SP]['nbr_plugins'],'svp:info_1_plugin','svp:info_nb_plugins')) .
	'</li>
		')) :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['nbr_autres'] > '0')) ?' ' :''))))!=='' ?
		($t1 . (	'
			<li>' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['nbr_autres'])))!=='' ?
			($t2 . (	' ' .
		interdire_scripts(singulier_ou_pluriel($Pile[$SP]['nbr_autres'],'svp:label_1_autre_contribution','svp:label_n_autres_contributions')))) :
			'') .
	'</li>
		')) :
		'') .
'
		</ul>
	</div>
	<p>' .
(($t1 = strval(interdire_scripts(affdate($Pile[$SP]['maj']))))!=='' ?
		((	_T('svp:label_actualise_le') .
	'<br />') . $t1 . (	', ' .
	interdire_scripts(affdate($Pile[$SP]['maj'],'H:i')))) :
		'') .
'</p>
	
	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/inclure/voir_en_ligne') . ', array(\'type\' => ' . argumenter_squelette(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type', null),true))) . ',
	\'id\' => ' . argumenter_squelette($Pile[$SP]['id_depot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../plugins-dist/svp/prive/objets/infos/depot.html\',\'html_352f2212a17f6281bd7227944101d6cc\',\'\',23,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_infos_depot @ ../plugins-dist/svp/prive/objets/infos/depot.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/objets/infos/depot.html
// Temps de compilation total: 19.034 ms
//

function html_352f2212a17f6281bd7227944101d6cc($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_infos_depothtml_352f2212a17f6281bd7227944101d6cc($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_352f2212a17f6281bd7227944101d6cc', $Cache, $page, '../plugins-dist/svp/prive/objets/infos/depot.html');
}
?>