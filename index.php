<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/system.css">
  </head>
  <body>
    <span id="msg-popup" class="pd-up-bg pd-dn-bg pd-rt-bg ft-bl ft-lf"></span>
    <form id="container-login" action="" method="post" autocomplete="off" class="animated fadeIn bc-bx-me pd-up-bg pd-dn-bg pd-lf-bg pd-rt-bg bd-up-sl bd-dn-sl bd-lf-sl bd-rt-sl" onsubmit="return false">
      <div>
        <span class="bx-sz-l01 ft-sz-bg ft-wt mg-dn-bg ft-ct">Sistema</span>
      </div>
      <div>
        <input id="login" type="text" class="bx-sz-l01 bc-ep bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 bc-ico ico-profile-wt ph-wt ft-sz-lt fm-wt ft-wt" placeholder="Digite aqui seu login*" autofocus="on" required>
        <input id="senha" type="password" class="bx-sz-l01 bc-ep bd-lf-wt bd-sz-lf-bg bd-lf-sl bx-sz-a01 mg-up-lg ph-wt bc-ico ico-lock-wt ft-sz-lt fm-wt ft-wt" placeholder="Digite aqui sua senha*" maxlength="12" required>
        <input type="submit" value="LOGAR" class="mg-up-lg bx-sz-l01 bx-sz-a01 ft-sz-lt">
      </div>
    </form>
  </body>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/function.js"></script>
  <script src="js/form.js"></script>
  <script src="js/login.js"></script>
</html>
