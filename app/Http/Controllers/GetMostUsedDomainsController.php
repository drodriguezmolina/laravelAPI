<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use \Src\Api\User\Infrastructure\GetMostUsedDomainsController as GetMostUsedDomainsControllerApi;

class GetMostUsedDomainsController extends Controller
{
    private GetMostUsedDomainsControllerApi $getMostUsedDomainsController;

    public function __construct(GetMostUsedDomainsControllerApi $getMostUsedDomainsController)
    {
        $this->getMostUsedDomainsController = $getMostUsedDomainsController;
    }

    public function __invoke(): Response
    {
        $data = $this->getMostUsedDomainsController->__invoke();
        return response($data,200);
    }
}
