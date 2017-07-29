<?php flashDataMs('excluirPagar'); ?>
<?php flashDataMs('efetuarPg'); ?>
<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Vencimento</th>
        <th>Cliente</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Pago</th>
        <th>Visualizar</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contas as $conta): ?>
        <tr>
            <td> <?php echo dataBrasil($conta->vencimento); ?> </td>
            <td> <?php echo $conta->cliente; ?> </td>
            <td> <?php echo $conta->categoria; ?> </td>
            <td> <?php echo $conta->valor; ?> </td>
            <td>
                <?php if ($conta->pago == 0): ?>
                    <p> Não </p>
                    <form action="<?php echo url("ContaPagar", "efetuarPagamento"); ?>" method="POST" onsubmit="return confirm('Você realmente deseja efetuar o pagamento ?')">
                        <input type="hidden" value="<?php echo $conta->id; ?>" name="id"/>
                        <button type="submit" class="btn btn-success" title="Efetuar pagamento">
                            <i style="font-size: 20px" class="fa fa-money" aria-hidden="true"></i>
                        </button>
                    </form>
                <?php else: ?>
                    <p> Sim </p>
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#myModalPg<?php echo $conta->id; ?>">
                    <i class='fa fa-eye' aria-hidden='true'></i>
                </button>
            </td>
            <td> <?php buttonEdit("contaPagar", "editar", $conta->id); ?> </td>
            <td> <?php buttonDelete("contaPagar", "delete", $conta->id); ?> </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="myModalPg<?php echo $conta->id; ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Conta</h4>
                    </div>
                    <div class="modal-body">
                        <p><b> Data de vencimento:</b> <?php echo dataBrasil($conta->vencimento); ?> </p>
                        <p><b> Valor:</b> <?php echo $conta->valor; ?> </p>
                        <p><b> Descrição:</b> <?php echo $conta->descricao; ?></p>
                        <p><b> Cliente:</b> <?php echo $conta->cliente; ?></p>
                        <p><b> Categoria:</b> <?php echo $conta->categoria; ?></p>
                        <p><b> Pago:</b> <?php echo ($conta->pago == 0) ? "Não" : "Sim"; ?></p>
                        <p><b> Data de modificação:</b> <?php echo dateTimeBrasil($conta->dateTime); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </tbody>
</table>