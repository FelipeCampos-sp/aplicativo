 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aplicativo RCL Brasil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="<?=HOME?>/assets/dist/img/bg-icon.png"/>
	<link rel="stylesheet" href="<?=HOME?>/assets/dist/mdl/material.min.css">
	<link rel="stylesheet" href="<?=HOME?>/assets/dist/css/style.css">
  
    <style>
    .demo-card-square.mdl-card {
        width: 320px;
        height: 320px;
    }
    .demo-card-square > .mdl-card__title {
        color: #fff;
        background:url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
    }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  
  <header style="background-color:#333" class="mdl-layout__header">
    <div class="mdl-layout__header-row"> <span class="mdl-layout-title">Rcl Brasil</span>
      <div class="mdl-layout-spacer"></div>
    </div>
  </header>
  <div class="mdl-layout__drawer"> <span class="mdl-layout-title">Usuario</span>
  <nav class="mdl-navigation"> 
      <a class="mdl-navigation__link" href="<?= HOME ?>/home"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-7.png">Home</a>
      <a class="mdl-navigation__link" href="<?= HOME ?>/historia"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-7.png">História</a>
      <a class="mdl-navigation__link" href="<?= HOME ?>/descarte"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-8.png">Descartar</a> 
      <a class="mdl-navigation__link" href="<?= HOME ?>/parceiros"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-5.png">Parceiros</a>   
      <a class="mdl-navigation__link" href="<?= HOME ?>/catadores"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-9.png">Cadastrar catadores</a> 
      <a class="mdl-navigation__link" href="<?= HOME ?>/localizacao"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-1.png">Pontos de coleta</a>
      <a class="mdl-navigation__link" href="<?= HOME ?>/material"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-01.png">Matériais recicláveis</a>
      <a class="mdl-navigation__link" href="<?= HOME ?>/dicas"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-0.png">Dicas para cadastro</a>
      <a class="mdl-navigation__link" href="<?= HOME ?>/auth/logout"><img class="icon" src="<?= HOME ?>/assets/dist/img/bg-2.png">Sair</a>
  </nav>
</div>
  <!-- ACIMA TEMPLATE HEADER -->
  <!-- ABAIXO CARREGO A VIEW DENTRO DO TEMPLATE -->
  <main>
<?php
    $this->renderViewToTemplate($viewName, $viewData);
?>
</main>
<!-- ABAIXO TEMPLATE FOOTER -->
  <footer class="mdl-mini-footer">
    <div class="mdl-logo">Sobre a Rcl Brasil</div>
    <div class="mdl-mini-footer__right-section">
      <ul class="mdl-mini-footer__link-list">
        <li><a href="#">Ajuda</a></li>
        <li><a href="#">Termos de Privacidade</a></li>
      </ul>
    </div>
  </footer>
</div>

<!--Chamadas dos arquivos javascript -->
<script src="<?=HOME?>/assets/dist/js/jquery-3.3.1.min.js"></script>
<script src="<?=HOME?>/assets/dist/js/jquery.mask.min.js"></script>
<script src="<?=HOME?>/assets/dist/js/jquery.validate.min.js"></script>
<script src="<?=HOME?>/assets/dist/mdl/material.min.js"></script>
<script src="<?=HOME?>/assets/dist/js/validacao.js"></script>
</body>
</html>