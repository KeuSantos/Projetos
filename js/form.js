// ARQUIVO DE GERENCIAMENTO DE EVENTOS DE FORMULÁRIOS
// Ao selecionar o campo
$(document).on('focus','input[type=text],input[type=password],input[type=number]',function(){
  $(this).css({
    'border-left-color':"#7EB36A"
  });
});
// Ao sair do campo
$(document).on('blur','input[type=text],input[type=password],input[type=number]',function(){
  $(this).css({
    'border-left-color':"#FFF"
  });
});
// Busca de usuarios cadastrados
$(document).on('keyup','#cpf-busca,#nome-busca',function(){
  var cpf = $('#cpf-busca').val();
  var nome = $('#nome-busca').val();

  if(cpf != '' || nome != ''){
    $.post('search-users.php',{'cpf':cpf,'nome':nome},function(data){
      $('#container-list').html(data.html);
    },"json");
  }
  return false;
});
