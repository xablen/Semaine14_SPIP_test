<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/inclure/voir_en_ligne.html
 * Date :      Tue, 12 Jan 2016 07:49:49 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/inclure/voir_en_ligne.html
// Temps de compilation total: 4.073 ms
//

function html_cf842c5dabfd1b1936ed779a41bd7f81($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((in_array(entites_html(table_valeur(@$Pile[0], (string)'type', null),true),interdire_scripts(filtre_explode_dist(eval('return '.'_SVP_PAGES_OBJET_PUBLIQUES'.';'),':')))) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	filtre_icone_horizontale_dist(parametre_url(generer_url_action('redirect',(	'type=' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'type', null),true)) .
		'&id=' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)))),'var_mode','calcul'),_T('public|spip|ecrire:icone_voir_en_ligne'),'racine') .
	'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_cf842c5dabfd1b1936ed779a41bd7f81', $Cache, $page, '../plugins-dist/svp/prive/squelettes/inclure/voir_en_ligne.html');
}
?>