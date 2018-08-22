<div class="container">
    <div class="row">
       <div class="col-md-12 mb-3">
        <h3>Parâmetros</h3>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 mb-3">
             <!-- Modal edit-->
                            <?php require_once('inserir.php'); ?>
                           <!-- /.modal edit -->
            <a href="#" class="btn btn-success margin-button15" data-toggle="modal" data-target="#insert-modal"><i class="fas fa-plus-circle"></i> Novo</a>
        </div>
    </div>
    <?php if(!empty($lista)){?>   
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table-sm table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Sigla</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($lista as $it) : ?>
                            <tr>
                                <td style="width: 35%;"><?php echo $it->sigla ?></td>
                                <td class="text-center"><?php echo $it->valor ?></td>
                                <td style="width: 20%;" class="text-center">
                                    <a href="#" title="Editar cadastro" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal-<?php echo $it->id ?>"><i class="far fa-edit"></i> Editar</span></a>
                                    <a href="#<?php echo $it->id; ?>" title="Apagar" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?php echo $it->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                </td>
                            </tr>


                            <!-- Modal delete -->
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
                                            <a class="btn btn-primary" href="<?php echo base_url('parametro/remover/'. $it->id)?>">Sim</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal edit-->
                            <?php require('editar.php'); ?>

                     <?php endforeach; ?>
                 </table> </div>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="pagination"><b>Todal de Registros: <?php echo sizeof($lista); ?></b></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else{ ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo '<p>Não existem registros</p>'; ?>
            </div>
        </div>
    <?php }?>
</div>