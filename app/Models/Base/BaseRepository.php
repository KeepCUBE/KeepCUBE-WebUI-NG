<?php declare(strict_types=1);

namespace KC\Models\Base;

use KC\Models\Base\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use \stdClass;

class BaseRepository implements BaseRepositoryInterface{
    /** 
     * @param Model $model 
     */
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
    /**
     * Find records by id
     * 
     * @param $id
     *
     * @return Model
     */
    public function find(int $id): stdClass {
        $model = $this->model->findOrFail($id);

        return (object)$model->toArray();
    }
    /**
     * Find all records
     *
     * @return Collection
     */
    public function findAll(): stdClass {
        return (object)$this->model->findAll()->toArray();
    }
    /**
     * Find by WHERE statement
     *
     * @param string $column
     * @param mixed $value
     *
     * @return Collection
     */
    public function findBy(string $column, mixed $value): stdClass {
        return $this->model->where($column, $value);
    }
    /**
     * Create new record instance
     *
     * @param array $values
     *
     * @return object
     */
    public function create(array $values): stdClass {
        return (object)$this->model->create($values)->toArray();
    }
    /**
     * Delete record by id
     *
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): bool {
        return $this->model->findOrFail($id)->delete();
    }
    public function update(int $id, array $values): bool {
        return $this->model->findOrFail($id)->update($values);
    }
    /**
     * New query builder instance of this model
     *
     * @return Builder
     */
     public function newQuery(): Builder {
         return $this->model->newQuery();
     }
}