<?php
// ARQUIVO DE ADIÇÃO E EDIÇÃO DE DADOS DOS USUÁRIOS
// Arquivo de conexão ao BD
require('call.php');
// Arquivo da função de validação de CPF
include('functions.php');
// Verifica os campos informados, se foram preenchidos, caso negativo...
if(!isset($_POST['nome']{0}) || !isset($_POST['cpf']{0}) || !isset($_POST['email']{0}) || !isset($_POST['login']{0}) || (!isset($_POST['senha']{0}) && !isset($_POST['id_user']{0}))){
  // Confecciona a resposta HTML para impressão e termina o script
  echo json_encode(array('status' => "alert",'title' => "Ops! Algo errado.",'message' => "Há campo(s) Obrigatório(s) em branco."));
  exit();
}
// Caso esteja OK os campos obrigatórios...
else{
  // Verifica se o CPF é valido, caso negativo...
  if(!isset($_POST['cpf']{0}) || validateCPF($_POST['cpf']) == false){
    // Confecciona a resposta HTML para impressão e termina o script
    echo json_encode(array('status' => "alert",'title' => "Ops! Algo errado.",'message' => "CPF informado está incorreto."));
    exit();
  }
  // Caso as informações estejam tudo OK...
  else{
    // Verifica no BD se o CPF já está cadastro
    $sql1 = $con->query("SELECT id_user FROM adm_users WHERE cpf = '".$_POST['cpf']."'");
    // Caso já tenha cadastro do CPF digitado
    if(($sql1->rowCount() > 0) && (!isset($_POST['id_user']{0}))){
      // Confecciona a resposta HTML para impressão e termina o script
      echo json_encode(array('status' => "alert",'title' => "Ops! Algo errado.",'message' => "CPF informado já está cadastrado.", 'resultado' => $sql1->rowCount()));
      exit();
    }
    // Caso seja novo CPF cadastrado...
    else{
      // Verifica se é adição ou edição, caso seja adição...
      if(!isset($_POST['id_user']{0})){
        // Inclui o novo registro no BD
        $sql2 = $con->query("INSERT INTO adm_users(nome,cpf,email,login,senha)VALUES('".$_POST['nome']."','".$_POST['cpf']."','".$_POST['email']."','".trim($_POST['login'])."','".trim(sha1($_POST['senha']))."')");

        // Busca o ID do último registro (acima)
        $sql3 = $con->query("SELECT id_user FROM adm_user ORDER BY id_user DESC LIMIT 0,1");
        $line3 = $sql3->fetch(PDO::FETCH_ASSOC);

        $sqlog = $con->query("INSERT INTO adm_logs(ip,pc,id_user,user,acao,modulo,status)VALUES('".$_SERVER["REMOTE_ADDR"]."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','".$line3['id_user']."','".$_POST['nome']."','Cadastro de Usuário','Usuarios','1')");
        // Cria as variáveis (SESSÕES) para armazenamento dos dados do usuari
      }
      // Caso seja edição...
      else{
        // Caso há mudança de senha...
        if(isset($_POST['senha']{0})){
          // Atualiza os dados no BD
          $sql2 = $con->query("UPDATE adm_users SET nome = '".$_POST['nome']."',cpf = '".$_POST['cpf']."',email = '".$_POST['email']."',login = '".trim($_POST['login'])."',senha = '".trim(sha1($_POST['senha']))."' WHERE id_user = '".$_POST['id_user']."'");
        }
        // Caso não tenha mudança de senha...
        else{
          // Atualiza os dados no BD
          $sql2 = $con->query("UPDATE adm_users SET nome = '".$_POST['nome']."',cpf = '".$_POST['cpf']."',email = '".$_POST['email']."',login = '".trim($_POST['login'])."' WHERE id_user = '".$_POST['id_user']."'");
        }
        // Cadastra o Log da ação no BD
        $sqlog = $con->query("INSERT INTO adm_logs(ip,pc,id_user,user,acao,modulo,status)VALUES('".$_SERVER["REMOTE_ADDR"]."','".gethostbyaddr($_SERVER['REMOTE_ADDR'])."','".$_POST['id_user']."','".$_POST['nome']."','Edição de Usuário','Usuarios','1')");
      }
    }
    // Confecciona o HTML de sucesso para impressão e finaliza o script
    echo json_encode(array('status' => "success",'title' => ":) Tudo certo.",'message' => "Dados salvos com sucesso."));
    exit();
  }
}
?>
