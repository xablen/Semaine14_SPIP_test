<?php

/*
 * Squelette : ../plugins-dist/svp/formulaires/inc-plugins_trouves.html
 * Date :      Tue, 12 Jan 2016 07:49:50 GMT
 * Compile :   Tue, 12 Jan 2016 09:07:38 GMT
 * Boucles :   _plugins_trouves
 */ 

function BOUCLE_plugins_trouveshtml_b98cbc44f5098976069f29d054efdfc0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	$command['sourcemode'] = 'table';

	$command['source'] = array(table_valeur($Pile["vars"], (string)'plugins', null));

	if (!isset($command['table'])) {
		$command['table'] = '';
		$command['id'] = '_plugins_trouves';
		$command['from'] = array();
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array(".valeur",
		"id_paquet",
		"lien_doc",
		"auteur",
		"licence");
		$command['orderby'] = array();
		$command['where'] = 
			array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"DATA",
		$command,
		array('../plugins-dist/svp/formulaires/inc-plugins_trouves.html','html_b98cbc44f5098976069f29d054efdfc0','_plugins_trouves',10,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_plugins_trouves']['compteur_boucle'] = 0;
	
	$l1 = _T('svp:info_plugin_installe');
	$l2 = _T('svp:bulle_aller_documentation');
	$l3 = _T('svp:lien_documentation');
	$l4 = _T('public:par_auteur');
	$l5 = _T('public|spip|ecrire:intitule_licence');$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_plugins_trouves']['compteur_boucle']++;
		$t0 .= (
'
		<li class="item' .
(($t1 = strval(interdire_scripts(((safehtml(table_valeur($Pile[$SP]['valeur'], 'installe'))) ?' ' :''))))!=='' ?
		($t1 . ' installe') :
		'') .
(($t1 = strval(interdire_scripts((((safehtml(table_valeur($Pile[$SP]['valeur'], 'etat')) == 'stable')) ?'' :' '))))!=='' ?
		($t1 . ' nonstable') :
		'') .
'"' .
(($t1 = strval(interdire_scripts(strtolower(safehtml(table_valeur($Pile[$SP]['valeur'], 'prefixe'))))))!=='' ?
		(' id="' . $t1 . (	'-' .
	$Numrows['_plugins_trouves']['compteur_boucle'] .
	'-' .
	interdire_scripts(safehtml(table_valeur($Pile[$SP]['valeur'], 'score'))) .
	'"')) :
		'') .
'>
		
		' .
(($t1 = strval(interdire_scripts((((((safehtml(table_valeur($Pile[$SP]['valeur'], 'installe'))) ?'' :' ')) AND (test_plugins_auto(''))) ?' ' :''))))!=='' ?
		($t1 . (	'
			<div class="check">
				<input type="checkbox" class="checkbox" name="ids_paquet[]" value="' .
	safehtml((isset($Pile[$SP]['id_paquet'])?$Pile[$SP]['id_paquet']:(@$Pile[0]['id_paquet']))) .
	'"
					' .
	(($t2 = strval(in_any(safehtml((isset($Pile[$SP]['id_paquet'])?$Pile[$SP]['id_paquet']:(@$Pile[0]['id_paquet']))),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'ids_paquet', null),true)))))!=='' ?
			($t2 . ' checked="checked"') :
			'') .
	' />
			</div>
		')) :
		'') .
'
			
			<div class="resume">
				<h3 class="nom"><a href="#" rel="info">' .
interdire_scripts(extraire_multi(safehtml(table_valeur($Pile[$SP]['valeur'], 'nom')))) .
'</a></h3>
				<span class="version">' .
interdire_scripts(denormaliser_version(safehtml(table_valeur($Pile[$SP]['valeur'], 'version')))) .
'</span>
				<span class="etat">' .
(($t1 = strval(interdire_scripts(safehtml(table_valeur($Pile[$SP]['valeur'], 'etat')))))!=='' ?
		(' - ' . $t1) :
		'') .
'</span>
				' .
(($t1 = strval(interdire_scripts(((safehtml(table_valeur($Pile[$SP]['valeur'], 'installe'))) ?' ' :''))))!=='' ?
		('<span class="svp_message"> - ' . $t1 . (	$l1 .
	'</span>')) :
		'') .
'
				<div class="short">' .
interdire_scripts(extraire_multi(safehtml(table_valeur($Pile[$SP]['valeur'], 'slogan')))) .
'</div>
				<div class="icon">' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',safehtml(table_valeur($Pile[$SP]['valeur'], 'logo')),'32'))) .
'</div>
			</div>

			
			<div class="details none-js">
				<dl>
					<dd class="desc">
						' .
