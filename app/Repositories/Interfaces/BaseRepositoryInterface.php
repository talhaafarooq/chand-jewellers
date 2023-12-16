<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all($model);
    public function store($model, $data);
    public function show($model, $id);
    public function delete($model, $id);
    public function list($model,$firstColumn,$secondColumn);
}
