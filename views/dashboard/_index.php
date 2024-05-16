<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="row justify-content-between align-items-center mb-5">
                <div class="col-12 col-md-9 col-xl-7">
                    <h2 class="mb-2"><?php echo $user['name']; ?></h2>
                    <p class="text-muted mb-md-0"><?php echo $user['ruc']; ?></p>
                </div>
                <div class="col-12 col-md-auto">
                    <button class="btn btn-primary" onclick="window.location.href='./logout'">
                        Cerrar sesión
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Facturas</h4>
                    <a href="#" style="padding-right: 8px;" class="export">
                        <i class="fas fa-download"></i> Exportar
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="table" class="fs-base">
                        <?php foreach($invoices as $invoice): ?>
                            <tr>
                                <td><a href="#"><?php echo $invoice['display_name']?></a></td>
                                <td><time datetime="<?php echo $invoice['date']?>"><?php echo $invoice['date']?></time></td>
                                <td><?php echo $currency ?> <?php echo $invoice['amount']?></td>
                                <td>
                                    <span class="badge bg-success">Pagado</span>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div id="trafficChartLegend" class="chart-canvas" style="text-align: right;padding: 15px 30px;">
                    <a href="#" class="export">
                        <i class="fas fa-download"></i> Exportar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="./assets/js/dashboard.js?v=1"></script>