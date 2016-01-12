<?php

/*
 * Squelette : ../prive/echafaudage/navigation/objet.html
 * Date :      Tue, 12 Jan 2016 07:48:40 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/echafaudage/navigation/objet.html
// Temps de compilation total: 26.924 ms
//

function html_78c3b44e55a5309b473d028c8234994a($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][$_zzz=(string)'ok'] = '') .
((((((table_valeur(@$Pile[0], (string)'exec', null) == interdire_scripts(objet_info(@$Pile[0]['objet'],'url_edit')))) AND (interdire_scripts(objet_info(@$Pile[0]['objet'],'editable')))) ?' ' :''))  ?
		('

	' . ' ' . (	'

	' .
	((trouver_fond(table_valeur(@$Pile[0], (string)'exec', null),'prive/squelettes/navigation'))  ?
			(' ' . (	'
		' .
		recuperer_fond( (	'prive/squelettes/navigation/' .
			table_valeur(@$Pile[0], (string)'exec', null)) , array_merge($Pile[0],array('redirect' => '' ,
	'retourajax' => 'oui' )), array('compil'=>array('../prive/echafaudage/navigation/objet.html','html_78c3b44e55a5309b473d028c8234994a','',6,$GLOBALS['spip_lang'])), _request('connect')) .
		'
	')) :
			'') .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'ok'] = ' '))) :
		'') .
(((((((table_valeur($Pile["vars"], (string)'ok', null)) ?'' :' ')) AND ((table_valeur(@$Pile[0], (string)'exec', null) == interdire_scripts(objet_info(@$Pile[0]['objet'],'url_voir'))))) ?' ' :''))  ?
		(' ' . (	'
	' .
	sinon_interdire_acces((intval(generer_info_entite(@$Pile[0]['id_objet'],interdire_scripts(@$Pile[0]['objet']),interdire_scripts(id_table_objet(@$Pile[0]['objet'])),'**')) == @$Pile[0]['id_objet'])) .
	'

	' .
	boite_ouvrir('', 'info') .
	pipeline( 'boite_infos' , array('data' => '', 'args' => array('type' => interdire_scripts(@$Pile[0]['objet']), 'id' => @$Pile[0]['id_objet'])) ) .
	boite_fermer() .
	'

	<div class="ajax">
	' .
	executer_balise_dynamique('FORMULAIRE_EDITER_LOGO',
	array(interdire_scripts(@$Pile[0]['objet']),@$Pile[0]['id_objet'],'',@serialize($Pile[0])),
	array('../prive/echafaudage/navigation/objet.html','html_78c3b44e55a5309b473d028c8234994a','',9,$GLOBALS['spip_lang'])) .
	'</div>
	
	' .
	pipeline( 'afficher_config_objet' , array('args' => array('type' => interdire_scripts(@$Pile[0]['objet']), 'id' => @$Pile[0]['id_objet']), 'data' => '') ) .
	vide($Pile['vars'][$_zzz=(string)'ok'] = ' '))) :
		'') .
(($t1 = strval(sinon_interdire_acces(table_valeur($Pile["vars"], (string)'ok', null))))!=='' ?
		('

' . $t1 . '

') :
		'') .
'
');

	return analyse_resultat_skel('html_78c3b44e55a5309b473d028c8234994a', $Cache, $page, '../prive/echafaudage/navigation/objet.html');
}
?>