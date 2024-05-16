<?php
$currentPage = $data['currentPage'];
$totalPages =  $data['totalPages'];
?>
<div class="card-footer d-flex justify-content-between">
    <ul class="list-pagination-prev pagination pagination-tabs card-pagination">
        <li class="page-item">
            <a class="page-link ps-0 pe-4 border-end" href="<?php echo  ($currentPage > 1 ? '?page=' . ($currentPage - 1) : '#') ?>"> <i class="fas fa-arrow-left me-1"></i> Prev </a>
        </li>
    </ul>

    <ul class="list-pagination pagination pagination-tabs card-pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="<?php echo ($i == $currentPage ? 'active' : '')?>"><a class="page" href="?page=<?php echo $i ?>" data-i="<?php echo $i ?>" data-page="10"><?php echo $i ?></a></li>
        <?php endfor ?>
    </ul>

    <ul class="list-pagination-next pagination pagination-tabs card-pagination">
        <li class="page-item">
            <a class="page-link ps-4 pe-0 border-start" href="<?php echo  ($currentPage < $totalPages ? '?page=' . ($currentPage + 1) : '#') ?>"> Next <i class="fas fa-arrow-right ms-1"></i> </a>
        </li>
    </ul>

    <!-- por las -->
    <div class="list-alert alert alert-dark alert-dismissible border fade" role="alert">
        <div class="row align-items-center">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" id="listAlertCheckbox" type="checkbox" checked="" disabled="" />
                    <label class="form-check-label text-white" for="listAlertCheckbox"> <span class="list-alert-count">0</span> deal(s) </label>
                </div>
            </div>
            <div class="col-auto me-n3">
                <button class="btn btn-sm bg-white text-white bg-opacity-20 bg-opacity-15-hover">
                    Edit
                </button>
                <button class="btn btn-sm bg-white text-white bg-opacity-20 bg-opacity-15-hover">
                    Delete
                </button>
            </div>
        </div>
        <button type="button" class="list-alert-close btn-close" aria-label="Close"></button>
    </div>

</div>
