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
		$(".btn-clipboard").hover(
			function() {
				$(this).find('.tooltip').css('display', 'block');
			},
			function() {
				$(this).find('.tooltip').css('display', 'none');
			}
		);
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
						<!-- <i class="fa-brands fa-whatsapp"></i>
						<span class="fa fa-whatsapp"></span> -->
						<a href="https://api.whatsapp.com/send/?phone=51949175165&text=Esto es una prueba" target="_blank" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex">
							<i class="fab fa-whatsapp" style="font-size: 18px;"></i>
						</a>

						<!-- <a href="https://api.whatsapp.com/send/?phone=51949175165&text=Esto es una prueba" target="_blank" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex">
							<i class="fas fa-check" style="font-size: 18px;"></i>
						</a> -->

						<a href="http://localhost:4002/boda/angelica-y-luis" class="btn-clipboard" aria-describedby="tooltip476679" target="_blank" style="color:#6e84a3;padding: 4px 6px;margin: 0px 2px;display:inline-flex;position:relative">
							<div class="tooltip bs-tooltip-auto fade show" role="tooltip" id="tooltip476679" data-popper-placement="top" style="position: absolute; inset: auto auto 29px -24px; margin: 0px;display:none">
								<div class="tooltip-arrow" style="position: absolute; left: 0px; transform: translate(34px, 0px);"></div>
								<div class="tooltip-inner">Copiar&nbsp;link</div>
								<!-- <div class="tooltip-inner">Copiado</div> -->
							</div>
							<i class="fas fa-link" style="font-size: 18px;"></i>
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
