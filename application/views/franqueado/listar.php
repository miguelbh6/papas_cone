<div class="container">
   
<div class="row">
        <div class="col-md-12 mb-3">
            <?php echo form_open('franqueado/search'); ?>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="nome_pesquisa" for="pesquisar" value="" class="form-control" placeholder="Nome">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block">Pesquisar <span class="glyphicon glyphicon-search" aria-hidden="true" /></button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>

    <div class="row">
       <div class="col-md-12 mb-3">
        <h3>Candidatos</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <a href="<?php echo base_url('franqueado/inserir'); ?>" class="btn btn-success margin-button15"><i class="fas fa-plus-circle"></i> Novo</a>
    </div>
</div>

<?php if (!empty($franqueados)) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-sm table-bordered">
                    <thead class="table-dark">
                        <tr class="active">
                            <th class="text-center">Nome</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Situação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($franqueados as $i) { ?>
                        <tr>
                            <td><?php echo $i->nome ?></td>
                            <td><?php echo $i->email ?></td>
                            <td><?php echo $i->situacao ?></td>
                            <td><a href="<?php echo base_url('franqueado/editar/' . $i->id) ?>" title="Detalhes" class="btn btn-warning"><i class="far fa-edit"></i> Situação</span></a>
                                <?php if ($i->id_situacao < 3) { ?>
                                    <a href="<?php echo base_url('franqueado/preaprovar/' . $i->id) ?>" title="Pré Aprovar" class="btn btn-info"><i class="fas fa-gavel"></i> Pré Aprovar</a> <a href="<?php echo base_url('franqueado/reprovar/' . $i->id) ?>" title="Reprovar" class="btn btn-secondary"><i class="fas fa-times-circle"></i> Reprovar</span></a> <a href="<?php echo base_url('franqueado/franquear/' . $i->id) ?>" title="Franquear" class="btn btn-success"><i class="fas fa-thumbs-up"></i> Franquear</span></a>
                                    <a href="<?php echo base_url('franqueado/cancelar/' . $i->id) ?>" title="Cancelar" class="btn btn-light"><i class="fas fa-ban"></i> Cancelar</span></a>
                                    <a href="#" title="Apagar cadastro" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?php echo $i->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                </td>
                            <?php } else{ ?>
                            </td>
                        <?php } ?>
                    </tr>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="delete-modal-<?php echo $i->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
                                    <a class="btn btn-primary" <?php echo 'href="' . base_url('franqueado/remover/' . $i->id) . '"' ?> >Sim</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.modal --> 
                <?php } ?>                       
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Todal de Registros: <?php echo sizeof($franqueados); ?></b>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <p>Não existem registros</p>
        </div>
    </div>
<?php }  ?>
</div>