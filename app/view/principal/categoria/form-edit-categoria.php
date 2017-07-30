<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="fa fa-cube"></i></i>
          Editar categoria
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo-info" title="Listar categorias" href="<?php echo url("Categoria", "index"); ?>">
          <i class="fa fa-plus-square"></i> Listar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <?php flashDataMs('editarCategoriaValid'); ?>
            <?php flashDataMs('editarCategoria'); ?>
            <div class="x_content">
              <br />
              <form action="<?= url("categoria", "realizarEdicao"); ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="id" value="<?= $categoria->id; ?>" />
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nome" value="<?= $categoria->nome; ?>" id="first-name"  class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?= url("categoria", "index"); ?>" class="btn btn-danger" type="button">Cancelar</a>
                    <button class="btn btn-warning" type="reset">Resetar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
