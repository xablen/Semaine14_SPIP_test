<?php

/*
 * Squelette : squelettes/inc/inc-menu-agenda.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:27 GMT
 * Boucles :   _art_agenda
 */ 

function BOUCLE_art_agendahtml_78503d8cb0bd66f2d97f4b9c0f7d329a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_art_agenda';
		$command['from'] = array('articles' => 'spip_articles','L1' => 'spip_mots_liens','L2' => 'spip_mots');
		$command['type'] = array();
		$command['groupby'] = array("articles.id_article");
		$command['select'] = array("articles.date_redac",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.titre",
		"articles.lang");
		$command['orderby'] = array('articles.date_redac');
		$command['join'] = array('L1' => array('articles','id_objet','id_article','L1.objet='.sql_quote('article')), 'L2' => array('L1','id_mot'));
		$command['limit'] = '0,5';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('<', 'TIMESTAMPDIFF(HOUR,articles.date_redac,NOW())/24', "1"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'],'','varchar(10) NOT NULL DEFAULT \'\'')));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes/inc/inc-menu-agenda.html','html_78503d8cb0bd66f2d97f4b9c0f7d329a','_art_agenda',4,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li>' .
(($t1 = strval(affdate(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
		('<span>' . $t1 . (	' ' .
	(($t2 = strval(((heures(normaliser_date($Pile[$SP]['date_redac'])) != '0') ? (	(($t3 = strval(heures(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
				($t3 . ':') :
				'') .
		minutes(normaliser_date($Pile[$SP]['date_redac']))):'')))!=='' ?
			('- ' . $t2) :
			'') .
	'</span>')) :
		'') .
'
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect, null))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0]))) .
'</a>

				</li>
		');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_art_agenda @ squelettes/inc/inc-menu-agenda.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes/inc/inc-menu-agenda.html
// Temps de compilation total: 13.866 ms
//

function html_78503d8cb0bd66f2d97f4b9c0f7d329a($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_art_agendahtml_78503d8cb0bd66f2d97f4b9c0f7d329a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="menu" id="menu-agenda">
	<br />
	<h3 class="structure">' .
		_T('public|spip|ecrire:icone_agenda') .
		'</h3>
	<ul>
		<li>
			<a class="lien" href="' .
		interdire_scripts(generer_url_public('agenda', '')) .
		'" title="' .
		_T('public|spip|ecrire:icone_agenda') .
		'">' .
		_T('public|spip|ecrire:icone_agenda') .
		'</a>
			<ul>
		') . $t1 . '
			</ul>
		</li>
	</ul>
</div>
') :
		'') .
'

');

	return analyse_resultat_skel('html_78503d8cb0bd66f2d97f4b9c0f7d329a', $Cache, $page, 'squelettes/inc/inc-menu-agenda.html');
}
?>