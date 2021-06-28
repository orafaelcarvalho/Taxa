<?php
    
    //var_dump($detalhes);
    foreach ($detalhes as $key) {
        $codsol	    		= $key->codsol;
        $datsol		    	= $key->datsol;
        $datsol   			= strftime('%d/%m/%Y', strtotime($datsol));
        $nomsol			    = $key->nomsol;
        $emasol		    	= $key->emasol;
        $telsol   			= $key->telsol;
        $cpfsol		    	= $key->cpfsol;
        $nrgsol		    	= $key->nrgsol;
        $cepsol	    		= $key->cepsol;
        $endsol		    	= $key->endsol;
        $nensol		    	= $key->nensol;
        $celsol	    		= $key->celsol;
        $baisol			    = $key->baisol;
        $cidsol		    	= $key->cidsol;
        $estsol		    	= $key->estsol;
        $cdcsol			    = $key->cdcsol;
        $pgtsol 		    = $key->pgtsol;
        $filerg		    	= $key->filerg;
        $filecpf	    	= $key->filecpf;
        $filecontaagua	= $key->filecontaagua;
        $status         = $key->status;

        if($status==1){
          $status = "Atendida";
          $class = "badge-success";
          $numcad = $key->numcad;
        }
        else{
          $status = "Pendente";
          $class = "badge-danger";
        }
    }

?>

<div class="row">
	<div class="col-lg-6">
		<div id="bg-text-home" class="p-4">
			<h1 class="mt-4">Detalhes da solicitação</h1>
        <hr>
        <div class="row">
          <div class="col">
            <a href="<?php echo base_url().'Gerenciador/' ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i></a>
          </div>
          <div class="col text-right">
            <h3><span class="badge badge-pill <?php echo $class; ?>"><?php echo $status; ?></span></h3>
          </div>
        </div>
			  <hr>
		    <div class="row">
		      	<div class="col-lg-12">                  
              <h4>Solicitação: <?php echo $codsol; ?></h4>
              <hr>
              <div class="row">
                  <div class="col-sm">
                      <h4>Requerente</h4>
                      <p>Nome: <?php echo $nomsol; ?></p>
                      <p>E-Mail: <?php echo $emasol; ?></p>
                      <p>Telefone: <?php echo $telsol; ?></p>
                      <p>CPF: <?php echo $cpfsol; ?></p>
                      <p>RG: <?php echo $nrgsol; ?></p>
                      <hr>
                  </div>
                  <div class="col-sm">
                      <h4>Endereço</h4>
                      <p>Endereço: <?php echo $endsol; ?>, <?php echo $nensol; ?></p>
                      <p>Complemento: <?php echo $celsol; ?></p>
                      <p>Bairro: <?php echo $baisol; ?></p>
                      <p>Cidade/Estado: <?php echo $cidsol.'/'.$estsol; ?></p>
                      <p>CEP: <?php echo $cepsol; ?></p>
                      <hr>
                  </div>
              </div>
              <h4>Informações</h4>
              <p>Data da solicitação: <?php echo $datsol; ?></p>
              <p>CDC: <?php echo $cdcsol; ?></p>
              <p>Opção de pagamento: <?php echo $pgtsol; ?></p>
              <?php if(isset($numcad)){ ?>
                      <p>Número do cadastro: <span class="font-weight-bold text-danger"><?php echo $numcad; ?></span></p>
              <?php } ?>
              <hr>
              <div class="row">
                <div class="col-lg-6">
                  <button type="button" class="btn btn-info btn-block mb-1" data-toggle="modal" data-target="#modalDocumentos">Visualizar documentos</button>
                </div>

                <?php
                
                  if($status == 'Pendente'){

                ?>
                
                <div class="col-lg-6">
                  <button type="button" class="btn btn-success btn-block mb-1" data-toggle="modal" data-target="#modalAtendimento">Confirmar atendimento</button>
                </div>
                  
                <?php
                
                  }
                  else
                  {

                ?>

                <div class="col-lg-6">
                  <button type="button" class="btn btn-warning btn-block mb-1" data-toggle="modal" data-target="#modalAtendimento">Alterar Número de Cadastro</button>
                </div>

                <?php
                
                  }

                ?>

              </div>
              <hr>
                  <div class="row">
                      <div class="col-lg-12 text-center justify-content-center">
                          <br>
                          <h6>Prefeitura do Município de *****</h6>
                          <span>Av. Endereço, 1234 - Bairro</span>
                          <br>
                          <span>Cidade - Estado</span>
                      </div>
                  </div>
              <hr>
		      	</div>
		    </div>
		</div>
	</div>
</div>

<!-- Modal Documentos -->
<div class="modal fade" id="modalDocumentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documentos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex align-items-center">
          <div class="col-8">
            <h4>RG:</h4>
          </div>
          <div class="col-4 text-right mb-2">
            <?php echo form_open('Gerenciador/Download/'.$filerg); ?>
              <button type="submit" class="btn btn-info btn-sm">Baixar imagem</button>
            </form>
          </div>
        </div>
        <img class="img-fluid img-thumbnail" src="<?php echo base_url().'public/docs/docs_municipes/'.$filerg; ?>" alt="">
        <hr>
        <div class="row d-flex align-items-center">
          <div class="col-8">
            <h4>CPF:</h4>
          </div>
          <div class="col-4 text-right mb-2">
            <?php echo form_open('Gerenciador/Download/'.$filecpf); ?>
              <button type="submit" class="btn btn-info btn-sm">Baixar imagem</button>
            </form>
          </div>
        </div>
        <img class="img-fluid img-thumbnail" src="<?php echo base_url().'public/docs/docs_municipes/'.$filecpf; ?>" alt="">
        <hr>
        <div class="row d-flex align-items-center">
          <div class="col-8">
            <h4>Conta de água:</h4>
          </div>
          <div class="col-4 text-right mb-2">
            <?php echo form_open('Gerenciador/Download/'.$filecontaagua); ?>
              <button type="submit" class="btn btn-info btn-sm">Baixar imagem</button>
            </form>
          </div>
        </div>
        <img class="img-fluid img-thumbnail"  src="<?php echo base_url().'public/docs/docs_municipes/'.$filecontaagua; ?>" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim Modal Documentos -->

<?php

    if($status == 'Pendente')
    {

?>

<!-- Modal Conclusão Atendimento -->
<div class="modal fade" id="modalAtendimento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar atendimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>O atendimento da solicitação <?php echo $codsol; ?> foi concluído?</p>
        <?php echo form_open('Gerenciador/ConcluirAtendimento/'.$cdcsol); ?>
        <label for="txtnumcad"><h5><span class="text-danger">*</span>Informe o número de cadastro</h5></label>
        <input class="form-control mb-2" type="text" id="txtnumcad" name="txtnumcad">
        <?php echo $this->session->flashdata('ErrosModalAtendimento'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Confirmar atendimento</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

    }
    else
    {

?>

<!-- Modal alteração de número de cadastro -->
<div class="modal fade" id="modalAtendimento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar número de cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Gerenciador/ConcluirAtendimento/'.$cdcsol); ?>
        <label for="txtnumcad"><h5><span class="text-danger">*</span>Informe o novo número de cadastro</h5></label>
        <input class="form-control mb-2" type="text" id="txtnumcad" name="txtnumcad">
        <?php echo $this->session->flashdata('ErrosModalAtendimento'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Confirmar alteração</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

    }

    if($this->session->flashdata('ErrosModalAtendimento')){

?>
      <script>
        $('#modalAtendimento').modal({backdrop: 'static', keyboard: false});
      </script>
<?php

    }

?>