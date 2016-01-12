<?php

/*
 * Squelette : ../prive/objets/infos/rubrique.html
 * Date :      Tue, 12 Jan 2016 07:48:40 GMT
 * Compile :   Tue, 12 Jan 2016 08:00:16 GMT
 * Boucles :   _admins, _arts, _rubs, _publie, _rub
 */ 

function BOUCLE_adminshtml_66b4834e6639992379a5067a7c8933e5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['pagination'] = array((isset($Pile[0]['debut_admins']) ? $Pile[0]['debut_admins'] : null), 10);
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_admins';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.id_auteur",
		"auteurs.nom");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'auteurs.statut', "'0minirezo'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/infos/rubrique.html','html_66b4834e6639992379a5067a7c8933e5','_admins',11,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_admins']['compteur_boucle'] = 0;
	$Numrows['_admins']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_admins']) ? $Pile[0]['debut_admins'] : _request('debut_admins');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_admins'] = quete_debut_pagination('id_auteur',$Pile[0]['@id_auteur'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_admins']['total']-1)/(10))*(10)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_admins']['total'] : $debut_boucle + 9), $Numrows['_admins']['total'] - 1);
	$Numrows['_admins']['grand_total'] = $Numrows['_admins']['total'];
	$Numrows['_admins']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_admins']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_admins']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_admins']['compteur_boucle']++;
		if ($Numrows['_admins']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_admins']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
			<li class="item auteur"><a href=\'' .
generer_url_entite($Pile[$SP]['id_auteur'],'auteur') .
'\'>' .
interdire_scripts(filtre_balise_img_dist(chemin_image('auteur-0minirezo-16.png'))) .
' ' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a></li>
		');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_admins @ ../prive/objets/infos/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_artshtml_66b4834e6639992379a5067a7c8933e5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_arts';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("count(*)");
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
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/infos/rubrique.html','html_66b4834e6639992379a5067a7c8933e5','_arts',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_arts']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_arts']['total']);
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_arts @ ../prive/objets/infos/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubshtml_66b4834e6639992379a5067a7c8933e5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubs';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("count(*)");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/infos/rubrique.html','html_66b4834e6639992379a5067a7c8933e5','_rubs',23,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_rubs']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_rubs']['total']);
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rubs @ ../prive/objets/infos/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_publiehtml_66b4834e6639992379a5067a7c8933e5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_publie';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/infos/rubrique.html','html_66b4834e6639992379a5067a7c8933e5','_publie',36,$GLOBALS['spip_lang'])
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
filtre_icone_horizontale_dist(parametre_url(generer_url_action('redirect',(	'type=rubrique&id=' .
	$Pile[$SP]['id_rubrique'])),'var_mode','calcul'),_T('public|spip|ecrire:icone_voir_en_ligne'),'racine') .
'
');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_publie @ ../prive/objets/infos/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rubhtml_66b4834e6639992379a5067a7c8933e5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rub';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.id_parent");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)),'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/infos/rubrique.html','html_66b4834e6639992379a5067a7c8933e5','_rub',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:titre_numero_rubrique');
	$l2 = _T('public|spip|ecrire:info_administrateurs');
	$l3 = _T('public|spip|ecrire:icone_supprimer_rubrique');
	$l4 = _T('public|spip|ecrire:previsualiser');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
$l1 .
'<p>' .
$Pile[$SP]['id_rubrique'] .
'</p></div>



' .
(($t1 = BOUCLE_adminshtml_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h3>' .
		$l2 .
		'</h3>
		<ul class="liste-items auteurs">
		') . $t1 . (	'
		</ul>
		' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_admins"]["grand_total"],
 		'_admins',
		isset($Pile[0]['debut_admins'])?$Pile[0]['debut_admins']:intval(_request('debut_admins')),
		10, true, 'prive', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
')) :
		'') .
'

<div class=\'nb_elements\'>
' .
(($t1 = BOUCLE_artshtml_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_arts']['total'],'info_articles_un','info_articles_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_rubshtml_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_rubs']['total'],'info_rubriques_un','info_rubriques_nb') .
		'</div>')) :
		'') .
'
<!--nb_elements-->
</div>

' .
(($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('supprimer', 'rubrique', invalideur_session($Cache, $Pile[$SP]['id_rubrique']))?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	invalideur_session($Cache, filtre_icone_horizontale_dist(generer_action_auteur('supprimer_rubrique',invalideur_session($Cache, $Pile[$SP]['id_rubrique']),invalideur_session($Cache, ($Pile[$SP]['id_parent'] ? invalideur_session($Cache, generer_url_ecrire('rubrique',(	'id_rubrique=' .
				invalideur_session($Cache, $Pile[$SP]['id_parent'])))):invalideur_session($Cache, generer_url_ecrire('rubriques'))))),$l3,'rubrique','del')) .
	'
')) :
		'') .
'


' .
(($t1 = BOUCLE_publiehtml_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
	' .
	(($t2 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('previsualiser', 'rubrique', invalideur_session($Cache, $Pile[$SP]['id_rubrique']))?" ":""))))!=='' ?
			($t2 . (	'
		' .
		filtre_icone_horizontale_dist(parametre_url(generer_url_action('redirect',(	'type=rubrique&id=' .
			$Pile[$SP]['id_rubrique'])),'var_mode','preview'),$l4,'preview') .
		'
	')) :
			'') .
	'
'))) .
'

</div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rub @ ../prive/objets/infos/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/objets/infos/rubrique.html
// Temps de compilation total: 31.923 ms
//

function html_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_rubhtml_66b4834e6639992379a5067a7c8933e5($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_66b4834e6639992379a5067a7c8933e5', $Cache, $page, '../prive/objets/infos/rubrique.html');
}
?>