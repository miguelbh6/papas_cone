<div class="container">
    <div class="col-md-12">
<h3>Inserir Produtos</h3>
        <?php
        echo validation_errors('<p class="alert alert-danger">');
        if ($this->session->flashdata('msg')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('msg');
            echo'</p>';
        }
        echo form_open_multipart('promocao/salvar', array('id' => 'validation'));
        ?>

        <div class="row">
        </div> 
        <div class="row">
            <div class="col-md-12 mb-3">
                <input type="text" name="descricao" value="" class="form-control" placeholder="Descrição" required>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Imagem</label>
                <input type="file" name="fileimg01" size="20" required/>
            </div>
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