<?php

/*
 * Squelette : plugins-dist/forum/formulaires/forum.html
 * Date :      Tue, 12 Jan 2016 07:49:11 GMT
 * Compile :   Tue, 12 Jan 2016 08:22:51 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins-dist/forum/formulaires/forum.html
// Temps de compilation total: 34.757 ms
//

function html_58e8d3b5afb5f6b999cf8e7159a0c9c0($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_forum ajax" id="formulaire_forum">

' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_ok', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok success">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_erreur', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur error">' . $t1 . '</p>') :
		'') .
'

' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'login_forum_abo', null),true))))!=='' ?
		($t1 . (	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-login_forum_abo') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'plugins-dist/forum/formulaires/forum.html\',\'html_58e8d3b5afb5f6b999cf8e7159a0c9c0\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
')) :
		'') .
'

' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'editable', null),true))))!=='' ?
		($t1 . (	'


' .
	(($t2 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'previsu')))!=='' ?
			((	'<form action="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
		'#formulaire_forum" method="post" class="noajax">
	<div>
	' .
			'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div>' .
		'
	<input type=\'hidden\' name=\'titre\' value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'titre', null),true)) .
		'" />
	<input type=\'hidden\' name=\'texte\' value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'texte', null),true)) .
		'" />
	<input type=\'hidden\' name=\'url_site\' value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'url_site', null),true)) .
		'" />
	<input type=\'hidden\' name=\'nom_site\' value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom_site', null),true)) .
		'" />
	' .
		(($t3 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'id_forum', null))))!=='' ?
				('<input type="hidden" name="id_forum" value="' . $t3 . '" />') :
				'') .
		'
	' .
		recuperer_fond( 'formulaires/inc-forum_ajouter_mot' , array('ajouter_mot' => @$Pile[0]['ajouter_mot'] ), array('compil'=>array('plugins-dist/forum/formulaires/forum.html','html_58e8d3b5afb5f6b999cf8e7159a0c9c0','',13,$GLOBALS['spip_lang'])), _request('connect')) .
		'
	') . $t2 . '
	</div>
</form>') :
			'') .
	'


<form action="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'#formulaire_forum" method="post" enctype=\'multipart/form-data\'><div>
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
	(($t2 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'id_forum', null))))!=='' ?
			('<input type="hidden" name="id_forum" value="' . $t2 . '" />') :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'modere', null),true))))!=='' ?
			((	'<fieldset class="moderation_info info">
		<legend>' .
		_T('forum:bouton_radio_modere_priori') .
		'</legend>
		<p class="explication">') . $t2 . (	_T('forum:forum_info_modere') .
		'</p>
	</fieldset>')) :
			'') .
	'

	' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-login_forum') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'plugins-dist/forum/formulaires/forum.html\',\'html_58e8d3b5afb5f6b999cf8e7159a0c9c0\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	<fieldset>
	<legend>' .
	_T('forum:forum_message') .
	'</legend>' .
	(($t2 = strval(interdire_scripts(((((include_spip('inc/config')?lire_config('forums_titre',null,false):'') != 'non')) ?'' :' '))))!=='' ?
			('
	' . $t2 . (	'
		<input type="hidden" name="titre" id="titre"' .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'titre', null),true))))!=='' ?
				(' value="' . $t3 . '"') :
				'') .
		' />
	')) :
			'') .
	'<div class="editer-groupe">
	' .
	(($t2 = strval(recuperer_fond( 'formulaires/inc-forum_bloc_choix_mots' , array('table' => interdire_scripts(table_valeur(@$Pile[0], (string)'table', null)) ,
	'ajouter_mot' => @$Pile[0]['ajouter_mot'] ), array('compil'=>array('plugins-dist/forum/formulaires/forum.html','html_58e8d3b5afb5f6b999cf8e7159a0c9c0','',25,$GLOBALS['spip_lang'])), _request('connect'))))!=='' ?
			('<div class=\'editer saisie_mots_forum\'>' . $t2 . '</div>') :
			'') .
	'

' .
	(($t2 = strval(interdire_scripts(((((include_spip('inc/config')?lire_config('forums_titre',null,false):'') != 'non')) ?' ' :''))))!=='' ?
			($t2 . (	'
	<div class=\'editer saisie_titre obligatoire' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'titre'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
		<label for="titre">' .
		_T('forum:forum_titre') .
		' ' .
		_T('public|spip|ecrire:info_obligatoire_02') .
		'</label>
		' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'titre')))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
		<input type="text" class="text" name="titre" id="titre"' .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'titre', null),true))))!=='' ?
				(' value="' . $t3 . '"') :
				'') .
		' size="60" />
	</div>
')) :
			'') .
	'

' .
	interdire_scripts((((include_spip('inc/config')?lire_config('forums_texte',null,false):'') != 'non') ? (	'<div class=\'editer saisie_texte obligatoire' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
		<label for=\'texte\'>' .
		typo(_T('forum:forum_texte')) .
		' ' .
		_T('public|spip|ecrire:info_obligatoire_02') .
		'</label>
		' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'texte')))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
		<textarea name="texte" id="texte" rows="10" cols="60"' .
		(($t3 = strval(interdire_scripts(((((include_spip('inc/config')?lire_config('forums_afficher_barre',null,false):'') == 'non')) ?' ' :''))))!=='' ?
				($t3 . ' class="no_barre"') :
				'') .
		'>' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'texte', null),true)) .
		'</textarea>
        ' .
		(table_valeur(table_valeur(@$Pile[0], (string)'config', null),'afficher_barre') ? (	'<p class=\'explication\'>' .
			_T('public|spip|ecrire:info_creation_paragraphe') .
			'</p>'):(	'<p class="explication forum_saisie_texte_info">' .
			_T('forum:forum_saisie_texte_info') .
			'</p>')) .
		'
	</div>
'):'')) .
	'
	</div></fieldset>
  
' .
	interdire_scripts((((include_spip('inc/config')?lire_config('forums_urlref',null,false):'') != 'non') ? (	'<div class="editer-groupe"><div class=\'fieldset\'>
  <fieldset>
  	<legend>' .
		_T('forum:forum_lien_hyper') .
		'</legend>
  	<p class=\'explication\'>' .
		_T('forum:forum_page_url') .
		'</p>
  	<div class="editer-groupe">
  	<div class=\'editer saisie_nom_site' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'nom_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
        <label for="nom_site">' .
		_T('forum:forum_titre') .
		'</label>
      	' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'nom_site')))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
      	<input type="text" class="text" name="nom_site" id="nom_site" size="40" value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nom_site', null),true)) .
		'" />
    </div>
  	<div class=\'editer saisie_url_site' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'url_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
      <label for="url_site">' .
		_T('forum:forum_lien_hyper') .
		'</label>
    	' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'url_site')))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
    	<input type="text" class="text url" name="url_site" id="url_site" style="text-align: left;" dir="ltr" size="40" value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'url_site', null),true)) .
		'" autocapitalize="off" autocorrect="off" />
    </div>
    </div>
  </fieldset>
  </div>
  </div>
'):'')) .
	'  

' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true))))!=='' ?
			((	'
	<fieldset>
	<legend>' .
		_T('medias:bouton_ajouter_document') .
		'</legend>
	<div class="editer-groupe">
	<div class=\'editer saisie_document_forum' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'document_forum'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
		' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'document_forum')))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
		<input type="hidden" name="cle_ajouter_document" value="') . $t2 . (	'" />
		' .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'ajouter_document', null),true))))!=='' ?
				('<div id="ajouter_document_up">' . $t3 . (	'
		<label for="supprimer_document_ajoute"><input type=\'checkbox\' name=\'supprimer_document_ajoute\' id=\'supprimer_document_ajoute\' />
		' .
			_T('public|spip|ecrire:lien_supprimer') .
			'</label>
		</div>')) :
				'') .
		'
		<div>
		' .
		(($t3 = strval(interdire_scripts((is_array(entites_html(table_valeur(@$Pile[0], (string)'formats_documents_forum', null),true)) ? interdire_scripts(join(entites_html(table_valeur(@$Pile[0], (string)'formats_documents_forum', null),true),', ')):interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'formats_documents_forum', null),true))))))!=='' ?
				((	'<label for="ajouter_document">' .
			_T('forum:extensions_autorisees') .
			' ') . $t3 . '</label>') :
				'') .
		'
		<input class=\'file\' type="file" name="ajouter_document" id="ajouter_document"' .
		(($t3 = strval(interdire_scripts((is_array(entites_html(table_valeur(@$Pile[0], (string)'formats_documents_forum', null),true)) ? interdire_scripts(join(entites_html(table_valeur(@$Pile[0], (string)'formats_documents_forum', null),true),', ')):''))))!=='' ?
				('
		accept="' . $t3 . '"') :
				'') .
		' />
		</div>
	</div>
	</div></fieldset>
')) :
			'') .
	'

	' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true))))!=='' ?
			('<p style="display: none;">
		<label for="' . $t2 . (	'">' .
		_T('public|spip|ecrire:antispam_champ_vide') .
		'</label>
		<input type="text" class="text" name="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true)) .
		'" id="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true)) .
		'" value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true)), null),true)) .
		'" size="10" />
	</p>')) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'cle_ajouter_document', null),true)) ?'' :' '))))!=='' ?
			($t2 . (	'
	<p style="display: none;">
		<label for="nobot_forum">' .
		_T('public|spip|ecrire:antispam_champ_vide') .
		'</label>
		<input type="text" class="text" name="nobot" id="nobot_forum" value="' .
		interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'nobot', null),true)) .
		'" size="10" />
	</p>
	')) :
			'') .
	'
	<p class="boutons"><input type="submit" class="submit" name="previsualiser_message" value="' .
	_T('forum:forum_voir_avant') .
	'" />' .
	(($t2 = strval(interdire_scripts(((((((entites_html(table_valeur(@$Pile[0], (string)'forcer_previsu', null),true) == 'non')) AND (interdire_scripts(((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'previsu')) ?'' :' ')))) ?' ' :'')) ?' ' :''))))!=='' ?
			('
	' . $t2 . (	'<input type="submit" class="submit" name="envoyer_message" value="' .
		_T('forum:forum_envoyer') .
		'" />')) :
			'') .
	'</p>
</div>
</form>

')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_58e8d3b5afb5f6b999cf8e7159a0c9c0', $Cache, $page, 'plugins-dist/forum/formulaires/forum.html');
}
?>