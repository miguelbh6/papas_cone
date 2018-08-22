
<div class="modal fade" id="edit-modal-<?php echo $it->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <?php
     echo form_open('parametro/salvar', array('id' => 'validation'));
     ?>
     <div class="row">
      <div class="col-md-12 mb-3">
        <label>Sigla</label>
        <input type="text" name="sigla" value="<?php echo $it->sigla; ?>" class="form-control" placeholder="Sigla" required maxlength="50">
      </div>
    </div> 
    <div class="row">
      <div class="col-md-12 mb-3">
        <?php if ($it->sigla == 'ENVIAR_EMAIL_ADMIN') {?>
          <label>Sim</label>
          <input type="radio" name="valor" value="TRUE" class="form-control" required <?php $it->valor == 'TRUE' ? 'checked' :'' ?> >
          <label>Não</label>
          <input type="radio" name="valor" value="FALSE" class="form-control" required <?php $it->valor == 'FALSE' ? 'checked' :'' ?> >
        <?php }else {?>
          <label>Valor</label>
          <input type="text" name="valor" value="<?php echo $it->valor; ?>" class="form-control" placeholder="Valor" required maxlength="100">
        <?php } ?>
      </div>
    </div> 

  </div>
  <div class="modal-footer">
    <div class="row">
      <div class="col-md-2 mb-3">
        <input type="hidden" name="id" value="<?php echo $it->id ?>" >
        <?php echo form_submit('submit', 'Atualizar', 'class="btn btn-primary"') ?>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
</div>
</div>