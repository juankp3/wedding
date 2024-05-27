<style>
	.table-sm>:not(caption)>*>* {
		padding: 10px !important;
	}

	.card-table tbody td:last-child,
	.card-table thead th:last-child {
		padding-right: 0rem !important;
	}
</style>
<div class="card">
	<div class="card-header">
		<h4 class="card-header-title">Mesa 1</h4>
		<!-- <a href="#!" class="btn btn-sm btn-white">Export</a> -->
		<!-- 30 -->
		<a href="#!" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalMembers">
			Agregar
		</a>
	</div>
	<div class="table-responsive mb-0">
		<table class="table table-sm table-nowrap card-table">
			<thead>
				<tr>
					<th>Nro</th>
					<th>Nombre</th>
					<th>Pases</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 1; $i <= 10; $i++) : ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><span>Dianna Smiley</span></td>
						<td>
							<div class="col-auto">2</div>
						</td>
					</tr>
				<?php endfor ?>
			</tbody>
		</table>
	</div>
	<div class="card-footersss">
		<div class="row align-items-center justify-content-between">
			<table class="table table-sm table-nowrap card-table">
				<tr>
					<td>Total</td>
					<td>30</td>
				</tr>
			</table>
		</div>
	</div>
</div>
