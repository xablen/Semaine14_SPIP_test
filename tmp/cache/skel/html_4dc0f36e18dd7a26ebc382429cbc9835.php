<?php

/*
 * Squelette : squelettes/inc/inc-rub-documents.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:12:11 GMT
 * Boucles :   _documents_portfolio, _afficher_document, _documents_decompte, _documents_joints
 */ 

function BOUCLE_documents_portfoliohtml_4dc0f36e18dd7a26ebc382429cbc9835(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'documents'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_portfolio';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"L1.id_objet AS id_rubrique",
		"documents.titre",
		"documents.fichier");
		$command['orderby'] = array('num', 'documents.date');
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)), 
			array('=', 'L1.vu', "'non'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_documents_portfolio',2,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" onclick="location.href=\'' .
	parametre_url(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))),'id_document',$Pile[$SP]['id_document']) .
	'#documents_portfolio\';return false;"' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['exposer'])))!=='' ?
			(' class="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',copie_locale(get_spip_doc($Pile[$SP]['fichier'])),'0','100')),'class','spip_vignette_portfolio'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))),'80')))) .
	'</a>
	')) :
		'');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_portfolio @ squelettes/inc/inc-rub-documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_afficher_documenthtml_4dc0f36e18dd7a26ebc382429cbc9835(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_afficher_document';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.descriptif");
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in) . ')')));
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','bigint(21) NOT NULL AUTO_INCREMENT')), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_afficher_document',18,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
		<div class="spip_documents spip_documents_center" id="document_actif">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,
	'id_document'=>$Pile[$SP]['id_document'],
	'id'=>$Pile[$SP]['id_document'],
	'recurs'=>(++$recurs)), array('compil'=>array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_afficher_document',0,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'520','0'))))!=='' ?
		((	'<a href="' .
	url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))) .
	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'">') . $t1 . '</a>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
		((	'<div class="spip_doc_titre">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
		((	'<div class="spip_doc_descriptif">') . $t1 . '</div>') :
		'') .
'
		</div>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_afficher_document @ squelettes/inc/inc-rub-documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_documents_decomptehtml_4dc0f36e18dd7a26ebc382429cbc9835(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_decompte';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("documents.id_document");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_objet','id_document','L2.objet='.sql_quote('document')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L2.texte', "''"), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_documents_decompte',30,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_documents_decompte']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
' .
(($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond( 'modeles/emb' , array('id_document' => $Pile[$SP]['id_document'] ), array('compil'=>array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_documents_decompte',32,$GLOBALS['spip_lang'])), _request('connect'))):''));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_decompte @ squelettes/inc/inc-rub-documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_documents_jointshtml_4dc0f36e18dd7a26ebc382429cbc9835(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_joints';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+documents.titre AS num",
		"documents.date",
		"documents.titre",
		"documents.id_document",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
		$command['orderby'] = array('num', 'documents.date DESC');
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-documents.html','html_4dc0f36e18dd7a26ebc382429cbc9835','_documents_joints',39,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('spip:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = (
'
				' .
(($t1 = strval(interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))))!=='' ?
		((	'<h3 class="" style="margin-bottom: .6em;"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
				' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(($doublons["documents"] .= ",". $Pile[$SP]['id_document']) ? quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') : ''),'60','0'))))!=='' ?
		('<div style="float:left;padding-right: .5em;  width:36%;">
					<div style="float:left; margin-right: .5em;">' . $t1 . (	'</div>
					<small>
						' .
	(($t2 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
			($t2 . '<br />') :
			'') .
	'
						' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['type_document'])))!=='' ?
			((	$l1 .
		' : ') . $t2 . '<br />') :
			'') .
	'
						' .
	interdire_scripts(taille_en_octets($Pile[$SP]['taille'])) .
	'
					</small>
				</div>')) :
		'') .
'
				' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
		((	'<div class="" style="margin: 0 0 0 40%; border-left: 1px gray dotted;padding-left: 1em">') . $t1 . '</div>') :
		'') .
'
		');
		$t0 .= ((strlen($t1) && strlen($t0)) ? '<hr style=\'clear:both\' />' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_joints @ squelettes/inc/inc-rub-documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-rub-documents.html
// Temps de compilation total: 69.227 ms
//

function html_4dc0f36e18dd7a26ebc382429cbc9835($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_4dc0f36e18dd7a26ebc382429cbc9835($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div id="documents_portfolio">
			<h2>' .
		_T('medias:info_portfolio') .
		'</h2>
	') . $t1 . '
		</div>
') :
		'') .
'


	' .
BOUCLE_afficher_documenthtml_4dc0f36e18dd7a26ebc382429cbc9835($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
BOUCLE_documents_decomptehtml_4dc0f36e18dd7a26ebc382429cbc9835($Cache, $Pile, $doublons, $Numrows, $SP) .
'



	' .
(($t1 = BOUCLE_documents_jointshtml_4dc0f36e18dd7a26ebc382429cbc9835($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
	<h2>' .
		_T('ecrire:titre_documents_joints') .
		'</h2>
	<div class="chapo" id="documents" style="line-height:1;"> 
		') . $t1 . '
		<br class="nettoyeur" />
	</div><!-- chapo -->
	') :
		'') .
'
');

	return analyse_resultat_skel('html_4dc0f36e18dd7a26ebc382429cbc9835', $Cache, $page, 'squelettes/inc/inc-rub-documents.html');
}
?>