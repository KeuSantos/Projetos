<?php
include("app/welcome.php");
include("list-users.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema Exemplo para Vaga de Emprego - Floowmer</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/system.css">
  </head>
  <body class="pd-up-bg pd-rt-bg pd-dn-bg pd-lf-bg">
    <span id="msg-popup" class="pd-up-bg pd-dn-bg pd-rt-bg ft-bl ft-lf"></span>
    <?php include("header.php"); ?>
    <div id="msg-welcome" class="ft-sz-df bx-sz-l01 pd-up-md pd-dn-md ft-wt mg-up-md mg-dn-md" <?=$css_cor?>>
      <a href="cpanel.php">Dashboard</a> ► Usuários do Sistema
    </div>
    <div id="search-engine" class="">
      <div class="bx-sz-l01 pd-up-md pd-dn-md pg-md ft-wt bc-bx-es">BUSCADOR AVANÇADO</div>
      <div class="bx-sz-l01 bc-bx-me dp-table">
        <form id="form-search-users" class="fl-lf pd-dn-bg pd-lf-bg dp-table" action="" method="post" autocomplete="off" onsubmit="return false" style="width: 70%;">
          <label for="sdocumento" class="pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l03 fl-lf"><span class="label-input">Nome do Usuário</span>
            <input type="text" id="nome-busca" name="nome-busca" placeholder="Busca por nome de cadastro" class="bx-sz-l01 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" autofocus="on" required>
          </label>
        </form>
        <span id="form-user" class="mg-rt-lg btn-options option-insert dp-block fl-rt mg-up-lg"></span>
      </div>
    </div>
    <div id="data-body" class="mg-up-md">
      <div class="bx-sz-l01 dp-table pd-up-md pd-dn-md pg-md ft-wt bc-bx-es">
        <span class="fl-lf">LISTAGEM DO CADASTRO DE USUÁRIOS DO SISTEMA (Total de <?=$sql1->rowCount()?>)</span>
      </div>
      <ul id="container-list" class="bx-sz-l01 dp-block bc-bx-me ft-wt">
        <?=$HTML?>
      </ul>
    </div>
  </body>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/mask/dist/jquery.mask.min.js"></script>
  <script src="js/function.js"></script>
  <script src="js/mask.js"></script>
  <script src="js/system.js"></script>
  <script src="js/form.js"></script>
  <script src="js/users.js"></script>
</html>
