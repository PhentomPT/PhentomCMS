<?php
//Refuses direct access
if (!defined("SSC")){ die("You don't have permission to access this file."); }

$lang['vote_points']="Pontos de Voto";
$lang['donation_points']="Pontos de Doações";
$lang['store']="Loja";
$lang['unstuck']="Libertar";
$lang['change_faction']="Mudar de Fração";
$lang['donate']="Doar";
$lang['revive']="Reviver";
$lang['teleport']="Transportar";
$lang['change_name']="Mudar Nome";
$lang['vote']="Votar";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}