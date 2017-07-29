<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="fa fa-user"></i></i>
          Cadastrar cliente
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo-info" title="Listar clientes" href="<?php echo url("Cliente", "index"); ?>">
          <i class="fa fa-plus-square"></i> Listar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <?php flashDataMs('cadastrarClienteValid'); ?>
            <?php flashDataMs('cadastrarCliente'); ?>
            <div class="x_content">
              <br />
              <form action="<?= url("cliente", "realizarCadastro"); ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nome" value="" id="first-name"  class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?= url("cliente", "index"); ?>" class="btn btn-danger" type="button">Cancelar</a>
                    <button class="btn btn-warning" type="reset">Resetar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>