<?php
include("app/welcome.php");
include("app/register-user.php");
(isset($_GET['id']{0}) ? $tipo_pag = "EDIÇÃO" : $tipo_pag = "Cadastro");
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
      <a href="cpanel.php">Dashboard</a> ► <a href="users.php">Usuários do Sistema</a> ► <?=$tipo_pag?> de Usuário
    </div>
    <div id="content-body">
      <div class="bx-sz-l01 pd-up-md pd-dn-md pg-md ft-wt bc-bx-es"><?=
strtoupper($tipo_pag)?> DE USUÁRIO</div>
      <div class="bx-sz-l01 bc-bx-me dp-table">
        <form id="form-user" class="fl-lf pd-dn-bg pd-lf-bg dp-table" action="" method="post" autocomplete="off" onsubmit="return false" style="width: 70%;">
          <label for="nome" class="pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l02 fl-lf"><span class="label-input">*Nome do Usuário</span>
            <input type="text" id="nome" name="nome" placeholder="Nome completo" class="bx-sz-l01 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" autofocus="on" value="<?=(isset($_GET['id']{0}) ? $line1['nome'] : "");?>" required>
          </label>
          <label for="cpf" class="mg-rt-md pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l02 fl-lf"><span class="label-input bx-sz-l02">*CPF Válido</span>
            <input type="text" id="cpf" name="cpf" placeholder="Somente números" class="bx-sz-l02 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" value="<?=(isset($_GET['id']{0}) ? $line1['cpf'] : "");?>" required>
          </label>
          <label for="email" class="mg-rt-md pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l02 fl-lf"><span class="label-inputbx-sz-l02">*E-mail</span>
            <input type="text" id="email" name="email" placeholder="E-mail válido" class="bx-sz-l02 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" value="<?=(isset($_GET['id']{0}) ? $line1['email'] : "");?>" required>
          </label>
          <label for="login" class="mg-rt-md pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l02 fl-lf"><span class="label-input bx-sz-l02">*Login</span>
            <input type="text" id="login" name="login" placeholder="Nickname de acesso" class="bx-sz-l02 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" value="<?=(isset($_GET['id']{0}) ? $line1['login'] : "");?>" required>
          </label>
          <label for="senha" class="mg-rt-md pd-up-bg dp-block ft-wt ft-sz-df bx-sz-l01 fl-lf"><span class="label-input bx-sz-l01">*Senha (de 6 à 10 caracteres)</span>
            <input type="password" id="senha" name="senha" placeholder="Use letras e números" class="bx-sz-l04 bc-bx-cl bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 ph-wt pg-md fm-wt ft-wt fl-lf" maxlength="10" <?=(!isset($_GET['id']{0}) ? "required" : "");?>>
          </label>
          <input type="hidden" id="id-user" name="id-user" value="<?=(isset($_GET['id']{0}) ? $_GET['id'] : "");?>">
          <input type="submit" value="SALVAR (enter)" class="mg-rt-lg fl-lf bx-sz-l06 bx-sz-a01 ft-sz-df mg-dn-md" style="margin-top: 28px;">
        </form>
      </div>
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
