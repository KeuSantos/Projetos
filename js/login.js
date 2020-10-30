// ARQUIVO DE GERENCIAMENTO DE EVENTOS DO LOGIN
// Acesso ao Sistema
$('body').on('submit','#container-login',function(){
  var login = $('#login').val();
  var senha = $('#senha').val();

  if(login == "" || senha == ""){
    msgPopup('alert','Ops!','Precisa preencher o campo Login e Senha para logar.');
  }else if(senha.length < 6 || senha.length > 10){
    msgPopup('error','Senha inválida!','A senha deve conter entre 6 à 10 digitos.');
  }else{
    $('input[type=submit]').attr('disabled','disabled');
    msgLoadIn();

    setTimeout(function(){
      $.post('app/login.php',{'login':login,'senha':senha},function(data){
        msgLoadOut(data.status,data.title,data.message);

        if(data.status == "success"){
          setTimeout(function(){
            window.location = "cpanel.php";
          },3600);
        }

        $('input[type=submit]').removeAttr('disabled');
      },"json");
    },1100);
  }
  return false;
});
