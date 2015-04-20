<?php
//Refuses direct access
if (!defined("SSC")){ exit("You don't have access to this file"); }

$lang['welcome'] = "Bem Vindo";
$lang['visits'] = "Visitas";
$lang['system'] = "Sistema";
$lang['right_now'] = "Agora";
$lang['acp_performance'] = "Desempenho";
$lang['load_time'] = "Tempo de Carregamento";
$lang['memory_usage'] = "Memoria Usada";
$lang['post_news'] = "Publicar Notícia";
$lang['title'] = "Título";
$lang['image'] = "Imagem";
$lang['content'] = "Conteudo";
$lang['post'] = "Publicar";
$lang['check'] = "Verificar";
$lang['enabled'] = "Ligado";
$lang['visitors_today'] = "Visitas de Hoje";
$lang['unique_visitors'] = "Visitas Unicas";
$lang['total_visitors'] = "Total de Visitas";
$lang['total_unique_visitors'] = "Total de Visitas Unicas";
$lang['visits_per_day'] = "Visitas por Dia";
$lang['registered_users_today'] = "Regístos de Hoje";
$lang['unvalidated_users'] = "Utilizadores Não Validados";
$lang['banned_users'] = "Utilizadores Banidos";
$lang['total_amount_of_users'] = "Quantidade Total de Utilizadores";
$lang['registered_users_per_day'] = "Utilizadores Registados por Dia";
$lang['php_version'] = "Versão do PHP";
$lang['mysql_version'] = "Versão do MySQL";
$lang['cms_version'] = "Versão do CMS";
$lang['latest'] = "Ultimo";
$lang['update_required'] = "Disponivel";
$lang['update'] = "Actualizar";
$lang['version'] = "Versão";
$lang['available'] = "Disponivel";
$lang['download'] = "Baixar";
$lang['admin_panel'] = "Painel de Administração";
$lang['powered_by'] = "Distribuido por";
$lang['dashboard'] = "Painel Inicial";
$lang['website'] = "Página Web";
$lang['accounts'] = "Contas";
$lang['tools'] = "Opções";
$lang['upload'] = "Importar";
$lang['modules'] = "Modulos";
$lang['plugins'] = "Ligações";
$lang['statistics'] = "Estatísticas";
$lang['themes'] = "Temas";
$lang['languages'] = "Linguas";
$lang['info'] = "Informação";
$lang['logout'] = "Sair";

foreach ($lang as $key => $value){
	$system->assign($key, $value);
}