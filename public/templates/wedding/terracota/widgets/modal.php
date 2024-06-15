<!-- Modal confirmAction -->
<!-- <div id="confirm__action" class="modal modal__small">
	<div class="modal__container">
		<div class="modal__header">
			<h2>Confirmación</h2>
		</div>
		<div class="modal__body modal__body--center">
			<p>¿Desea guardar el registro?</p>

		</div>
		<div class="modal__footer">
			<button class="button" data-target="not">
				No
			</button>
			<button class="button button__primary" data-target="yes">
				Sí
			</button>
		</div>
	</div>
</div> -->

<!-- Modal Sugerencias de Canciones -->
<div id="modal__songs" class="modal modal__fullscreen modal__medium">
	<div class="modal__container">
		<div class="modal__header">
			<h2>Sugerencias de Canciones</h2>
			<a href="#" class="modal__close">
				<i class="fa-solid fa-xmark"></i>
			</a>
		</div>
		<div class="modal__body modal__body--center">
			<input type="text" placeholder="Ingresa el nombre de la canción">
			<!-- <textarea id="mysongs" placeholder=""></textarea> -->
		</div>
		<div class="modal__footer">
			<button disabled class="button button__primary" data-target="send-songs">
				Enviar
			</button>
		</div>
	</div>
</div>

<!-- Modal Buenos Deseos -->
<div id="modal__goodwishes" class="modal modal__fullscreen modal__medium">
	<div class="modal__container">
		<div class="modal__header">
			<h2>Buenos Deseos</h2>
			<a href="#" class="modal__close">
				<i class="fa-solid fa-xmark"></i>
			</a>
		</div>
		<div class="modal__body modal__body--center">
			<?php
			$placeholderTexArea = '¡Hola! Deja tus buenos deseos para los novios y comparte tu alegría en este día tan especial.';
			if (!empty($token)) {
				$name = $guest['name'];
				$placeholderTexArea = "¡Hola $name! Deja tus buenos deseos para los novios y comparte tu alegría en este día tan especial.";
			}
			?>
			<textarea id="mygoodwishes" placeholder="<?php echo $placeholderTexArea ?>"></textarea>
		</div>
		<div class="modal__footer">
			<button class="button" data-target="cancel-goodwishes">
				Cancelar
			</button>
			<button disabled class="button button__primary" data-target="send-goodwishes">
				Enviar
			</button>
		</div>
	</div>
</div>

<!-- Fin del Modal -->
<div id="modal__basilica" class="modal">
	<div class="modal__header">
		<h5>Basilica Maria Auxiliadora</h5>
		<a href="#" class="modal__close">
			<i class="fa-solid fa-xmark"></i>
		</a>
	</div>
	<div class="modal__body">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.744031022648!2d-77.04327554820283!3d-12.061124743398315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c2e2890d21%3A0x39a097d3a3566caa!2sBas%C3%ADlica%20Mar%C3%ADa%20Auxiliadora!5e0!3m2!1ses-419!2spe!4v1714261162731!5m2!1ses-419!2spe" width="" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>
<!-- Fin del Modal -->

<!-- Modal Recepción -->
<div id="modal__recepcion" class="modal">
	<div class="modal__header">
		<h5>Club Cascada de Mamacona</h5>
		<a href="#" class="modal__close">
			<i class="fa-solid fa-xmark"></i>
		</a>
	</div>
	<div class="modal__body">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.9241648742995!2d-76.91693942530402!3d-12.253411145782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105bd019fb11cd9%3A0xc42f361d040fd101!2sClub%20Cascada%20de%20Mamacona!5e0!3m2!1ses-419!2spe!4v1714678264645!5m2!1ses-419!2spe" width="" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>
<!-- Fin del Modal -->

<!-- Modal Tickets -->
<div id="modal__ticket" class="modal modal__fullscreen modal__medium">
	<div class="modal__container">
		<div class="modal__header">
			<a href="#" class="modal__close">
				<i class="fa-solid fa-xmark"></i>
			</a>
			<h2>Confirmar Asistencia</h2>
			<p>Marca la asistencia de los invitados</p>
		</div>
		<div class="modal__body">
			<input id="token" type="hidden" value="<?php echo !empty($token) ? $token : '' ?>">
			<div class="modal__list">
				<ul>
					<?php if (!empty($guest)) : ?>
						<li>
							<label for="guest_item<?php echo $guest['id_guest'] ?>">
								<span><?php echo $guest['name'] ?></span>
								<input name="guest_item" id="guest_item<?php echo $guest['id_guest'] ?>" value="<?php echo $guest['id_guest'] ?>" class="modal__list" type="checkbox">
								<div class="item__box"></div>
							</label>
						</li>
					<?php endif ?>
					<?php if (!empty($guest['items'])) : ?>
						<?php foreach ($guest['items'] as $item) : ?>
							<li>
								<label for="guest_item<?php echo $item['id_guest'] ?>">
									<span><?php echo $item['name'] ?></span>
									<input name="guest_item" id="guest_item<?php echo $item['id_guest'] ?>" value="<?php echo $item['id_guest'] ?>" class="modal__list" type="checkbox">
									<div class="item__box"></div>
								</label>
							</li>
						<?php endforeach ?>
					<?php endif ?>
				</ul>
			</div>
		</div>
		<div class="modal__footer">
			<button class="button" data-target="cancel">
				No podré ir
			</button>
			<button disabled class="button button__primary" data-target="confirm">
				Confirmar
			</button>
		</div>
	</div>
</div>
<!-- Fin del Modal -->

<div class="overlay">
	<div class="spinner-border" role="status">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>
