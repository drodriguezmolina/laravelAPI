<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Src\Api\User\Infrastructure\UpdateUserController as UpdateUserControllerApi;

class UpdateUserController extends Controller
{
    private UpdateUserControllerApi $updateUserController;

    public function __construct(UpdateUserControllerApi $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }

    public function __invoke(Request $request): Response
    {
        $updatedUser = new UserResource($this->updateUserController->__invoke($request));
        return response($updatedUser, 200);
    }
}
