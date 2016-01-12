<?php

/*
 * Squelette : ../prive/squelettes/contenu/rubrique.html
 * Date :      Tue, 12 Jan 2016 07:48:44 GMT
 * Compile :   Tue, 12 Jan 2016 08:00:16 GMT
 * Boucles :   _rubrique
 */ 

function BOUCLE_rubriquehtml_ab44399ba798c182d1028e69cfac4d46(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'exec', null),true) == 'rubrique'));

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_rubrique';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.lang",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.titre AS titre_rang",
		"rubriques.id_parent");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/squelettes/contenu/rubrique.html','html_ab44399ba798c182d1028e69cfac4d46','_rubrique',2,$GLOBALS['spip_lang'])
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
changer_typo(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
'
' .
boite_ouvrir((($t2 = strval(interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : _T('public|spip|ecrire:info_sans_titre')))))!=='' ?
			((	'
				
	' .
		(($t3 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', 'rubrique', invalideur_session($Cache, $Pile[$SP]['id_rubrique']))?" ":""))))!=='' ?
				($t3 . (	'
				
		' .
			(!(afficher_qui_edite($Pile[$SP]['id_rubrique'],'rubrique'))  ?
					(' ' . (	'
			' .
				filtre_icone_verticale_dist(generer_url_ecrire('rubrique_edit',(	'id_rubrique=' .
					$Pile[$SP]['id_rubrique'])),_T('public|spip|ecrire:icone_modifier_rubrique'),'rubrique','edit','right ajax preload') .
				'
		')) :
					'') .
			'
		' .
			((afficher_qui_edite($Pile[$SP]['id_rubrique'],'rubrique'))  ?
					(' ' . (	'
			' .
				filtre_icone_verticale_dist(generer_url_ecrire('rubrique_edit',(	'id_rubrique=' .
					$Pile[$SP]['id_rubrique'])),afficher_qui_edite($Pile[$SP]['id_rubrique'],'rubrique'),'warning-24','','right edition_deja ajax preload') .
				'
		')) :
					'') .
			'
	')) :
				'') .
		'
	<h1>' .
		(($t3 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
				($t3 . '. ') :
				'')) . $t2 . (	interdire_scripts(filtre_balise_img_dist(chemin_image(($Pile[$SP]['id_parent'] ? 'rubrique-24.png':'secteur-24.png')),'rubrique','cadre-icone')) .
		'</h1>
')) :
			''), 'simple fiche_objet') .
'
' .
changer_typo('') .
'
<div id="wysiwyg">
	<h2 class="invisible">' .
_T('public|spip|ecrire:previsualisation') .
'</h2>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/objets/contenu/rubrique') . ', array(\'id\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'wysiwyg\' => ' . argumenter_squelette('1') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../prive/squelettes/contenu/rubrique.html\',\'html_ab44399ba798c182d1028e69cfac4d46\',\'\',8,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette('wysiwyg') . '))?$v:true), _request("connect"));
?'.'>
</div>

<!--affiche_milieu-->

' .
boite_fermer() .
'

' .
pipeline( 'affiche_enfants' , array('args' => array('exec' => 'rubrique', 'id_rubrique' => $Pile[$SP]['id_rubrique'], 'objet' => 'rubrique', 'id_objet' => $Pile[$SP]['id_rubrique']), 'data' => recuperer_fond( 'prive/objets/contenu/rubrique-enfants' , array_merge($Pile[0],array('id_rubrique' => $Pile[$SP]['id_rubrique'] )), array('compil'=>array('../prive/squelettes/contenu/rubrique.html','html_ab44399ba798c182d1028e69cfac4d46','_rubrique',0,$GLOBALS['spip_lang'])), _request('connect'))) ) .
'

' .
pipeline( 'afficher_complement_objet' , array('args' => array('type' => 'rubrique', 'id' => $Pile[$SP]['id_rubrique']), 'data' => '<div class="nettoyeur"></div>') ) .
(($t1 = strval(interdire_scripts(((eval('return '.'_AJAX'.';')) ?' ' :''))))!=='' ?
		($t1 . (	'
	<script type="text/javascript">/*<![CDATA[*/reloadExecPage(\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'exec', null),true)) .
	'\',\'#navigation,#chemin,#extra\');/*]]>*/</script>
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
		spip_log(intval(1000*$timer)."ms BOUCLE_rubrique @ ../prive/squelettes/contenu/rubrique.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/squelettes/contenu/rubrique.html
// Temps de compilation total: 28.679 ms
//

function html_ab44399ba798c182d1028e69cfac4d46($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('voir', 'rubrique', invalideur_session($Cache, @$Pile[0]['id_rubrique']))?" ":""))) .
'
' .
(($t1 = BOUCLE_rubriquehtml_ab44399ba798c182d1028e69cfac4d46($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	((table_valeur(@$Pile[0], (string)'exec', null) == 'rubrique_edit') ? recuperer_fond( 'prive/squelettes/contenu/rubrique_edit' , array_merge($Pile[0],array('redirect' => '' ,
	'retourajax' => 'oui' )), array('compil'=>array('../prive/squelettes/contenu/rubrique.html','html_ab44399ba798c182d1028e69cfac4d46','',0,$GLOBALS['spip_lang'])), _request('connect')):sinon_interdire_acces('','',_T('public|spip|ecrire:info_aucun_rubrique'))) .
	'
'))) .
'
');

	return analyse_resultat_skel('html_ab44399ba798c182d1028e69cfac4d46', $Cache, $page, '../prive/squelettes/contenu/rubrique.html');
}
?>