<?php

/*
 * Squelette : squelettes/inc/inc-rub-articles.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 13:12:11 GMT
 * Boucles :   _articles_rubrique_nom, _articles_rubrique
 */ 

function BOUCLE_articles_rubrique_nomhtml_8bf8bdc0aa13e79e11d908f1699ff96f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_articles_rubrique_nom';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-articles.html','html_8bf8bdc0aa13e79e11d908f1699ff96f','_articles_rubrique_nom',12,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<b class="petit-info"><a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>(' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
')</a></b>
			');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_rubrique_nom @ squelettes/inc/inc-rub-articles.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_articles_rubriquehtml_8bf8bdc0aa13e79e11d908f1699ff96f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['pagination'] = array((isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : null), 10);
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_articles_rubrique';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.id_rubrique",
		"0+articles.titre AS num",
		"articles.date",
		"articles.id_article",
		"articles.surtitre",
		"articles.descriptif",
		"articles.titre",
		"articles.soustitre",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
		$command['orderby'] = array('num', 'articles.date DESC');
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), sql_in('articles.id_rubrique', calcul_branche_in(sql_quote(@$Pile[0]['id_rubrique']))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-rub-articles.html','html_8bf8bdc0aa13e79e11d908f1699ff96f','_articles_rubrique',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_articles_rubrique']['compteur_boucle'] = 0;
	$Numrows['_articles_rubrique']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : _request('debut_articles_rubrique');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_rubrique'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_rubrique']['total']-1)/(10))*(10)));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_articles_rubrique']['total'] : $debut_boucle + 9), $Numrows['_articles_rubrique']['total'] - 1);
	$Numrows['_articles_rubrique']['grand_total'] = $Numrows['_articles_rubrique']['total'];
	$Numrows['_articles_rubrique']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_rubrique']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_articles_rubrique']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_articles_rubrique']['compteur_boucle']++;
		if ($Numrows['_articles_rubrique']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_rubrique']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<br class="nettoyeur" />
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'120','0'))))!=='' ?
		('<div class="logo-liste-art">
				' . $t1 . '
			</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
			<h3>
			<a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect, $Pile[0]))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>
			' .
BOUCLE_articles_rubrique_nomhtml_8bf8bdc0aa13e79e11d908f1699ff96f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			</h3>
      	' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect, $Pile[0]))))!=='' ?
		('<div class="sous-titre">' . $t1 . '</div>') :
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
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('objet'=>'article','id_objet' => $Pile[$SP]['id_article'],'id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes/inc/inc-rub-articles.html','html_8bf8bdc0aa13e79e11d908f1699ff96f','_articles_rubrique',17,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public|spip|ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
		</div><!-- detail -->
      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect, $Pile[0]),'552','0')) ? (	(($t2 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect, $Pile[0]),'552','0')))))!=='' ?
			((	'<div class="">') . $t2 . (	'</div>
		<div class="suite"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'" title="...' .
		_T('public|spip|ecrire:suite') .
		' : ' .
		interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
		'" >' .
		_T('public|spip|ecrire:suite') .
		'</a></div>')) :
			'') .
	'
		'):(	interdire_scripts((propre($Pile[$SP]['chapo'], $connect, $Pile[0]) ? (	(($t3 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['chapo'], $connect, $Pile[0]),'552','0')))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public|spip|ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
			'" >' .
			_T('public|spip|ecrire:suite') .
			'</a></div>')) :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect, $Pile[0]),'300'))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public|spip|ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])))) .
			'" >' .
			_T('public|spip|ecrire:suite') .
			'</a></div>')) :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="extrait">' . $t1 . '</div><!-- fin extrait -->') :
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
		spip_log(intval(1000*$timer)."ms BOUCLE_articles_rubrique @ squelettes/inc/inc-rub-articles.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-rub-articles.html
// Temps de compilation total: 25.549 ms
//

function html_8bf8bdc0aa13e79e11d908f1699ff96f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'		' .
(($t1 = BOUCLE_articles_rubriquehtml_8bf8bdc0aa13e79e11d908f1699ff96f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public|spip|ecrire:articles_rubrique') .
		'</h2>
		 ' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		10, false, '', '', array()) .
		'
		') . $t1 . (	'
		
		' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		10, true, '', '', array())))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_articles_rubrique']['total'] .
			'/' .
			(isset($Numrows['_articles_rubrique']['grand_total'])
			? $Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']) .
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
		''));

	return analyse_resultat_skel('html_8bf8bdc0aa13e79e11d908f1699ff96f', $Cache, $page, 'squelettes/inc/inc-rub-articles.html');
}
?>