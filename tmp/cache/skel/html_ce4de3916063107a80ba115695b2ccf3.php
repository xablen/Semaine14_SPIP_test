<?php

/*
 * Squelette : ../prive/echafaudage/contenu/objet.html
 * Date :      Tue, 12 Jan 2016 07:48:40 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/echafaudage/contenu/objet.html
// Temps de compilation total: 89.875 ms
//

function html_ce4de3916063107a80ba115695b2ccf3($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][$_zzz=(string)'ok'] = '') .
((((((table_valeur(@$Pile[0], (string)'exec', null) == interdire_scripts(objet_info(@$Pile[0]['objet'],'url_edit')))) AND (interdire_scripts(objet_info(@$Pile[0]['objet'],'editable')))) ?' ' :''))  ?
		('

' . ' ' . (	'

' .
	recuperer_fond( (	'prive/squelettes/contenu/' .
		table_valeur(@$Pile[0], (string)'exec', null)) , array_merge($Pile[0],array('redirect' => '' ,
	'retourajax' => 'oui' )), array('compil'=>array('../prive/echafaudage/contenu/objet.html','html_ce4de3916063107a80ba115695b2ccf3','',5,$GLOBALS['spip_lang'])), _request('connect')) .
	vide($Pile['vars'][$_zzz=(string)'ok'] = ' '))) :
		'') .
(((((((table_valeur($Pile["vars"], (string)'ok', null)) ?'' :' ')) AND ((table_valeur(@$Pile[0], (string)'exec', null) == interdire_scripts(objet_info(@$Pile[0]['objet'],'url_voir'))))) ?' ' :''))  ?
		(' ' . (	'
	' .
	sinon_interdire_acces(((((intval(generer_info_entite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet']),interdire_scripts(id_table_objet(@$Pile[0]['objet'])),'**')) == @$Pile[0]['id_objet'])) AND (@$Pile[0]['id_objet'])) ?' ' :'')) .
	'
	' .
	interdire_scripts(changer_typo(generer_info_entite(@$Pile[0]['id_objet'], interdire_scripts(@$Pile[0]['objet']), 'lang'))) .
	'
	' .
	boite_ouvrir((($t3 = strval(interdire_scripts(((($a = generer_info_entite(@$Pile[0]['id_objet'], interdire_scripts(@$Pile[0]['objet']), 'titre')) OR (is_string($a) AND strlen($a))) ? $a : _T('public|spip|ecrire:info_sans_titre')))))!=='' ?
				((	'

		' .
			(($t4 = strval(invalideur_session($Cache, (((((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', interdire_scripts(invalideur_session($Cache, @$Pile[0]['objet'])), invalideur_session($Cache, @$Pile[0]['id_objet']))?" ":"")) AND (interdire_scripts(invalideur_session($Cache, objet_info(@$Pile[0]['objet'],'editable'))))) ?' ' :'')) ?' ' :''))))!=='' ?
					($t4 . (	'

			' .
				(!(afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])))  ?
						(' ' . (	'
				' .
					filtre_icone_verticale_dist(generer_url_ecrire_entite_edit(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),interdire_scripts(_T(objet_info(@$Pile[0]['objet'],'texte_modifier'))),interdire_scripts(objet_info(@$Pile[0]['objet'],'icone_objet')),'edit','right ajax preload') .
					'
			')) :
						'') .
				'
			' .
				((afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])))  ?
						(' ' . (	'
				' .
					filtre_icone_verticale_dist(generer_url_ecrire_entite_edit(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),'warning-24','','right edition_deja ajax preload') .
					'
			')) :
						'') .
				'
		')) :
					'') .
			'
		<h1>' .
			(($t4 = strval(interdire_scripts(recuperer_numero(generer_info_entite(@$Pile[0]['id_objet'], interdire_scripts(@$Pile[0]['objet']), 'titre')))))!=='' ?
					($t4 . '. ') :
					'')) . $t3 . (	interdire_scripts(inserer_attribut(objet_icone(@$Pile[0]['objet']),'class','cadre-icone')) .
			'</h1>
	')) :
				''), 'simple fiche_objet') .
	'
	' .
	changer_typo('') .
	'

	<div class="ajax">
		' .
	executer_balise_dynamique('FORMULAIRE_DATER',
	array(interdire_scripts(@$Pile[0]['objet']),@$Pile[0]['id_objet']),
	array('../prive/echafaudage/contenu/objet.html','html_ce4de3916063107a80ba115695b2ccf3','',8,$GLOBALS['spip_lang'])) .
	'</div>

	<div id="wysiwyg">
		<h2 class="invisible">' .
	_T('public|spip|ecrire:previsualisation') .
	'</h2>
		' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette((	'prive/objets/contenu/' .
		interdire_scripts(@$Pile[0]['objet']))) . ', array_merge('.var_export($Pile[0],1).',array(\'id\' => ' . argumenter_squelette(@$Pile[0]['id_objet']) . ',
	\'wysiwyg\' => ' . argumenter_squelette('1') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/echafaudage/contenu/objet.html\',\'html_ce4de3916063107a80ba115695b2ccf3\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	</div>

	' .
	(($t2 = strval(invalideur_session($Cache, (((((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', interdire_scripts(invalideur_session($Cache, @$Pile[0]['objet'])), invalideur_session($Cache, @$Pile[0]['id_objet']))?" ":"")) AND (interdire_scripts(invalideur_session($Cache, objet_info(@$Pile[0]['objet'],'editable'))))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'

		' .
		(!(afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])))  ?
				(' ' . (	'
			' .
			filtre_icone_verticale_dist(generer_url_ecrire_entite_edit(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),interdire_scripts(_T(objet_info(@$Pile[0]['objet'],'texte_modifier'))),interdire_scripts(objet_info(@$Pile[0]['objet'],'icone_objet')),'edit','right ajax preload') .
			'
		')) :
				'') .
		'
		' .
		((afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])))  ?
				(' ' . (	'
			' .
			filtre_icone_verticale_dist(generer_url_ecrire_entite_edit(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),afficher_qui_edite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet'])),'warning-24','','right edition_deja ajax preload') .
			'
		')) :
				'') .
		'
	')) :
			'') .
	'

	' .
	pipeline( 'afficher_complement_objet' , array('args' => array('type' => interdire_scripts(@$Pile[0]['objet']), 'id' => @$Pile[0]['id_objet']), 'data' => '<div class="nettoyeur"></div>') ) .
	boite_fermer() .
	'

	' .
	vide($Pile['vars'][$_zzz=(string)'enfants'] = '') .
	(($t2 = strval(interdire_scripts(((trouver_fond(concat(@$Pile[0]['objet'],'-enfants'),'prive/objets/contenu/')) ?' ' :''))))!=='' ?
			($t2 . (	'
		' .
		vide($Pile['vars'][$_zzz=(string)'enfants'] = recuperer_fond( (($t5 = strval(interdire_scripts(@$Pile[0]['objet'])))!=='' ?
						('prive/objets/contenu/' . $t5 . '-enfants') :
						'') , array_merge($Pile[0],array('id_objet' => @$Pile[0]['id_objet'] )), array('compil'=>array('../prive/echafaudage/contenu/objet.html','html_ce4de3916063107a80ba115695b2ccf3','',0,$GLOBALS['spip_lang'])), _request('connect'))) .
		'
	')) :
			'') .
	'
	' .
	pipeline( 'affiche_enfants' , array('args' => array('exec' => table_valeur(@$Pile[0], (string)'exec', null), 'objet' => interdire_scripts(@$Pile[0]['objet']), 'id_objet' => @$Pile[0]['id_objet']), 'data' => table_valeur($Pile["vars"], (string)'enfants', null)) ) .
	'

	' .
	(($t2 = strval(interdire_scripts(((eval('return '.'_AJAX'.';')) ?' ' :''))))!=='' ?
			($t2 . (	'
	<script type="text/javascript">/*<![CDATA[*/reloadExecPage(\'' .
		interdire_scripts(objet_info(@$Pile[0]['objet'],'url_voir')) .
		'\',\'#navigation,#chemin,#extra\');/*]]>*/</script>
	')) :
			'') .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'ok'] = ' '))) :
		'') .
(($t1 = strval(sinon_interdire_acces(table_valeur($Pile["vars"], (string)'ok', null))))!=='' ?
		('

' . $t1 . '

') :
		'') .
'
');

	return analyse_resultat_skel('html_ce4de3916063107a80ba115695b2ccf3', $Cache, $page, '../prive/echafaudage/contenu/objet.html');
}
?>