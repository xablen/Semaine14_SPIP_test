<?php

/*
 * Squelette : ../prive/squelettes/head/dist.html
 * Date :      Tue, 12 Jan 2016 07:48:44 GMT
 * Compile :   Tue, 12 Jan 2016 07:57:43 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/head/dist.html
// Temps de compilation total: 4.092 ms
//

function html_a37f1676b26f728b66e974ce458d21f6($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
vide($Pile['vars'][$_zzz=(string)'paramcss'] = parametres_css_prive('')) .
pipeline( 'header_prive' , recuperer_fond( 'prive/squelettes/inclure/head' , array('titre' => @$Pile[0]['titre'] ,
	'minipres' => @$Pile[0]['minipres'] ,
	'paramcss' => table_valeur($Pile["vars"], (string)'paramcss', null) ,
	'espace_prive' => @$Pile[0]['espace_prive'] ), array('compil'=>array('../prive/squelettes/head/dist.html','html_a37f1676b26f728b66e974ce458d21f6','',0,$GLOBALS['spip_lang'])), _request('connect')) ));

	return analyse_resultat_skel('html_a37f1676b26f728b66e974ce458d21f6', $Cache, $page, '../prive/squelettes/head/dist.html');
}
?>