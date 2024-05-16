<?php

interface Repository
{
    const EDIT = true;

    // Llamada al modelo para mostrar una lista de recursos
    public function index();

    // Llamada al modelo para crear una entidad
    public function create();

    // Llamada al modelo para actualizar una entidad
    public function update($id);

    // Llamada al modelo para eliminar un recurso
    public function delete($id);

    public function form($viewForm = null);
}


