<?php

/*
 * Squelette : plugins-dist/forum/formulaires/inc-login_forum.html
 * Date :      Tue, 12 Jan 2016 07:49:14 GMT
 * Compile :   Tue, 12 Jan 2016 08:22:51 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins-dist/forum/formulaires/inc-login_forum.html
// Temps de compilation total: 8.727 ms
//

function html_3ce0dfbc71c477ca5c1154efe2ae0f55($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<fieldset class="qui' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, (table_valeur($GLOBALS["visiteur_session"], (string)'auth', null) ? 'session_qui':'saisie_qui')))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<legend>' .
_T('forum:forum_qui_etes_vous') .
'</legend>
' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'auth', null)) ?' ' :'')))))!=='' ?
		($t1 . (	'
	' .
	(($t2 = strval(interdire_scripts(invalideur_session($Cache, typo(supprimer_numero(table_valeur($GLOBALS["visiteur_session"], (string)'nom', null)))))))!=='' ?
			((	'<p class=\'explication\'>' .
		_T('forum:forum_votre_nom') .
		' <strong>') . $t2 . (	'</strong> <span class="details"><a href="' .
		executer_balise_dynamique('URL_LOGOUT',
	array(),
	array('plugins-dist/forum/formulaires/inc-login_forum.html','html_3ce0dfbc71c477ca5c1154efe2ae0f55','',4,$GLOBALS['spip_lang'])) .
		'" rel="nofollow">' .
		_T('public|spip|ecrire:icone_deconnecter') .
		'</a></span></p>')) :
			'') .
	'
	
')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'auth', null)) ?'' :' ')))))!=='' ?
		($t1 . (	'
	<div class="editer-groupe">
		<div class=\'editer saisie_session_nom\'>
			<label for="session_nom">' .
	_T('forum:forum_votre_nom') .
	'</label>
			<input type="text" class="text" name="session_nom" id="session_nom" value="' .
	invalideur_session($Cache, entites_html(((($a = table_valeur($GLOBALS["visiteur_session"], (string)'nom', null)) OR (is_string($a) AND strlen($a))) ? $a : invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'session_nom', null))))) .
	'" size="40" autocapitalize="off" autocorrect="off" />
			' .
	(($t2 = strval(interdire_scripts((((include_spip('inc/config')?lire_config('accepter_inscriptions',null,false):'') == 'oui') ? ' ':''))))!=='' ?
			($t2 . (	'
			<span class="details"><a href="' .
		interdire_scripts(parametre_url(generer_url_public('login', ''),'url',self())) .
		'" rel="nofollow">' .
		_T('public|spip|ecrire:lien_connecter') .
		'</a></span>
			')) :
			'') .
	'
		</div>
		<div class=\'editer saisie_session_email\'>
			<label for="session_email">' .
	_T('forum:forum_votre_email') .
	'</label>
			<input type="' .
	('' ? 'email':'text') .
	'" class="text email" name="session_email" id="session_email" value="' .
	invalideur_session($Cache, entites_html(((($a = table_valeur($GLOBALS["visiteur_session"], (string)'email', null)) OR (is_string($a) AND strlen($a))) ? $a : invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'session_email', null))))) .
	'" size="40" autocapitalize="off" autocorrect="off" />
		</div>
	</div>
')) :
		'') .
'
</fieldset>
');

	return analyse_resultat_skel('html_3ce0dfbc71c477ca5c1154efe2ae0f55', $Cache, $page, 'plugins-dist/forum/formulaires/inc-login_forum.html');
}
?>