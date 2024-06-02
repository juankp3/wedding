<?php
// echo "<pre>";
// var_dump($guest);
// echo "</pre>";



?>
<?php if ($showQR) :  ?>
	<?php if (!empty($guest)) : ?>
		<section class="tickets">
			<h2>Estas Invitado</h2>
			<div class="tickets__family">
				<p class="big"><?php echo $guest['name'] ?></p>
			</div>

			<?php if ($guest['confirmation'] != 'pending') : ?>
				<div>
					<p>Gracias por confirmar tu asistencia</p>
					<p>Por favor presente este codigo QR en la entrada del evento</p>
					<img style="width: 150px;" src="<?php echo APP_UPLOAD_FILE . $guest['token'] . '.png' ?>">
				</div>
			<?php endif ?>

			<?php if ($guest['confirmation'] == 'pending') : ?>
				<div class="tickets__number">
					<?php if ($guest['qyt_tickets'] > 1) : ?>
						<p>Pase para <span><?php echo $guest['qyt_tickets'] ?></span> personas</p>
					<?php else : ?>
						<p>Pase para <span>1</span> persona</p>
					<?php endif ?>
				</div>

				<button class="button" data-toggle="modal" data-target="modal__ticket">
					<i class="fa-solid fa-ticket"></i>
					Confirmar Asistencia
				</button>
				<p>¡Los esperamos!</p>
			<?php endif ?>
		</section>
	<?php endif ?>
<?php endif ?>
