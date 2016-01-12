<?php

/*
 * Squelette : squelettes/inclure/documents.html
 * Date :      Tue, 12 Jan 2016 07:50:45 GMT
 * Compile :   Tue, 12 Jan 2016 08:44:44 GMT
 * Boucles :   _documents_portfolio, _afficher_document, _documents_joints, _documents_decompte
 */ 

function BOUCLE_documents_portfoliohtml_7ed79361d903088c34ecb5cef79b48d9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	$in4[]= 'png';
	$in4[]= 'jpg';
	$in4[]= 'gif';

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'documents'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_portfolio';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_documents_liens','L3' => 'spip_documents_liens','L4' => 'spip_documents_liens','L5' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L5.mime_type",
		"L1.id_objet AS id_article",
		"documents.titre",
		"documents.fichier");
		$command['orderby'] = array('num', 'documents.date');
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_document'), 'L3' => array('documents','id_document'), 'L4' => array('documents','id_document'), 'L5' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L1.id_objet',sql_quote($in)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L1.objet', sql_quote('article'))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L2.id_objet',sql_quote($in1)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L2.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('L3.objet',sql_quote($in2)) : 
			array('=', 'L3.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')))), (!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('L4.id_objet',sql_quote($in3)) : 
			array('=', 'L4.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in4)), 
			array('=', 'L1.vu', "'non'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_documents_portfolio',2,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<li><a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" onclick="location.href=\'' .
	ancre_url(parametre_url(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))),'id_document',$Pile[$SP]['id_document']),'documents_portfolio') .
	'\';return false;"' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['exposer'])))!=='' ?
			(' class="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_recadre',filtrer('image_passe_partout',get_spip_doc($Pile[$SP]['fichier']),'90','90'),'90','90')),'class','spip_logo'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))),'80')))) .
	'</a></li>
		')) :
		'');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_portfolio @ squelettes/inclure/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_afficher_documenthtml_7ed79361d903088c34ecb5cef79b48d9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	$in4[]= 'png';
	$in4[]= 'jpg';
	$in4[]= 'gif';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_afficher_document';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_documents_liens','L3' => 'spip_documents_liens','L4' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("documents.id_document");
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_document'), 'L3' => array('documents','id_document'), 'L4' => array('documents','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array(((!sql_quote($in4) OR sql_quote($in4)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in4) . ')')));
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L1.id_objet',sql_quote($in)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L1.objet', sql_quote('article'))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L2.id_objet',sql_quote($in1)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L2.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('L3.objet',sql_quote($in2)) : 
			array('=', 'L3.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')))), (!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('L4.id_objet',sql_quote($in3)) : 
			array('=', 'L4.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in4)));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_afficher_document',24,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
' .
filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lien' => vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) ,
	'lang' => $GLOBALS["spip_lang"] ,
	'id_document'=>$Pile[$SP]['id_document'],
	'id'=>$Pile[$SP]['id_document'],
	'recurs'=>(++$recurs)), array('compil'=>array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_afficher_document',25,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'672','*')) .
'
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_afficher_document @ squelettes/inclure/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_documents_jointshtml_7ed79361d903088c34ecb5cef79b48d9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	$in4[]= 'gif';
	$in4[]= 'jpg';
	$in4[]= 'png';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_joints';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_documents_liens','L3' => 'spip_documents_liens','L4' => 'spip_documents_liens','L5' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L5.mime_type",
		"documents.extension",
		"documents.titre",
		"documents.fichier",
		"L5.titre AS type_document",
		"documents.taille",
		"documents.descriptif",
		"documents.credits");
		$command['orderby'] = array('num', 'documents.date');
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_document'), 'L3' => array('documents','id_document'), 'L4' => array('documents','id_document'), 'L5' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L1.id_objet',sql_quote($in)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L1.objet', sql_quote('article'))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L2.id_objet',sql_quote($in1)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L2.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('L3.objet',sql_quote($in2)) : 
			array('=', 'L3.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')))), (!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('L4.id_objet',sql_quote($in3)) : 
			array('=', 'L4.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), sql_in('documents.extension',sql_quote($in4),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_documents_joints',42,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	$l1 = _T('public|spip|ecrire:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<li>
			<a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" class="spip_doc' .
	(($t2 = strval(interdire_scripts(attribut_html($Pile[$SP]['extension']))))!=='' ?
			(' ' . $t2) :
			'') .
	'"><strong class="titre">' .
	interdire_scripts(((($a = traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(couper(basename(get_spip_doc($Pile[$SP]['fichier'])),'80')))) .
	'</strong>
			<small class="info_document">(' .
	(($t2 = strval(interdire_scripts(strtoupper($Pile[$SP]['extension']))))!=='' ?
			((	'<abbr title="' .
		$l1 .
		' ' .
		interdire_scripts($Pile[$SP]['type_document']) .
		'" class="ext">') . $t2 . '</abbr> - ') :
			'') .
	(($t2 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
			('<span>' . $t2 . '</span>') :
			'') .
	')</small></a>
			' .
	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
			((	'<div class="descriptif">') . $t2 . '</div>') :
			'') .
	'
      ' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['credits'])))!=='' ?
			((	'<div class="credits">') . $t2 . '</div>') :
			'') .
	'
		')) :
		'') .
'</li>
		');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_joints @ squelettes/inclure/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_documents_decomptehtml_7ed79361d903088c34ecb5cef79b48d9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['objet']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_objet']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	$in4[]= 'gif';
	$in4[]= 'jpg';
	$in4[]= 'png';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_documents_decompte';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_documents_liens','L3' => 'spip_documents_liens','L4' => 'spip_documents_liens','L5' => 'spip_forum');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['select'] = array("documents.id_document");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_document'), 'L3' => array('documents','id_document'), 'L4' => array('documents','id_document'), 'L5' => array('documents','id_objet','id_document','L5.objet='.sql_quote('document')));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
quete_condition_postdates('documents.date_publication',''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L1.id_objet',sql_quote($in)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L1.objet', sql_quote('article'))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L2.id_objet',sql_quote($in1)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L2.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['objet'])?count(@$Pile[0]['objet']):strlen(@$Pile[0]['objet'])) ? '' : ((is_array(@$Pile[0]['objet'])) ? sql_in('L3.objet',sql_quote($in2)) : 
			array('=', 'L3.objet', sql_quote(@$Pile[0]['objet'],'','varchar(25) NOT NULL DEFAULT \'\'')))), (!(is_array(@$Pile[0]['id_objet'])?count(@$Pile[0]['id_objet']):strlen(@$Pile[0]['id_objet'])) ? '' : ((is_array(@$Pile[0]['id_objet'])) ? sql_in('L4.id_objet',sql_quote($in3)) : 
			array('=', 'L4.id_objet', sql_quote(@$Pile[0]['id_objet'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L5.texte', "''"), sql_in('documents.extension',sql_quote($in4),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_documents_decompte',33,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$Numrows['_documents_decompte']['total'] = @intval($iter->count());
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
' .
(($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond( 'modeles/emb' , array('id_document' => $Pile[$SP]['id_document'] ), array('compil'=>array('squelettes/inclure/documents.html','html_7ed79361d903088c34ecb5cef79b48d9','_documents_decompte',35,$GLOBALS['spip_lang'])), _request('connect'))):''));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_documents_decompte @ squelettes/inclure/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inclure/documents.html
// Temps de compilation total: 204.748 ms
//

function html_7ed79361d903088c34ecb5cef79b48d9($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_7ed79361d903088c34ecb5cef79b48d9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="bloc clearfix documents_portfolio" id="documents_portfolio">
	<h2>' .
		_T('medias:info_portfolio') .
		'</h2>
	<ul>
		') . $t1 . '
	</ul>
</div><!--#documents_portfolio-->
') :
		'') .
'


' .
BOUCLE_afficher_documenthtml_7ed79361d903088c34ecb5cef79b48d9($Cache, $Pile, $doublons, $Numrows, $SP) .
'



' .
(($t1 = BOUCLE_documents_decomptehtml_7ed79361d903088c34ecb5cef79b48d9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'



' .
	(($t2 = BOUCLE_documents_jointshtml_7ed79361d903088c34ecb5cef79b48d9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
<div class="menu documents_joints" id="documents_joints">
	<h2>' .
			_T('medias:titre_documents_joints') .
			'</h2>
	<ul class="spip">
		') . $t2 . '
	</ul>
</div><!--#documents_joints-->
') :
			'') .
	'

'))) .
'
');

	return analyse_resultat_skel('html_7ed79361d903088c34ecb5cef79b48d9', $Cache, $page, 'squelettes/inclure/documents.html');
}
?>