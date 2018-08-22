<script>
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    function confirmDialog() {
        return confirm("Você tem certeza que deseja excluir este registro?")
    }
</script>
<div class="container">
<div class="row">
       <div class="col-md-12 mb-3">
        <h3>Entrevistas</h3>
    </div>
</div>
    <?php if(!empty($listaEntrevistas)){?>
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Candidato</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Data entrevista</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($listaEntrevistas as $i) {
                        echo '<tr>';
                        echo '<td style="width: 40%;">' . $i->nome . '</td>';
                        echo '<td style="width: 20%;">' . $i->telefone . '</td>';
                        echo '<td style="width: 25%;">' . $i->email . '</td>';
                        echo '<td>' . $i->data_entrevista . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </table> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pagination"><b>Todal de Registros: <?php echo sizeof($listaEntrevistas); ?></b></div>
        </div>
    </div>
<?php } else{ ?>
   <div class="row">
    <div class="col-md-12">
     <?php echo '<p>Não existem registros</p>'; ?>
 </div>
</div>
<?php }?>

</div>