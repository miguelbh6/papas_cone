<style type="text/css">
.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}
.field_title{font-size: 13px;font-family:Arial;width: 300px;margin-top: 10px}
.form_error{font-size: 13px;font-family:Arial;color:red;font-style:italic}
</style>
<script type="text/javascript">
  setTimeout(function() {
    $('#divmessage').css('visibility','hidden')
  }, 7000);
</script>
<div class="container">


  <?php if($this->session->flashdata('msg')): ?>
    <div id="divmessage" class="row">
      <div class="col-md-1"></div>
      <div class="col-md-9" style="margin-top: -15%;">
        <p class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></p>

      </div>
    </div><br><br><br>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11" style="margin-top: -15%;">
      <form class="container" id="validation" action="<?php echo base_url(); ?>site/salvar" method="post" accept-charset="utf-8" role="form">
        <div class="row">
          <div class="col-md-10 mb-3">
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo set_value('nome')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mb-3">
            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" value="<?php echo set_value('telefone')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mb-3">
            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo set_value('email')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mb-3">
            <textarea class="form-control" name="mensagem" rows="5"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mb-3">
            <label>Cidades</label>
            <select multiple class="form-control" name="select_cidades[]" required>
              <?php 
              foreach($cidades as $key => $value){ ?>
                <option value="<?php echo $key ?>"> <?php echo $value ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <span class="input-group-btn"><button href="" type="submit" class="btn btn-primary btn-form display-4">ENVIAR</button></span>
      </form>
    </div>
  </div>
</div>
<script>
  $('#telefone').mask("(99) 99999-9999");
</script>