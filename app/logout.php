<?php
// ARQUIVO DE LOGOUT DO SISTEMA (SAIR)
// Destrói a sessão (finaliza)
session_start();
session_destroy();
// Arquivo de conexão ao BD
require('call.php');
// Cadastra o Log da ação no BD
$sqlog = $con->query("INSERT INTO adm_logs(ip,pc,id_user,user,acao,modulo,status)VALUES('".$_SERVER["REMOTE_ADDR"]."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','','','Logout do Sistema','Sistema','1')");
// Confecciona a resposta HTML para impressão e termina o script
echo json_encode(array('status' => "success",'title' => "Saindo do Sistema.",'message' => "Solicitação acionada com sucesso."));
exit();
?>
