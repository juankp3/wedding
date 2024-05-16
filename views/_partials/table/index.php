<?php
if (!empty($header)) {
    Flight::render('_partials/table/customTableView.php');
} else {
    Flight::render('_partials/table/tableView.php');
}
