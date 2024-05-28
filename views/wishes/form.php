<style>
	.form-label span {
		font-size: 12px;
		color: #b3b3b3;
	}
</style>

<script>
	$(document).ready(function() {

		const inputblock = (number) => {
			return `<div  class="form-group row">
						<div class="col-10 col-sm-10 col-lg-11">
							<input type="hidden" name="guest[id][]" value="">
							<input type="text" name="guest[name][]" class="form-control " placeholder="Invitado ${number}" value="" tabindex="${number}">
						</div>
						<div class="col-2 col-sm-2 col-lg-1">
							<a href="#" class="btn btn-white closeguest">
								<span class="fas fa-close"></span>
							</a>
						</div>
					</div>`;
		};

		const inputQyt = () => {
			const contenedor = $('#contentguest');
				const inputs = contenedor.find('input[type=text]');
				let count = 0;
				inputs.each(function() {
					count++;
				});

				count++;
				return count;
		};

		$("#qyt_tickets").change(function() {
			const qyt = $(this).val()
			const numbers = Array.from({ length: qyt - 1 }, (_, i) => i + 1);

			$("#contentguest").empty();
			$.each(numbers, function( index, value ) {
				let input = inputblock(value + 1)
  			$("#contentguest").append(input)
			});
			showBlockGuests(qyt)
			$("#mainGuest").focus()
		})

		const showBlockGuests = (count) => {
			if (count > 1)
				$("#block-guests").removeClass('d-none')
			else
				$("#block-guests").addClass('d-none')
		};

		const setQytTickets = () => {
			let count = inputQyt()
			console.log('count', count)
			$("#qyt_tickets").val(count)
			showBlockGuests(count)
		};

		$("#addguest").click(function() {
			let number = inputQyt()
			let input = inputblock(number + 1)
			$("#contentguest").append(input)
			setQytTickets()
		})

		$(document).on('click', '.closeguest', function(event) {
			$(this).closest('.form-group').remove()
			setQytTickets()
			event.preventDefault()
  	});
	});
</script>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 col-xl-8">
			<!-- Header -->
			<div class="header mt-md-5">
				<div class="header-body">
					<div class="row align-items-center">
						<div class="col">
							<!-- Title -->
							<h1 class="header-title">
								<?php echo $title ?>
							</h1>
						</div>
					</div>
					<!-- / .row -->
				</div>
			</div>

			<!-- Form -->
			<form class="mb-4" action="" method="post">
				<?php Flight::render('_partials/controls/form.php') ?>

					<div id="block-guests" class="container-xxl <?php echo empty($data['guest']) ? 'd-none' : ''  ?>">
						<hr class="mt-4 mb-4">
						<div class="form-group">
							<label class="form-label">Invitados adicionales</label>
							<small class="form-text text-body-secondary">
								Agregue los nombres de los invitados adicionales para confirmar la asistencia. Si se deja en blanco, el invitado principal elegirá a los otros.
							</small>
							<!-- <input type="hidden" name="guest[id][]" value="">
							<input id="mainGuest" type="text" name="guest[name][]" class="form-control" placeholder="Nombre del invitado principal" value="" tabindex="1"> -->
						</div>
						<div id="contentguest">
							<?php if (!empty($data['guest'])): $index = 1; ?>
								<?php foreach($data['guest'] as $guest):
											$id = !empty($guest['id_guest']) ? $guest['id_guest'] : '';
											$name = !empty($guest['name']) ? $guest['name'] : '';
											$index++
									?>
									<div class="form-group row">
										<div class="col-10 col-sm-10 col-lg-11">
											<input type="hidden" name="guest[id][]" value="<?php echo $id?>">
											<input type="text" name="guest[name][]" class="form-control " placeholder="Invitado <?php echo $index?>" value="<?php echo $name?>" tabindex="<?php echo $index?>">
										</div>
										<div class="col-2 col-sm-2 col-lg-1">
											<a href="#" class="btn btn-white closeguest">
												<span class="fas fa-close"></span>
											</a>
										</div>
									</div>
								<?php endforeach?>
							<?php endif ?>
						</div>
						<button id="addguest" type="button" class="btn btn-outline-secondary mb-2 w-100">
							Añadir
						</button>
					</div>


				<hr class="mt-5 mb-5">
				<button name="saveAndExitButton" type="submit" class="btn btn-primary mb-2 w-100">Guardar y Salir </button>
				<?php
				if (empty($data['id'])): ?>
					<button name="continueButton" type="submit" class="btn btn-secondary mb-2 w-100">Guardar y Agregar otro invitado</button>
				<?php endif ?>
				<a href="<?php echo $current_page ?>" class="btn w-100 btn-link text-muted mt-2">
					Cancelar
				</a>
			</form>

		</div>
	</div>
</div>
