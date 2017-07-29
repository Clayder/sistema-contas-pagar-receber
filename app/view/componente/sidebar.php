<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="<?php echo url("Home", "index")?>"><i class="fa fa-home"></i> Home </span></a>
      </li>
      <li><a><i class="fa fa-minus"></i><i class="fa fa-money"></i> Contas a pagar <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo url("ContaPagar", "index")?>">Listar contas</a></li>
          <li><a href="<?php echo url("ContaPagar", "cadastrar")?>">Cadastrar</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-plus"></i><i class="fa fa-money"></i> Contas a receber <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo url("ContaReceber", "index")?>">Listar contas</a></li>
          <li><a href="<?php echo url("ContaReceber", "cadastrar")?>">Cadastrar</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo url("Cliente", "index")?>">Listar clientes</a></li>
          <li><a href="<?php echo url("Cliente", "cadastrar")?>">Cadastrar</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cubes"></i> Categorias <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo url("Categoria", "index")?>">Listar categorias</a></li>
          <li><a href="<?php echo url("Categoria", "cadastrar")?>">Cadastrar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<!-- /sidebar menu -->