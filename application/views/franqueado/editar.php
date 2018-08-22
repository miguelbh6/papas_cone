<div class="container">
    <div class="row"><h3>Alterar situação do candidato</h3>   </div>
    <?php
    echo validation_errors('<p class="alert alert-danger">');
    if ($this->session->flashdata('msg')) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('msg');
        echo'</p>';
    }
    echo form_open('franqueado/alterarSituacao');
    ?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $franqueado->nome ?>" class="form-control" placeholder="Pergunta" readonly>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>E-mail</label>
            <input type="text" name="email" value="<?php echo $franqueado->email; ?>" class="form-control" readonly>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>Mensagem</label>
            <textarea class="form-control" name="mensagem" rows="5"  maxlength="2000" readonly><?php echo $franqueado->mensagem; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>Situação</label>
            <select name="select-situacao" class="form-control" required>
                <option value="" selected>-- Selecione --</option> 
                <?php foreach ($listaSituacao as $i){ ?>
                    <option value="<?php echo $i->id?>" <?php echo ($franqueado->id_situacao == $i->id ? ' selected="selected"' : '') ?> ><?php echo $i->descricao; ?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>Cidades:</label>
            <ul>
                <?php foreach ($listaCidadePorUsuario as $cidU){ 
                    echo '<li>'. $cidU->nome .'</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input type="hidden" name="id" value="<?php echo $franqueado->id ?>" >
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Atualizar
            </button>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url('franqueado')?>'"><i class="fas fa-backward"></i> Voltar</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>