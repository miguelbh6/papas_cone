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

<div class="container">
    <div class="col-xs-12 col-sm-12">
        <h3>Inserir Faq</h3>  
        <?php
        echo validation_errors('<p class="alert alert-danger">');
        if ($this->session->flashdata('msg')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('msg');
            echo'</p>';
        }
        echo form_open('introducao/salvar', array('id' => 'validation'));
        ?>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" rows="5" placeholder="Titulo" maxlength="255" required></textarea>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Resposta</label>
                <textarea class="form-control" name="descricao" rows="5" placeholder="Descrição" maxlength="4000" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Salvar
              </button>
          </div>
      </div>
      <?php echo form_close(); ?>
  </div>
</div>