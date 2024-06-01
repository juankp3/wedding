<!-- Modal Basilica -->
<div id="modal__basilica" class="modal">

	<div class="modal__header">
		<h5>Basilica Maria Auxiliadora</h5>
		<a href="#" class="modal__close">
			<i class="fa-solid fa-xmark"></i>
		</a>
	</div>
	<div class="modal__body">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.744031022648!2d-77.04327554820283!3d-12.061124743398315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c2e2890d21%3A0x39a097d3a3566caa!2sBas%C3%ADlica%20Mar%C3%ADa%20Auxiliadora!5e0!3m2!1ses-419!2spe!4v1714261162731!5m2!1ses-419!2spe"
			width="" height="" style="border:0;" allowfullscreen="" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"></iframe>
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
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.9241648742995!2d-76.91693942530402!3d-12.253411145782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105bd019fb11cd9%3A0xc42f361d040fd101!2sClub%20Cascada%20de%20Mamacona!5e0!3m2!1ses-419!2spe!4v1714678264645!5m2!1ses-419!2spe"
			width="" height="" style="border:0;" allowfullscreen="" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>

</div>
<!-- Fin del Modal -->

<!-- Modal Tickets -->
<div id="modal__ticket" class="modal">

	<div class="modal__container">
		<div class="modal__header">
			<a href="#" class="modal__close">
				<i class="fa-solid fa-xmark"></i>
			</a>
			<h2>Confirmar Asistencia</h2>
			<p>Marca la asistencia de los invitados</p>
		</div>
		<div class="modal__body">
			<div class="modal__list">
				<ul>
					<?php for($x = 1; $x <= 10; $x++) { ?>
					<li>
						<label for="guest_item<?php echo $x ?>">
							<span>Invitado</span>
							<input id="guest_item<?php echo $x ?>" class="modal__list" type="checkbox">
						</label>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="modal__btns">
				<button class="button modal__btns--formodal modal__btns--formodalgrey"  data-toggle="" data-target="">
					No podré ir
				</button>
				<button class="button modal__btns--formodal" data-toggle="" data-target="">
					Confirmar
				</button>
			</div>
		</div>
	</div>

</div>
<!-- Fin del Modal -->
