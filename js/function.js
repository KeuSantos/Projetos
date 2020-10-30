// ARQUIVO DE GERENCIAMENTO DE FUNÇÕES
// Função de texto para campo 'required'
var msgPopup = function(tipo,titulo,texto){
  if(tipo == "alert"){
    var icone = "#FFF url(image/icon/other/alert.gif) no-repeat 12px center";
  }else if(tipo == "error"){
    var icone = "#FFF url(image/icon/other/error.gif) no-repeat 12px center";
  }else if(tipo == "success"){
    var icone = "#FFF url(image/icon/other/accept.gif) no-repeat 12px center";
  }else{
    var icone = "#FFF url(image/icon/other/information.gif) no-repeat 12px center";
  }

  $('#msg-popup').css({
    'background':icone,
    'display':"block"
  }).html('<p class="st-ft-bl" style="font-size: 1.2em;">' + titulo + '</p>' + texto).removeClass('animated bounceOutRight').addClass('animated bounceInRight');

  setTimeout(function(){
    $('#msg-popup').removeClass('animated bounceInRight').addClass('animated bounceOutRight');
  },3000);
  return false;
}

// Função de texto para load de forms (msg ativa)
var msgLoadIn = function(){
    $('#msg-popup').css({
      'background':"#FFF url(image/icon/other/load.gif) no-repeat 12px center",
      'display':"block"
    }).html('<p class="st-ft-bl" style="font-size: 1.2em;">Um momento...</p>A solicitação está sendo verificada.').removeClass('animated bounceOutRight').addClass('animated bounceInRight');

  return false;
}

// Função de texto para load de forms (msg inativa)
var msgLoadOut = function(tipo,titulo,texto){
    $('#msg-popup').removeClass('animated bounceInRight').addClass('animated bounceOutRight');

    setTimeout(function(){
      if(tipo == "alert"){
        var icone = "#FFF url(image/icon/other/alert.gif) no-repeat 12px center";
      }else if(tipo == "error"){
        var icone = "#FFF url(image/icon/other/error.gif) no-repeat 12px center";
      }else if(tipo == "success"){
        var icone = "#FFF url(image/icon/other/accept.gif) no-repeat 12px center";
      }else{
        var icone = "#FFF url(image/icon/other/information.gif) no-repeat 12px center";
      }

      $('#msg-popup').css({
        'background':icone,
        'display':"block"
      }).html('<p class="st-ft-bl" style="font-size: 1.2em;">' + titulo + '</p>' + texto).removeClass('animated bounceOutRight').addClass('animated bounceInRight');

      setTimeout(function(){
        $('#msg-popup').removeClass('animated bounceInRight').addClass('animated bounceOutRight');
      },2500);
    },500);

  return false;
}
