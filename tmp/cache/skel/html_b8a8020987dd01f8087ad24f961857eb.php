<?php

/*
 * Squelette : plugins-dist/medias/modeles/img.html
 * Date :      Tue, 12 Jan 2016 07:49:29 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:26 GMT
 * Boucles :   _document
 */ 

function BOUCLE_documenthtml_b8a8020987dd01f8087ad24f961857eb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['mode']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_document';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.id_document",
		"L1.titre AS type_document",
		"documents.taille",
		"documents.mode",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"L1.mime_type");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','extension'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','bigint(21) NOT NULL AUTO_INCREMENT')), (!(is_array(@$Pile[0]['mode'])?count(@$Pile[0]['mode']):strlen(@$Pile[0]['mode'])) ? '' : ((is_array(@$Pile[0]['mode'])) ? sql_in('documents.mode',sql_quote($in)) : 
			array('=', 'documents.mode', sql_quote(@$Pile[0]['mode'],'','varchar(10) NOT NULL DEFAULT \'document\'')))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('plugins-dist/medias/modeles/img.html','html_b8a8020987dd01f8087ad24f961857eb','_document',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'

' .
vide($Pile['vars'][$_zzz=(string)'image'] = interdire_scripts(((((($a = match(entites_html(sinon(table_valeur(@$Pile[0], (string)'mode_force', null), interdire_scripts($Pile[$SP]['mode'])),true),'image|vignette')) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'embed', null),true)))) ?' ' :''))) .
(($t1 = strval(table_valeur($Pile["vars"], (string)'image', null)))!=='' ?
		($t1 . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'align', null),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'class', null),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html(table_valeur(@$Pile[0], (string)'align', null),true),'left|right'))))!=='' ?
			('
 style=\'float:' . $t2 . ';\'') :
			'') .
	'>
' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'lien', null),true))))!=='' ?
			('<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'lien_class', null),true))))!=='' ?
				(' class="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\'' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
			(' width="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['hauteur'])))!=='' ?
			(' height="' . $t2 . '"') :
			'') .
	' alt="' .
	interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
	'"' .
	(($t2 = strval(interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' />' .
	interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'lien', null),true) ? '</a>':'')) .
	'</span>
')) :
		'') .
(!(table_valeur($Pile["vars"], (string)'image', null))  ?
		(' ' . (	'
	' .
	vide($Pile['vars'][$_zzz=(string)'fichier'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'src')) .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'width'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'width')) .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'height'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'height')) .
	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'align', null),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'class', null),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html(table_valeur(@$Pile[0], (string)'align', null),true),'left|right'))))!=='' ?
			('
 style=\'float:' . $t2 . (	';' .
		(($t3 = strval(table_valeur($Pile["vars"], (string)'width', null)))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'><a href="' .
	interdire_scripts(((($a = entites_html(table_valeur(@$Pile[0], (string)'lien', null),true)) OR (is_string($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))))) .
	'"' .
	(($t2 = strval(interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'lien', null),true) ? '':(	'type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"')))))!=='' ?
			('
 ' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'><img src=\'' .
	table_valeur($Pile["vars"], (string)'fichier', null) .
	'\' width=\'' .
	table_valeur($Pile["vars"], (string)'width', null) .
	'\' height=\'' .
	table_valeur($Pile["vars"], (string)'height', null) .
	'\' alt=\'' .
	interdire_scripts(attribut_html((strlen(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) ? (	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
		' {' .
		interdire_scripts($Pile[$SP]['type_document']) .
		'}'):interdire_scripts($Pile[$SP]['type_document'])))) .
	'\' /></a></span>
')) :
		''));
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_document @ plugins-dist/medias/modeles/img.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette plugins-dist/medias/modeles/img.html
// Temps de compilation total: 48.374 ms
//

function html_b8a8020987dd01f8087ad24f961857eb($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_documenthtml_b8a8020987dd01f8087ad24f961857eb($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_b8a8020987dd01f8087ad24f961857eb', $Cache, $page, 'plugins-dist/medias/modeles/img.html');
}
?>