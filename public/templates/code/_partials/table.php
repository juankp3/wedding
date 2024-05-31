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


	</tbody>
</table>
