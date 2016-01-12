<?php

/*
 * Squelette : squelettes/sommaire.html
 * Date :      Wed, 23 Dec 2015 13:11:16 GMT
 * Compile :   Tue, 12 Jan 2016 09:19:25 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/sommaire.html
// Temps de compilation total: 12.683 ms
//

function html_20bad19474852c2c1a99d7289d969071($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
']</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' sommaire">
<div id="page" class="sommaire">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->

  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
  <div id="bloc-contenu">
    <div class="edito">
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-sommaire-edito') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',25,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    </div><!-- edito -->
    
    <h2 class="structure">' .
_T('public|spip|ecrire:articles_recents') .
'</h2>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-sommaire-articles') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',29,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    
     
  </div><!-- bloc-contenu-->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-trad') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',40,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',42,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',44,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',46,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

    <!-- Inscription au site -->
    ' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array('squelettes/sommaire.html','html_20bad19474852c2c1a99d7289d969071','',45,$GLOBALS['spip_lang']))))!=='' ?
		((	'<div class="menu" id="inscription">
        <ul>
          <li><b>' .
	_T('public|spip|ecrire:pass_vousinscrire') .
	'</b>            
            <ul>
              <li>
                ') . $t1 . '
              </li>
            </ul>
          </li>
        </ul>
    </div><!-- menu -->') :
		'') .
'


  </div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',53,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_20bad19474852c2c1a99d7289d969071\',\'\',54,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!-- page-->
</body>
</html>');

	return analyse_resultat_skel('html_20bad19474852c2c1a99d7289d969071', $Cache, $page, 'squelettes/sommaire.html');
}
?>