<?php

/*
 * Squelette : ../prive/squelettes/contenu/rubrique_edit.html
 * Date :      Tue, 12 Jan 2016 07:48:44 GMT
 * Compile :   Tue, 12 Jan 2016 08:00:02 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/contenu/rubrique_edit.html
// Temps de compilation total: 1.154 ms
//

function html_7beb490b0eabad97e8cfc9803df5b6b3($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/echafaudage/contenu/objet_edit') . ', array_merge('.var_export($Pile[0],1).',array(\'objet\' => ' . argumenter_squelette('rubrique') . ',
	\'id_objet\' => ' . argumenter_squelette(@$Pile[0]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/contenu/rubrique_edit.html\',\'html_7beb490b0eabad97e8cfc9803df5b6b3\',\'\',1,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>';

	return analyse_resultat_skel('html_7beb490b0eabad97e8cfc9803df5b6b3', $Cache, $page, '../prive/squelettes/contenu/rubrique_edit.html');
}
?>