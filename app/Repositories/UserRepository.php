<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements RepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all resources
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->user
            ->select($columns)
            ->with('role')
            ->get();
    }

    /**
     * Store newly created resource
     *
     * @param array $data
     *
     * @return Object
     */
    public function store(array $data)
    {
        return $this->user
            ->create($data);
    }

    /**
     * Update specific resource.
     *
     * @param array $data
     * @param $id
     *
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->user
            ->where('id', $id)
            ->update($data);
    }

    /**
     * Delete specific resource
     *
     * @param $id
     *
     * @return bool
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->user
            ->where('id', $id)
            ->delete();
    }

    /**
     * Find specific resource
     *
     * @param $id
     * @param array $columns
     *
     * @return Object
     */
    public function find($id, $columns = ['*'])
    {
        return $this->user
            ->select($columns)
            ->with('role')
            ->find($id);
    }
}