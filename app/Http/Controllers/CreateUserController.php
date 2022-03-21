<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    private \Src\Api\User\Infrastructure\CreateUserController $createUserController;

    public function __construct(\Src\Api\User\Infrastructure\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    public function __invoke(Request $request): Response
    {
        $this->createUserController->__invoke($request);
        return response('User created',201);
    }

}