interdire_scripts(propre(extraire_multi(safehtml(table_valeur($Pile[$SP]['valeur'], 'description'))))) .
'
						' .
(($t1 = strval(interdire_scripts(safehtml((isset($Pile[$SP]['lien_doc'])?$Pile[$SP]['lien_doc']:(@$Pile[0]['lien_doc']))))))!=='' ?
		('<em class="site">
							<a href="' . $t1 . (	'" class="spip_out" title="' .
	$l2 .
	'">' .
	$l3 .
	'</a>
						</em>')) :
		'') .
'
					</dd>
					' .
(($t1 = strval(interdire_scripts(svp_afficher_credits((isset($Pile[$SP]['auteur'])?$Pile[$SP]['auteur']:(@$Pile[0]['auteur']))))))!=='' ?
		((	'<dt class="auteurs">' .
	$l4 .
	'</dt>
					<dd class="auteurs">') . $t1 . '</dd>') :
		'') .
'
					' .
(($t1 = strval(interdire_scripts(svp_afficher_credits(safehtml((isset($Pile[$SP]['licence'])?$Pile[$SP]['licence']:(@$Pile[0]['licence']))),','))))!=='' ?
		((	'<dt class="licence">' .
	$l5 .
	'</dt>
					<dd class="licence">') . $t1 . '</dd>') :
		'') .
'
				</dl>
			</div>
		</li>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_plugins_trouves @ ../plugins-dist/svp/formulaires/inc-plugins_trouves.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/svp/formulaires/inc-plugins_trouves.html
// Temps de compilation total: 29.885 ms
//

function html_b98cbc44f5098976069f29d054efdfc0($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars'][$_zzz=(string)'plugins'] = array()) .
'
' .
(($t1 = strval(interdire_scripts((((((((((((((((((entites_html(table_valeur(@$Pile[0], (string)'phrase', null),true)) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'depot', null),true)))) ?' ' :'')) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true)))) ?' ' :'')) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'etat', null),true)))) ?' ' :'')) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'exclusion', null),true)))) ?' ' :'')) OR (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'doublon', null),true)))) ?' ' :'')) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	vide($Pile['vars'][$_zzz=(string)'plugins'] = interdire_scripts(filtre_construire_recherche_plugins(entites_html(table_valeur(@$Pile[0], (string)'phrase', null),true),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'categorie', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'etat', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'depot', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'exclusion', null),true)),interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'doublon', null),true))))) .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'nb'] = count(table_valeur($Pile["vars"], (string)'plugins', null))) .
	'
	' .
	vide($Pile['vars'][$_zzz=(string)'tri'] = (table_valeur($Pile["vars"], (string)'phrase', null) ? 'score':'nom')) .
	'
	' .
	((table_valeur($Pile["vars"], (string)'nb', null))  ?
			(' ' . (	'<p class="explication">' .
		_T('svp:message_ok_plugins_trouves', array('nb_plugins' => table_valeur($Pile["vars"], (string)'nb', null),
'tri' => table_valeur($Pile["vars"], (string)'tri', null))) .
		'</p>')) :
			'') .
	'
	' .
	(!(table_valeur($Pile["vars"], (string)'nb', null))  ?
			(' ' . (	'<p class="explication">' .
		_T('svp:message_ok_aucun_plugin_trouve') .
		'</p>')) :
			'') .
	'
')) :
		'') .
'

' .
(($t1 = BOUCLE_plugins_trouveshtml_b98cbc44f5098976069f29d054efdfc0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="liste plugins distants">
	<ul class="liste-items">
' . $t1 . '
	</ul>
</div>
') :
		'') .
'

<script type="text/javascript">
//<![CDATA[
	jQuery(function(){
		jQuery(\'.plugins li.item a[rel=info]\').click(function(){
			var li = jQuery(this).parents(\'li\').eq(0);
			if (jQuery(\'div.details\',li).toggle().is(\':visible\'))
				li.addClass(\'on\');
			else
				li.removeClass(\'on\');
			return false;
		});
		' .
'
		jQuery(\'.plugins li.item input.checkbox\').change(function(){
			$form = jQuery(this).parents(\'form\').eq(0);
			if (!$form.find(\'> input.submit\').length) {
				$form.find(\'.boutons.actions\').slideDown().find(\'input.submit\').clone().addClass(\'invisible\').prependTo($form);
				$form.find(\'.liste-recherche\').change(function(){
					jQuery(this).parents(\'form\').eq(0).find(\'> input.submit\').remove();
				});
			}
		}); 
	});
//]]>
</script>
');

	return analyse_resultat_skel('html_b98cbc44f5098976069f29d054efdfc0', $Cache, $page, '../plugins-dist/svp/formulaires/inc-plugins_trouves.html');
}
?>