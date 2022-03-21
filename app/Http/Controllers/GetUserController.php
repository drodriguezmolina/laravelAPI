<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Src\Api\User\Infrastructure\GetUserController as GetUserControllerApi;

class GetUserController extends Controller
{
    private GetUserControllerApi $getUserController;

    public function __construct(GetUserControllerApi $getUserController)
    {
        $this->getUserController = $getUserController;
    }

    public function __invoke(Request $request): Response
    {
        $user = new UserResource($this->getUserController->__invoke($request));
        return response($user,200);
    }

}
