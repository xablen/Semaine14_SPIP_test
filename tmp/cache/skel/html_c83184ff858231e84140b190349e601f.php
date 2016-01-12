<?php

/*
 * Squelette : ../plugins-dist/medias/prive/objets/liste/documents.html
 * Date :      Tue, 12 Jan 2016 07:49:23 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:37 GMT
 * Boucles :   _auteurs, _liste_doc
 */ 

function BOUCLE_auteurshtml_c83184ff858231e84140b190349e601f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'auteurs';
		$command['id'] = '_auteurs';
		$command['from'] = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_liens');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("auteurs.id_auteur",
		"auteurs.nom");
		$command['orderby'] = array();
		$command['join'] = array('L1' => array('auteurs','id_auteur'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('auteurs.statut','!5poubelle','!5poubelle',''), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_document'],'','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'L1.objet', sql_quote('document')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/medias/prive/objets/liste/documents.html','html_c83184ff858231e84140b190349e601f','_auteurs',27,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t1 = (
'<a href="' .
generer_url_entite($Pile[$SP]['id_auteur'],'auteur') .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'</a>');
		$t0 .= ((strlen($t1) && strlen($t0)) ? ', ' : '') . $t1;
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_auteurs @ ../plugins-dist/medias/prive/objets/liste/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_liste_dochtml_c83184ff858231e84140b190349e601f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_document']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_mot']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	if (!(is_array($a = (@$Pile[0]['id_auteur']))))
		$in4[]= $a;
	else $in4 = array_merge($in4, $a);
	$in5 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in5[]= $a;
	else $in5 = array_merge($in5, $a);
	// RECHERCHE
	if (!strlen((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")))){
		list($rech_select, $rech_where) = array("0 as points","");
	} else
	{
		$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
		list($rech_select, $rech_where) = $prepare_recherche((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")), "documents", "?","",array (
  'criteres' => 
  array (
    'id_document' => true,
    'statut' => true,
  ),
  'lien' => true,
),"id_document");
	}
	
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_doc']))?$Pile[0]['sens'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('sens'.'_liste_doc'))?session_get('sens'.'_liste_doc'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_doc']) ? $Pile[0]['debut_liste_doc'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'documents';
		$command['id'] = '_liste_doc';
		$command['from'] = array('documents' => 'spip_documents','L1' => 'spip_documents_liens','L2' => 'spip_documents_liens','L3' => 'spip_mots_liens','L4' => 'spip_auteurs_liens','resultats' => 'spip_resultats');
		$command['type'] = array();
		$command['groupby'] = array("documents.id_document");
		$command['join'] = array('L1' => array('documents','id_document'), 'L2' => array('documents','id_document'), 'L3' => array('documents','id_objet','id_document','L3.objet='.sql_quote('document')), 'L4' => array('documents','id_objet','id_document','L4.objet='.sql_quote('document')), 'resultats' => array('documents','id','id_document'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("documents.id_document",
		"$rech_select",
		"".tri_champ_select($tri)."",
		"documents.titre",
		"documents.statut",
		"L1.id_objet AS id_rubrique",
		"L1.id_objet AS id_article",
		"CASE WHEN length(titre)>0 THEN titre ELSE fichier END AS titre_rang",
		"documents.fichier",
		"documents.date");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri, 'documents.titre');
	$command['where'] = 
			array(
			array('IN', 'documents.mode', '(\'image\',\'document\')'), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), (!(is_array(@$Pile[0]['id_document'])?count(@$Pile[0]['id_document']):strlen(@$Pile[0]['id_document'])) ? '' : ((is_array(@$Pile[0]['id_document'])) ? sql_in('documents.id_document',sql_quote($in)) : 
			array('=', 'documents.id_document', sql_quote(@$Pile[0]['id_document'],'','bigint(21) NOT NULL AUTO_INCREMENT')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L1.id_objet',sql_quote($in1)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L1.objet', sql_quote('article'))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L2.id_objet',sql_quote($in2)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L2.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['id_mot'])?count(@$Pile[0]['id_mot']):strlen(@$Pile[0]['id_mot'])) ? '' : ((is_array(@$Pile[0]['id_mot'])) ? sql_in('L3.id_mot',sql_quote($in3)) : 
			array('=', 'L3.id_mot', sql_quote(@$Pile[0]['id_mot'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_auteur'])?count(@$Pile[0]['id_auteur']):strlen(@$Pile[0]['id_auteur'])) ? '' : ((is_array(@$Pile[0]['id_auteur'])) ? sql_in('L4.id_auteur',sql_quote($in4)) : 
			array('=', 'L4.id_auteur', sql_quote(@$Pile[0]['id_auteur'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('documents.statut',sql_quote($in5)) : 
			array('=', 'documents.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))), $rech_where?$rech_where:'');
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/medias/prive/objets/liste/documents.html','html_c83184ff858231e84140b190349e601f','_liste_doc',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_doc']['compteur_boucle'] = 0;
	$Numrows['_liste_doc']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_doc']) ? $Pile[0]['debut_liste_doc'] : _request('debut_liste_doc');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_doc'] = quete_debut_pagination('id_document',$Pile[0]['@id_document'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_doc']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_liste_doc']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_doc']['total'] - 1);
	$Numrows['_liste_doc']['grand_total'] = $Numrows['_liste_doc']['total'];
	$Numrows['_liste_doc']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_doc']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_doc']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:info_numero_abbreviation');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_doc']['compteur_boucle']++;
		if ($Numrows['_liste_doc']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_doc']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr class="' .
alterner($Numrows['_liste_doc']['compteur_boucle'],'row_odd','row_even') .
'">
			<td class=\'statut\'>' .
interdire_scripts(filtre_puce_statut_dist($Pile[$SP]['statut'],'document',$Pile[$SP]['id_document'],$Pile[$SP]['id_rubrique'])) .
'</td>
			<td class=\'titre principale\'>' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'20','26')) .
'<a href="' .
generer_url_entite($Pile[$SP]['id_document'],'document') .
'"
																					title="' .
attribut_html($l1) .
' ' .
$Pile[$SP]['id_document'] .
'">' .
(($t1 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
		($t1 . '. ') :
		'') .
interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) OR (is_string($a) AND strlen($a))) ? $a : interdire_scripts(basename(get_spip_doc($Pile[$SP]['fichier']))))) .
'</a></td>
			<td class=\'auteur\'>' .
BOUCLE_auteurshtml_c83184ff858231e84140b190349e601f($Cache, $Pile, $doublons, $Numrows, $SP) .
'</td>
			<td class=\'date secondaire\'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</td>
			<td class=\'id\'>' .
invalideur_session($Cache, (((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', 'document', invalideur_session($Cache, $Pile[$SP]['id_document']))?" ":"") ? (	'<a href="' .
	invalideur_session($Cache, generer_url_ecrire('document_edit',(	'id_document=' .
		invalideur_session($Cache, $Pile[$SP]['id_document'])))) .
	'">' .
	invalideur_session($Cache, $Pile[$SP]['id_document']) .
	'</a>'):(	invalideur_session($Cache, $Pile[$SP]['id_document']) .
	'
			'))) .
'</td>
		</tr>
	');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_doc @ ../plugins-dist/medias/prive/objets/liste/documents.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/medias/prive/objets/liste/documents.html
// Temps de compilation total: 57.685 ms
//

function html_c83184ff858231e84140b190349e601f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('date' => interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'date_sens', null), '-1'),true)), 'num titre' => '1', 'id_document' => '1', 'points' => '-1
'))))!=='' ?
		($t1 . '
') :
		'') .
(($t1 = BOUCLE_liste_dochtml_c83184ff858231e84140b190349e601f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_doc"]["grand_total"],
 		'_liste_doc',
		isset($Pile[0]['debut_liste_doc'])?$Pile[0]['debut_liste_doc']:intval(_request('debut_liste_doc')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets documents">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_doc']['grand_total'])
			? $Numrows['_liste_doc']['grand_total'] : $Numrows['_liste_doc']['total']),'medias:un_document','medias:des_files')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
	<thead>
		<tr class=\'first_row\'>
			<th class=\'statut\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('statut',array('>','<')))?'sens':'tri').'_liste_doc',$s?(strpos('< >','statut')-1):'statut'),'var_memotri',strncmp('_liste_doc','session',7)==0?(($s=in_array('statut',array('>','<')))?'sens':'tri').'_liste_doc':''),(	'<span title="' .
			attribut_html(_T('public|spip|ecrire:lien_trier_statut')) .
			'">#</span>'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_doc']))?$Pile[0]['sens'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('sens'.'_liste_doc'))?session_get('sens'.'_liste_doc'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','statut')-1)):((($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')=='statut'),'ajax') .
		'</th>
			<th class=\'titre principale\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('num titre',array('>','<')))?'sens':'tri').'_liste_doc',$s?(strpos('< >','num titre')-1):'num titre'),'var_memotri',strncmp('_liste_doc','session',7)==0?(($s=in_array('num titre',array('>','<')))?'sens':'tri').'_liste_doc':''),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_doc']))?$Pile[0]['sens'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('sens'.'_liste_doc'))?session_get('sens'.'_liste_doc'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','num titre')-1)):((($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')=='num titre'),'ajax') .
		'</th>
			<th class=\'auteur\' scope=\'col\'>' .
		_T('public|spip|ecrire:auteur') .
		'</th>
			<th class=\'date secondaire\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('date',array('>','<')))?'sens':'tri').'_liste_doc',$s?(strpos('< >','date')-1):'date'),'var_memotri',strncmp('_liste_doc','session',7)==0?(($s=in_array('date',array('>','<')))?'sens':'tri').'_liste_doc':''),_T('public|spip|ecrire:date'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_doc']))?$Pile[0]['sens'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('sens'.'_liste_doc'))?session_get('sens'.'_liste_doc'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','date')-1)):((($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')=='date'),'ajax') .
		'</th>
			<th class=\'id\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('id_document',array('>','<')))?'sens':'tri').'_liste_doc',$s?(strpos('< >','id_document')-1):'id_document'),'var_memotri',strncmp('_liste_doc','session',7)==0?(($s=in_array('id_document',array('>','<')))?'sens':'tri').'_liste_doc':''),_T('public|spip|ecrire:info_numero_abbreviation'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_doc']))?$Pile[0]['sens'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('sens'.'_liste_doc'))?session_get('sens'.'_liste_doc'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','id_document')-1)):((($t=(isset($Pile[0]['tri'.'_liste_doc']))?$Pile[0]['tri'.'_liste_doc']:((strncmp('_liste_doc','session',7)==0 AND session_get('tri'.'_liste_doc'))?session_get('tri'.'_liste_doc'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'date'),true))))?tri_protege_champ($t):'')=='id_document'),'ajax') .
		'</th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_doc"]["grand_total"],
 		'_liste_doc',
		isset($Pile[0]['debut_liste_doc'])?$Pile[0]['debut_liste_doc']:intval(_request('debut_liste_doc')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pagination', null), 'prive'),true)), '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		((($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'sinon', null), ''))))!=='' ?
			('
<div class="liste-objets documents caption-wrap"><strong class="caption">' . $t2 . '</strong></div>
') :
			''))) .
'
');

	return analyse_resultat_skel('html_c83184ff858231e84140b190349e601f', $Cache, $page, '../plugins-dist/medias/prive/objets/liste/documents.html');
}
?>