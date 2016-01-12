<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/charger_plugin_archive.html
 * Date :      Tue, 12 Jan 2016 07:49:50 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:33 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/charger_plugin_archive.html
// Temps de compilation total: 3.291 ms
//

function html_d0b1fbee1e1038cd9b8b0d543bd3fdcf($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'formulaire_spip formulaire_configurer\'>
<h3 class=\'titrem\'>' .
_T('svp:titre_form_charger_plugin_archive') .
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

	<form method="post" action="' .
self() .
'"><div>
		' .
	'<div>' .
	form_hidden(@$Pile[0]['action']) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div>
		' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'erreurs/confirmer', null),true))))!=='' ?
		('<p class=\'notice\'>' . $t1 . (	'
			<p class=\'boutons\'><input class=\'submit\' type="submit" name=\'confirmer\' value="' .
	_T('svp:bouton_confirmer') .
	'" /></p>
		</p>')) :
		'') .
'

		<p class=\'explication\'>' .
_T('svp:telecharger_archive_plugin_explication') .
'</p>
		<div class="editer-groupe">
			<div class="editer editer_archive haut obligatoire' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'erreurs/archive', null),true)) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
				<label for="archive">' .
_T('svp:label_archive') .
'</label>
				' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'erreurs/archive', null),true))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
				<input type="text" name="archive" value="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'archive', null),true)) .
'" class="text" />
			</div>
			<div class="editer editer_destination' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'erreurs/destination', null),true)) ?' ' :''))))!=='' ?
		($t1 . ' erreur') :
		'') .
'">
				<label for="destination">' .
_T('svp:label_destination') .
'</label>
				' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'erreurs/destination', null),true))))!=='' ?
		('<span class="erreur_message">' . $t1 . '</span>') :
		'') .
'
				<p class=\'explication\'>' .
_T('svp:explication_destination') .
'</p>
				<input type="text" name="destination" value="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'destination', null),true)) .
'" class="text" />
			</div>
		</div>
		<p class=\'boutons\'><input class=\'submit\' type="submit" value="' .
_T('public|spip|ecrire:bouton_telecharger') .
'" /></p>
	</div></form>

</div>
');

	return analyse_resultat_skel('html_d0b1fbee1e1038cd9b8b0d543bd3fdcf', $Cache, $page, '../plugins-dist/svp/formulaires/charger_plugin_archive.html');
}
?>