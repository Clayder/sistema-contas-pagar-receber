<?php flashDataMs('excluirReceber'); ?>
<?php flashDataMs('efetuarReceb'); ?>
<div style="min-width: 200px; overflow-x: auto;">
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Data de recebimento</th>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Recebido</th>
            <th>Visualizar</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contasReceber as $conta): ?>
            <tr>
                <td> <?php echo dataBrasil($conta->dataRecebimento); ?> </td>
                <td> <?php echo $conta->cliente; ?> </td>
                <td> <?php echo convertMonetario("monetario", $conta->valor); ?> </td>
                <td>
                    <?php if ($conta->recebido == 0): ?>
                        <p> Não </p>
                        <form action="<?php echo url("ContaReceber", "efetuarRecebimento"); ?>" method="POST"
                              onsubmit="return confirm('Você realmente deseja efetuar o recebimento ?')">
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
                            data-target="#myModal<?php echo $conta->id; ?>">
                        <i class='fa fa-eye' aria-hidden='true'></i>
                    </button>
                </td>
                <td> <?php buttonEdit("contaReceber", "editar", $conta->id); ?> </td>
                <td> <?php buttonDelete("contaReceber", "delete", $conta->id); ?> </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $conta->id; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Conta</h4>
                        </div>
                        <div class="modal-body">
                            <p><b> Data de vencimento:</b> <?php echo dataBrasil($conta->dataRecebimento); ?> </p>
                            <p><b> Valor:</b> <?php echo $conta->valor; ?> </p>
                            <p><b> Descrição:</b> <?php echo $conta->descricao; ?></p>
                            <p><b> Cliente:</b> <?php echo $conta->cliente; ?></p>
                            <p><b> Recebido:</b> <?php echo ($conta->recebido == 0) ? "Não" : "Sim"; ?></p>
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
</div>