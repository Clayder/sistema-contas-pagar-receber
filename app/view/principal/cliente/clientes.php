<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="fa fa-users"></i></i>
          Clientes
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo" href="<?php echo url("Cliente", "cadastrar"); ?>">
          <i class="fa fa-plus-square"></i> Cadastrar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <?php flashDataMs('excluirClienteFk'); ?>
            <?php flashDataMs('excluirCliente'); ?>
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Data de modificação</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($clientes as $cliente): ?>
                  <tr>
                    <td> <?php echo $cliente->nome; ?> </td>
                    <td> <?php echo dateTimeBrasil($cliente->dateTime); ?> </td>
                    <td> <?php buttonEdit("cliente", "editar", $cliente->id); ?> </td>
                    <td> <?php buttonDelete("cliente", "delete", $cliente->id); ?> </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- /page content -->