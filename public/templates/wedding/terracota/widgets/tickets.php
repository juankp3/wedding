<?php if (!empty($guest)): ?>
	<section class="tickets">
		<h2>Estas Invitado</h2>
		<div class="tickets__family">
			<p class="big"><?php echo $guest['name']?></p>
		</div>
		<div class="tickets__number">
			<?php if ($guest['qyt_tickets'] > 1) : ?>
				<p>Pase para <span><?php echo $guest['qyt_tickets'] ?></span> personas</p>
			<?php else: ?>
				<p>Pase para <span>1</span> persona</p>
			<?php endif ?>
		</div>
		<button class="button" data-toggle="modal" data-target="modal__ticket">
			<i class="fa-solid fa-ticket"></i>
			Confirmar Asistencia
		</button>
		<p>¡Los esperamos!</p>
	</section>
<?php endif ?>
