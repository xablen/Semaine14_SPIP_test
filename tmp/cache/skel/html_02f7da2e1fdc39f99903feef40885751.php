<?php

/*
 * Squelette : ../plugins-dist/svp/prive/objets/liste/plugins.html
 * Date :      Tue, 12 Jan 2016 07:49:48 GMT
 * Compile :   Tue, 12 Jan 2016 09:06:09 GMT
 * Boucles :   _liste_plugins
 */ 

function BOUCLE_liste_pluginshtml_02f7da2e1fdc39f99903feef40885751(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['id_depot']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = (@$Pile[0]['categorie']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	// RECHERCHE
	if (!strlen((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")))){
		list($rech_select, $rech_where) = array("0 as points","");
	} else
	{
		$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
		list($rech_select, $rech_where) = $prepare_recherche((isset($Pile[0]["recherche"])?$Pile[0]["recherche"]:(isset($GLOBALS["recherche"])?$GLOBALS["recherche"]:"")), "plugins", "?","",array (
  'lien' => true,
  'criteres' => 
  array (
    'categorie' => true,
  ),
),"id_plugin");
	}
	
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_liste_plugins']))?$Pile[0]['sens'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('sens'.'_liste_plugins'))?session_get('sens'.'_liste_plugins'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	$command['pagination'] = array((isset($Pile[0]['debut_liste_plugins']) ? $Pile[0]['debut_liste_plugins'] : null), (($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10));
	if (!isset($command['table'])) {
		$command['table'] = 'plugins';
		$command['id'] = '_liste_plugins';
		$command['from'] = array('plugins' => 'spip_plugins','L1' => 'spip_depots_plugins','resultats' => 'spip_resultats','depots_plugins' => 'spip_depots_plugins');
		$command['type'] = array();
		$command['groupby'] = array("plugins.id_plugin");
		$command['join'] = array('L1' => array('plugins','id_plugin'), 'resultats' => array('plugins','id','id_plugin'));
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['select'] = array("plugins.id_plugin",
		"$rech_select",
		"".tri_champ_select($tri)."",
		"plugins.nom",
		"plugins.branches_spip",
		"plugins.date_modif",
		"plugins.prefixe");
	$command['orderby'] = array(tri_champ_order($tri,$command['from']).$senstri);
	$command['where'] = 
			array(((@$Pile[0]["where"]) ? (@$Pile[0]["where"]) : ''), (!(is_array(@$Pile[0]['id_depot'])?count(@$Pile[0]['id_depot']):strlen(@$Pile[0]['id_depot'])) ? '' : ((is_array(@$Pile[0]['id_depot'])) ? sql_in('L1.id_depot',sql_quote($in)) : 
			array('=', 'L1.id_depot', sql_quote(@$Pile[0]['id_depot'],'','bigint(21) NOT NULL')))), (!(is_array(@$Pile[0]['categorie'])?count(@$Pile[0]['categorie']):strlen(@$Pile[0]['categorie'])) ? '' : ((is_array(@$Pile[0]['categorie'])) ? sql_in('plugins.categorie',sql_quote($in1)) : 
			array('=', 'plugins.categorie', sql_quote(@$Pile[0]['categorie'],'','varchar(100) NOT NULL DEFAULT \'\'')))), $rech_where?$rech_where:'', 
			array('=', 'depots_plugins.id_plugin', 'plugins.id_plugin'), 
			array('>', 'depots_plugins.id_depot', '"0"'));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/svp/prive/objets/liste/plugins.html','html_02f7da2e1fdc39f99903feef40885751','_liste_plugins',22,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_liste_plugins']['compteur_boucle'] = 0;
	$Numrows['_liste_plugins']['total'] = @intval($iter->count());
	$debut_boucle = isset($Pile[0]['debut_liste_plugins']) ? $Pile[0]['debut_liste_plugins'] : _request('debut_liste_plugins');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_liste_plugins'] = quete_debut_pagination('id_plugin',$Pile[0]['@id_plugin'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10),$iter);
		$iter->seek(0);
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_liste_plugins']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10))));
	$debut_boucle = intval($debut_boucle);
	$fin_boucle = min(($tout ? $Numrows['_liste_plugins']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10) - 1), $Numrows['_liste_plugins']['total'] - 1);
	$Numrows['_liste_plugins']['grand_total'] = $Numrows['_liste_plugins']['total'];
	$Numrows['_liste_plugins']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_liste_plugins']['grand_total'] AND $iter->seek($debut_boucle,'continue'))
		$Numrows['_liste_plugins']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('svp:bulle_aller_plugin');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_liste_plugins']['compteur_boucle']++;
		if ($Numrows['_liste_plugins']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_liste_plugins']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
			<tr class="' .
alterner($Numrows['_liste_plugins']['compteur_boucle'],'row_odd','row_even') .
'">
				<td class="titre principale">
					<a' .
(($t1 = strval(generer_url_entite($Pile[$SP]['id_plugin'],'plugin')))!=='' ?
		(' href="' . $t1 . '"') :
		'') .
' title="' .
$l1 .
'">
						' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']), "TYPO", $connect, $Pile[0])) .
'
					</a>
				</td>
				<td class="liste">' .
interdire_scripts($Pile[$SP]['branches_spip']) .
'</td>
				<td class="date secondaire">' .
affdate(normaliser_date($Pile[$SP]['date_modif']),'d-m H:i') .
'</td>
				<td class="titre">' .
