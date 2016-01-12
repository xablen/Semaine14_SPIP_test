<?php

/*
 * Squelette : ../plugins-dist/svp/prive/objets/liste/depots.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:04:02 GMT
 * Boucles :   _liste_depots
 */ 

function BOUCLE_liste_depotshtml_3146c30643a95742dbaed8eb7ca06a47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	// RECHERCHE
	if (!strlen((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")))){
		list($rech_select, $rech_where) = array("0 as points","");
	} else
	{
		$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
		list($rech_select, $rech_where) = $prepare_recherche((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")), "depots", "?","",array (
),"id_depot");
	}
	
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_depots']) ? $Pile[0]['debut_liste_depots'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'depots';
		$command['id'] = '_liste_depots';
		$command['from'] = array('depots' => 'spip_depots','resultats' => 'spip_resultats');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['join'] = array('resultats' => array('depots','id','id_depot'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("depots.id_depot",
		"$rech_select",
		"".tri_champ_select($tri)."",
		"depots.titre",
		"depots.nbr_paquets",
		"depots.nbr_plugins",
		"depots.maj");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri);
	$command['where'] = 
			array(((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), $rech_where?$rech_where:'');
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/objets/liste/depots.html','html_3146c30643a95742dbaed8eb7ca06a47','_liste_depots',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_depots']['compteur_boucle'] = 0;
	$Numrows['_liste_depots']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_depots']) ? $Pile[0]['debut_liste_depots'] : _request('debut_liste_depots');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_depots'] = quete_debut_pagination('id_depot',$Pile[0]['@id_depot'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_depots']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10))));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_liste_depots']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10) - 1), $Numrows['_liste_depots']['total'] - 1);
	$Numrows['_liste_depots']['grand_total'] = $Numrows['_liste_depots']['total'];
	$Numrows['_liste_depots']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_depots']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_depots']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('svp:bulle_aller_depot');
	$l2 = _T('svp:bouton_supprimer');
	$l3 = _T('svp:bulle_supprimer_depot');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_depots']['compteur_boucle']++;
		if ($Numrows['_liste_depots']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_depots']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
			<tr class="' .
alterner($Numrows['_liste_depots']['compteur_boucle'],'row_odd','row_even') .
'">
				<td class="titre principale">
				' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
		($t1 . filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_depot', 'ON', $Pile[$SP]['id_depot'],'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'20','26'))) :
		'') .
'
					<a' .
(($t1 = strval(generer_url_entite($Pile[$SP]['id_depot'],'depot')))!=='' ?
		(' href="' . $t1 . '"') :
		'') .
' title="' .
$l1 .
'">
						' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'
					</a>
				</td>
				' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
		($t1 . (	'
                <td class="nombre">' .
	interdire_scripts($Pile[$SP]['nbr_paquets']) .
	'</td>
                <td class="nombre">' .
	interdire_scripts($Pile[$SP]['nbr_plugins']) .
	'</td>
				<td class="date secondaire">' .
	interdire_scripts(affdate($Pile[$SP]['maj'],'d-m H:i')) .
	'</td>')) :
		'') .
'
				<td class="id">' .
$Pile[$SP]['id_depot'] .
'</td>
				' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
		($t1 . (	'
				<td class="bouton">' .
	bouton_action($l2,invalideur_session($Cache, generer_action_auteur('supprimer_depot',invalideur_session($Cache, $Pile[$SP]['id_depot']),invalideur_session($Cache, self()))),'','',$l3) .
	'</td>')) :
		'') .
'
			</tr>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_depots @ ../plugins-dist/svp/prive/objets/liste/depots.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/objets/liste/depots.html
// Temps de compilation total: 73.769 ms
//

function html_3146c30643a95742dbaed8eb7ca06a47($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('titre' => '1', 'nbr_paquets' => '-1', 'nbr_plugins' => '-1', 'maj' => '-1', 'id_depot' => '1')) .
'

