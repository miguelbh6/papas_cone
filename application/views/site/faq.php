<!DOCTYPE html>
<html >
<?php require_once('head.php'); ?>
<body>
    <?php require_once('menu.php'); ?>
    <section class="accordion1 cid-r1mnq3VL6W" id="accordion1-p">
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="section-head text-center space30">
                        <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">FAQ
                        </h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-accordion_15" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">

                        <?php
                        if (isset($listaFaq))
                            foreach ($listaFaq as $it) { ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-<?php echo $it->id ?>">
                                        <a role="button" class="panel-title collapsed text-black" data-toggle="collapse" data-core="" href="#collapse1_15-<?php echo $it->id ?>" aria-expanded="false" aria-controls="collapse1">
                                            <h4 class="mbr-fonts-style display-5">
                                                <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>
                                                <?php echo $it->pergunta ?>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="collapse1_15-<?php echo $it->id ?>" class="panel-collapse noScroll collapse " role="tabpanel" aria-labelledby="heading-<?php echo $it->id ?>" data-parent="#bootstrap-accordion_15">
                                        <div class="panel-body p-4">
                                            <p class="mbr-fonts-style panel-text display-7">
                                                <?php echo $it->resposta ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </section>

            <?php require_once('footer.php'); ?>


        </body>
        </html>