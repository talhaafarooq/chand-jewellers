<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    public function all($model)
    {
        return $model::orderBy('id', 'desc')->paginate(10);
    }

    public function store($model, $data)
    {
        return $model::create($data);
    }

    public function show($model, $id)
    {
        return $model::findOrFail($id);
    }

    public function delete($model, $id)
    {
        return $model::findOrFail($id)->delete();
    }
}
