<?php

/*
 * Squelette : squelettes/inc/inc-sommaire-articles.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:26 GMT
 * Boucles :   _articles_exclus, _article_langue
 */ 

function BOUCLE_articles_exclushtml_811e306b565ea1c1f639bf89bba154a7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$in = array();
	$in[]= 'Editorial';
	$in[]= 'exclu_sommaire';

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_exclus';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.id_article");
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['orderby'] = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(L2.titre,' . sql_quote($in) . ')')));
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), sql_in('L2.titre',sql_quote($in)), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-articles.html','html_811e306b565ea1c1f639bf89bba154a7','_articles_exclus',6,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_exclus @ squelettes/inc/inc-sommaire-articles.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_article_languehtml_811e306b565ea1c1f639bf89bba154a7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$doublons_index = array();
	$command['pagination'] = array((isset($Pile[0]['debut_article_langue']) ? $Pile[0]['debut_article_langue'] : null), 10);

	// Initialise le(s) critère(s) doublons
	if (!isset($doublons[$d = 'articles'])) { $doublons[$d] = ''; }

	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_article_langue';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-sommaire-articles.html','html_811e306b565ea1c1f639bf89bba154a7','_article_langue',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_article_langue']['compteur_boucle'] = 0;
	$Numrows['_article_langue']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_article_langue']) ? $Pile[0]['debut_article_langue'] : _request('debut_article_langue');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_article_langue'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_article_langue']['total']-1)/(10))*(10)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_article_langue']['total'] : $debut_boucle + 9), $Numrows['_article_langue']['total'] - 1);
	$Numrows['_article_langue']['grand_total'] = $Numrows['_article_langue']['total'];
	$Numrows['_article_langue']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_article_langue']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_article_langue']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_article_langue']['compteur_boucle']++;
		if ($Numrows['_article_langue']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_article_langue']['compteur_boucle']-1 > $fin_boucle) break;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'
	  ' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<div class="surtitre">') . $t1 . '</div>') :
		'') .
'
      <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" class="titre-article">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a></h3>
      ' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		((	'<div class="sous-titre">') . $t1 . '</div>') :
		'') .
'
      <div class="detail">
		' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span class="date">' . $t1) :
		'') .
' ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . '</span>') :
		'') .
' 
		' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('objet'=>'article','id_objet' => $Pile[$SP]['id_article'],'id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes/inc/inc-sommaire-articles.html','html_811e306b565ea1c1f639bf89bba154a7','_article_langue',15,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public|spip|ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
      </div><!-- detail -->

      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect, $Pile[0]),'552','0')) ? (	(($t2 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect, $Pile[0]),'552','0')))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre($Pile[$SP]['chapo'], $connect, $Pile[0]) ? (	(($t3 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['chapo'], $connect, $Pile[0]),'552','0')))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="extrait">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public|spip|ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
	'" >' .
	_T('public|spip|ecrire:suite') .
	'</a></div>
	</div><!-- fin extrait -->')) :
		'') .
'
      </div><!-- fin texte -->
      <br class="nettoyeur" />
    ');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_article_langue @ squelettes/inc/inc-sommaire-articles.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-sommaire-articles.html
// Temps de compilation total: 25.210 ms
//

function html_811e306b565ea1c1f639bf89bba154a7($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<br class="nettoyeur" />
	<div class="edito">
		<h3 class="edito-titre">' .
_T('public|spip|ecrire:articles_recents') .
'</h3>
	</div>

    ' .
BOUCLE_articles_exclushtml_811e306b565ea1c1f639bf89bba154a7($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    ' .
(($t1 = BOUCLE_article_languehtml_811e306b565ea1c1f639bf89bba154a7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    ' .
		filtre_pagination_dist($Numrows["_article_langue"]["grand_total"],
 		'_article_langue',
		isset($Pile[0]['debut_article_langue'])?$Pile[0]['debut_article_langue']:intval(_request('debut_article_langue')),
		10, false, '', '', array()) .
		'
    ') . $t1 . (	'

    ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_article_langue"]["grand_total"],
 		'_article_langue',
		isset($Pile[0]['debut_article_langue'])?$Pile[0]['debut_article_langue']:intval(_request('debut_article_langue')),
		10, true, 'page_precedent_suivant', '', array())))!=='' ?
				((	'<div class="pagination">
      <div class="ligne1">
        <div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_article_langue']['total'] .
			'/' .
			(isset($Numrows['_article_langue']['grand_total'])
			? $Numrows['_article_langue']['grand_total'] : $Numrows['_article_langue']['total']) .
			' ' .
			_T('public|spip|ecrire:articles') .
			'</div>
      </div>
      <div class="ligne2">
        ') . $t3 . '
      </div>
    </div>') :
				'') .
		'

    ')) :
		('
    ')));

	return analyse_resultat_skel('html_811e306b565ea1c1f639bf89bba154a7', $Cache, $page, 'squelettes/inc/inc-sommaire-articles.html');
}
?>