<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="green"><i class="fa fa-plus"></i></i> <i class="fa fa-money"></i>
                    Editar conta a receber
                </h3>
            </div>
            <div class="title_right">
                <a class="btn btn-app button-topo-info" title="Listar contas a receber"
                   href="<?php echo url("ContaReceber", "index"); ?>">
                    <i class="fa fa-plus-square"></i> Listar
                </a>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
                    <?php flashDataMs('recebVencimentoValid'); ?>
                    <?php flashDataMs('recebValorValid'); ?>
                    <?php flashDataMs('editarReceber'); ?>
                    <div class="x_content">
                        <br/>
                        <form action="<?= url("contaReceber", "realizarEdicao"); ?>" method="POST" data-parsley-validate
                              class="form-horizontal form-label-left">
                            <input type="hidden" name="id" value="<?= $conta->id; ?>"/>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vencimento">Data de
                                    recebimento: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="dataRecebimento"
                                           value="<?php echo $conta->dataRecebimento; ?>" id="dataRecebimento"
                                           class="form-control col-md-7 col-xs-12" required="required">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="valor"
                                           value="<?php echo convertMonetario("monetario", $conta->valor); ?>"
                                           id="valor" class="form-control col-md-7 col-xs-12" required="required">
                                    <p class="text-danger erroValor"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Desconto:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="desconto">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success inserirDesconto"
                                                    title="Adicionar desconto">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <p class="text-danger erroValorDesconto"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="fk_cliente" class="form-control">
                                        <option selected=""
                                                value="<?= $conta->idCliente; ?>"><?= $conta->cliente; ?></option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?= $cliente->id; ?>"><?= $cliente->nome; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pago">Recebido: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="recebido" class="form-control">
                                        <option selected=""
                                                value="<?= $conta->recebido; ?>"><?php echo ($conta->recebido == 0) ? "Não" : "Sim"; ?></option>
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?= url("contaReceber", "index"); ?>" class="btn btn-danger" type="button">Cancelar</a>
                                    <button class="btn btn-warning" type="reset">Resetar</button>
                                    <button type="submit" class="btn btn-success inputButton">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>