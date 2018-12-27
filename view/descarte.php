<main>
<div class="content">
    <h4>DESCARTE</h4>
</div>

 <form method="post" action="" enctype="multipart/form-data" name="form-descarte">
 <?php
          if(isset($error) && !empty($error)):
      ?>
          <div class="error-message"><?= $error ?></div>
      <?php
          endif;
      ?>
  <p>
        <label>Cep:
        <input name="descarteCEP" type="text" id="descarteCEP" value="" size="10" class="buscalogradouro"
               </label><br />
  </p>
  <p>   
        <label>Rua:
        <input name="descarteRua" class="descarteRua" type="text" id="rua"  /></label><br />
  </p>
  <p>   
        <label>Número:
        <input name="descarteNumero" class="descarteNumero" type="text" id="descarteNumero" /></label><br />
  </p>
  <p>   
        <label>Bairro:
        <input name="descarteBairro" class="descarteBairro" type="text" id="bairro" size="40" /></label><br />
  </p>
  <p>   
        <label>Cidade:
        <input name="descarteCidade" class="descarteCidade" type="text" id="cidade" size="40" /></label><br />
  </p>
  <p>   
        <label>Estado:
        <!-- <input name="descarteUF" class="descarteUF" type="text" id="uf" size="2" /></label><br /> -->
        <!-- <p> -->
<label>
  <select name="descarteUF" id="descarteUF">
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

  <p>   
        <label>IBGE:
        <input name="descarteIBGE" class="descarteIBGE" type="text" id="ibge" size="12" /></label><br />
 </p>

 <p>
    <label>
      <span>Selecione uma data para a coleta (obrigatorio)*</span>
      <input required="" name="descarteDataColeta" type="date" placeholder="Selecione a data da coleta">
    </label>
 </p>
 
 <button type="submit" name="finalizar" value="Finalizar">Finalizar a coleta</button>

</form>
</main>