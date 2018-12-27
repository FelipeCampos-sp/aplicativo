
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
  <main>  
    <div class="page-content"><!-- Your content goes here -->
      <?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
      ?>
      <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar"> <a href="#login" class="mdl-tabs__tab is-active">ENTRE</a> <a href="#cadastro" class="mdl-tabs__tab">CADASTRE-SE</a> </div>
        <div class="mdl-tabs__panel is-active" id="login"> 
        <!-- aqui acima is-active -->
        
       <form action="" id="uform-login" method="POST" name="form-login" autocomplete="off">
            <p>
              <label class="mdl-textfield--floating-label" for="usuario-login">Usuário</label>
              <input class="mdl-textfield__input" type="email" id="usuario-login" name="userMail" required>
            </p>
            <p>
              <label class="mdl-textfield--floating-label" for="senha-login">Senha</label>
              <input class="mdl-textfield__input" type="password" id="senha-login" name="userPassword" required>
            </p>
            
         <p>
           <!-- <button name="enter" style="background-color:#333" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            Entrar
           </button> -->
          <input type="submit" name="logon" value="Entrar">
           
         </p>

         <p><a class="esqueceu" href="<?=HOME ?>/esqueceu">Esqueceu sua senha ?</a></p>
       </form>


      </div>
        <div class="mdl-tabs__panel" id="cadastro">
          <form name="form-cadastro" action="" id="formcadastro" method="post" enctype="multipart/form-data" autocomplete="off">
			  <p><small>TODOS OS CAMPOS SÃO OBRIGATÓRIOS</small></p>
            <p>
              <label class="mdl-textfield--floating-label" for="usuario">Digite seu nome completo<span class="dica"></span></label>
              <input class="mdl-textfield__input" type="text"  name="userName" required>
            </p>
             <p>
              <label class="mdl-textfield--floating-label" for="email">Digite seu email<span class="dica"></span></label>
              <input class="mdl-textfield__input" type="email"  name="userMail" require>
            </p>
             <p>
              <label class="mdl-textfield--floating-label" for="fone">Digite seu telefone<span class="dica">(Ex.: (00) 9 9999 9999)</span></label>
              <input class="mdl-textfield__input" type="text" id="fone" name="userPhone" require>
            </p>
            <p>
			  <label class="mdl-textfield--floating-label" for="senha">Digite sua senha<span class="dica"></span></label>
              <input class="mdl-textfield__input" type="password" id="userPassword"  name="userPassword"  require>
            </p>
            <p>
              <label class="mdl-textfield--floating-label" for="senha">Confirme sua senha<span class="dica"></span></label>
              <input class="mdl-textfield__input" type="password"  name="userPassword2" required>
            </p>

            <p>
              <label class="mdl-textfield--floating-label" for="userImage">Foto<span class="dica"></span></label>
              <input class="mdl-textfield__input" type="file" id="user-image" name="userImage" >
            </p>
            
            <p>
              <button name="btn-cad" style="background-color:#333"; id="btn-cadastrar" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">CADASTRAR</button>
            </p>
          </form>
        </div>
      </div>
      
    </div>
    <!--fecha div.content--> 
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
<script src="<?= HOME ?>/assets/dist/js/jquery-3.3.1.min.js"></script>
<script src="<?= HOME ?>/assets/dist/js/jquery.mask.min.js"></script>
<script src="<?= HOME ?>/assets/dist/js/jquery.validate.min.js"></script>
<script src="<?= HOME ?>/assets/dist/mdl/material.min.js"></script>
<script src="<?= HOME ?>/assets/dist/js/validacao.js"></script>

</body>
</html>