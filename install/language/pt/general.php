<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['welcome'] = "Bem Vindo";
$lang['welcome_txt'] = "Bem vindo ao processo de instalação. Apenas vai precisar de introduzir as informações pedidas acerca do seu servidor e depois puderá utilizar esta fantástica CMS!";
$lang['welcome_np'] = "Não se preocupe! Todas as informações podem ser alteradas depois.";
$lang['example'] = "Ex";
$lang['next'] = "Seguinte";
$lang['finish'] = "Terminar";
$lang['powered'] = "Distribuido por";

foreach ($lang as $key=>$value){
	$system->assign($key, $lang[$key]);
}