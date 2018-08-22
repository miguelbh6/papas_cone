<script>
    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }
</script>

<div class="modal fade" id="insert-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Inserir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

        <?php
        echo validation_errors('<p class="alert alert-danger">');
        if ($this->session->flashdata('msg')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('msg');
            echo'</p>';
        }
        echo form_open('parametro/salvar', array('id' => 'validation'));
        ?>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Sigla</label>
                <input type="text" name="sigla" value="" class="form-control" placeholder="Sigla" required maxlength="50">
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Valor</label>
                <input type="text" name="valor" value="" class="form-control" placeholder="Valor" required maxlength="100">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div class="row">
            <div class="col-md-2 mb-3">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Salvar
              </button>
          </div>
      </div>
      <?php echo form_close(); ?>
  </div>
</div>
</div>
</div>