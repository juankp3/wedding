<ul class="nav nav-tabs d-flex">
	<li class="nav-item">
		<a class="nav-link active position-relative" aria-current="page" href="#">
			Todos
			<span class="badge text-bg-secondary">
				<?php echo !empty($totals['total']) ? $totals['total'] : 0 ?>
			</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link position-relative" href="#">Pendientes
			<span class="badge text-bg-secondary">
				<?php echo !empty($totals['pending']) ? $totals['pending'] : 0 ?>
			</span>
		</a>

	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Confirmados
			<span class="badge text-bg-secondary">
				<?php echo !empty($totals['confirm']) ? $totals['confirm'] : 0 ?>
			</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Cancelados
			<span class="badge text-bg-secondary">
				<?php echo !empty($totals['cancelled']) ? $totals['cancelled'] : 0 ?>
			</span>
		</a>
	</li>

</ul>

<table class="table table-striped table-hover table-bordered table-sm " style="min-width: 472px;">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre</th>
			<th scope="col">Pases</th>
			<th scope="col">Teléfono</th>
		</tr>
	</thead>
	<tbody id="content">
		<?php
		$index = 0;
		foreach ($guests as $key => $guest) : $index++;?>
			<tr>
				<th scope="row"><?php echo $index ?></th>
				<td>
					<a class="icon-link" href="#" data-name="<?php echo $guest['name'] ?>" data-status="<?php echo $guest['confirmation'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<?php echo $guest['name'] ?>
					</a>
					<br>
					<?php if (!empty($guest['parent_name'])) : ?>

						<span class="secondary" style="font-size: 12px;">
							<?php echo $guest['parent_name'] ?>
						</span>
					<?php endif ?>
				</td>
				<td><?php echo $guest['qyt_tickets'] ?></td>
				<td>
					<a href="tel:+<?php echo $guest['phone'] ?>" class="icon-link">
						<?php echo $guest['phone'] ?>
					</a>
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>
