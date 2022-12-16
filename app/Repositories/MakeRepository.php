<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class MakeRepository
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = new $model();
    }

    public function all($filterName,$filter,$sort,$direction,$pagination=10)
    {
        return $this->model::$filterName($filter)->orderby($sort,$direction)->paginate($pagination);
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }



}
