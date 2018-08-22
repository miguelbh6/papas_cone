<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15004.573795894823!2d-43.9423!3d-19.918359!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeefc9cc7cc707662!2sPapas+Cone!5e0!3m2!1spt-BR!2sbr!4v1520998594763" allowfullscreen=""></iframe></div>
        </div>


        <?php if (isset($franquias)){
            foreach ($franquias as $it) {                              
                ?>

                <div class="col-md-6">

                    <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-1"><strong style="color: red;">
                        <?php echo $it->titulo; ?></strong></h2>
                        <div>
                            <div class="icon-contacts pb-3">
                                <h5 class="align-left mbr-fonts-style display-7">
                                    <?php echo $it->descricao; ?>
                                </h5>
                                <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                    <a class="btn btn-md btn-primary display-4" style="border-radius: 100px;" href="<?php echo base_url('site/detalhefranquias');?>">DETALHES</a>
                                </div>

                            </div>
                        </div>
                    </div>


                <?php }}
                ?>
            </div>
        </div>