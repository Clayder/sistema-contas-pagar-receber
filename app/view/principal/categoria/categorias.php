<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          <i class="fa fa-cubes"></i></i>
          Categorias
        </h3>
      </div>
      <div class="title_right">
        <a class="btn btn-app button-topo" href="<?php echo url("Categoria", "cadastrar"); ?>">
          <i class="fa fa-plus-square"></i> Cadastrar
        </a>
      </div>
      <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <?php flashDataMs('excluirCategoriaFk'); ?>
            <?php flashDataMs('excluirCategoria'); ?>
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
                <?php foreach ($categorias as $categoria): ?>
                  <tr>
                    <td> <?php echo $categoria->nome; ?> </td>
                    <td> <?php echo dateTimeBrasil($categoria->dateTime); ?> </td>
                    <td> <?php buttonEdit("categoria", "editar", $categoria->id); ?> </td>
                    <td> <?php buttonDelete("categoria", "delete", $categoria->id); ?> </td>
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