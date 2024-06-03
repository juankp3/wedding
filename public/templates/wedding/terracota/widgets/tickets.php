<?php
// echo "<pre>";
// var_dump($guest);
// echo "</pre>";



?>
<?php if ($showQR) :  ?>
	<?php if (!empty($guest)) : ?>
		<section class="tickets">
			<h2>Estas Invitado</h2>
			<div class="tickets__name">
				<p class="big"><?php echo $guest['name'] ?></p>
			</div>

			<div class="tickets__body">
				<?php if ($guest['confirmation'] != 'pending') : ?>
					<div class="tickets__qr">
						<p class="secondary">Gracias por confirmar tu asistencia</p>
						<p class="small">Por favor presente este codigo QR en la entrada del evento</p>
						<img src="<?php echo APP_UPLOAD_FILE . $guest['token'] . '.png' ?>">
					</div>
				<?php endif ?>

				<?php if ($guest['confirmation'] == 'pending') : ?>
					<div class="tickets__confirmed">
						<div class="tickets__number">
							<?php if ($guest['qyt_tickets'] > 1) : ?>
								<p>Pase para <span><?php echo $guest['qyt_tickets'] ?></span> personas</p>
							<?php else : ?>
								<p>Pase para <span>1</span> persona</p>
							<?php endif ?>
						</div>

						<button class="button button__primary" data-toggle="modal" data-target="modal__ticket">
							<i class="fa-solid fa-ticket"></i>
							Confirmar Asistencia
						</button>
						<p>
							<?php if ($guest['qyt_tickets'] > 1) : ?>
								¡Los esperamos!
							<?php else : ?>
								¡Te esperamos!
							<?php endif ?>
						</p>
					</div>
				<?php endif ?>
			</div>

		</section>
	<?php endif ?>
<?php endif ?>
