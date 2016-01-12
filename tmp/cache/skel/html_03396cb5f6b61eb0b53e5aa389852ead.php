<?php

/*
 * Squelette : ../tmp/cache/scaffold/contenu/depot.html
 * Date :      Tue, 12 Jan 2016 09:06:08 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../tmp/cache/scaffold/contenu/depot.html
// Temps de compilation total: 1.669 ms
//

function html_03396cb5f6b61eb0b53e5aa389852ead($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/echafaudage/contenu/objet') . ', array_merge('.var_export($Pile[0],1).',array(\'objet\' => ' . argumenter_squelette('depot') . ',
	\'id_objet\' => ' . argumenter_squelette(@$Pile[0]['id_depot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../tmp/cache/scaffold/contenu/depot.html\',\'html_03396cb5f6b61eb0b53e5aa389852ead\',\'\',1,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>';

	return analyse_resultat_skel('html_03396cb5f6b61eb0b53e5aa389852ead', $Cache, $page, '../tmp/cache/scaffold/contenu/depot.html');
}
?>