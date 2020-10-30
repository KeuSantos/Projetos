<?php
// ARQUIVO DE BUSCA DA LISTAGEM DOS USUÁRIOS
// Arquivo de conexão ao BD
require('app/call.php');
// Verifica se teve uso do buscador, caso positivo
if(isset($_POST['cpf']{0}) || isset($_POST['nome']{0})){
  // Cria a SQL com base nos parâmetros digitados
  $sql1 = $con->query("SELECT id_user,nome,status FROM adm_users WHERE nome LIKE '".$_POST['nome']."%' AND status = 1 ORDER BY nome ASC");
  // Verifica a contagem de cadastros, caso esteja vazio...
  if($sql1->rowCount() == 0){
     // Estrutura o HTML e faz a impressão
    $HTML = "
      <li id=\"0\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\">
        <span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">Não há cadastro(s) com o nome digitado.</span>
      </li>
    ";
  }
  // Caso tenha cadastro no BD...
  else{
    // Cria uma string vazia, de repositório para impressão
    $HTML = "";
    //Enquanto houver informações, é gerado o HTML para impressão
    while($line1 = $sql1->fetch(PDO::FETCH_ASSOC)){
      // Cria o HTML (linha de informação para impressão)
      $HTML .= "
        <li id=\"".$line1['id_user']."\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\">
          <span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">".$line1['nome']."</span>
          <span id=\"d-".$line1['id_user']."\" class=\"btn-options option-delete dp-block fl-rt\"></span>
          <span id=\"e-".$line1['id_user']."\" class=\"btn-options option-edit dp-block fl-rt\"></span>
        </li>
      ";
    }
  }
}
// Caso o buscado não seja acionado
else{
  // Busca no BD as informações da tabela dos Usuários
  $sql1 = $con->query("SELECT id_user,nome,status FROM adm_users WHERE status = '1' ORDER BY nome ASC");
  // Verifica a contagem de cadastros, caso esteja vazio...
  if($sql1->rowCount() == 0){
     // Estrutura o HTML e faz a impressão
    $HTML = "
      <li id=\"0\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\">
        <span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">Não há cadastro(s) neste momento.</span>
      </li>
    ";
  }
  // Caso tenha cadastro no BD...
  else{
    // Cria uma string vazia, de repositório para impressão
    $HTML = "";
    //Enquanto houver informações, é gerado o HTML para impressão
    while($line1 = $sql1->fetch(PDO::FETCH_ASSOC)){
      // Cria o HTML (linha de informação para impressão)
      $HTML .= "
        <li id=\"".$line1['id_user']."\" data-btn=\"off\" class=\"ft-sz-df link-company bx-sz-l01 bd-sz-up-lt bd-up-es bd-up-sl cs-pt dp-table\">
          <span class=\"fl-lf bx-sz-l02 pg-md mg-ft-lg\">".$line1['nome']."</span>
          <span id=\"d-".$line1['id_user']."\" class=\"btn-options option-delete dp-block fl-rt\"></span>
          <span id=\"e-".$line1['id_user']."\" class=\"btn-options option-edit dp-block fl-rt\"></span>
        </li>
      ";
    }
  }
}
// Imprime a mensagem de erro e finaliza o script/requisição
echo json_encode(array('html' => $HTML));
?>
