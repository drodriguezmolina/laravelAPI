<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Src\Api\User\Infrastructure\CreateUserController as CreateUserControllerApi;

class CreateUserController extends Controller
{
    private CreateUserControllerApi $createUserController;

    public function __construct(CreateUserControllerApi $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    public function __invoke(Request $request): Response
    {
        $token = $this->createUserController->__invoke($request);
        return response([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],201);
    }

}
