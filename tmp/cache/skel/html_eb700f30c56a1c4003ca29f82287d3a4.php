<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/charger_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:50 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:33 GMT
 * Boucles :   _depot_existe
 */ 

function BOUCLE_depot_existehtml_eb700f30c56a1c4003ca29f82287d3a4(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_depot_existe';
		$command['from'] = array('depots' => 'spip_depots');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['where'] = 
			array();
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/formulaires/charger_plugin.html','html_eb700f30c56a1c4003ca29f82287d3a4','_depot_existe',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<form method="post" action="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
'">

		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-confirmer_actions') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/charger_plugin.html\',\'html_eb700f30c56a1c4003ca29f82287d3a4\',\'\',9,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
        
		
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div>' .
'<input type="hidden" name="exclusion" class=\'hidden\' value="oui" />

		<div class="liste-recherche">
			<fieldset>
				<legend>' .
_T('svp:legende_rechercher_plugins') .
'</legend>
				<p class="explication">' .
_T('svp:info_charger_plugin', array('version' => spip_version())) .
'</p>
				<div class="editer-groupe">
					<div class="editer editer_phrase obligatoire' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'phrase')) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
						<label for="phrase">' .
_T('svp:label_critere_phrase') .
'</label>
						<p class="explication">' .
_T('svp:info_critere_phrase') .
'</p>
						' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'phrase'))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
						<input type="text" name="phrase" id="phrase" value="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'phrase', null),true)) .
'" class="text" placeholder="' .
_T('svp:placeholder_phrase') .
'" />
					</div>
					<div class="editer editer_categorie obligatoire' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'categorie')) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
						<label for="categorie">' .
_T('svp:label_critere_categorie') .
'</label>
						' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'categorie'))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
						' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-select_categorie') . ', array_merge('.var_export($Pile[0],1).',array(\'categorie\' => ' . argumenter_squelette(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/charger_plugin.html\',\'html_eb700f30c56a1c4003ca29f82287d3a4\',\'\',29,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
					</div>
					<div class="editer editer_etat obligatoire' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'etat')) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
						<label for="etat">' .
_T('svp:label_critere_etat') .
'</label>
						' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'etat'))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
						<select name="etat" id="etat">
							<option value="tout_etat"' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'etat', null), 'tout_etat'),true) == 'tout_etat')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
_T('svp:option_etat_tout') .
'</option>
							<option value="stable"' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'etat', null), 'tout_etat'),true) == 'stable')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
ucfirst(_T('public|spip|ecrire:plugin_etat_stable')) .
'</option>
							<option value="test"' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'etat', null), 'tout_etat'),true) == 'test')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
ucfirst(_T('public|spip|ecrire:plugin_etat_test')) .
'</option>
							<option value="dev"' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'etat', null), 'tout_etat'),true) == 'dev')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
ucfirst(_T('public|spip|ecrire:plugin_etat_developpement')) .
'</option>
							<option value="experimental"' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'etat', null), 'tout_etat'),true) == 'experimental')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
ucfirst(_T('public|spip|ecrire:plugin_etat_experimental')) .
'</option>
						</select>
					</div>
					<div class="editer editer_depot obligatoire' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'depot')) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
						<label for="depot">' .
_T('svp:label_critere_depot') .
'</label>
						' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'depot'))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
						' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-select_depot') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/charger_plugin.html\',\'html_eb700f30c56a1c4003ca29f82287d3a4\',\'\',45,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
					</div>
					<div class="editer editer_doublon obligatoire' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'doublon')) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
						<label for="doublon">' .
_T('svp:label_critere_doublon') .
'</label>
						' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'doublon'))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
						<select name="doublon" id="doublon">
							<option value="non"' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'doublon', null),true) == 'non')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
_T('svp:option_doublon_non') .
'</option>
							<option value="oui"' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'doublon', null),true) == 'oui')) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'selected="selected"') :
		'') .
'>' .
_T('svp:option_doublon_oui') .
'</option>
						</select>
					</div>
				</div>
			</fieldset>

		<p class="boutons recherche"><input type="submit" name="rechercher" class="submit" value="' .
_T('public|spip|ecrire:info_rechercher') .
'" /></p>
		</div>

		' .
(($t1 = strval(interdire_scripts((((((((((((entites_html(table_valeur(@$Pile[0], (string)'phrase', null),true)) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'depot', null),true)))) ?' ' :'')) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true)))) ?' ' :'')) OR (interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'etat', null),true)) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'doublon', null),true)))) ?' ' :'')))) ?' ' :'')) ?' ' :''))))!=='' ?
		($t1 . (	'
		<div class="liste-plugins">
			<fieldset>
				<legend>' .
	_T('svp:legende_installer_plugins') .
	'</legend>
				' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-plugins_trouves') . ', array_merge('.var_export($Pile[0],1).',array(\'plugins\' => ' . argumenter_squelette(interdire_scripts(table_valeur(table_valeur(@$Pile[0], (string)'message_ok', null),'plugins'))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/charger_plugin.html\',\'html_eb700f30c56a1c4003ca29f82287d3a4\',\'\',65,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
			</fieldset>
			<p class="boutons actions"' .
	(($t2 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'ids_paquet', null),true)) ?'' :' '))))!=='' ?
			($t2 . ' style="display:none"') :
			'') .
	'><input type="submit" name="installer" class="submit" value="' .
	_T('svp:bouton_installer') .
	'" /></p>
		</div>')) :
		'') .
'
	</form>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_depot_existe @ ../plugins-dist/svp/formulaires/charger_plugin.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/charger_plugin.html
// Temps de compilation total: 81.476 ms
//

function html_eb700f30c56a1c4003ca29f82287d3a4($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_charger_plugin" id="formulaire_charger_plugin">
	<h3 class="titrem">' .
interdire_scripts(filtre_balise_img_dist(chemin_image('plugin-add-24.png'),'icone ajouter_plugin-24','cadre-icone')) .
_T('svp:titre_form_charger_plugin') .
'</h3>

	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_erreur', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_ok', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = BOUCLE_depot_existehtml_eb700f30c56a1c4003ca29f82287d3a4($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
	' .
	boite_ouvrir('', 'notice') .
	'<p>' .
	_T('svp:message_nok_aucun_depot_disponible') .
	'</p>
	' .
	boite_fermer() .
	'
'))) .
'
</div>
');

	return analyse_resultat_skel('html_eb700f30c56a1c4003ca29f82287d3a4', $Cache, $page, '../plugins-dist/svp/formulaires/charger_plugin.html');
}
?>