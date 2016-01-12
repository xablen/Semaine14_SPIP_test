<?php

/*
 * Squelette : ../prive/objets/liste/rubriques.html
 * Date :      Tue, 12 Jan 2016 07:48:40 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:36 GMT
 * Boucles :   _liste_rub
 */ 

function BOUCLE_liste_rubhtml_50dc68885340d6af82c304b32963027b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_parent']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['id_mot']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_auteur']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	$in4 = array();
	if (!(is_array($a = (@$Pile[0]['statut']))))
		$in4[]= $a;
	else $in4 = array_merge($in4, $a);
	// RECHERCHE
	if (!strlen((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")))){
		list($rech_select, $rech_where) = array("0 as points","");
	} else
	{
		$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
		list($rech_select, $rech_where) = $prepare_recherche((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")), "rubriques", "?","",array (
  'criteres' => 
  array (
    'id_rubrique' => true,
    'id_parent' => true,
    'statut' => true,
  ),
  'lien' => true,
),"id_rubrique");
	}
	
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_rub']))?$Pile[0]['sens'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('sens'.'_liste_rub'))?session_get('sens'.'_liste_rub'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_rub']) ? $Pile[0]['debut_liste_rub'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_liste_rub';
		$command['from'] = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_liens','L2' => 'spip_auteurs_liens','resultats' => 'spip_resultats');
		$command['type'] = array();
		$command['groupby'] = array("rubriques.id_rubrique");
		$command['join'] = array('L1' => array('rubriques','id_objet','id_rubrique','L1.objet='.sql_quote('rubrique')), 'L2' => array('rubriques','id_objet','id_rubrique','L2.objet='.sql_quote('rubrique')), 'resultats' => array('rubriques','id','id_rubrique'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("rubriques.id_rubrique",
		"$rech_select",
		"".tri_champ_select($tri)."",
		"rubriques.titre",
		"rubriques.lang",
		"rubriques.titre AS titre_rang",
		"rubriques.date");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri, 'rubriques.titre');
	$command['where'] = 
			array((!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('rubriques.id_rubrique',sql_quote($in)) : 
			array('=', 'rubriques.id_rubrique', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL AUTO_INCREMENT')))), (!(is_array(@$Pile[0]['id_parent'])?count(@$Pile[0]['id_parent']):strlen(@$Pile[0]['id_parent'])) ? '' : ((is_array(@$Pile[0]['id_parent'])) ? sql_in('rubriques.id_parent',sql_quote($in1)) : 
			array('=', 'rubriques.id_parent', sql_quote(@$Pile[0]['id_parent'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_mot'])?count(@$Pile[0]['id_mot']):strlen(@$Pile[0]['id_mot'])) ? '' : ((is_array(@$Pile[0]['id_mot'])) ? sql_in('L1.id_mot',sql_quote($in2)) : 
			array('=', 'L1.id_mot', sql_quote(@$Pile[0]['id_mot'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_auteur'])?count(@$Pile[0]['id_auteur']):strlen(@$Pile[0]['id_auteur'])) ? '' : ((is_array(@$Pile[0]['id_auteur'])) ? sql_in('L2.id_auteur',sql_quote($in3)) : 
			array('=', 'L2.id_auteur', sql_quote(@$Pile[0]['id_auteur'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), (!(is_array(@$Pile[0]['statut'])?count(@$Pile[0]['statut']):strlen(@$Pile[0]['statut'])) ? '' : ((is_array(@$Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in4)) : 
			array('=', 'rubriques.statut', sql_quote(@$Pile[0]['statut'],'','varchar(10) NOT NULL DEFAULT \'0\'')))), $rech_where?$rech_where:'');
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../prive/objets/liste/rubriques.html','html_50dc68885340d6af82c304b32963027b','_liste_rub',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_rub']['compteur_boucle'] = 0;
	$Numrows['_liste_rub']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_rub']) ? $Pile[0]['debut_liste_rub'] : _request('debut_liste_rub');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_rub'] = quete_debut_pagination('id_rubrique',$Pile[0]['@id_rubrique'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_rub']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_liste_rub']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_rub']['total'] - 1);
	$Numrows['_liste_rub']['grand_total'] = $Numrows['_liste_rub']['total'];
	$Numrows['_liste_rub']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_rub']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_rub']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_rub']['compteur_boucle']++;
		if ($Numrows['_liste_rub']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_rub']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		' .
changer_typo(spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
'
		<tr class="' .
alterner($Numrows['_liste_rub']['compteur_boucle'],'row_odd','row_even') .
'">
			<td class=\'picto\'>' .
interdire_scripts(filtre_balise_img_dist(chemin_image('rubrique-16.png'))) .
'</td>
			<td class=\'titre principale\'>' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'20','26'))))!=='' ?
		($t1 . '
				') :
		'') .
'<a href="' .
generer_url_entite($Pile[$SP]['id_rubrique'],'rubrique') .
'"
				' .
(($t1 = strval(interdire_scripts(((((entites_html(table_valeur(@$Pile[0], (string)'lang', null),true) == spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))) ?'' :' ') ? spip_htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']):''))))!=='' ?
		('hreflang="' . $t1 . '"') :
		'') .
'
				title="' .
attribut_html(_T('public|spip|ecrire:info_numero_abbreviation')) .
' ' .
$Pile[$SP]['id_rubrique'] .
'">' .
(($t1 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
		($t1 . '. ') :
		'') .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a></td>
			<td class=\'langue\'></td>
			<td class=\'date secondaire\'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</td>
			<td class=\'id\'>' .
invalideur_session($Cache, (((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', 'rubrique', invalideur_session($Cache, $Pile[$SP]['id_rubrique']))?" ":"") ? (	'<a href="' .
	invalideur_session($Cache, generer_url_ecrire('rubriques_edit',(	'id_rubrique=' .
		invalideur_session($Cache, $Pile[$SP]['id_rubrique'])))) .
	'">' .
	invalideur_session($Cache, $Pile[$SP]['id_rubrique']) .
	'</a>'):(	invalideur_session($Cache, $Pile[$SP]['id_rubrique']) .
	'
			'))) .
'</td>
		</tr>
	');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_rub @ ../prive/objets/liste/rubriques.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../prive/objets/liste/rubriques.html
// Temps de compilation total: 30.333 ms
//

function html_50dc68885340d6af82c304b32963027b($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('date' => interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'date_sens', null), '-1'),true)), 'num titre' => '1', 'id_rubrique' => '1', 'points' => '-1
'))))!=='' ?
		($t1 . '
') :
		'') .
(($t1 = BOUCLE_liste_rubhtml_50dc68885340d6af82c304b32963027b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_rub"]["grand_total"],
 		'_liste_rub',
		isset($Pile[0]['debut_liste_rub'])?$Pile[0]['debut_liste_rub']:intval(_request('debut_liste_rub')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets rubriques">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_rub']['grand_total'])
			? $Numrows['_liste_rub']['grand_total'] : $Numrows['_liste_rub']['total']),'info_1_rubrique','info_nb_rubriques')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
	<thead>
		<tr class=\'first_row\'>
			<th class=\'picto\' scope=\'col\'></th>
			<th class=\'titre\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('num titre',array('>','<')))?'sens':'tri').'_liste_rub',$s?(strpos('< >','num titre')-1):'num titre'),'var_memotri',strncmp('_liste_rub','session',7)==0?(($s=in_array('num titre',array('>','<')))?'sens':'tri').'_liste_rub':''),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_rub']))?$Pile[0]['sens'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('sens'.'_liste_rub'))?session_get('sens'.'_liste_rub'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','num titre')-1)):((($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='num titre'),'ajax') .
		'</th>
			<th class=\'langue\' scope=\'col\'></th>
			<th class=\'date\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('date',array('>','<')))?'sens':'tri').'_liste_rub',$s?(strpos('< >','date')-1):'date'),'var_memotri',strncmp('_liste_rub','session',7)==0?(($s=in_array('date',array('>','<')))?'sens':'tri').'_liste_rub':''),_T('public|spip|ecrire:date'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_rub']))?$Pile[0]['sens'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('sens'.'_liste_rub'))?session_get('sens'.'_liste_rub'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','date')-1)):((($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='date'),'ajax') .
		'</th>
			<th class=\'id\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('id_rubrique',array('>','<')))?'sens':'tri').'_liste_rub',$s?(strpos('< >','id_rubrique')-1):'id_rubrique'),'var_memotri',strncmp('_liste_rub','session',7)==0?(($s=in_array('id_rubrique',array('>','<')))?'sens':'tri').'_liste_rub':''),_T('public|spip|ecrire:info_numero_abbreviation'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_rub']))?$Pile[0]['sens'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('sens'.'_liste_rub'))?session_get('sens'.'_liste_rub'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','id_rubrique')-1)):((($t=(isset($Pile[0]['tri'.'_liste_rub']))?$Pile[0]['tri'.'_liste_rub']:((strncmp('_liste_rub','session',7)==0 AND session_get('tri'.'_liste_rub'))?session_get('tri'.'_liste_rub'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='id_rubrique'),'ajax') .
		'</th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	' .
		changer_typo('') .
		'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_rub"]["grand_total"],
 		'_liste_rub',
		isset($Pile[0]['debut_liste_rub'])?$Pile[0]['debut_liste_rub']:intval(_request('debut_liste_rub')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		((($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'sinon', null), ''))))!=='' ?
			('
<div class="liste-objets rubriques caption-wrap"><strong class="caption">' . $t2 . '</strong></div>
') :
			''))) .
'
');

	return analyse_resultat_skel('html_50dc68885340d6af82c304b32963027b', $Cache, $page, '../prive/objets/liste/rubriques.html');
}
?>