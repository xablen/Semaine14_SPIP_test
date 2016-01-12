<?php

/*
 * Squelette : ../prive/formulaires/configurer_multilinguisme.html
 * Date :      Tue, 12 Jan 2016 07:48:41 GMT
 * Compile :   Tue, 12 Jan 2016 08:07:06 GMT
 * Boucles :   _objets
 */ 

function BOUCLE_objetshtml_686c532ec08a42583d4fcf9f2b04aa0d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['source'] = array(lister_tables_objets_sql(''));
	$command['sourcemode'] = 'table';
	if (!isset($si_init)) { $command['si'] = array(); $si_init = true; }
	$command['si'][] = interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_objets';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".cle",
		".valeur");
		$command['orderby'] = array();
		$command['where'] = 
			array(
			array('NOT', 
			array('=', 'cle', "'spip_rubriques'")), 
			array('NOT', 
			array('=', 'cle', "'spip_auteurs'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../prive/formulaires/configurer_multilinguisme.html','html_686c532ec08a42583d4fcf9f2b04aa0d','_objets',53,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (($t1 = strval(interdire_scripts((((table_supporte_lang($Pile[$SP]['cle'])) AND (interdire_scripts(objet_info(table_valeur($Pile[$SP]['valeur'], 'type'),'editable')))) ?' ' :''))))!=='' ?
		($t1 . (	'
			' .
	vide($Pile['vars'][$_zzz=(string)'val'] = interdire_scripts($Pile[$SP]['cle'])) .
	'<div class="fieldset">
				<fieldset>
					' .
	vide($Pile['vars'][$_zzz=(string)'objets'] = interdire_scripts(_T(table_valeur($Pile[$SP]['valeur'], 'texte_objets')))) .
	'<div class="editer-groupe">
						' .
	vide($Pile['vars'][$_zzz=(string)'name'] = 'multi_objets') .
	vide($Pile['vars'][$_zzz=(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),table_valeur($Pile["vars"], (string)'name', null))) .
	'<div class="editer editer_' .
	table_valeur($Pile["vars"], (string)'name', null) .
	(($t2 = strval(table_valeur($Pile["vars"], (string)'obli', null)))!=='' ?
			(' ' . $t2) :
			'') .
	((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
							<label>' .
	table_valeur($Pile["vars"], (string)'objets', null) .
	'</label>' .
	(($t2 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
			('
							<span class=\'erreur_message\'>' . $t2 . '</span>
							') :
			'') .
	'<div class="choix">
								<input type="checkbox" name="' .
	table_valeur($Pile["vars"], (string)'name', null) .
	'&#91;&#93;" id="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	table_valeur($Pile["vars"], (string)'name', null) .
	'_oui" value="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	'"
								' .
	((in_any(table_valeur($Pile["vars"], (string)'val', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null),true))))  ?
			(' ' . 'checked="checked"') :
			'') .
	' /><label for="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	table_valeur($Pile["vars"], (string)'name', null) .
	'_oui">' .
	_T('public|spip|ecrire:info_multi_objets', array('objets' => table_valeur($Pile["vars"], (string)'objets', null))) .
	'</label>
							</div>
						</div>
						' .
	(($t2 = strval(interdire_scripts(((table_supporte_trad($Pile[$SP]['cle'])) ?' ' :''))))!=='' ?
			($t2 . (	'
						' .
		vide($Pile['vars'][$_zzz=(string)'name'] = 'gerer_trad_objets') .
		vide($Pile['vars'][$_zzz=(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),table_valeur($Pile["vars"], (string)'name', null))) .
		'<div class="editer editer_' .
		table_valeur($Pile["vars"], (string)'name', null) .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'obli', null)))!=='' ?
				(' ' . $t3) :
				'') .
		((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<div class="choix">
								<input type="checkbox" name="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'&#91;&#93;" id="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui" value="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		'"
								' .
		((in_any(table_valeur($Pile["vars"], (string)'val', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null),true))))  ?
				(' ' . 'checked="checked"') :
				'') .
		' /><label for="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui">' .
		_T('public|spip|ecrire:info_gerer_trad_objets', array('objets' => table_valeur($Pile["vars"], (string)'objets', null))) .
		'</label>
							</div>
						</div>
						')) :
			'') .
	'
					</div>
				</fieldset>
			</div>')) :
		'');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_objets @ ../prive/formulaires/configurer_multilinguisme.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/formulaires/configurer_multilinguisme.html
// Temps de compilation total: 73.425 ms
//

function html_686c532ec08a42583d4fcf9f2b04aa0d($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_configurer formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
' formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'-' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'id', null), 'nouveau'),true)) .
'">
<h3 class=\'titrem\'><img src="' .
interdire_scripts(chemin_image('traduction-24.png')) .
'" class="cadre-icone" />' .
_T('public|spip|ecrire:info_multilinguisme') .
'&nbsp;:&nbsp;' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'_langue_site', null),true)) .
'</h3>
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_ok', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_erreur', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'
	<p>' .
	_T('public|spip|ecrire:texte_multilinguisme') .
	'</p>
	<p>' .
	_T('public|spip|ecrire:texte_multilinguisme_trad') .
	'</p>
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><input type="hidden" name="multi_objets&#91;&#93;" value="" />
		<input type="hidden" name="gerer_trad_objets&#91;&#93;" value="" />
	  <div class="editer-groupe">
			<div class="fieldset">
				<fieldset><div class="editer-groupe">
					' .
	vide($Pile['vars'][$_zzz=(string)'objets'] = _T(objet_info('rubrique','texte_objets'))) .
	vide($Pile['vars'][$_zzz=(string)'val'] = 'spip_rubriques') .
	vide($Pile['vars'][$_zzz=(string)'name'] = 'multi_objets') .
	vide($Pile['vars'][$_zzz=(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),table_valeur($Pile["vars"], (string)'name', null))) .
	'<div class="editer editer_' .
	table_valeur($Pile["vars"], (string)'name', null) .
	(($t2 = strval(table_valeur($Pile["vars"], (string)'obli', null)))!=='' ?
			(' ' . $t2) :
			'') .
	((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
							<label>' .
	table_valeur($Pile["vars"], (string)'objets', null) .
	'</label>' .
	(($t2 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
			('
							<span class=\'erreur_message\'>' . $t2 . '</span>
							') :
			'') .
	'<div class="choix">
								<input type="checkbox" name="' .
	table_valeur($Pile["vars"], (string)'name', null) .
	'&#91;&#93;" id="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	table_valeur($Pile["vars"], (string)'name', null) .
	'_oui" value="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	'"
								' .
	((in_any(table_valeur($Pile["vars"], (string)'val', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null),true))))  ?
			(' ' . 'checked="checked"') :
			'') .
	' /><label for="' .
	table_valeur($Pile["vars"], (string)'val', null) .
	table_valeur($Pile["vars"], (string)'name', null) .
	'_oui">' .
	_T('public|spip|ecrire:info_multi_objets', array('objets' => table_valeur($Pile["vars"], (string)'objets', null))) .
	'</label>
							</div>
						</div>
						' .
	((in_any(table_valeur($Pile["vars"], (string)'val', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'multi_objets', null),true))))  ?
			(' ' . (	'
						' .
		vide($Pile['vars'][$_zzz=(string)'name'] = 'multi_secteurs') .
		vide($Pile['vars'][$_zzz=(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),table_valeur($Pile["vars"], (string)'name', null))) .
		'<div class="editer editer_' .
		table_valeur($Pile["vars"], (string)'name', null) .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'obli', null)))!=='' ?
				(' ' . $t3) :
				'') .
		((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<div class="choix">
								<input type="hidden" name="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_check" value="1" />
								<input type="checkbox" name="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'" id="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui" value="oui"
								' .
		(($t3 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null),true) == 'oui')) ?' ' :''))))!=='' ?
				($t3 . 'checked="checked"') :
				'') .
		' /><label for="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui">' .
		_T('public|spip|ecrire:info_multi_secteurs') .
		'</label>
							</div>
						</div>
						')) :
			'') .
	'
						' .
	((table_supporte_trad('spip_rubriques'))  ?
			(' ' . (	'
						' .
		vide($Pile['vars'][$_zzz=(string)'name'] = 'gerer_trad_objets') .
		vide($Pile['vars'][$_zzz=(string)'erreurs'] = table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),table_valeur($Pile["vars"], (string)'name', null))) .
		'<div class="editer editer_' .
		table_valeur($Pile["vars"], (string)'name', null) .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'obli', null)))!=='' ?
				(' ' . $t3) :
				'') .
		((table_valeur($Pile["vars"], (string)'erreurs', null))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<div class="choix">
								<input type="checkbox" name="' .
		table_valeur($Pile["vars"], (string)'name', null) .
		'&#91;&#93;" id="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui" value="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		'"
								' .
		((in_any(table_valeur($Pile["vars"], (string)'val', null),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null),true))))  ?
				(' ' . 'checked="checked"') :
				'') .
		' /><label for="' .
		table_valeur($Pile["vars"], (string)'val', null) .
		table_valeur($Pile["vars"], (string)'name', null) .
		'_oui">' .
		_T('public|spip|ecrire:info_gerer_trad_objets', array('objets' => table_valeur($Pile["vars"], (string)'objets', null))) .
		'</label>
							</div>
						</div>
						')) :
			'') .
	'
					</div>
				</fieldset>
			</div>
			')) :
		'') .
