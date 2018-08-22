<div class="container">
    <div class="col-md-12">
<h3>Inserir Quem Somos</h3>
        <?php
        echo validation_errors('<p class="alert alert-danger">');
        if ($this->session->flashdata('msg')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('msg');
            echo'</p>';
        }
        echo form_open_multipart('quemsomos/salvar', array('id' => 'validation'));
        ?>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Titulo</label>
                <input type="text" name="titulo" value="" class="form-control" placeholder="Titulo" required>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Sub Titulo</label>
                <input type="text" name="sub_titulo" value="" class="form-control" placeholder="Sub Titulo" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Descrição</label>
                <textarea class="form-control" name="descricao" rows="5" placeholder="Descrição" maxlength="1000" required></textarea>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Imagem</label>
                <input type="file" name="fileimg01" id="fileimg01" size="20" required/>
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