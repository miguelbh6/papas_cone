<section class="header3 cid-r1mGZsYWJR mbr-fullscreen" id="header3-t" style="background-color: #fd0a00; background: linear-gradient(45deg, #fd0a00, #f7ed4a);">

    <div class="container">
        <br><br><br>

        <?php if (isset($detalheproduto))
        foreach ($detalheproduto as $it) {                              
            ?>
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 55%; padding-right: 4rem;">
                    <img src="<?php echo base_url('upload/img/produtos/') . $it->img_1?>">
                </div>

                <div class="media-content">
                    <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
                        <?php echo $it->titulo; ?>
                    </h1>

                    <div class="mbr-section-text mbr-white pb-3 ">
                        <p class="mbr-text mbr-fonts-style display-5">
                            <?php echo $it->descricao ?>
                        </p>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>   
    </div>
    <br><br><br>
</section>