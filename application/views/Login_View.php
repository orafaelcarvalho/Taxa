<div class="row">
  <div class="col-lg-6">
    <div id="bg-text-home" class="p-4">
      <h1 class="mt-4">Taxa de coleta, remoção, transporte, destinação e disposição final ambientalmente adequada de resíduos sólidos urbanos</h1>
      <hr>
        <div class="row">
            <div class="col-lg-12">
              <?php 
            $atributos = array('id' => 'formulario_login','class' => 'formulario_login', 'autocomplete' => "off"); 
              echo form_open('Login/Entrar', $atributos); 
          ?>
              <div class="form-group">
                <label for="txtCPF"><h4>CPF</h4></label>
                <input type="text" class="form-control" id="txtCPF" name="txtCPF">
              </div>
              <div class="form-group">
                <label for="txtSenha"><h4>Senha</h4></label>
                <input type="password" class="form-control" id="txtSenha" name="txtSenha">
              </div>
              <div class="form-group">
            <button type="submit" class="btn btn-success mb-2">Entrar</button>
          </div>
          <?php 
            echo form_close();
          ?>                    
            </div>
        </div>        
    </div>    
  </div>
</div>