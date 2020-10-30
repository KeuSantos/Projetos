<?php
// SCRIPT DE LOGIN DE ACESSO AO SISTEMA
// Cria a sessão para armazenamento de dados para consultas posteriores
session_start();
// Solicita o arquivo de conexão ao Banco de Dados
require('call.php');
// Caso tenha algum tipo de erro ou falha de conexão ao Banco de Dados...
if(isset($error_DB{0})){
  // Imprime a mensagem de erro e finaliza o script/requisição
  echo json_encode(array('status' => "error",'title' => ":(",'message' => $error_DB));
  exit();
}
// Caso tenha sucesso na conexão ao Banco de Dados...
else{
  // Efetua a busca no Banco de Dados o cadastro do solicitante com base nos dados informados
  $sql1 = $con->query("SELECT id_user,nome,login,senha,status FROM adm_users WHERE login = '".trim($_POST['login'])."'");
  // Caso não tenha nenhum registro com base nos dados informados...
  if($sql1->rowCount() == 0){
    // Imprime o erro (Sem cadastro ou dados errados) e finaliza o script/requisição
    echo json_encode(array('status' => "error",'title' => "Registro não encontrado",'message' => "Contate o administrador."));
    exit();
  }
  // Caso tenha algum registro
  else{
    // Faz o tratamento das informação buscada no Banco de Dados
    $line1 = $sql1->fetch(PDO::FETCH_ASSOC);
    // Verifica se a senha confere, caso negativo
    if(sha1($_POST['senha']) !== $line1['senha']){
      // Imprime a mensagem de alerta (Senha incorreta) e finaliza o script/requisição
      echo json_encode(array('status' => "alert",'title' => "Dados não conferem.",'message' => "A senha está incorreta."));
      exit();
    }
    // Caso a Senha confere...
    else{
      // Caso o usuário esteja desativado...
      if($line1['status'] == 2){
        // Imprime a mensagem de erro (Usuário desativado) e finaliza o script/requisição
        echo json_encode(array('status' => "error",'title' => "Acesso bloqueado!",'message' => "Contate o administrador."));
        exit();

      }
      // Caso o usuário esteja ativado...
      else{
        // Efetua o log da ação
        $sqlog = $con->query("INSERT INTO adm_logs(ip,pc,id_user,user,acao,modulo,status)VALUES('".$_SERVER["REMOTE_ADDR"]."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','".$line1['id_user']."','".$line1['nome']."','Acesso ao Sistema','Usuarios','1')");
        // Cria as variáveis (SESSÕES) para armazenamento dos dados do usuario
        $_SESSION['id_user'] = $line1['id_user'];
        $_SESSION['nome'] = $line1['nome'];
        // Formata os dados do campo 'nome' para impressão da saudação
        $nome_user = explode(" ",$line1['nome']);
        // Imprime apenas o primeiro nome e finaliza o script/requisição
        echo json_encode(array('status' => "success",'title' => "Olá ".$nome_user[0],'message' => "Redirecionando seu acesso..."));
        exit();
      }
    }
  }
}
?>
