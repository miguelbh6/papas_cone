<?php if (isset($lojas)){
	foreach ($lojas as $it) {                              
		?>
		<h2 class="lec_gold lec_title_counter"><?php echo $it->titulo; ?></h2>
		<h3 class="lec_gold_subtitle"><?php echo $it->sub_titulo; ?></h3>
		<p><?php echo $it->descricao; ?></p>
	<?php }}
	?>