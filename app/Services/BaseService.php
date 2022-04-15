<?php

namespace App\Services;

use Illuminate\Container\Container as App;
use InvalidArgumentException;
use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService{
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function all($conditions = [], $columns = array('*'))
    {
        $per_page = request()->per_page ?? 10;
        $paginate = request()->paginate ?? true;
        $query = $this->model;
        // if($paginate)
        //     return $query->where($conditions)->paginate($per_page, $columns);
        // else
        return $query->where($conditions)->get($columns);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id, $attribute = "id")
    {
        try {
            return $this->model->where($attribute, '=', $id)->update($data);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Unable to update data');
        }
    }

    public function delete($id)
    {
        try {
            return $this->model->destroy($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Unable to delete data');
        }
    }

    abstract function model();

    public function makeModel(): Model
    {
        $model = $this->app->make($this->model());
        return $this->model = $model;
    }
}
