<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * Validation Rules for User
     * @var array
     */
    private $rules = [
        'full_name'    => 'sometimes|required',
        'email'        => 'sometimes|required|email',
        'organisation' => 'sometimes|required',
        'country'      => 'sometimes|required',
    ];


    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get List of Users
     */
    function list()
    {
        $users = $this->repository->all();
        $data = [
            'status' => 'success',
            'data'   => $users
        ];

        return response($data, 200);
    }

    /**
     * Create New User
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function create(Request $request)
    {
        $validator = Validator::make($request->except('_token'), $this->rules);

        if ($validator->fails()) {
            $data = [
                'status'  => 'error',
                'message' => $validator->errors()
            ];

        } else {
            $data = [
                'status'  => 'success',
                'message' => 'User created successfully!',
                'data'    => $this->repository->store($request->except('_token')),
            ];
        }

        return response($data);
    }

    /**
     * Update User with given ID
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function update(Request $request, $id)
    {
        $validator = Validator::make($request->except('_token'), $this->rules);

        if ($validator->fails()) {
            $data = [
                'status'  => 'error',
                'message' => $validator->errors()
            ];

        } else {
            $data = [
                'status'  => 'success',
                'message' => 'User updated successfully!',
                'data'    => $this->repository->update($id, $request->except('_token')),
            ];
        }

        return response($data);
    }

    /**
     * Get User Details
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \Exception
     */
    function details($id)
    {
        $data = [
            'status' => 'success',
            'data'   => $this->repository->find($id)
        ];

        return response($data, 200);
    }

    /**
     * Delete User with given ID
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \Exception
     */
    function delete($id)
    {
        $data = [
            'status'  => 'success',
            'message' => 'User deleted successfully',
            'data'    => $this->repository->delete($id),
        ];

        return response($data, 200);
    }
}
