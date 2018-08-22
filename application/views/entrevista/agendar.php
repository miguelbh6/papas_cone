<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="miguelbh6@gmail.com">
    <link rel="icon" href="<?php    echo base_url();?>assets/resources/imgs/favicon.png">
    <title>Papas Cone</title>

    <!-- Bootstrap core CSS -->
    <script src="<?php echo base_url();?>assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php    echo base_url();    ?>assets/jquery/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css">
    <script src="<?php echo base_url();?>assets/jquery/jquery-ui.min.js"></script>

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

        $(function() {
            $("[name='data-entrevista']").datepicker({dateFormat: 'dd/mm/yy'});
        });



    </script>
    <style type="text/css">
    .dot {
      height: 25px;
      width: 25px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
  }
</style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1><img src="<?php       echo base_url();?>assets/images/logo.png" width="40px" /> Agendar entrevista</h1> 
            </div> 
        </div> 
        <div class="row">
            <div class="col-md-12">
                <?php
                echo form_open('entrevista/agendar', 'id=validation');
                ?>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Candidato</label>
                        <input type="text" name="" value="<?php echo $franqueado->nome;?>" class="form-control" readonly>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                     <label>Data</label>     
                     <input type="text" name="data-entrevista" class="form-control" maxlength="10" size="10" onkeypress="return validate(event)" required>
                 </div>
             </div>
             <div class="row">
                <div class="col-md-12 mb-3">
                    <input type="hidden" name="id" value="<?php echo $franqueado->id ?>" >
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-calendar-alt"></i> Agendar
                    </button>
                </div>
            </div>
            <?phpecho form_close();?>
        </div> 
    </div>
</div>
<script>
    $('#datepicker').mask("99/99/9999");
</script>
</body>
</html>