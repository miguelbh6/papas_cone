<div class="container">
    <div class="row">
       <div class="col-md-12 mb-3">
        <h3>Faq</h3>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?php echo base_url('faq/inserir'); ?>" class="btn btn-success margin-button15"><i class="fas fa-plus-circle"></i> Novo</a>
        </div>
    </div>
    <?php if(!empty($listaFaq)){?>   
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table-sm table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Pergunta</th>
                                <th class="text-center">Resposta</th>
                                <th class="text-center">Posição</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <?php
                            foreach ($listaFaq as $faq) : ?>
                                <tr>
                                    <td style="width: 35%;"><?php echo $faq->pergunta ?></td>
                                    <td style="width: 35%;"><?php echo $faq->resposta ?></td>
                                    <td class="text-center"><?php echo $faq->posicao ?></td>
                                    <td style="width: 20%;" class="text-center">
                                        <a href="<?php echo base_url('faq/editar/' . $faq->id) ?>" title="Editar cadastro" class="btn btn-primary"><i class="far fa-edit"></i> Editar</span></a>
                                        <a href="#" title="Apagar cadastro" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?php echo $faq->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-modal-<?php echo $faq->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
                                                <a class="btn btn-primary" <?php echo 'href="' . base_url('faq/remover/' . $faq->id) . '"' ?> >Sim</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.modal -->

                            <?php endforeach; ?>
                        </table> </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination"><b>Todal de Registros: <?php echo sizeof($listaFaq); ?></b></div>
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