interdire_scripts(strtolower($Pile[$SP]['prefixe'])) .
'</td>
				<td class="id">' .
$Pile[$SP]['id_plugin'] .
'</td>
			</tr>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_liste_plugins @ ../plugins-dist/svp/prive/objets/liste/plugins.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/prive/objets/liste/plugins.html
// Temps de compilation total: 23.874 ms
//

function html_02f7da2e1fdc39f99903feef40885751($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
vide($Pile['vars'][$_zzz=(string)'defaut_tri'] = array('nom' => '1', 'date_modif' => '-1', 'prefixe' => '1', 'categorie' => '1', 'id_depot' => '1')) .
'

' .
(($t1 = BOUCLE_liste_pluginshtml_02f7da2e1fdc39f99903feef40885751($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_liste_plugins"]["grand_total"],
 		'_liste_plugins',
		isset($Pile[0]['debut_liste_plugins'])?$Pile[0]['debut_liste_plugins']:intval(_request('debut_liste_plugins')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="liste-objets plugins">
	<table class="spip liste" summary="' .
		_T('svp:resume_table_plugins') .
		'">
	' .
		(($t3 = strval(interdire_scripts(sinon(table_valeur(@$Pile[0], (string)'titre', null), singulier_ou_pluriel((isset($Numrows['_liste_plugins']['grand_total'])
			? $Numrows['_liste_plugins']['grand_total'] : $Numrows['_liste_plugins']['total']),'svp:info_1_plugin','svp:info_nb_plugins')))))!=='' ?
				('<caption><strong class="caption">' . $t3 . '</strong></caption>') :
				'') .
		'
		<thead>
			<tr class="first_row">
				<th class="titre principale">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('nom',array('>','<')))?'sens':'tri').'_liste_plugins',$s?(strpos('< >','nom')-1):'nom'),'var_memotri',strncmp('_liste_plugins','session',7)==0?(($s=in_array('nom',array('>','<')))?'sens':'tri').'_liste_plugins':''),_T('public|spip|ecrire:info_titre'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_plugins']))?$Pile[0]['sens'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('sens'.'_liste_plugins'))?session_get('sens'.'_liste_plugins'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','nom')-1)):((($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')=='nom'),'ajax') .
		'</th>
				<th class="liste">' .
		_T('svp:label_branches_spip') .
		'</th>
				<th class="date secondaire">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('date_modif',array('>','<')))?'sens':'tri').'_liste_plugins',$s?(strpos('< >','date_modif')-1):'date_modif'),'var_memotri',strncmp('_liste_plugins','session',7)==0?(($s=in_array('date_modif',array('>','<')))?'sens':'tri').'_liste_plugins':''),_T('svp:label_modifie_le'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_plugins']))?$Pile[0]['sens'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('sens'.'_liste_plugins'))?session_get('sens'.'_liste_plugins'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','date_modif')-1)):((($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')=='date_modif'),'ajax') .
		'</th>
				<th class="titre">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('prefixe',array('>','<')))?'sens':'tri').'_liste_plugins',$s?(strpos('< >','prefixe')-1):'prefixe'),'var_memotri',strncmp('_liste_plugins','session',7)==0?(($s=in_array('prefixe',array('>','<')))?'sens':'tri').'_liste_plugins':''),_T('svp:label_prefixe'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_plugins']))?$Pile[0]['sens'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('sens'.'_liste_plugins'))?session_get('sens'.'_liste_plugins'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','prefixe')-1)):((($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')=='prefixe'),'ajax') .
		'</th>
				<th class="id">' .
		lien_ou_expose(parametre_url(parametre_url(self(),(($s=in_array('id_plugin',array('>','<')))?'sens':'tri').'_liste_plugins',$s?(strpos('< >','id_plugin')-1):'id_plugin'),'var_memotri',strncmp('_liste_plugins','session',7)==0?(($s=in_array('id_plugin',array('>','<')))?'sens':'tri').'_liste_plugins':''),_T('public|spip|ecrire:info_numero_abbreviation'),$s?(((intval($t=(isset($Pile[0]['sens'.'_liste_plugins']))?$Pile[0]['sens'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('sens'.'_liste_plugins'))?session_get('sens'.'_liste_plugins'):(is_array($s=table_valeur($Pile["vars"], (string)'defaut_tri', null))?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s)))==-1 OR $t=='inverse')?-1:1)==(strpos('< >','id_plugin')-1)):((($t=(isset($Pile[0]['tri'.'_liste_plugins']))?$Pile[0]['tri'.'_liste_plugins']:((strncmp('_liste_plugins','session',7)==0 AND session_get('tri'.'_liste_plugins'))?session_get('tri'.'_liste_plugins'):interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'par', null), 'nom'),true))))?tri_protege_champ($t):'')=='id_plugin'),'ajax') .
		'</th>
			</tr>
		</thead>
		<tbody>
') . $t1 . (	'
		</tbody>
	</table>
	' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_liste_plugins"]["grand_total"],
 		'_liste_plugins',
		isset($Pile[0]['debut_liste_plugins'])?$Pile[0]['debut_liste_plugins']:intval(_request('debut_liste_plugins')),
		(($a = intval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'pas', null), '25'),true)))) ? $a : 10), true, 'prive', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
</div>
')) :
		('
')) .
'
');

	return analyse_resultat_skel('html_02f7da2e1fdc39f99903feef40885751', $Cache, $page, '../plugins-dist/svp/prive/objets/liste/plugins.html');
}
?>