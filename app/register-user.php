<?php
// ARQUIVO DE BUSCA DE REGISTROS DE EDIÇÃO, QUANDO SOLICITADO
// Caso seja solicitado os dados para edição no formulário...
if(isset($_GET['id']{0})){
  // Arquivo de conexão ao BD
  require('app/call.php');
  // Busca no BD os dados do usuário selecionado
  $sql1 = $con->query("SELECT * FROM adm_users WHERE id_user = '".$_GET['id']."'");
  // Cria a string de armazenamento para distrbuição nos campos respectivos
  $line1 = $sql1->fetch(PDO::FETCH_ASSOC);
}
?>
