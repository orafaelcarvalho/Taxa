<div class="row">
  <div class="col-lg-6">
    <div id="bg-text-home" class="p-4">
      <h1 class="mt-4">Comunidade Cultural de ****</h1>
      <hr>
        <div class="row">
            <div class="col-lg-12">
              <?php 
            $atributos = array('id' => 'formulario_alterarsenha','class' => 'formulario_alterarsenha', 'autocomplete' => "off"); 
              echo form_open('Gerenciador/AlterarSenha', $atributos); 
          ?>
              <div class="form-group">
                <label for="txtSenha"><h4>Senha</h4></label>
                <input type="password" class="form-control" id="txtSenha" name="txtSenha">
              </div>
              <div class="form-group">
                <label for="txtConfirmar"><h4>Confirmar Senha</h4></label>
                <input type="password" class="form-control" id="txtConfirmar" name="txtConfirmar">
              </div>
              <div class="form-group">
            <button type="submit" class="btn btn-success mb-2">Salvar</button>
          </div>
          <?php 
            echo form_close();
          ?>                    
            </div>
        </div>        
    </div>    
  </div>
</div>