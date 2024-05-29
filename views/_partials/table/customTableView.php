<?php
// echo "<pre>";
// var_dump($header);
// echo "</pre>";
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
?>
<script>
	$(document).ready(function() {
		$(".btn-copy").hover(
			function() {
				$(this).find('.tooltip-inner').html('Copiar&nbsp;link')
				$(this).find('.tooltip').css('display', 'block');
			},
			function() {
				$(this).find('.tooltip').css('display', 'none');
			}
		);

		$(".btn-preview").hover(
			function() {
				$(this).find('.tooltip-inner').html('Vista&nbsp;Previa')
				$(this).find('.tooltip').css('display', 'block');
			},
			function() {
				$(this).find('.tooltip').css('display', 'none');
			}
		);

		$('.copyButton').on('click', function() {
			const obj = $(this)
			const url = obj.data('url');
			console.log('url', url)
			navigator.clipboard.writeText(url).then(function() {
				obj.find('.tooltip-inner').text('Copiado')
			}).catch(function(error) {
				console.error('Error al copiar la URL: ', error);
			});
			// e.preventDefault()
		});
	});
</script>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
	<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<img src="..." class="rounded me-2" alt="...">
			<strong class="me-auto">Bootstrap</strong>
			<small>11 mins ago</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-sm table-hover table-nowrap card-table">
		<thead>
			<tr>
				<?php if ($permissions['modify'] || $permissions['delete']) : ?>
					<th>
						<!-- Checkbox -->
						<div class="form-check mb-n2">
							<input class="form-check-input list-checkbox-all" id="listCheckboxAll" type="checkbox" />
							<label class="form-check-label" for="listCheckboxAll"></label>
						</div>
					</th>
				<?php endif ?>
				<?php
				$countColumn = 0;
				foreach ($header as $head) : $countColumn++; ?>
					<th <?php echo $countColumn == count($header) ? 'colspan="2"' : '' ?>>
						<a class="list-sort text-body-secondary" data-sort="item-name" href="#"><?php echo $head ?></a>
					</th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody class="list fs-base">
			<?php foreach ($data['records'] as $item) : ?>
				<tr>
					<?php if ($permissions['modify'] || $permissions['delete']) : ?>
						<td>
							<div class="form-check">
								<input class="form-check-input list-checkbox" id="listCheckboxEleven" type="checkbox" />
								<label class="form-check-label" for="listCheckboxEleven"></label>
							</div>
						</td>
					<?php endif ?>
					<?php foreach ($item as $key => $field) : ?>
						<td>
							<span class="item-title">
								<?php
								if (is_numeric($field) && $header[$key] == 'Estado') {
									echo ($field) ? '<span class="text-success">●</span> Activo' : '<span class="text-danger">●</span> Inactivo';
								} else {
									echo $field;
								}
								?>
							</span>
						</td>
					<?php endforeach ?>
					<td>
						<?php
						$phone = '';
						foreach ($item as $key => $field) {
							if (is_numeric($field) && $header[$key] == 'Telefono') {
								$phone = $field;
							}
						}
						$url = "https://api.whatsapp.com/send/?phone=$phone&text=Esto es una prueba";
						?>
						<!-- <a href="<?php echo $url ?>" target="_blank" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex">
							<i class="fab fa-whatsapp" style="font-size: 18px;"></i>
						</a> -->


						<?php
						$token = '';
						foreach ($item as $key => $field) {
							if (is_numeric($field) && $header[$key] == 'id') {
								$token = !empty($raw[$field]['token']) ? $raw[$field]['token'] : '';
							}
						}
						$url = $_ENV['BASE_URL'] . '/boda/angelica-y-luis?token=' . $token;
						?>

						<a href="#" data-url="<?php echo $url ?>" class="btn-copy copyButton" aria-describedby="tooltip476679" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex;position:relative">
							<div class="tooltip bs-tooltip-auto fade show" role="tooltip" id="tooltip476679" data-popper-placement="top" style="position: absolute; inset: auto auto 29px -24px; margin: 0px;display:none">
								<div class="tooltip-arrow" style="position: absolute; left: 0px; transform: translate(34px, 0px);"></div>
								<div class="tooltip-inner">Copiar&nbsp;link</div>
							</div>
							<i class="fas fa-link" style="font-size: 18px;"></i>
						</a>

						<a href="<?php echo $url ?>&preview=true" target="_blank" class="btn-preview" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex;position:relative">
							<div class="tooltip bs-tooltip-auto fade show" role="tooltip" id="tooltip476679" data-popper-placement="top" style="position: absolute; inset: auto auto 29px -24px; margin: 0px;display:none">
								<div class="tooltip-arrow" style="position: absolute; left: 0px; transform: translate(34px, 0px);"></div>
								<div class="tooltip-inner">Vista&nbsp;Previa</div>
							</div>
							<i class="fas fa-eye" style="font-size: 18px;"></i>
						</a>

					</td>
					<td class="text-end">
						<?php if ($permissions['modify'] || $permissions['delete']) : ?>
							<div class="dropdown">
								<a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<?php if ($permissions['modify']) : ?>
										<a href="<?php echo $current_page . '/edit/' . $item[0] ?>" class="dropdown-item">
											<i class="fas fa-solid fa-pen" style="margin-right: 4px;"></i>
											Editar
										</a>
									<?php endif ?>

									<?php if ($permissions['delete']) : ?>
										<a href="<?php echo $current_page . '/delete/' . $item[0] ?>" class="dropdown-item" style="color:red;">
											<i class="fas fa-solid fa-trash" style="margin-right: 4px;"></i>
											Eliminar
										</a>
									<?php endif ?>
								</div>
							</div>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
