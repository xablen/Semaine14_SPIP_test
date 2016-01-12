<?php

/*
 * Squelette : ../prive/formulaires/rediriger_article.html
 * Date :      Tue, 12 Jan 2016 07:48:41 GMT
 * Compile :   Tue, 12 Jan 2016 08:07:46 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/rediriger_article.html
// Temps de compilation total: 18.686 ms
//

function html_b861657909559fe24fe8ee3e0bf18964($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
' formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'-' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
'" id="formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'-' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
'">
	' .
(($t1 = strval(PtoBR(table_valeur(@$Pile[0], (string)'_afficher_url', null))))!=='' ?
		((	'<h3 class="titrem">' .
	interdire_scripts(filtre_balise_img_dist(chemin_image('site-24.png'),'','cadre-icone')) .
	_T('public|spip|ecrire:texte_article_virtuel') .
	'<br />') . $t1 . '</h3>') :
		'') .
'
	' .
(($t1 = strval(table_valeur(@$Pile[0], (string)'message_ok', null)))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(table_valeur(@$Pile[0], (string)'message_erreur', null)))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'#formulaire_' .
	interdire_scripts(@$Pile[0]['form']) .
	'-' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><div class="editer-groupe">
			' .
	vide($Pile['vars'][$_zzz=(string)'name'] = 'redirection') .
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
				<label for="' .
	table_valeur($Pile["vars"], (string)'name', null) .
	'-' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'">' .
	_T('public|spip|ecrire:bouton_redirection') .
	' ' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artvirt','../prive/formulaires/rediriger_article.html', $Pile[0]):'')) .
	'</label>' .
	(($t2 = strval(table_valeur($Pile["vars"], (string)'erreurs', null)))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<p class="explication">' .
	_T('public|spip|ecrire:texte_reference_mais_redirige') .
	'</p>
				<input type="text" class="text" name="' .
	table_valeur($Pile["vars"], (string)'name', null) .
	'" id="' .
	table_valeur($Pile["vars"], (string)'name', null) .
	'-' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id', null),true)) .
	'" value="' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)table_valeur($Pile["vars"], (string)'name', null), null), 'http://'),true)) .
	'"
				onfocus="jQuery(this).parents(\'.editer-groupe\').siblings(\'.boutons:hidden\').show(\'fast\');"/>
				
			</div>
		</div>
	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\' style="display:none;"><span class=\'image_loading\'>&nbsp;</span><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public|spip|ecrire:bouton_changer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_b861657909559fe24fe8ee3e0bf18964', $Cache, $page, '../prive/formulaires/rediriger_article.html');
}
?>