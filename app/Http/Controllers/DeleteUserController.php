<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Src\Api\User\Infrastructure\DeleteUserController as DeleteUserControllerApi;

class DeleteUserController extends Controller
{
    private DeleteUserControllerApi $deleteUserController;

    public function __construct(DeleteUserControllerApi $deleteUserController)
    {
        $this->deleteUserController = $deleteUserController;
    }

    public function __invoke(Request $request): Response
    {
        return response([],204);
    }
}
