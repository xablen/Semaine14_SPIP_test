<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/ajouter_depot.html
 * Date :      Tue, 12 Jan 2016 07:49:50 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:02 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/ajouter_depot.html
// Temps de compilation total: 6.612 ms
//

function html_e3df56d2e9c6113c36da62f85750cb42($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_ajouter_depot" id="formulaire_ajouter_depot">
	<h3 class="titrem">' .
interdire_scripts(filtre_balise_img_dist(chemin_image('depot-add-24.png'),'icone ajouter_depot-24','cadre-icone')) .
_T('svp:titre_form_ajouter_depot') .
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
	<!-- <br class=\'bugajaxie\' /> -->
	' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'
	<form method="post" action="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'">
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><div>
			<p class="explication">' .
	_T('svp:info_ajouter_depot') .
	'</p>
			<div class="editer-groupe">
				<div class="editer editer_xml_paquets obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'xml_paquets')) ?' ' :''))))!=='' ?
			($t2 . ' erreur') :
			'') .
	'">
					<label for="xml_paquets">' .
	_T('svp:label_xml_depot') .
	'</label>
					<p class="explication">
						' .
	_T('svp:info_fichier_depot') .
	'
						<a class="spip_out" title="' .
	_T('svp:bulle_ajouter_spipzone') .
	'" href="http://plugins.spip.net/depots/principal.xml" onclick="$(\'#xml_paquets\').attr(\'value\',$(this).attr(\'href\')).focus();return false;">' .
	_T('svp:info_adresse_spipzone') .
	'</a>
					</p>
					' .
	(($t2 = strval(interdire_scripts(table_valeur(entites_html(table_valeur(@$Pile[0], (string)'erreurs', null),true),'xml_paquets'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
					<input type="text" name="xml_paquets" id="xml_paquets" value="' .
	(((table_valeur(svp_compter('depot'),'depot') == '0'))  ?
			('http://plugins.spip.net/depots/principal.xml' . ' ') :
			'') .
	'" class="text" />
				</div>
			</div>
	
			<p class="boutons">
				<input type="submit" class="submit" value="' .
	_T('public|spip|ecrire:bouton_ajouter') .
	'" />
			</p>
		</div>
	</form>
	')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_e3df56d2e9c6113c36da62f85750cb42', $Cache, $page, '../plugins-dist/svp/formulaires/ajouter_depot.html');
}
?>