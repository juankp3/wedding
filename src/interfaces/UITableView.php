<?php

interface UITableViewDataSource
{
    /**
     * return: Retorna una array de Usuario con campos espeficicos
     * id
     * title
     * subtitle
     * picture
     */
    public function dataSource(array $rawdata);

    /**
     * return: Retorna un array de elementos con paginación
     */
    public function tableView(array $datasource);
}

interface UITableViewDelegate
{
    public function willDisplayHeaderView();

}
