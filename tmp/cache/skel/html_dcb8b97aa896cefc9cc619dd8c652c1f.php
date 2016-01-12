<?php

/*
 * Squelette : squelettes/inc/inc-bas_cc.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 10:43:05 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/inc/inc-bas_cc.html
// Temps de compilation total: 0.696 ms
//

function html_dcb8b97aa896cefc9cc619dd8c652c1f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- Creative Commons License -->

<p>
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" accesskey="8"><img alt="Creative Commons License" style="border: 0;" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a> 
</p>');

	return analyse_resultat_skel('html_dcb8b97aa896cefc9cc619dd8c652c1f', $Cache, $page, 'squelettes/inc/inc-bas_cc.html');
}
?>