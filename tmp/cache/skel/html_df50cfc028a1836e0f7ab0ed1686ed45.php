<?php

/*
 * Squelette : ../plugins-dist/mediabox/formulaires/configurer_mediabox.html
 * Date :      Tue, 12 Jan 2016 07:50:27 GMT
 * Compile :   Tue, 12 Jan 2016 09:12:27 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/mediabox/formulaires/configurer_mediabox.html
// Temps de compilation total: 28.581 ms
//

function html_df50cfc028a1836e0f7ab0ed1686ed45($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_configurer formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'">

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
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
'"><div>
	' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><div class="editer-groupe">
		<div class="editer editer_active' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'active'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
			<div class="choix">
				<input type="checkbox" name="active" class="checkbox" id="active_on" value="oui" ' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'active', null), 'oui'),true) == 'oui')) ?' ' :''))))!=='' ?
		($t1 . ' checked="checked"') :
		'') .
'
					onclick="jQuery(this).blur();"
					onchange="var t=jQuery(this).parents(\'li\').eq(0).siblings(\'.fieldset\');if (jQuery(this).prop(\'checked\')) t.show(\'fast\'); else t.hide(\'fast\');"
				/>
				<label for=\'active_on\'><strong>' .
_T('mediabox:label_active') .
'</strong></label>
			</div>
		</div>
		<div class="fieldset' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'active', null), 'oui'),true) == 'oui')) ?'' :' '))))!=='' ?
		($t1 . 'none') :
		'') .
'">
			<div class="editer-groupe">
				<div class="editer editer_selecteur_commun' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'selecteur_commun'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
					<label for="selecteur_commun">' .
_T('mediabox:label_selecteur_commun') .
'</label>
					' .
(($t1 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'selecteur_commun')))!=='' ?
		('<span class=\'erreur\'>' . $t1 . '</span>') :
		'') .
'
					<p class="explication">' .
_T('mediabox:explication_selecteur') .
'</p>
					<input type="text" name="selecteur_commun" class="text" id="selecteur_commun" size="60" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'selecteur_commun', null)) .
'" />
				</div>
				<div class="editer editer_selecteur_galerie' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'selecteur_galerie'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
					<label for="selecteur_galerie">' .
_T('mediabox:label_selecteur_galerie') .
'</label>
					' .
(($t1 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'selecteur_galerie')))!=='' ?
		('<span class=\'erreur\'>' . $t1 . '</span>') :
		'') .
'
					<p class="explication">' .
_T('mediabox:explication_selecteur_galerie') .
'</p>
					<input type="text" name="selecteur_galerie" class="text" id="selecteur_galerie" size="60" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'selecteur_galerie', null)) .
'" />
				</div>

				<div class="editer editer_traiter_toutes_images' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'traiter_toutes_images'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
					<label>' .
_T('mediabox:label_traiter_toutes_images') .
'</label>
					<p class="explication">' .
_T('mediabox:explication_traiter_toutes_images') .
'</p>
					<div class="choix">
						<input type="radio" name="traiter_toutes_images" class="radio" id="traiter_images_on" value="oui" ' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'traiter_toutes_images', null), 'oui'),true) == 'oui')) ?' ' :''))))!=='' ?
		($t1 . ' checked="checked"') :
		'') .
' />
						<label for=\'traiter_images_on\'>' .
_T('public|spip|ecrire:item_oui') .
'</label>
					</div>
					<div class="choix">
						<input type="radio" name="traiter_toutes_images" class="radio" id="traiter_images_off" value="non" ' .
(($t1 = strval(interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'traiter_toutes_images', null), 'oui'),true) == 'non')) ?' ' :''))))!=='' ?
		($t1 . ' checked="checked"') :
		'') .
' />
						<label for=\'traiter_images_off\'>' .
_T('public|spip|ecrire:item_non') .
'</label>
					</div>
				</div>

				<div class="fieldset"><fieldset><legend>' .
_T('mediabox:label_apparence') .
'</legend>
				<div class="editer-groupe">
					' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',box_choisir_skin(entites_html(table_valeur(@$Pile[0], (string)'_skins', null),true),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'skin', null),true))),'130')))))!=='' ?
		((	'<div class="editer editer_skin' .
	((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'skin'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
						<label>' .
	_T('mediabox:label_skin') .
	'</label>
						') . $t1 . '
					</div>') :
		'') .
'
					<div class="editer editer_transition' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'transition'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'transition\'>' .
_T('mediabox:label_transition') .
'</label>
						<select name="transition" id="transition">
							<option value="elastic"' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'transition', null),true) == 'elastic')) ?' ' :''))))!=='' ?
		($t1 . 'selected="selected"') :
		'') .
'>' .
_T('mediabox:label_choix_transition_elastic') .
'</option>
							<option value="fade"' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'transition', null),true) == 'fade')) ?' ' :''))))!=='' ?
		($t1 . 'selected="selected"') :
		'') .
'>' .
_T('mediabox:label_choix_transition_fade') .
'</option>
							<option value="none"' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'transition', null),true) == 'none')) ?' ' :''))))!=='' ?
		($t1 . 'selected="selected"') :
		'') .
'>' .
_T('mediabox:label_choix_transition_none') .
'</option>
						</select>
					</div>
					<div class="editer editer_speed' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'speed'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'speed\'>' .
_T('mediabox:label_speed') .
'</label>
						<input type="text" name="speed" class="text" id="speed" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'speed', null)) .
'" />
					</div>
					<div class="editer minWidth' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'minWidth'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'minWidth\'>' .
_T('mediabox:label_minwidth') .
'</label>
						<input type="text" name="minWidth" class="text" id="minWidth" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'minWidth', null)) .
'" />
					</div>
					<div class="editer maxWidth' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'maxWidth'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'maxWidth\'>' .
_T('mediabox:label_maxwidth') .
'</label>
						<input type="text" name="maxWidth" class="text" id="maxWidth" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'maxWidth', null)) .
'" />
					</div>
					<div class="editer minHeight' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'minHeight'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'minHeight\'>' .
_T('mediabox:label_minheight') .
'</label>
						<input type="text" name="minHeight" class="text" id="minHeight" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'minHeight', null)) .
'" />
					</div>
					<div class="editer maxHeight' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'maxHeight'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'maxHeight\'>' .
_T('mediabox:label_maxheight') .
'</label>
						<input type="text" name="maxHeight" class="text" id="maxHeight" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'maxHeight', null)) .
'" />
					</div>
					<div class="editer editer_slideshow_speed' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'slideshow_speed'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'slideshow_speed\'>' .
_T('mediabox:label_slideshow_speed') .
'</label>
						<input type="text" name="slideshow_speed" class="text" id="slideshow_speed" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'slideshow_speed', null)) .
'" />
					</div>
					<div class="editer editer_opacite' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'opacite'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'opacite\'>' .
_T('mediabox:label_opacite') .
'</label>
						<input type="text" name="opacite" class="text" id="opacite" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'opacite', null)) .
'" />
					</div>
				</div></fieldset>
				</div>

				<div class="fieldset"><fieldset><legend>' .
_T('mediabox:label_splash') .
'</legend>
				<div class="editer-groupe">
					<div class="editer editer_splash_url' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'splash_url'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for="splash_url">' .
_T('mediabox:label_splash_url') .
'</label>
						' .
(($t1 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'splash_url')))!=='' ?
		('<span class=\'erreur\'>' . $t1 . '</span>') :
		'') .
'
						<p class="explication">' .
_T('mediabox:explication_splash_url') .
'</p>
						<input type="text" name="splash_url" class="text" id="splash_url" size="60" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'splash_url', null)) .
'" />
					</div>
					<div class="editer splash_width' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'splash_width'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'splash_width\'>' .
_T('mediabox:label_splash_width') .
'</label>
						<input type="text" name="splash_width" class="text" id="splash_width" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'splash_width', null)) .
'" />
					</div>
					<div class="editer splash_height' .
((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'splash_height'))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
						<label for=\'splash_height\'>' .
_T('mediabox:label_splash_height') .
'</label>
						<input type="text" name="splash_height" class="text" id="splash_height" size="10" value="' .
interdire_scripts(table_valeur(@$Pile[0], (string)'splash_height', null)) .
'" />
					</div>
				</div></fieldset>
				</div>
			</div>
		</div>
	</div>

	<p class="boutons">
		<input type="submit" name="enregistrer" class="over" value="' .
_T('public|spip|ecrire:bouton_valider') .
'" />
		<input type="submit" name="reinit" class="submit" value="' .
_T('mediabox:bouton_reinitialiser') .
'" />
		<input type="submit" name="enregistrer" class="submit" value="' .
_T('public|spip|ecrire:bouton_valider') .
'" />
	</p>
</div></form>
</div>
<style type="text/css">
	.editer-groupe .editer_skin .choix { overflow: hidden; margin-top: 10px; width: 155px; margin-' .
lang_dir(@$Pile[0]['lang'], 'right','left') .
': 10px; float: ' .
lang_dir(@$Pile[0]['lang'], 'left','right') .
'; background-color: transparent; border: 0; }
	.editer_skin .choix input { float: ' .
lang_dir(@$Pile[0]['lang'], 'left','right') .
'; }
	.editer_skin .choix label img { float: ' .
lang_dir(@$Pile[0]['lang'], 'left','right') .
'; border: 1px solid #ddd; }
</style>');

	return analyse_resultat_skel('html_df50cfc028a1836e0f7ab0ed1686ed45', $Cache, $page, '../plugins-dist/mediabox/formulaires/configurer_mediabox.html');
}
?>