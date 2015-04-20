<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }


/*$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";*/
$lang['home'] = "Início";
$lang['rules'] = "Regras";
$lang['members'] = "Membros";
$lang['faq'] = "FAQ";
$lang['email'] = "Email";
$lang['username'] = "Nome de utilizador";
$lang['password'] = "Palavra Passe";
$lang['verify_password'] = "Verificar Palavra Passe";
$lang['powered_by'] = "Distribuido por";
$lang['login'] = "Entrar";
$lang['logout'] = "Sair";
$lang['register'] = "Registar";
$lang['search'] = "Procurar";
$lang['account'] = "Conta";
$lang['notifications'] = "Notificações";
$lang['v_unanswered_posts'] = "Publicações não respondidas";
$lang['v_active_topics'] = "Topicos activos";
$lang['fields_missing'] = "Preencha todos os campos.";
$lang['pass_mismatch'] = "Palavras passe não cuincidem.";
$lang['already_used'] = "Nome de utilizador/Email já em uso.";
$lang['fail_login'] = "Email/Palavra passe incorrectas";
$lang['topics_title'] = "Topicos";
$lang['posts_title'] = "Publicações";
$lang['last_post'] = "Ultimo topico";
$lang['has_no_posts'] = "Sem Topicos";
$lang['no_forum_in_category'] = "Não há forums nesta categoria.";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}