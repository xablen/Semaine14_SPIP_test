<?php

/*
 * Squelette : ../prive/formulaires/dateur/inc-dateur.html
 * Date :      Tue, 12 Jan 2016 07:48:41 GMT
 * Compile :   Tue, 12 Jan 2016 08:03:10 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/dateur/inc-dateur.html
// Temps de compilation total: 13.901 ms
//

function html_392ee1b12791a088f738c61ef20d45d1($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<script type=\'text/javascript\'>/*<![CDATA[*/
function date_picker_options(){
	return {
		buttonText: \'' .
texte_script(_T('public|spip|ecrire:afficher_calendrier')) .
'\',
		buttonImage: \'' .
interdire_scripts(chemin_image('calendrier-16.png')) .
'\',
		buttonImageOnly: true,
		closeText: \'' .
texte_script(_T('public|spip|ecrire:bouton_fermer')) .
'\',
		prevText: \'' .
texte_script(_T('public|spip|ecrire:precedent')) .
'\',
		nextText: \'' .
texte_script(_T('public|spip|ecrire:suivant')) .
'\',
		currentText: \'' .
texte_script(_T('public|spip|ecrire:date_aujourdhui')) .
'\',
		closeText: \'' .
texte_script(_T('public|spip|ecrire:bouton_fermer')) .
'\',
		monthNames: [
			\'' .
texte_script(_T('public|spip|ecrire:date_mois_1')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_2')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_3')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_4')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_5')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_6')) .
'\',
			\'' .
texte_script(_T('public|spip|ecrire:date_mois_7')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_8')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_9')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_10')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_11')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_12')) .
'\'],
		monthNamesShort: [
			\'' .
texte_script(_T('public|spip|ecrire:date_mois_1_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_2_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_3_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_4_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_5_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_6_abbr')) .
'\',
			\'' .
texte_script(_T('public|spip|ecrire:date_mois_7_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_8_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_9_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_10_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_11_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_mois_12_abbr')) .
'\'],
		dayNames: [
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_1')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_2')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_3')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_4')) .
'\',
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_5')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_6')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_7')) .
'\'],
		dayNamesShort: [
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_1_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_2_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_3_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_4_abbr')) .
'\',
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_5_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_6_abbr')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_7_abbr')) .
'\'],
		dayNamesMin: [
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_1_initiale')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_2_initiale')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_3_initiale')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_4_initiale')) .
'\',
			\'' .
texte_script(_T('public|spip|ecrire:date_jour_5_initiale')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_6_initiale')) .
'\',\'' .
texte_script(_T('public|spip|ecrire:date_jour_7_initiale')) .
'\'],
		dateFormat: \'dd/mm/yy\',
		firstDay: 1,
		isRTL: ' .
interdire_scripts(((lang_dir(entites_html(table_valeur(@$Pile[0], (string)'lang', null),true)) == 'rtl') ? 'true':'false')) .
',
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		yearRange: "c-60:c+40"
	};
}
function date_picker_init(){
	jQuery(\'input.date\').not(\'.datePicker\')
		.addClass(\'datePicker\').each(function(){
			var options = {showOn: \'button\'};
			if (jQuery(this).attr(\'data-startDate\'))
				options.minDate = jQuery(this).attr(\'data-startDate\');
			if (jQuery(this).attr(\'data-endDate\'))
				options.maxDate = jQuery(this).attr(\'data-endDate\');
			if (jQuery(this).attr(\'data-yearRange\'))
				options.yearRange = jQuery(this).attr(\'data-yearRange\');
			jQuery(this)
				.datepicker(jQuery.extend(date_picker_options(),options))
				.trigger(\'datePickerLoaded\');
		});
	jQuery("input.heure").not(\'.timePicker\').addClass(\'timePicker\').timePicker({step:' .
interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'heure_pas', null), '30'),true)) .
'});
}
var date_picker_loading;
if (window.jQuery){
	jQuery(function(){
		if (jQuery(\'input.date,input.heure\').length
			&& typeof date_picker_loading=="undefined"){
			date_picker_loading = jQuery.getScript(\'' .
timestamp(produire_fond_statique( 'formulaires/dateur/jquery.dateur.js' , array(), array('compil'=>array('../prive/formulaires/dateur/inc-dateur.html','html_392ee1b12791a088f738c61ef20d45d1','',30,$GLOBALS['spip_lang'])), _request('connect'))) .
'\');
			date_picker_loading.done(function(){
				date_picker_init();
				onAjaxLoad(date_picker_init);
			})
		}
	});
}
/*]]>*/</script>
<style type="text/css">
' .
filtre_compacte_dist(charge_scripts('formulaires/dateur/time_picker.css',false),'css') .
'
img.ui-datepicker-trigger { display: inline-block; padding: 0; margin: 0px 0 0 -19px; vertical-align: middle; z-index:2 }
div.time-picker {font-size:11px;  width:5em; /* needed for IE */}
.formulaire_spip input.date {width:9em;padding-right:25px;}
.formulaire_spip input.heure {width:7em;}
</style>
');

	return analyse_resultat_skel('html_392ee1b12791a088f738c61ef20d45d1', $Cache, $page, '../prive/formulaires/dateur/inc-dateur.html');
}
?>