<div class="container"> 
<div class="row">
       <div class="col-md-12 mb-3">
        <h3>Lojas</h3>
    </div>
</div>
    <?php 
if (empty($lista)){ ?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?php echo base_url('lojas/inserir'); ?>" class="btn btn-success margin-button15"><i class="fas fa-plus-circle"></i> Novo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo '<p>Não existem registros</p>'; ?>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Titulo</th>
                            <th class="text-center">Sub Titulo</th>
                            <th class="text-center">Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($lista as $it) : ?>
                        <tr>
                            <td style="width: 25%;"><?php echo $it->titulo ?></td>
                            <td style="width: 25%;"><?php echo $it->sub_titulo ?></td>
                            <td style="width: 25%;"><?php echo $it->descricao ?></td>
                            <td style="width: 20%;" class="text-center">
                                <a href="#" title="Apagar cadastro" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?php echo $it->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a></td></tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-modal-<?php echo $it->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                           <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir este item?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" <?php echo 'href="' . base_url('lojas/remover/' . $it->id) . '"' ?> >Sim</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.modal -->

                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination"><b>Todal de Registros: <?php echo sizeof($lista); ?></b></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>