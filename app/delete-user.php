<?php
// ARQUIVO DE EXCLUSÃO DO REGISTRO SELECIONADO - USUÁRIO
// Solicita o arquivo de conexão ao Banco de Dados
require('call.php');
// Atualiza o registro para exclusão no BD
$sql1 = $con->query("UPDATE adm_users SET status = '2' WHERE id_user = '".$_POST['id_user']."'");
// Busca dados para registro no Log no BD
$sql2 = $con->query("SELECT nome FROM adm_users WHERE id_user = '".$_POST['id_user']."'");
$line2 = $sql2->fetch(PDO::FETCH_ASSOC);
// Cadastra o Log da ação no BD
$sqlog = $con->query("INSERT INTO adm_logs(ip,pc,id_user,user,acao,modulo,status)VALUES('".$_SERVER["REMOTE_ADDR"]."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','".$_POST['id_user']."','".$line2['nome']."','Exclusão de Usuário','Usuarios','1')");
// Faz a busca dos registros ativos para criar uma nova listagem HTML
$sql3 = $con->query("SELECT id_user,nome,status FROM adm_users WHERE status = '1' ORDER BY nome ASC");
// Verifica a contagem de cadastros, caso esteja vazio...
if($sql3->rowCount() == 0){
   // Estrutura o HTML e faz a impressão
  $HTML = "<li id=\"0\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\"><span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">Não há cadastro(s) neste momento.</span></li>";
}
// Caso tenha cadastro no BD...
else{
  // Cria uma string vazia, de repositório para impressão
  $HTML = "";
  //Enquanto houver informações, é gerado o HTML para impressão
  while($line3 = $sql3->fetch(PDO::FETCH_ASSOC)){
    // Cria o HTML (linha de informação para impressão)
    $HTML .= "<li id=\"".$line3['id_user']."\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\"><span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">".$line3['nome']."</span><span id=\"d-".$line3['id_user']."\" class=\"btn-options option-delete dp-block fl-rt\"></span><span id=\"e-".$line3['id_user']."\" class=\"btn-options option-edit dp-block fl-rt\"></span></li>";
  }
}
// Imprime o novo HTML para impressão e finaliza o script/requisição
echo json_encode(array('status' => "success",'title' => ":) Requisição feita.",'message' => "Registro deletado com sucesso.", 'html' => $HTML));
exit();
?>
