<?php

/*
 * Squelette : ../plugins-dist/medias/modeles/document_case.html
 * Date :      Tue, 12 Jan 2016 07:49:29 GMT
 * Compile :   Tue, 12 Jan 2016 08:13:01 GMT
 * Boucles :   _type_doc, _compte, _docslies
 */ 

function BOUCLE_type_dochtml_73dfd07a64ca2464f0b3ef2841f382fa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'types_documents';
		$command['id'] = '_type_doc';
		$command['from'] = array('types_documents' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("types_documents.titre",
		"types_documents.extension",
		"types_documents.inclus");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'types_documents.extension', sql_quote($Pile[$SP]['extension'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/medias/modeles/document_case.html','html_73dfd07a64ca2464f0b3ef2841f382fa','_type_doc',25,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('medias:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
			' .
(($t1 = strval(interdire_scripts(((($Pile[$SP-1]['mode'] == 'document')) ?' ' :''))))!=='' ?
		($t1 . (	'<div class="type">
			' .
	interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : concat($l1,' ',interdire_scripts(majuscules($Pile[$SP]['extension']))))) .
	'
				</div>
			')) :
		'') .
'
			' .
medias_raccourcis_doc($Pile[$SP-1]['id_document'],interdire_scripts(typo(supprimer_numero($Pile[$SP-1]['titre']), "TYPO", $connect, $Pile[0])),interdire_scripts(propre($Pile[$SP-1]['descriptif'], $connect, $Pile[0])),interdire_scripts($Pile[$SP]['inclus']),interdire_scripts($Pile[$SP-1]['largeur']),interdire_scripts($Pile[$SP-1]['hauteur']),interdire_scripts($Pile[$SP-1]['mode']),interdire_scripts($Pile[$SP-1]['vu']),interdire_scripts($Pile[$SP-1]['media'])) .
'
			');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_type_doc @ ../plugins-dist/medias/modeles/document_case.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_comptehtml_73dfd07a64ca2464f0b3ef2841f382fa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents_liens';
		$command['id'] = '_compte';
		$command['from'] = array('documents_liens' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("1");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '0,2';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('=', 'documents_liens.id_document', sql_quote($Pile[$SP]['id_document'],'','bigint(21) NOT NULL DEFAULT \'0\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/medias/modeles/document_case.html','html_73dfd07a64ca2464f0b3ef2841f382fa','_compte',40,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_compte']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_compte @ ../plugins-dist/medias/modeles/document_case.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_docslieshtml_73dfd07a64ca2464f0b3ef2841f382fa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_docslies';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("documents.extension",
		"documents.mode",
		"documents.id_document",
		"documents.titre",
		"documents.descriptif",
		"documents.largeur",
		"documents.hauteur",
		"L1.vu",
		"documents.media",
		"documents.fichier",
		"documents.id_vignette",
		"L2.inclus",
		"L1.objet",
		"L1.id_objet");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('documents.statut',sql_quote($in)) : 
			array('=', 'documents.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/medias/modeles/document_case.html','html_73dfd07a64ca2464f0b3ef2841f382fa','_docslies',8,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:info_sans_titre');
	$l2 = _T('medias:image_tourner_gauche');
	$l3 = _T('medias:image_tourner_droite');
	$l4 = _T('medias:image_tourner_180');
	$l5 = _T('medias:upload_info_mode_document');
	$l6 = _T('medias:upload_info_mode_image');
	$l7 = _T('medias:bouton_enlever_supprimer_document');
	$l8 = _T('medias:bouton_enlever_supprimer_document_confirmation');
	$l9 = _T('medias:bouton_enlever_document');
	$l10 = _T('medias:bouton_modifier_document');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<div class="item ' .
interdire_scripts($Pile[$SP]['mode']) .
'" id="doc' .
$Pile[$SP]['id_document'] .
'"
			 onclick="jQuery(this).toggleClass(\'hover\');">
		<h3 class="titrem">' .
(($t1 = strval(interdire_scripts(basename($Pile[$SP]['fichier']))))!=='' ?
		('<span class="fichier">' . $t1 . '</span>') :
		'') .
'
			<span class="image_loading"></span>
			' .
(($t1 = strval(interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : (	'<i class="sanstitre">' .
	$l1 .
	'</i>')))))!=='' ?
		((	'<span class="titre">') . $t1 . '</span>') :
		'') .
'
			' .
interdire_scripts(filtre_balise_img_dist(chemin_image(interdire_scripts((($Pile[$SP]['mode'] == 'image') ? 'image-24.png':'doc-24.png'))),'','cadre-icone')) .
'
		</h3>
		<div class="infos">
			' .
(($t1 = strval(interdire_scripts(((match($Pile[$SP]['extension'],'gif|png|jpg')) ?' ' :''))))!=='' ?
		($t1 . (	' ' .
	vide($Pile['vars'][$_zzz=(string)'id'] = ($Pile[$SP]['id_vignette'] ? $Pile[$SP]['id_vignette']:$Pile[$SP]['id_document'])) .
	'<div class="tourner">
				' .
	bouton_action(interdire_scripts(filtre_balise_img_dist(chemin_image('tourner-gauche-12.png'),$l2)),invalideur_session($Cache, generer_action_auteur('tourner',invalideur_session($Cache, concat(table_valeur($Pile["vars"], (string)'id', null),',-90')),invalideur_session($Cache, self()))),'ajax') .
	'
				' .
	bouton_action(interdire_scripts(filtre_balise_img_dist(chemin_image('tourner-droite-12.png'),$l3)),invalideur_session($Cache, generer_action_auteur('tourner',invalideur_session($Cache, concat(table_valeur($Pile["vars"], (string)'id', null),',90')),invalideur_session($Cache, self()))),'ajax') .
	'
				' .
	bouton_action(interdire_scripts(filtre_balise_img_dist(chemin_image('tourner-180-12.png'),$l4)),invalideur_session($Cache, generer_action_auteur('tourner',invalideur_session($Cache, concat(table_valeur($Pile["vars"], (string)'id', null),',180')),invalideur_session($Cache, self()))),'ajax') .
	'
			</div>
			')) :
		'') .
'
			' .
filtrer('image_graver',filtrer('image_reduire',quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, ''),'150','150')) .
'
			' .
BOUCLE_type_dochtml_73dfd07a64ca2464f0b3ef2841f382fa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				' .
(($t1 = strval(interdire_scripts((((((($Pile[$SP]['inclus'] == 'image')) AND (interdire_scripts(eval('return '.'_BOUTON_MODE_IMAGE'.';')))) ?' ' :'')) ?' ' :''))))!=='' ?
		('<div class="mode">' . $t1 . (	'
					' .
	(($t2 = strval(interdire_scripts(((($Pile[$SP]['mode'] == 'image')) ?' ' :''))))!=='' ?
			($t2 . (	'
					' .
		bouton_action($l5,invalideur_session($Cache, generer_action_auteur('changer_mode_document',(	invalideur_session($Cache, $Pile[$SP]['id_document']) .
				'-document'),invalideur_session($Cache, self()))),'ajax') .
		'
					')) :
			'') .
	(($t2 = strval(interdire_scripts(((($Pile[$SP]['mode'] == 'image')) ?'' :' '))))!=='' ?
			($t2 . (	'
					' .
		bouton_action($l6,invalideur_session($Cache, generer_action_auteur('changer_mode_document',(	invalideur_session($Cache, $Pile[$SP]['id_document']) .
				'-image'),invalideur_session($Cache, self()))),'ajax') .
		'
					')) :
			'') .
	'
				</div>')) :
		'') .
'
			<div class="actions">
				' .
BOUCLE_comptehtml_73dfd07a64ca2464f0b3ef2841f382fa($Cache, $Pile, $doublons, $Numrows, $SP)
. (	'
				' .
	(((($Numrows['_compte']['total'] == '1')) AND (invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('dissocierdocuments', interdire_scripts(invalideur_session($Cache, $Pile[$SP]['objet'])), invalideur_session($Cache, $Pile[$SP]['id_objet']))?" ":""))))  ?
			(' ' . bouton_action($l7,invalideur_session($Cache, generer_action_auteur('dissocier_document',(	invalideur_session($Cache, $Pile[$SP]['id_objet']) .
				'-' .
				interdire_scripts(invalideur_session($Cache, $Pile[$SP]['objet'])) .
				'-' .
				invalideur_session($Cache, $Pile[$SP]['id_document']) .
				'-suppr'),invalideur_session($Cache, self()))),'ajax',$l8,'',(($t4 = strval($Pile[$SP]['id_document']))!=='' ?
					('(function(){jQuery("#doc' . $t4 . '").animateRemove();return true;})()') :
					''))) :
			'') .
	'
				' .
	(($t2 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('dissocierdocuments', interdire_scripts(invalideur_session($Cache, $Pile[$SP]['objet'])), invalideur_session($Cache, $Pile[$SP]['id_objet']))?" ":""))))!=='' ?
			($t2 . bouton_action($l9,invalideur_session($Cache, generer_action_auteur('dissocier_document',(	invalideur_session($Cache, $Pile[$SP]['id_objet']) .
				'-' .
				interdire_scripts(invalideur_session($Cache, $Pile[$SP]['objet'])) .
				'-' .
				invalideur_session($Cache, $Pile[$SP]['id_document'])),invalideur_session($Cache, self()))),'ajax','','',(($t4 = strval($Pile[$SP]['id_document']))!=='' ?
					('(function(){jQuery("#doc' . $t4 . '").animateRemove();return true;})()') :
					''))) :
			'') .
	'
				' .
	(($t2 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', 'document', invalideur_session($Cache, $Pile[$SP]['id_document']))?" ":"")) ?' ' :''))))!=='' ?
			($t2 . (	'
				<a href="' .
		generer_url_ecrire('document_edit',(	'id_document=' .
			$Pile[$SP]['id_document'])) .
		'" target="_blank" class="editbox" tabindex="0" role="button">' .
		$l10 .
		'</a>
				')) :
			'')) .
'
				' .
pipeline( 'document_desc_actions' , array('args' => array('id_document' => $Pile[$SP]['id_document'], 'position' => 'document_case', 'objet' => interdire_scripts($Pile[$SP]['objet']), 'id_objet' => $Pile[$SP]['id_objet']), 'data' => '') ) .
'
			</div>
			' .
pipeline( 'afficher_metas_document' , array('args' => array('quoi' => 'document_case', 'id_document' => $Pile[$SP]['id_document']), 'data' => '') ) .
'
		</div>
	</div>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_docslies @ ../plugins-dist/medias/modeles/document_case.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/medias/modeles/document_case.html
// Temps de compilation total: 195.770 ms
//

function html_73dfd07a64ca2464f0b3ef2841f382fa($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
BOUCLE_docslieshtml_73dfd07a64ca2464f0b3ef2841f382fa($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_73dfd07a64ca2464f0b3ef2841f382fa', $Cache, $page, '../plugins-dist/medias/modeles/document_case.html');
}
?>