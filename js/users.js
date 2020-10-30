// ARQUIVO DE GERENCIAMENTO DE EVENTOS DE FORMULÁRIOS - USUÁRIOS
// Script de montagem e chamada do link de edição e exclusão de cadastro
$(document).on('click','.option-edit,.option-delete',function(){
  var dados = $(this).attr('id');
  var dado = dados.split('-');

  msgLoadIn();

  setTimeout(function(){
    if(dado[0] == 'e'){
      window.location = "form-user.php?id=" + dado[1];
    }
    if(dado[0] == 'd'){
      $.post('app/delete-user.php',{'id_user':dado[1]},function(data){
        msgLoadOut(data.status,data.title,data.message);

        if(data.status == "success"){
          $('#container-list').html(data.html);
        }
      },"json");
    }
  },1100);

  return false;
});

// Ações do formulário de cadastro e edição do registro
$('body').on('submit','#form-user',function(){
  var nome = $('#nome').val();
  var cpf = $('#cpf').val();
  var email = $('#email').val();
  var login = $('#login').val();
  var senha = $('#senha').val();
  var id_user = $('#id-user').val();

  if((senha != "") && (senha.length < 6 || senha.length > 10)){
    msgPopup('error','Senha inválida!','A senha deve conter entre 6 à 10 digitos.');
  }else{
    $('input[type=submit]').attr('disabled','disabled');
    msgLoadIn();

    setTimeout(function(){
      $.post('app/data-users.php',{'id_user':id_user,'nome':nome,'cpf':cpf,'email':email,'login':login,'senha':senha},function(data){
        msgLoadOut(data.status,data.title,data.message);

        if(data.status == "success"){
          setTimeout(function(){
            window.location = "users.php";
          },3600);
        }

        $('input[type=submit]').removeAttr('disabled');
      },"json");
    },1100);
  }

  return false;
});
