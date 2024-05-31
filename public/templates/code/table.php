<!-- <table class="table table-striped table-hover table table-bordered table-sm"> -->
<table class="table table-striped table-hover table-bordered table-sm" style="min-width: 472px">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre</th>
			<th scope="col">Pases</th>
			<th scope="col">Teléfono</th>
		</tr>
	</thead>
	<!-- <tbody class="table-group-divider"> -->
	<tbody>
		<?php
		$index = 0;
		foreach ($guest as $guest) : $index++; ?>
			<tr>
				<th scope="row"><?php echo $index ?></th>
				<td>
					<a class="icon-link" href="#" data-name="<?php echo $guest['name'] ?>" data-status="<?php echo $guest['confirmation'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<?php echo $guest['name'] ?>
					</a>
					<!-- <span class="badge text-bg-danger"> -->
					<!-- <span class="badge text-bg-success"> -->
					<!-- <span class="badge text-bg-light"></span> -->
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
