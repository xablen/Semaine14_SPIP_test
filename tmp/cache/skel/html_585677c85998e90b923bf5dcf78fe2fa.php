<?php

/*
 * Squelette : ../plugins-dist/medias/prive/objets/contenu/portfolio_document.html
 * Date :      Tue, 12 Jan 2016 07:49:23 GMT
 * Compile :   Tue, 12 Jan 2016 08:03:09 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/medias/prive/objets/contenu/portfolio_document.html
// Temps de compilation total: 2.328 ms
//

function html_585677c85998e90b923bf5dcf78fe2fa($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = strval(recuperer_fond( 'prive/squelettes/inclure/portfolio-documents' , array_merge($Pile[0],array('id_unique' => '' )), array('ajax' => ($v=( 'documents' ))?$v:true,'compil'=>array('../plugins-dist/medias/prive/objets/contenu/portfolio_document.html','html_585677c85998e90b923bf5dcf78fe2fa','',2,$GLOBALS['spip_lang'])), _request('connect'))))!=='' ?
		('
' . $t1 . '
') :
		'') .
'
' .
(($t1 = strval(recuperer_fond( 'prive/squelettes/inclure/ajouter-documents' , array_merge($Pile[0],array()), array('ajax' => ($v=( @$Pile[0]['ajax'] ))?$v:true,'compil'=>array('../plugins-dist/medias/prive/objets/contenu/portfolio_document.html','html_585677c85998e90b923bf5dcf78fe2fa','',2,$GLOBALS['spip_lang'])), _request('connect'))))!=='' ?
		('
' . $t1 . '
') :
		'') .
'
');

	return analyse_resultat_skel('html_585677c85998e90b923bf5dcf78fe2fa', $Cache, $page, '../plugins-dist/medias/prive/objets/contenu/portfolio_document.html');
}
?>