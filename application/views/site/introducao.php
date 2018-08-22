<div class="row justify-content-md-center">
      <?php if (isset($introducao))
            foreach ($introducao as $it) {                              
                ?>

    <div class="mbr-white col-md-10">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
        <?php echo $it->titulo; ?></h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5">
        <?php echo $it->descricao ?></h1>
        </p>

    </div>

<?php } ?>
</div>