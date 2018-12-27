<div class="form">
  <h4>Será enviado um e-mail para você para que possa recuperar sua senha !</h4>
  <h4>Caso não receba verifique sua pasta spam !</h4>
  <?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
  ?>
    <form method="post" action="" name="form-esqueceu">
     <p>
       <label>
         <input name="userMail" type="email" id="recuperar-email" placeholder="Digite seu email" autofocus="">
       </label>
     </p>
     
     <button class="enviar" type="submit" name="enviar" value="enviar">Enviar</button>
  </form>

</div>