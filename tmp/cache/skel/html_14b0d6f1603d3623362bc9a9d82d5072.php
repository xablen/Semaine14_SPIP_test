<?php

/*
 * Squelette : ../plugins-dist/mots/prive/objets/liste/mots.html
 * Date :      Tue, 12 Jan 2016 07:49:56 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:36 GMT
 * Boucles :   _liste_mot
 */ 

function BOUCLE_liste_mothtml_14b0d6f1603d3623362bc9a9d82d5072(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_mot']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['id_groupe']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = (@$Pile[0]['id_rubrique']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = (@$Pile[0]['id_article']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	// RECHERCHE
	if (!strlen((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")))){
		list($rech_select, $rech_where) = array("0 as points","");
	} else
	{
		$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
		list($rech_select, $rech_where) = $prepare_recherche((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")), "mots", "?","",array (
  'criteres' => 
  array (
    'id_mot' => true,
    'id_groupe' => true,
  ),
  'lien' => true,
),"id_mot");
	}
	
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('sens'.'_liste_mot'))?session_get('sens'.'_liste_mot'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_mot']) ? $Pile[0]['debut_liste_mot'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'mots';
		$command['id'] = '_liste_mot';
		$command['from'] = array('mots' => 'spip_mots','L1' => 'spip_mots_liens','L2' => 'spip_mots_liens','resultats' => 'spip_resultats');
		$command['type'] = array();
		$command['groupby'] = array("mots.id_mot");
		$command['join'] = array('L1' => array('mots','id_mot'), 'L2' => array('mots','id_mot'), 'resultats' => array('mots','id','id_mot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("mots.id_mot",
		"$rech_select",
		"".tri_champ_select($tri)."",
		"mots.titre",
		"mots.id_groupe",
		"mots.titre AS titre_rang",
		"mots.type");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri, 'mots.titre');
	$command['where'] = 
			array((!(is_array(@$Pile[0]['id_mot'])?count(@$Pile[0]['id_mot']):strlen(@$Pile[0]['id_mot'])) ? '' : ((is_array(@$Pile[0]['id_mot'])) ? sql_in('mots.id_mot',sql_quote($in)) : 
			array('=', 'mots.id_mot', sql_quote(@$Pile[0]['id_mot'],'','bigint(21) NOT NULL AUTO_INCREMENT')))), (!(is_array(@$Pile[0]['id_groupe'])?count(@$Pile[0]['id_groupe']):strlen(@$Pile[0]['id_groupe'])) ? '' : ((is_array(@$Pile[0]['id_groupe'])) ? sql_in('mots.id_groupe',sql_quote($in1)) : 
			array('=', 'mots.id_groupe', sql_quote(@$Pile[0]['id_groupe'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : ((is_array(@$Pile[0]['id_rubrique'])) ? sql_in('L1.id_objet',sql_quote($in2)) : 
			array('=', 'L1.id_objet', sql_quote(@$Pile[0]['id_rubrique'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_rubrique'])?count(@$Pile[0]['id_rubrique']):strlen(@$Pile[0]['id_rubrique'])) ? '' : 
			array('=', 'L1.objet', sql_quote('rubrique'))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : ((is_array(@$Pile[0]['id_article'])) ? sql_in('L2.id_objet',sql_quote($in3)) : 
			array('=', 'L2.id_objet', sql_quote(@$Pile[0]['id_article'],'','bigint(21) NOT NULL DEFAULT \'0\'')))), (!(is_array(@$Pile[0]['id_article'])?count(@$Pile[0]['id_article']):strlen(@$Pile[0]['id_article'])) ? '' : 
			array('=', 'L2.objet', sql_quote('article'))), ((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), $rech_where?$rech_where:'');
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/mots/prive/objets/liste/mots.html','html_14b0d6f1603d3623362bc9a9d82d5072','_liste_mot',7,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_mot']['compteur_boucle'] = 0;
	$Numrows['_liste_mot']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_mot']) ? $Pile[0]['debut_liste_mot'] : _request('debut_liste_mot');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_mot'] = quete_debut_pagination('id_mot',$Pile[0]['@id_mot'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_mot']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10))));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_liste_mot']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10) - 1), $Numrows['_liste_mot']['total'] - 1);
	$Numrows['_liste_mot']['grand_total'] = $Numrows['_liste_mot']['total'];
	$Numrows['_liste_mot']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_mot']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_mot']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public|spip|ecrire:info_numero_abbreviation');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_mot']['compteur_boucle']++;
		if ($Numrows['_liste_mot']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_mot']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr class="' .
alterner($Numrows['_liste_mot']['compteur_boucle'],'row_odd','row_even') .
'">
			<td class=\'picto\'>' .
filtre_puce_statut_dist('','mot',$Pile[$SP]['id_mot'],$Pile[$SP]['id_groupe']) .
'</td>
			<td class=\'titre principale\'' .
(($t1 = strval(((
((!is_array($l = quete_logo('id_mot', 'ON', $Pile[$SP]['id_mot'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))) ?'' :' ')))!=='' ?
		($t1 . ' colspan=\'2\'') :
		'') .
'><a href="' .
generer_url_entite($Pile[$SP]['id_mot'],'mot') .
'" title="' .
attribut_html($l1) .
' ' .
$Pile[$SP]['id_mot'] .
'">' .
(($t1 = strval(recuperer_numero($Pile[$SP]['titre_rang'])))!=='' ?
		($t1 . '. ') :
		'') .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a></td>
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_mot', 'ON', $Pile[$SP]['id_mot'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'40','40'))))!=='' ?
		('<td class=\'logo\'>' . $t1 . '</td>') :
		'') .
'
			<td class=\'type secondaire\'>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['type']), "TYPO", $connect, $Pile[0])) .
'</td>
			<td class=\'id\'>' .
invalideur_session($Cache, (((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('modifier', 'mot', invalideur_session($Cache, $Pile[$SP]['id_mot']))?" ":"") ? (	'<a href="' .
	invalideur_session($Cache, generer_url_ecrire('mot_edit',(	'id_mot=' .
		invalideur_session($Cache, $Pile[$SP]['id_mot'])))) .
	'">' .
	invalideur_session($Cache, $Pile[$SP]['id_mot']) .
	'</a>'):(	invalideur_session($Cache, $Pile[$SP]['id_mot']) .
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
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_mot @ ../plugins-dist/mots/prive/objets/liste/mots.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/mots/prive/objets/liste/mots.html
// Temps de compilation total: 22.787 ms
//

function html_14b0d6f1603d3623362bc9a9d82d5072($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('multi titre' => '1', 'titre' => '1', 'id_mot' => '1', 'points' => '-1
'))))!=='' ?
		($t1 . '
') :
		'') .
(($t1 = BOUCLE_liste_mothtml_14b0d6f1603d3623362bc9a9d82d5072($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_mot"]["grand_total"],
 		'_liste_mot',
		isset($Pile[0]['debut_liste_mot'])?$Pile[0]['debut_liste_mot']:intval(_request('debut_liste_mot')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets mots">
<table class=\'spip liste\'>
' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_mot']['grand_total'])
			? $Numrows['_liste_mot']['grand_total'] : $Numrows['_liste_mot']['total']),'info_1_mot_cle','info_nb_mots_cles')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
	<thead>
		<tr class=\'first_row\'>
			<th class=\'picto\' scope=\'col\'></th>
			<th class=\'titre\' scope=\'col\' colspan=\'2\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('titre',array('>','<')))?'sens':'tri').'_liste_mot',$s?(strpos('< >','titre')-1):'titre'),'var_memotri',strncmp('_liste_mot','session',7)==0?(($s=in_array('titre',array('>','<')))?'sens':'tri').'_liste_mot':''),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('sens'.'_liste_mot'))?session_get('sens'.'_liste_mot'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','titre')-1)):((($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='titre'),'ajax') .
		'</th>
			<th class=\'type\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('type',array('>','<')))?'sens':'tri').'_liste_mot',$s?(strpos('< >','type')-1):'type'),'var_memotri',strncmp('_liste_mot','session',7)==0?(($s=in_array('type',array('>','<')))?'sens':'tri').'_liste_mot':''),_T('mots:info_dans_groupe'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('sens'.'_liste_mot'))?session_get('sens'.'_liste_mot'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','type')-1)):((($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='type'),'ajax') .
		'</th>
			<th class=\'id\' scope=\'col\'>' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('id_mot',array('>','<')))?'sens':'tri').'_liste_mot',$s?(strpos('< >','id_mot')-1):'id_mot'),'var_memotri',strncmp('_liste_mot','session',7)==0?(($s=in_array('id_mot',array('>','<')))?'sens':'tri').'_liste_mot':''),_T('public|spip|ecrire:info_numero_abbreviation'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_mot']))?$Pile[0]['sens'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('sens'.'_liste_mot'))?session_get('sens'.'_liste_mot'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','id_mot')-1)):((($t=(isset($Pile[0]['tri'.'_liste_mot']))?$Pile[0]['tri'.'_liste_mot']:((strncmp('_liste_mot','session',7)==0 AND session_get('tri'.'_liste_mot'))?session_get('tri'.'_liste_mot'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'num titre'),true))))?tri_protege_champ($t):'')=='id_mot'),'ajax') .
		'</th>
		</tr>
	</thead>
	<tbody>
	') . $t1 . (	'
	</tbody>
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_mot"]["grand_total"],
 		'_liste_mot',
		isset($Pile[0]['debut_liste_mot'])?$Pile[0]['debut_liste_mot']:intval(_request('debut_liste_mot')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'nb', null), '10'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		((($t2 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'sinon', null), ''))))!=='' ?
			('
<div class="liste-objets mots caption-wrap"><strong class="caption">' . $t2 . '</strong></div>
') :
			''))) .
'
');

	return analyse_resultat_skel('html_14b0d6f1603d3623362bc9a9d82d5072', $Cache, $page, '../plugins-dist/mots/prive/objets/liste/mots.html');
}
?>