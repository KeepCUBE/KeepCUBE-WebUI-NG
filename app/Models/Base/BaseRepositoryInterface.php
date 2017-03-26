<?php declare(strict_types=1);

namespace KC\Models\Base;

use stdClass;

interface BaseRepositoryInterface {
    /**
     * Find records by id
     * 
     * @param $id
     *
     * @return array
     */
    public function find(int $id): stdClass;
    /**
     * Find all records
     *
     * @return array
     */
    public function findAll(): stdClass;
    /**
     * Find by WHERE statement
     *
     * @return array
     */
    public function findBy(string $column, mixed $value): stdClass;
    /**
     * Create new record
     *
     * @param array $values
     *
     * @return array
     */
    public function create(array $values): stdClass;
    /**
     * Update record by id
     * 
     * @param int $id
     * @param array $values
     *
     * @return void
     */
    public function update(int $id, array $values): bool;
    /**
     * Delete record by id
     *
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): bool;
}