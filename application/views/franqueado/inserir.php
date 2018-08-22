<div class="container">
  <style>
  .field_title{font-size: 13px;font-family:Arial;width: 300px;margin-top: 10px}
  .form_error{font-size: 13px;font-family:Arial;color:red;font-style:italic}
</style>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <form class="container" id="validation" action="<?php echo base_url(); ?>franqueado/salvar" method="post" accept-charset="utf-8">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo set_value('nome')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" value="<?php echo set_value('telefone')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo set_value('email')?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>Mensagem</label>
            <textarea class="form-control" name="mensagem" rows="5"  maxlength="2000"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>Cidades</label>
            <select multiple class="form-control" name="select_cidades[]" required>
              <?php 
              foreach($cidades as $key => $value){ ?>
                <option value="<?php echo $key ?>"> <?php echo $value ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Salvar
            </button>
          </div>
          <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url('franqueado')?>'"><i class="fas fa-backward"></i> Voltar</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
<script>
  $('#telefone').mask("(99) 99999-9999");
</script>