<?php
    $mail = filter_input(INPUT_GET, 'm', FILTER_DEFAULT);
    $code = filter_input(INPUT_GET, 'c', FILTER_DEFAULT);
    
?>
<div class="form">
  <h4>Agora você já pode recuperar seu acesso !</h4>
  <?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
  ?>
    <form method="post" action="" name="form-recover" id="formrecover">
     <p>
       <label>Código liberação
         <input name="userCode" type="text" id="" value="<?=!empty($code) ? $code : ''?>" readonly>
       </label>
     </p>
     <p>
       <label>E-mail
         <input name="userMail" type="email" id="" placeholder="Digite seu email" autofocus="" value="<?=!empty($mail) ? base64_decode($mail) : ''?>" readonly>
       </label>
     </p>
     <p>
       <label>Senha
         <input name="userPassword" type="text" id="" placeholder="Digite sua nova senha">
       </label>
     </p>
     
     <button type="submit" name="recuperar" value="enviar">Recuperar</button>
  </form>

</div>
