<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="red"><i class="fa fa-minus"></i></i> <i class="fa fa-money"></i>
          Editar conta a pagar
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo-info" title="Listar contas a pagar" href="<?php echo url("ContaPagar", "index"); ?>">
          <i class="fa fa-plus-square"></i> Listar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <?php flashDataMs('pagVencimentoValid'); ?>
            <?php flashDataMs('pagValorValid'); ?>
            <?php flashDataMs('editarPagar'); ?>
            <div class="x_content">
              <br />
              <form action="<?= url("contaPagar", "realizarEdicao"); ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="id" value="<?= $conta->id; ?>" />
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vencimento">Data de vencimento: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="vencimento" value="<?php echo $conta->vencimento; ?>" id="vencimento"  class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição:
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="descricao" id='descricao'><?= $conta->descricao; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="valor" value="<?php echo $conta->valor; ?>" id="valor"  class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="fkCliente" class="form-control">
                      <option selected="" value="<?= $conta->idCliente; ?>"><?= $conta->cliente; ?></option>
                      <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente->id; ?>"><?= $cliente->nome; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Categoria: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="fkCategoria" class="form-control">
                     <option selected="" value="<?= $conta->idCategoria; ?>"><?= $conta->categoria; ?></option>
                      <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria->id; ?>"><?= $categoria->nome; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pago">Pago: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="pago" class="form-control">
                      <option selected="" value="<?= $conta->pago; ?>"><?php echo ($conta->pago == 0) ? "Não" : "Sim"; ?></option>
                      <option value="0">Não</option>
                      <option value="1">Sim</option>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?= url("contaPagar", "index"); ?>" class="btn btn-danger" type="button">Cancelar</a>
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