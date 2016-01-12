<?php

/*
 * Squelette : ../plugins-dist/svp/prive/squelettes/contenu/svp_admin_plugin.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:03:02 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/svp/prive/squelettes/contenu/svp_admin_plugin.html
// Temps de compilation total: 17.104 ms
//

function html_932fc4a922e3fc74e1a6d179a3e55860($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('configurer', '_plugins')?" ":""))) .
'
<?php
	if (_request(\'voir\')){		session_set(\'svp_admin_plugin_voir\',_request(\'voir\'));}
	if (_request(\'verrouille\')){session_set(\'svp_admin_plugin_verrouille\',_request(\'verrouille\'));}
?>

' .
barre_onglets('plugins','plugins_actifs') .
'

<div class="onglets_simple second clearfix">
	<ul class="voir">
		<li class="first">' .
lien_ou_expose(parametre_url(self(),'voir','tous'),_T('public|spip|ecrire:plugins_tous_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'voir', null), 'tous'),true) == 'tous')) ?' ' :'')),'ajax') .
'</li>
		<li>' .
lien_ou_expose(parametre_url(self(),'voir','actif'),_T('public|spip|ecrire:plugins_actifs_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'voir', null), 'tous'),true) == 'actif')) ?' ' :'')),'ajax') .
'</li>
		<li>
		' .
interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'non'),true) == 'oui') ? (	'<span class="off">' .
	_T('svp:plugins_inactifs_liste') .
	'</span>'):lien_ou_expose(parametre_url(self(),'voir','inactif'),_T('svp:plugins_inactifs_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'voir', null), 'tous'),true) == 'inactif')) ?' ' :'')),'ajax'))) .
'
		</li>
	</ul>
	<ul class="verrouille">
		<li class="first">' .
lien_ou_expose(parametre_url(self(),'verrouille','tous'),_T('public|spip|ecrire:plugins_tous_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'tous'),true) == 'tous')) ?' ' :'')),'ajax') .
'</li>
		<li>
		' .
interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'voir', null), 'tous'),true) == 'inactif') ? (	'<span class="off">' .
	_T('svp:plugins_verrouilles_liste') .
	'</span>'):lien_ou_expose(parametre_url(self(),'verrouille','oui'),_T('svp:plugins_verrouilles_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'tous'),true) == 'oui')) ?' ' :'')),'ajax'))) .
'
		</li>
		<li>' .
lien_ou_expose(parametre_url(self(),'verrouille','non'),_T('svp:plugins_non_verrouilles_liste'),interdire_scripts((((entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'tous'),true) == 'non')) ?' ' :'')),'ajax') .
'</li>
	</ul>
</div>

<div class="ajax noscroll">
	' .
executer_balise_dynamique('FORMULAIRE_ADMIN_PLUGIN',
	array(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'voir', null), 'tous'),true)),interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'verrouille', null), 'tous'),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'id_paquet', null),true))),
	array('../plugins-dist/svp/prive/squelettes/contenu/svp_admin_plugin.html','html_932fc4a922e3fc74e1a6d179a3e55860','',27,$GLOBALS['spip_lang'])) .
'</div>
<script type="text/javascript">
    //<![CDATA[
    jQuery(function(){
		jQuery(\'#contenu .svp_retour\').on(\'mouseenter\',function(){
			if (jQuery(\'.box .inner .hd h3 img.close\', this).length == 0) {
				jQuery(\'.box .inner .hd h3\', this)
					.append("' .
interdire_scripts(inserer_attribut(filtre_balise_img_dist(chemin_image('fermer-16.png')),'class','close')) .
'")
					.on(\'click\',function(){
						jQuery(this).parents(\'.box\').remove();
					});
			}
		});
    });
    //]]>
</script>');

	return analyse_resultat_skel('html_932fc4a922e3fc74e1a6d179a3e55860', $Cache, $page, '../plugins-dist/svp/prive/squelettes/contenu/svp_admin_plugin.html');
}
?>