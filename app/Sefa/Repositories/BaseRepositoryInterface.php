<?php namespace Sefa\Repositories;

interface BaseRepositoryInterface {

    /**
     * Get al data
     * @return mixed
     */
    public function all();

    /**
     * Get data with paginate
     * @param null $perPage
     * @return mixed
     */
    public function paginate($perPage = null);

    /**
     * Get data by id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new data
     * @param $attributes
     * @return mixed
     */
    public function create($attributes);

    /**
     * Update data
     * @param $id
     * @param $attributes
     * @return mixed
     */
    public function update($id, $attributes);

    /**
     * Delete data by id
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}