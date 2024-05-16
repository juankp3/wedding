<?php
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
?>
<div class="table-responsive">
    <table class="table table-sm table-hover table-nowrap card-table">
        <thead>
            <tr>
                <?php if ($permissions['modify'] || $permissions['delete']): ?>
                    <th>
                        <!-- Checkbox -->
                        <div class="form-check mb-n2">
                            <input class="form-check-input list-checkbox-all" id="listCheckboxAll" type="checkbox" />
                            <label class="form-check-label" for="listCheckboxAll"></label>
                        </div>
                    </th>
                <?php endif?>
                <?php
                $countColumn = 0;
                foreach($header as $head): $countColumn++; ?>
                    <th <?php echo $countColumn == count($header)? 'colspan="2"' : 0 ?>>
                        <a class="list-sort text-body-secondary" data-sort="item-name" href="#"><?php echo $head?></a>
                    </th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody class="list fs-base">
            <?php foreach($data['records'] as $item): ?>
                <tr>
                    <?php if ($permissions['modify'] || $permissions['delete']): ?>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input list-checkbox" id="listCheckboxEleven" type="checkbox" />
                                <label class="form-check-label" for="listCheckboxEleven"></label>
                            </div>
                        </td>
                    <?php endif?>
                    <?php foreach($item as $field): ?>
                        <td>
                            <span class="item-title"><?php echo $field?></span>
                        </td>
                    <?php endforeach ?>
                    <td class="text-end">
                        <?php if ($permissions['modify'] || $permissions['delete']): ?>
                            <div class="dropdown">
                                <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <?php if ($permissions['modify']): ?>
                                        <a href="<?php echo $current_page . '/edit/' . $item[0] ?>" class="dropdown-item">
                                            <i class="fas fa-solid fa-pen" style="margin-right: 4px;"></i>
                                            Editar
                                        </a>
                                    <?php endif?>

                                    <?php if ($permissions['delete']): ?>
                                        <a href="<?php echo $current_page . '/delete/'. $item[0] ?>" class="dropdown-item" style="color:red;">
                                            <i class="fas fa-solid fa-trash" style="margin-right: 4px;"></i>
                                            Eliminar
                                        </a>
                                    <?php endif?>
                                </div>
                            </div>
                        <?php endif?>


                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
