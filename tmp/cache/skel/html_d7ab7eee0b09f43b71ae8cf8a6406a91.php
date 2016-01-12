<?php

/*
 * Squelette : squelettes/inc/inc-annonces.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:26:35 GMT
 * Boucles :   _annonces_site, _logo_rub_doc, _annonces_rub_img, _logo_art_doc, _annonces_art_img, _annonces_rub, _annonces_art
 */ 

function BOUCLE_annonces_sitehtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'syndic';
		$command['id'] = '_annonces_site';
		$command['from'] = array('syndic' => 'spip_syndic','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("syndic.id_syndic");
		$command['select'] = array("0+syndic.nom_site AS num",
		"syndic.id_syndic",
		"syndic.id_rubrique",
		"syndic.url_site",
		"syndic.nom_site",
		"syndic.descriptif");
		$command['orderby'] = array('num');
		$command['where'] = 
			array(
quete_condition_statut('syndic.statut','publie,prop','publie',''), 
			array('=', 'L2.titre', "'Annonce'"));
		$command['join'] = array('L1' => array('syndic','id_objet','id_syndic','L1.objet='.sql_quote('site')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_annonces_site',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
            <li class="annonce">
            ' .
(
((!is_array($l = quete_logo('id_syndic', 'ON', $Pile[$SP]['id_syndic'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ? (	'<a href="' .
	generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
	'"' .
	(calcul_exposer($Pile[$SP]['id_syndic'], 'id_syndic', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_syndic', '')  ?
			(' class="' . 'on' . '"') :
			'') .
	(($t2 = strval(interdire_scripts(attribut_html(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' style="text-align:center;">

				' .
	inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', $Pile[$SP]['id_syndic'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','0')),'alt',interdire_scripts(attribut_html(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])))),'title',interdire_scripts(attribut_html(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0])))) .
	'
				</a>

			'):(	'<p>
                ' .
	(($t2 = strval(interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect, false)), "TYPO", $connect, $Pile[0]))))!=='' ?
			((	'<big style="text-align:center;"><a href="' .
		generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
		'"' .
		(($t3 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		' style="text-align:center;">') . $t2 . '</a></big>') :
			'') .
	'
                <br />
                </p>

			')) .
'
          	</li>
            ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces_site @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_logo_rub_dochtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_logo_rub_doc';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.fichier",
		"documents.titre",
		"L1.id_objet AS id_rubrique",
		"documents.descriptif");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.titre', "'Annonce'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_logo_rub_doc',49,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'

                ' .
(($t1 = strval(interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'150','0')),'alt',interdire_scripts(attribut_html(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')))))))!=='' ?
		((	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>') . $t1 . '</a>') :
		'') .
'
              ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_logo_rub_doc @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_annonces_rub_imghtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'rubriques'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_annonces_rub_img';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.date",
		"rubriques.lang",
		"rubriques.titre");
		$command['orderby'] = array('rubriques.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_annonces_rub_img',49,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = BOUCLE_logo_rub_dochtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
          	<li class="annonce">
              ' . $t1 . '
          	</li>
            ') :
		'');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces_rub_img @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_logo_art_dochtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_logo_art_doc';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("documents.fichier",
		"documents.titre",
		"L1.id_objet AS id_article",
		"documents.descriptif");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('documents','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('documents.statut','publie,prop,prepa','publie',''), 
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.titre', "'Annonce'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_logo_art_doc',41,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
                ' .
(($t1 = strval(interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'150','0')),'alt',interdire_scripts(attribut_html(couper(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]),'80')))))))!=='' ?
		((	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>') . $t1 . '</a>') :
		'') .
'
              ');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_logo_art_doc @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_annonces_art_imghtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_annonces_art_img';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_article",
		"articles.date",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_annonces_art_img',35,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = BOUCLE_logo_art_dochtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
            <li class="annonce">

              ' . $t1 . '
          	</li>
            ') :
		'');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces_art_img @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_annonces_rubhtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_annonces_rub';
		$command['from'] = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("rubriques.id_rubrique");
		$command['select'] = array("rubriques.date",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array('rubriques.date DESC');
		$command['join'] = array('L1' => array('rubriques','id_objet','id_rubrique','L1.objet='.sql_quote('rubrique')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array('=', 'L2.titre', "'Annonce'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_annonces_rub',64,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

            <li class="annonce">
            ' .
(
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ? (	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' style="text-align:center;">
				' .
	inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','0')),'alt',interdire_scripts(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))),'title',interdire_scripts(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
	'
				</a>

			'):(	'<p>
                ' .
	(($t2 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))!=='' ?
			((	'<big style="text-align:center;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'"' .
		(($t3 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		' style="text-align:center;">') . $t2 . '</a></big>') :
			'') .
	'
                </p>

			')) .
'
          	</li>
            ');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces_rub @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_annonces_arthtml_d7ab7eee0b09f43b71ae8cf8a6406a91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_annonces_art';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.surtitre",
		"articles.soustitre",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array('=', 'L2.titre', "'Annonce'"));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-annonces.html','html_d7ab7eee0b09f43b71ae8cf8a6406a91','_annonces_art',97,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li class="annonce">
            ' .
(
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ? (	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' style="text-align:center;">

				' .
	inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','0')),'alt',interdire_scripts(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))),'title',interdire_scripts(attribut_html(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
	'
				</a>

			'):(	'<p>
                ' .
	(($t2 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
			('<small style="text-transform:uppercase">' . $t2 . '</small>') :
			'') .
	'
                ' .
	(($t2 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))))!=='' ?
			((	'<big style="text-align:center;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'"' .
		(($t3 = strval(interdire_scripts(attribut_html(propre($Pile[$SP]['descriptif'], $connect, $Pile[0])))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		' style="text-align:center;">') . $t2 . '</a></big>') :
			'') .
	'
                ' .
	(($t2 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
			('<span>' . $t2 . '</span>') :
			'') .
	'
                <br />
                </p>

			')) .
'
          	</li>
            ');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces_art @ squelettes/inc/inc-annonces.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-annonces.html
// Temps de compilation total: 87.232 ms
//

function html_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    ' .
(($t1 = BOUCLE_annonces_sitehtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces Logo du site ou Nom du site-->
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:info_annonces_generales') .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'

    ' .
(($t1 = BOUCLE_annonces_art_imghtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:info_annonces_generales') .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . (	'
            ' .
		BOUCLE_annonces_rub_imghtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP) .
		'            
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ')) :
		'') .
'


    ' .
(($t1 = BOUCLE_annonces_rubhtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:info_annonces_generales') .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'

    ' .
(($t1 = BOUCLE_annonces_arthtml_d7ab7eee0b09f43b71ae8cf8a6406a91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces Logo de l\'article ou Titres -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public|spip|ecrire:info_annonces_generales') .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'

');

	return analyse_resultat_skel('html_d7ab7eee0b09f43b71ae8cf8a6406a91', $Cache, $page, 'squelettes/inc/inc-annonces.html');
}
?>