'
			' .
BOUCLE_objetshtml_686c532ec08a42583d4fcf9f2b04aa0d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'
		</div>
		<p class=\'boutons\'><span class=\'image_loading\'>&nbsp;</span><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public|spip|ecrire:bouton_enregistrer') .
	'\' /></p>
		<div class="editer-groupe">
			' .
	(($t2 = strval(sinon(table_valeur(@$Pile[0], (string)'_langues', null), '')))!=='' ?
			((	'<div class="fieldset">
				<fieldset>
					<legend>' .
		_T('public|spip|ecrire:icone_gestion_langues') .
		'</legend>
					<p>' .
		_T('public|spip|ecrire:info_multi_langues_choisies') .
		'
						' .
		(($t3 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'_nb_langues_selection', null),true) > '10')) ?' ' :''))))!=='' ?
				($t3 . (	'
						(<a href="#" onclick="jQuery(\'#langues_proposees\').find(\'input[type=checkbox]\').attr(\'checked\',false);return false;">' .
			_T('public|spip|ecrire:lien_tout_decocher') .
			'</a>)
						')) :
				'') .
		'
					</p>
					') . $t2 . (	'
					<p>' .
		_T('public|spip|ecrire:info_multi_langues_soulignees') .
		'</p>
				</fieldset>
			</div>
			')) :
			'') .
	'
		</div>
	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\'><span class=\'image_loading\'>&nbsp;</span><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public|spip|ecrire:bouton_enregistrer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_686c532ec08a42583d4fcf9f2b04aa0d', $Cache, $page, '../prive/formulaires/configurer_multilinguisme.html');
}
?>