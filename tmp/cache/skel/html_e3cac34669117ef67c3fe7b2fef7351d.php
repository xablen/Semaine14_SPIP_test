<?php

/*
 * Squelette : squelettes/inc/inc-bandeau.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:04 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/inc/inc-bandeau.html
// Temps de compilation total: 31.815 ms
//

function html_e3cac34669117ef67c3fe7b2fef7351d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- L\'entete du site -->
<div id="entete" class="pas_surlignable">
	<a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public|spip|ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'" class="nom-site"><span>' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'</span></a>


  
</div><!-- entete -->');

	return analyse_resultat_skel('html_e3cac34669117ef67c3fe7b2fef7351d', $Cache, $page, 'squelettes/inc/inc-bandeau.html');
}
?>