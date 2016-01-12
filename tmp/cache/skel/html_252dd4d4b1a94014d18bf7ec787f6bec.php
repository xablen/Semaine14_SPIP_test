<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/admin_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:52 GMT
 * Compile :   Tue, 12 Jan 2016 09:03:06 GMT
 * Boucles :   _erreurs_xml
 */ 

function BOUCLE_erreurs_xmlhtml_252dd4d4b1a94014d18bf7ec787f6bec(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['sourcemode'] = 'tableau';

	$command['source'] = array(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'_erreurs_xml', null),true)));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_erreurs_xml';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur");
		$command['orderby'] = array();
		$command['where'] = 
			array();
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
		array('../plugins-dist/svp/formulaires/admin_plugin.html','html_252dd4d4b1a94014d18bf7ec787f6bec','_erreurs_xml',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<li>' .
interdire_scripts($Pile[$SP]['valeur']) .
'</li>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_erreurs_xml @ ../plugins-dist/svp/formulaires/admin_plugin.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/admin_plugin.html
// Temps de compilation total: 16.430 ms
//

function html_252dd4d4b1a94014d18bf7ec787f6bec($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_erreurs_xmlhtml_252dd4d4b1a94014d18bf7ec787f6bec($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class=\'svp_retour\'>
	' .
		boite_ouvrir(_T('svp:actions_en_erreur'), 'error') .
		'
	' .
		_T('svp:erreurs_xml') .
		'
	<ul>
') . $t1 . (	'
	</ul>
	' .
		boite_fermer() .
		'
</div>
')) :
		'') .
'
<div class="formulaire_spip formulaire_admin_plugin" id="formulaire_admin_plugin">
	<h3 class="titrem">' .
interdire_scripts(filtre_balise_img_dist(chemin_image('plugin-24.png'),'icone plugin-24','cadre-icone')) .
_T('public|spip|ecrire:plugins_liste') .
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
	<form method="post" action="' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
'">
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-confirmer_actions') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/admin_plugin.html\',\'html_252dd4d4b1a94014d18bf7ec787f6bec\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><div class="liste-plugins">
			<fieldset>
				<p class="explication">
				' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'verrouille', null),true) == 'oui')) ?' ' :''))))!=='' ?
		($t1 . (	'
					' .
	vide($Pile['vars'][$_zzz=(string)'dir_plugins_dist'] = interdire_scripts(joli_repertoire(eval('return '.'_DIR_PLUGINS_DIST'.';')))) .
	_T('svp:info_admin_plugin_verrouille', array('dir_plugins_dist' => table_valeur($Pile["vars"], (string)'dir_plugins_dist', null))) .
	'
				')) :
		'') .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'verrouille', null),true) == 'oui')) ?'' :' '))))!=='' ?
		($t1 . (	'
					' .
	_T(concat('svp:info_admin_plugin',(($t3 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'actif', null), 'oui'),true))))!=='' ?
				('_actif_' . $t3) :
				''),(($t3 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'non'),true))))!=='' ?
				('_verrou_' . $t3) :
				''))) .
	'
				')) :
		'') .
'
				</p>
				' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-admin_plugin') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../plugins-dist/svp/formulaires/admin_plugin.html\',\'html_252dd4d4b1a94014d18bf7ec787f6bec\',\'\',25,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
			</fieldset>
		</div>
		<div class="actions_multiples">
			' .
(!(in_array('_DIR_PLUGINS_DIST',interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'constante', null), array()),true))))  ?
		('<fieldset class="boutons">' . ' ' . (	'
				<p class="cocher">
					<a href="#" id="select_tous">' .
	_T('svp:tout_cocher') .
	'</a><span class="sep"> | </span>
					<a href="#" id="select_aucun">' .
	_T('svp:tout_decocher') .
	'</a><span class="sep"> | </span>
					<a href="#" id="select_up">' .
	_T('svp:tout_cocher_up') .
	'</a>
				</p>
				<select id="action_globale" class="action" name="action_globale">
					' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'actif', null),true) == 'oui')) ?'' :' '))))!=='' ?
			($t2 . (	'<option value="on">' .
		_T('svp:bouton_activer') .
		'</option>')) :
			'') .
	'
					' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'actif', null),true) == 'non')) ?'' :' '))))!=='' ?
			($t2 . (	'<option value="off">' .
		_T('svp:bouton_desactiver') .
		'</option>')) :
			'') .
	'
					<option value="up" id="option_up">' .
	_T('svp:bouton_up') .
	'</option>
					' .
	(($t2 = strval(interdire_scripts(((((((((entites_html(table_valeur(@$Pile[0], (string)'actif', null),true) == 'non')) ?'' :' ')) AND (invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('webmestre')?" ":"")))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'<option value="stop">' .
		_T('svp:bouton_desinstaller') .
		'</option>')) :
			'') .
	'
				</select>
				<input type="submit" class="submit" name="appliquer" value="' .
	_T('svp:bouton_appliquer') .
	'" />
			</fieldset>')) :
		'') .
'
			<script type="text/javascript">
			//<![CDATA[
				(function($){
					$("#select_tous").click(function(){
						jQuery("input.select_plugin").attr("checked",true);
						return false;
					});
					$("#select_aucun").click(function(){
						$("input.select_plugin").attr("checked",false);
						return false;
					});
					var cocher_plugins_up = function(){
						if ($(".plugins li.item.up").length != 0) {
							$("#select_up").click(function(){
								$(".plugins li.item.up input.select_plugin").attr("checked",true);
								$("select#action_globale>option#option_up").attr("selected","selected");
								return false;
							});
						} else {
							$("#select_up").hide();
							$("#select_up").prev(".sep").hide();
							$("#option_up").hide();
						}
					}
					// lorsqu\'il y a de nombreux plugins et comme la remontee ajax est desactivee
					// on ne voit pas forcement les erreurs. A ce monent la, on remonte dessus.
					var remonter_sur_erreurs = function() {
						if ($(\'#formulaire_admin_plugin .reponse_formulaire_erreur\').length) {
							$(document).scrollTop($(\'#formulaire_admin_plugin\').offset().top - 20);
						}
					}
					cocher_plugins_up();
					onAjaxLoad(cocher_plugins_up);
					onAjaxLoad(remonter_sur_erreurs);
				})(jQuery);
			//]]>
			</script>
		</div>
	</form>
</div>
');

	return analyse_resultat_skel('html_252dd4d4b1a94014d18bf7ec787f6bec', $Cache, $page, '../plugins-dist/svp/formulaires/admin_plugin.html');
}
?>