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
            <h3>Editar Faq</h3>   
            <?php
            echo validation_errors('<p class="alert alert-danger">');
            if ($this->session->flashdata('msg')) {
                echo '<p class="alert alert-success">';
                echo $this->session->flashdata('msg');
                echo'</p>';
            }
            echo form_open('faq/salvar', array('id' => 'validation'));
            ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Pergunta</label>
                    <textarea class="form-control" name="pergunta" rows="5" placeholder="Pergunta"  maxlength="255" required><?php echo $faq->pergunta; ?></textarea>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Resposta</label>
                    <textarea class="form-control" name="resposta" rows="5" placeholder="Resposta" maxlength="255" required><?php echo $faq->resposta; ?></textarea>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Posição</label>
                    <input type="text" name="posicao" value="<?php echo $faq->posicao; ?>" class="form-control" placeholder="Posição" onkeypress="return validate(event)" required maxlength="10">
                </div>
            </div> 
            <div class="row">
                <div class="col-md-2 mb-3">
                    <input type="hidden" name="id" value="<?php echo $faq->id ?>" >
                    <?php echo form_submit('submit', 'Atualizar', 'class="btn btn-primary"') ?>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
</div>