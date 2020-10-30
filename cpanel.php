<?php include("app/welcome.php"); ?>
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
      <?=$saudacao?> Clayton, essa é uma área administrativa, somente usuários autorizados.
    </div>
    <div id="dash-finance">
      <div id="box-fin-all" class="bx-sz-l01 dp-table">
        <div class="bx-sz-l01 pd-up-md pd-dn-md pg-md ft-wt bc-bx-es">DASHBOARD (DADOS DOS USUÁRIOS)</div>
        <div class="bx-sz-l01 bc-bx-me dp-table">

        </div>
      </div>
  </body>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/function.js"></script>
  <script src="js/system.js"></script>
  <script src="js/dashboard.js"></script>
</html>
