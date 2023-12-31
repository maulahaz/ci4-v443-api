<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class AuthController extends ResourceController
{
    public function index()
    {
        die('index');
    }

    public function accessDenied()
    {
        return $this->respondCreated([
            "status" => false,
            "message" => "Invalid access",
            "data" => []
        ]);
    }

    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function register()
    {
        die('register');
        $rules = [
            "username"  => "required|is_unique[users.username]",
            "email"     => "required|valid_email|is_unique[auth_identities.secret]",
            "password"  => "required"
        ];

        if (!$this->validate($rules)) {

            $response = [
                "status"    => false,
                "message"   => $this->validator->getErrors(),
                "data"      => []
            ];
        } else {

            // User Model
            $userObject = new UserModel();

            // User Entity
            $userEntityObject = new User([
                "username" => $this->request->getVar("username"),
                "email" => $this->request->getVar("email"),
                "password" => $this->request->getVar("password")
            ]);

            $userObject->save($userEntityObject);

            $response = [
                "status" => true,
                "message" => "User saved successfully",
                "data" => []
            ];
        }

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
