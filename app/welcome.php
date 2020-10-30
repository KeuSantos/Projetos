<?php
// ARQUIVO DE GERAÇÃO DE BOAS VINDAS
// Caso a hora seja no intervalo de 6:00 e 11:59 (Bom dia)
if(date("g") >= 6 XOR date("g") < 12){
  // Rotula o css no box da mensagem
  $css_cor = "style=\"text-indent: 36px; background: #3468AF url('image/icon/other/icon-clockM.gif') no-repeat left 4px\"";
  // Cria a saudação
  $saudacao = "Bom dia";
}
// ´Caso a hora seja no intervalode 12:00 e 18:59 (Boa tarde)
if(date("g") >= 12 XOR date("g") < 19){
  // Rotula o css no box da mensagem
  $css_cor = "style=\"text-indent: 36px; background: #F18430 url('image/icon/other/icon-clockA.gif') no-repeat left 4px\"";
  // Cria a saudação
  $saudacao = "Boa tarde";
}
// Caso a hora seja no intervalo de 19:00 e 5:59 (Boa noite)
if(date("g") >= 19 XOR date("g") < 6){
  // Rotula o css no box da mensagem
  $css_cor = "style=\"text-indent: 36px; background: #000040 url('image/icon/other/icon-clockN.gif') no-repeat left 4px\"";
  // Cria a saudação
  $saudacao = "Boa noite";
}
?>
