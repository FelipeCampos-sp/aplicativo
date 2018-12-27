
<main>
  <div class="content">
   <h4>PERFIL DE USUÁRIO</h4>
 </div>



<form name="form-perfil" id="formperfil" method="POST" action="" enctype="multipart/form-data"> 
<?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
      ?>
<input type="hidden" name="id" value="<?= $id ?>">
<input type="hidden" name="userCode" value="">
  <div class="image">
    <img  src="<?= HOME ?>/assets/dist/images/usuarios/<?= $userImage ?>" alt="Imagem" width="200" height="200">
</div>

<p>
  <label>
      <input type="file" class="file" name="userImage" >
  </label>
</p>

   <p>
    <label>
      <span>Nome de usuário</span>
      <input type="text"   value="<?= $userName?>" readonly>
    </label>
   </p>

   <p>
    <label>
      <span>E-mail</span>
      <input type="text"  required="" value="<?= $userMail?>" readonly>
    </label>
   </p>

   <p>
    <label>
      <span>Senha atual</span>
      <input  type="password" placeholder="sua senha atual" required name="oldUserPassword" value="">
   </label> 
  </p>
  
  <p>
   <label>
    <span>Digite sua nova senha</span>
      <input type="password"  placeholder="nova senha" required name="userPassword" id="userPassword" value="">
   </label> 
  </p>

  <p>
    <label>
      <span>Repita sua nova senha</span>
      <input type="password" name="passwordCompare" placeholder="Repita nova senha" required  value="">
    </label>
  </p>
  <p>
    <label>
      <span>Telefone</span>
      <input type="text" id="fone" name="userPhone" placeholder="Digite telefone" required value="<?= !empty($userPhone) ? $userPhone : ''?>">
    </label>
  </p>
  
  <input type="submit" name="btn-upuser" value="confirmar">
</form>

</main>