<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total de clientes</span>
            <div class="count"><?php echo ($qtdClientes === "")? 0: $qtdClientes; ?></div>
            <span class="count_bottom"></span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="red"><i class="fa fa-minus"></i></i> <i class="fa fa-money"></i> Total de saída de dinheiro </span>
            <div class="count red">R$ <?php echo ($somaValoresPagar == "")? 0 : convertMonetario("monetario", $somaValoresPagar); ?></div>
            <span class="count_bottom"></span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="green"><i class="fa fa-plus"></i></i> <i class="fa fa-money"></i> Total de entrada de dinheiro</span>
            <div class="count green">R$ <?php echo ($somaValoresReceber == "")? 0 : convertMonetario("monetario", $somaValoresReceber); ?></div>
            <span class="count_bottom"></span>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_title">
                <h2> Contas a pagar/receber em <?php echo dateTime('Y'); ?> </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="mybarChart2"></canvas>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-4 col-xs-12">
            <div class="x_title">
                <h2>Gasto por categoria</h2>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <canvas id="doughnut-chart" height="140" width="140"
                    style="margin: 15px 10px 10px 0"></canvas>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Contas a pagar em 30 dias </h2>
                    <a class="btn button-topo" href="<?php echo url("ContaPagar", "cadastrar"); ?>">
                        <i class="fa fa-plus-square"></i> Cadastrar
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php include PASTA_BASE_VIEW . "principal/pagar/tabela-dados.php"; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contas a receber em 30 dias</h2>
                    <a class="btn button-topo" href="<?php echo url("ContaReceber", "cadastrar"); ?>">
                        <i class="fa fa-plus-square"></i> Cadastrar
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php include PASTA_BASE_VIEW . "principal/receber/tabela-dados.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
