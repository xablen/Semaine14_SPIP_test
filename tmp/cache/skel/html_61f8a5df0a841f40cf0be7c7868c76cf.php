<?php

/*
 * Squelette : ../prive/echafaudage/hierarchie/objet.sans_rubrique.html
 * Date :      Tue, 12 Jan 2016 07:48:40 GMT
 * Compile :   Tue, 12 Jan 2016 08:02:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/echafaudage/hierarchie/objet.sans_rubrique.html
// Temps de compilation total: 8.929 ms
//

function html_61f8a5df0a841f40cf0be7c7868c76cf($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- hierarchie -->
' .
(($t1 = strval(generer_url_ecrire(interdire_scripts(objet_info(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true),'table_objet')))))!=='' ?
		('<a
				href="' . $t1 . (	'">' .
	interdire_scripts(_T(objet_info(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true),'texte_objets'))) .
	'</a> &gt;
' .
	interdire_scripts(changer_typo(generer_info_entite(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)), 'lang'))) .
	'
	<strong class="on">' .
	interdire_scripts(((($a = couper(generer_info_entite(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_objet', null),true)), interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'objet', null),true)), 'titre'),'80')) OR (is_string($a) AND strlen($a))) ? $a : _T('ecrire:info_sans_titre'))) .
	'</strong>
' .
	changer_typo('') .
	'
')) :
		''));

	return analyse_resultat_skel('html_61f8a5df0a841f40cf0be7c7868c76cf', $Cache, $page, '../prive/echafaudage/hierarchie/objet.sans_rubrique.html');
}
?>