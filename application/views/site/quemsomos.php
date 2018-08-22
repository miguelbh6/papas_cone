<?php if (isset($quemsomos)){ 
	foreach ($quemsomos as $it) { ?>
		

		<div class="mbr-figure" style="width: 75%;">
			<img src="<?php echo base_url() .'upload/img/quemsomos/'.$it->img_1 ?> " alt="">
		</div>

		<div class="media-content">
			<h1 class="mbr-section-title pb-3 align-left mbr-white mbr-fonts-style display-1"><strong>
				<?php echo $it->titulo; ?></strong></h1>
				<h3 class="mbr-section-subtitle align-left  mbr-light pb-3 mbr-white mbr-fonts-style display-5"><strong>
					<?php echo $it->sub_titulo; ?>
				</strong></h3>
				<div class="mbr-section-text  pb-3 ">
					<p class="mbr-text align-left mbr-white mbr-fonts-style display-7"><strong>
						<?php echo $it->descricao; ?>
					</strong></p>
				</div>

				
			</div>


			<?php }}	?>