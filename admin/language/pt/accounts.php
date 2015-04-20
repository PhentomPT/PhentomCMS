<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['accounts_title'] = "Contas";
$lang['account_title'] = "Conta";
$lang['find'] = "Encontrar";
$lang['add'] = "Adicionar";
$lang['edit'] = "Editar";
$lang['username'] = "Nome Utilizador";
$lang['email'] = "Email";
$lang['vote_points'] = "Pontos de Voto";
$lang['donation_points'] = "Pontos de Donativos";
$lang['avatar'] = "Avatar";
$lang['rank'] = "Estatuto";
$lang['special_rank'] = "Estatuto Especial";
$lang['joindate'] = "Join Date";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}