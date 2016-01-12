<?php

/*
 * Squelette : squelettes-dist/formulaires/ecrire_auteur.html
 * Date :      Tue, 12 Jan 2016 07:50:45 GMT
 * Compile :   Tue, 12 Jan 2016 09:21:16 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/ecrire_auteur.html
// Temps de compilation total: 20.639 ms
//

function html_9d96364ed1d79895affe5b2e3d246085($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_ecrire_auteur ajax" id="formulaire_ecrire_auteur' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
'">
<br class=\'bugajaxie\' />
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
<form method=\'post\' action=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'#formulaire_ecrire_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'\' enctype=\'multipart/form-data\'>
	
	' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div>
	' .
	(($t2 = strval(interdire_scripts(((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'previsu')) ?' ' :''))))!=='' ?
			($t2 . (	'
	<fieldset class="previsu">
		<legend>' .
		_T('public|spip|ecrire:previsualisation') .
		'</legend>
		<ul>
			<li><strong>' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'sujet_message_auteur', null),true)) .
		'</strong> - <em>' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'email_message_auteur', null),true)) .
		'</em></li>
			<li>' .
		interdire_scripts(nl2br(entites_html(table_valeur(@$Pile[0], (string)'texte_message_auteur', null),true))) .
		'</li>
		</ul>
		<p class="boutons"><input type="submit" class="submit" name="confirmer" value="' .
		_T('public|spip|ecrire:form_prop_confirmer_envoi') .
		'" /></p>
	</fieldset>
	')) :
			'') .
	'
	
	<fieldset>
		<legend>' .
	_T('public|spip|ecrire:envoyer_message') .
	'</legend>
		<ul class="editer-groupe">
			<li class=\'editer saisie_email_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'email_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="email_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'">' .
	_T('public|spip|ecrire:entree_adresse_email') .
	' ' .
	_T('public|spip|ecrire:info_obligatoire_02') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'email_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input' .
	(($t2 = strval(('' ? 'required="required" type="email" class="text email"':'type="text" class="text"')))!=='' ?
			(' ' . $t2) :
			'') .
	' name="email_message_auteur" id="email_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'" value="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'email_message_auteur', null),true)) .
	'" size="30" />
			</li>
			<li class=\'editer saisie_sujet_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'sujet_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="sujet_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'">' .
	_T('public|spip|ecrire:form_prop_sujet') .
	' ' .
	_T('public|spip|ecrire:info_obligatoire_02') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'sujet_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="sujet_message_auteur" id="sujet_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'" value="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'sujet_message_auteur', null),true)) .
	'" size="30"' .
	' />
			</li>
			<li class=\'editer saisie_texte_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="texte_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'">' .
	_T('public|spip|ecrire:info_texte_message') .
	' ' .
	_T('public|spip|ecrire:info_obligatoire_02') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<textarea name="texte_message_auteur" id="texte_message_auteur' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'" rows="10" cols="60">' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'texte_message_auteur', null),true)) .
	'</textarea>
			</li>
		</ul>
	</fieldset>
	
	<p style="display: none;">
		<label for="nobot">' .
	_T('public|spip|ecrire:antispam_champ_vide') .
	'</label>
		<input type="text" class="text" name="nobot" id="nobot" value="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nobot', null),true)) .
	'" size="10" />
	</p>
	<p class="boutons"><input type="submit" class="submit" name="valide" value="' .
	_T('public|spip|ecrire:form_prop_envoyer') .
	'" /></p>
</form>
')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_9d96364ed1d79895affe5b2e3d246085', $Cache, $page, 'squelettes-dist/formulaires/ecrire_auteur.html');
}
?>