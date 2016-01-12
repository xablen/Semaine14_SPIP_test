<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/inc-confirmer_actions.html
 * Date :      Tue, 12 Jan 2016 07:49:50 GMT
 * Compile :   Tue, 12 Jan 2016 09:03:06 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/inc-confirmer_actions.html
// Temps de compilation total: 5.424 ms
//

function html_28f1a2a8de607761d33601658d20dd3f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<input type="hidden" name="_todo" class=\'hidden\' value="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'_todo', null),true)) .
'" />

' .
(($t1 = strval(filtre_foreach_dist(table_valeur(@$Pile[0], (string)'erreurs/decideur_erreurs', null),'svp_presenter_actions')))!=='' ?
		('<div class="reponse_formulaire reponse_formulaire_erreur">
	' . $t1 . '
</div>') :
		'') .
'

' .
(($t1 = strval(filtre_foreach_dist(table_valeur(@$Pile[0], (string)'_libelles_actions/decideur_demandes', null),'svp_presenter_actions')))!=='' ?
		((	'<div id="charger_plugin_confirm">
	' .
	(($t2 = strval(table_valeur(@$Pile[0], (string)'_notices/decideur_warning', null)))!=='' ?
			('<div class="reponse_formulaire notice">
		' . $t2 . '
	</div>') :
			'') .
	'

	<div class="reponse_formulaire reponse_formulaire_ok">
		<strong>' .
	_T('svp:actions_demandees') .
	'</strong>
		<ul>') . $t1 . (	'</ul>
	</div>
	' .
	(($t2 = strval(filtre_foreach_dist(table_valeur(@$Pile[0], (string)'_libelles_actions/decideur_propositions', null),'svp_presenter_actions')))!=='' ?
			((	'<div class="reponse_formulaire reponse_formulaire_ok">
		<strong>' .
		_T('svp:actions_necessaires') .
		'</strong>
		<ul>') . $t2 . '</ul>
	</div>') :
			'') .
	'
	<p class="boutons">
		<input type="submit" name="annuler_actions" class="submit annuler_actions" value="' .
	_T('public|spip|ecrire:bouton_annuler') .
	'" />
		<input type="submit" name="valider_actions" class="submit valider_actions" value="' .
	_T('public|spip|ecrire:bouton_valider') .
	'" />
	</p>
	<script type="text/javascript">/*<![CDATA[*/
		/*' .
	'*/
		(function($){
			$(function(){
				if ($.modalbox !== \'undefined\') {
					$.modalboxload(\'#charger_plugin_confirm\', {
						overlayClose: false, // pas de click en dehors
						onComplete: function() {
							$(\'#cboxLoadedContent .boutons .submit\').click(function(){
								$(this).addClass(\'fire\'); $.mediaboxClose();
							});
						},
						onCleanup: function() {
							if (!$(\'#charger_plugin_confirm .boutons .submit.fire\').length) {
								$(\'#charger_plugin_confirm .boutons .submit.annuler_actions\').addClass(\'fire\');
							}
							$(\'#charger_plugin_confirm\').hide();
						},
						onClose: function() { $(\'#charger_plugin_confirm .submit.fire\').click(); }
					});
				}
			});
		})(jQuery);
		/*]]>*/
	</script>
</div>')) :
		'') .
'
');

	return analyse_resultat_skel('html_28f1a2a8de607761d33601658d20dd3f', $Cache, $page, '../plugins-dist/svp/formulaires/inc-confirmer_actions.html');
}
?>