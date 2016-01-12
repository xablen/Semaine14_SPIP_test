<?php

/*
 * Squelette : ../plugins-dist/svp/prive/objets/contenu/depot-enfants.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/objets/contenu/depot-enfants.html
// Temps de compilation total: 2.348 ms
//

function html_004bbd4bf180761aafc314c379061fe0($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = ((@$Pile[0]['id_depot'])  ?
		(' ' . (	'
	
	' .
	recuperer_fond( 'prive/objets/liste/plugins' , array_merge($Pile[0],array('titre' => _T('svp:titre_liste_plugins') ,
	'par' => 'nom' ,
	'pas' => '25' ,
	'id_depot' => @$Pile[0]['id_depot'] )), array('ajax' => ($v=( @$Pile[0]['ajax'] ))?$v:true,'compil'=>array('../plugins-dist/svp/prive/objets/contenu/depot-enfants.html','html_004bbd4bf180761aafc314c379061fe0','',3,$GLOBALS['spip_lang'])), _request('connect')) .
	'

	
')) :
		'');

	return analyse_resultat_skel('html_004bbd4bf180761aafc314c379061fe0', $Cache, $page, '../plugins-dist/svp/prive/objets/contenu/depot-enfants.html');
}
?>