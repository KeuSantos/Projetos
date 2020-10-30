// Script da mascara do CPF
$(document).on('keypress','#cpf,#cpf-busca',function(){
  $('#cpf,#cpf-busca').mask('000.000.000-00');
});
