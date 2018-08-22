<div class="container">
    <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-1"><strong style="color: white;">
    Produtos</strong></h2>
    <div class="media-container-row">

        <?php if (isset($produto))
        foreach ($produto as $it) {                              
            ?>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="<?php echo base_url().'upload/img/produtoscategoria/'. $it->img; ?>" alt="" width="300px" height="350px">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            <?php echo $it->nome; ?>
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <?php echo $it->descricao; ?>
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="<?php echo base_url('site/detalheproduto/'). $it->id; ?>" class="btn btn-primary display-4">
                            Leia Mais
                        </a>
                    </div>
                </div>
            </div>


        <?php } ?>   

    </div>
</div>
