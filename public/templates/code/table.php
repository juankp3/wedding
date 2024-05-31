<!-- <table class="table table-striped table-hover table table-bordered table-sm"> -->
<table class="table table-striped table-hover table-bordered table-sm" style="min-width: 800px">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre</th>
			<th scope="col">Pases</th>
			<th scope="col">Teléfono</th>
			<th scope="col">cxzczxc</th>
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
					<a class="icon-link" href="#" data-name="<?php echo $guest['name'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<?php echo $guest['name'] ?>
					</a>
					<!-- <span class="badge text-bg-danger"> -->
					<!-- <span class="badge text-bg-success"> -->
					<span class="badge text-bg-light">
						<?php echo $guest['confirmation'] ?>
					</span>
				</td>
				<td><?php echo $guest['qyt_tickets'] ?></td>
				<td>
					<a href="tel:+<?php echo $guest['phone'] ?>" class="icon-link">
						<?php echo $guest['phone'] ?>
					</a>
				</td>
				<td>
					<?php echo $guest['date_add'] ?> -
					<?php echo $guest['openinvitation_lastdate'] ?> -
					<?php echo $guest['id_guest_parent'] ?> -
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>
