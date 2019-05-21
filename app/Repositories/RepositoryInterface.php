<?php

namespace App\Repositories;

/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Get all resources
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));


    /**
     * Store newly created resource
     *
     * @param array $data
     * @return Object
     */
    public function store(array $data);

    /**
     * Update specific resource.
     *
     * @param array $data
     * @param $id
     * @return bool
     */
    public function update($id, array $data);

    /**
     * Delete specific resource
     *
     * @param $id
     * @return bool
     */
    public function delete($id);


    /**
     * Find specific resource
     *
     * @param $id
     * @param array $columns
     * @return Object
     */
    public function find($id, $columns = array('*'));

}
