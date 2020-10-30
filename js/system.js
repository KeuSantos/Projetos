// ARQUIVO DE GERENCIAMENTO DE AÇÕES GERAIS
// Script de realce do link do submenu (aparecer)
$(document).on('mouseover','.link-submenu',function(){
  $(this).css({
    'background-color':"#50597B"
  });
});

// Script de realce do link do submenu (desaparecer)
$(document).on('mouseout','.link-submenu',function(){
  $(this).css({
    'background-color':"#394264"
  });
});

// Script de direcionar (acesso) aos modulos pelo menu
$(document).on('click','.link-submenu,.option-insert',function(){
  var link = $(this).attr('id');

  msgLoadIn();
  setTimeout(function(){
    window.location = link + ".php";
  },1500);
});

// Script de logout (sair)
$(document).on('click','#logout',function(){
  $.post('app/logout.php',{'logout':1},function(data){
    msgLoadIn();

    setTimeout(function(){
      window.location = "index.php";
    },1500);
  },"json");
});
