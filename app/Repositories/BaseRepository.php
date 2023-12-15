<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface{
    public function all($model){
        return $model::paginate(10);
    }
    public function store($model, $data)
    {
        return $model::create($data);
    }

    public function show($model, $id)
    {
        return $model::findOrFail($id);
    }
}
