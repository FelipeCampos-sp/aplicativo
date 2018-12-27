<main>
<div class="container">
 
</div>
 <div class="content">
   <h4>DADOS PESSOAIS</h4>
 </div>

  <form name="form-catador" id="formcatador" enctype="multipart/form-data" method="post"> 
    <?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
      ?>
   <p>
    <label>
      <input type="text" id="catadorCEP"  placeholder="CEP" required="" name="catadorCEP" class="buscacatadorendereco">
    </label>
   </p>
   <p>
    <label>
      <input type="text" id="catadorNome"  placeholder="Nome completo" required="" name="catadorNome">
    </label>
   </p>
   
   <p>
    <label>
      <input type="text" placeholder="Como quer ser chamado"  name="catadorApelido">
    </label>
   </p>
<p>
  <label>
      <input type="text" id="catadorEndereco" placeholder="Endereço" required name="catadorEndereco">
  </label>
</p> 
<p>
  <label>
      <input type="text" id="catadorNum" placeholder="numero" required name="catadorNum">
  </label>
</p>  

<p>
<label>
  <input type="text" id="catadorBairro" placeholder="Bairro" name="catadorBairro" required>  
</label>
</p>  
<p>
<label>
  <input type="text" id="catadorCidade" placeholder="Cidade" name="catadorCidade" required>  
</label>
</p>  

<p>
<label>
  <select name="catadorUF" id="catadorUF"  required>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
  </select> 
</label>
</p> 

  <label>
     Selecionar imagem:<input name="catadorImagem"  type="file"/>
  </label>  
<button type="submit" name="btn-catador" value="cadastrar">Cadastrar</button>

   </form>
</main>
