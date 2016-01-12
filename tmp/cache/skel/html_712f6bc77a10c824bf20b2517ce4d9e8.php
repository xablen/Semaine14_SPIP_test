<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/contenu/depots.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:02 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/contenu/depots.html
// Temps de compilation total: 7.621 ms
//

function html_712f6bc77a10c824bf20b2517ce4d9e8($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('ajouter', '_plugins')?" ":""))) .
'
<h1 class="grostitre">' .
_T('public|spip|ecrire:icone_admin_plugin') .
'</h1>


' .
barre_onglets('plugins','charger_plugin') .
'


<div class="onglets_simple second clearfix">
	<ul>
		<li><a' .
(($t1 = strval(generer_url_ecrire('charger_plugin')))!=='' ?
		(' href="' . $t1 . '"') :
		'') .
'>' .
_T('svp:titre_plugins') .
'</a></li>
		<li><strong>' .
_T('svp:titre_depots') .
'</strong></li>
	</ul>
</div>


' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/objets/liste/depots') . ', array_merge('.var_export($Pile[0],1).',array(\'titre\' => ' . argumenter_squelette(_T('svp:titre_liste_depots')) . ',
	\'par\' => ' . argumenter_squelette('nbr_paquets') . ',
	\'pas\' => ' . argumenter_squelette('10') . ',
	\'affichage\' => ' . argumenter_squelette('complet') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/prive/squelettes/contenu/depots.html\',\'html_712f6bc77a10c824bf20b2517ce4d9e8\',\'\',16,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>

<div class="noajax">
	
	' .
executer_balise_dynamique('FORMULAIRE_AJOUTER_DEPOT',
	array(),
	array('../plugins-dist/svp/prive/squelettes/contenu/depots.html','html_712f6bc77a10c824bf20b2517ce4d9e8','',25,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_712f6bc77a10c824bf20b2517ce4d9e8', $Cache, $page, '../plugins-dist/svp/prive/squelettes/contenu/depots.html');
}
?>