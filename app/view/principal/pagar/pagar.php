<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="red"><i class="fa fa-minus"></i></i> <i class="fa fa-money"></i> 
          Contas a pagar
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo" href="<?php echo url("ContaPagar", "cadastrar"); ?>">
          <i class="fa fa-plus-square"></i> Cadastrar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
              <form class="form-inline" method="GET" action="<?php echo url('ContaPagar', 'filtroData'); ?>">
                  <input type="hidden" name="class" value="ContaPagar">
                  <input type="hidden" name="metodo" value="filtroData">
                  <div class="control-group">
                    <div class="controls">
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" name="datefilter" style="width: 200px" class="form-control" value="" />
                      </div>
                      <button type="submit" style="position: relative; bottom: 3px;" class="btn btn-primary">Filtrar</button>
                    </div>
                  </div>          
              </form>
              <h4 class="text-center text-warning"> <?php echo (isset($resultadoBusca))?$resultadoBusca : "" ;?></h4>
              <?php include PASTA_BASE_VIEW."principal/pagar/tabela-dados.php"; ?>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- /page content -->

</script>