' .
(($t1 = BOUCLE_liste_depotshtml_3146c30643a95742dbaed8eb7ca06a47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_depots"]["grand_total"],
 		'_liste_depots',
		isset($Pile[0]['debut_liste_depots'])?$Pile[0]['debut_liste_depots']:intval(_request('debut_liste_depots')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets depots">
	<table class="spip liste" summary="' .
		_T('svp:resume_table_depots') .
		'">
	' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_depots']['grand_total'])
			? $Numrows['_liste_depots']['grand_total'] : $Numrows['_liste_depots']['total']),'svp:info_1_depot','svp:info_nb_depots')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
		<thead>
			<tr class="first_row">
				<th class="titre principale">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('titre',array('>','<')))?'sens':'tri').'_liste_depots',$s?(strpos('< >','titre')-1):'titre'),'var_memotri',strncmp('_liste_depots','session',7)==0?(($s=in_array('titre',array('>','<')))?'sens':'tri').'_liste_depots':''),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','titre')-1)):((($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')=='titre'),'ajax') .
		'</th>
				' .
		(($t3 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
				($t3 . (	'
                <th class="nombre">' .
			lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('nbr_paquets',array('>','<')))?'sens':'tri').'_liste_depots',$s?(strpos('< >','nbr_paquets')-1):'nbr_paquets'),'var_memotri',strncmp('_liste_depots','session',7)==0?(($s=in_array('nbr_paquets',array('>','<')))?'sens':'tri').'_liste_depots':''),_T('svp:titre_paquets'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','nbr_paquets')-1)):((($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')=='nbr_paquets'),'ajax') .
			'</th>
                <th class="nombre">' .
			lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('nbr_plugins',array('>','<')))?'sens':'tri').'_liste_depots',$s?(strpos('< >','nbr_plugins')-1):'nbr_plugins'),'var_memotri',strncmp('_liste_depots','session',7)==0?(($s=in_array('nbr_plugins',array('>','<')))?'sens':'tri').'_liste_depots':''),_T('svp:titre_plugins'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','nbr_plugins')-1)):((($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')=='nbr_plugins'),'ajax') .
			'</th>
				<th class="date secondaire">' .
			lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('maj',array('>','<')))?'sens':'tri').'_liste_depots',$s?(strpos('< >','maj')-1):'maj'),'var_memotri',strncmp('_liste_depots','session',7)==0?(($s=in_array('maj',array('>','<')))?'sens':'tri').'_liste_depots':''),_T('svp:label_actualise_le'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','maj')-1)):((($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')=='maj'),'ajax') .
			'</th>')) :
				'') .
		'
				<th class="id">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('id_depot',array('>','<')))?'sens':'tri').'_liste_depots',$s?(strpos('< >','id_depot')-1):'id_depot'),'var_memotri',strncmp('_liste_depots','session',7)==0?(($s=in_array('id_depot',array('>','<')))?'sens':'tri').'_liste_depots':''),_T('public|spip|ecrire:info_numero_abbreviation'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_depots']))?$Pile[0]['sens'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('sens'.'_liste_depots'))?session_get('sens'.'_liste_depots'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','id_depot')-1)):((($t=(isset($Pile[0]['tri'.'_liste_depots']))?$Pile[0]['tri'.'_liste_depots']:((strncmp('_liste_depots','session',7)==0 AND session_get('tri'.'_liste_depots'))?session_get('tri'.'_liste_depots'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'titre'),true))))?tri_protege_champ($t):'')=='id_depot'),'ajax') .
		'</th>
				' .
		(($t3 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
				($t3 . '
				<th class="bouton">&nbsp;</th>
				<th class="bouton">&nbsp;</th>') :
				'') .
		'
			</tr>
		</thead>
		<tbody>
') . $t1 . (	'
		</tbody>
	</table>
	' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_depots"]["grand_total"],
 		'_liste_depots',
		isset($Pile[0]['debut_liste_depots'])?$Pile[0]['debut_liste_depots']:intval(_request('debut_liste_depots')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '5'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		((	'
' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'affichage', null),true) == 'complet')) ?' ' :''))))!=='' ?
			($t2 . (	'
	' .
		boite_ouvrir('', 'notice') .
		'<p>' .
		_T('svp:info_aucun_depot_ajoute') .
		'</p>
	' .
		boite_fermer() .
		'
')) :
			'') .
	'
'))) .
'
');

	return analyse_resultat_skel('html_3146c30643a95742dbaed8eb7ca06a47', $Cache, $page, '../plugins-dist/svp/prive/objets/liste/depots.html');
}
?>