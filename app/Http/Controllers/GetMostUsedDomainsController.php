<?php

namespace App\Http\Controllers;

use \Src\Api\User\Infrastructure\GetMostUsedDomainsController as GetMostUsedDomainsControllerApi;

class GetMostUsedDomainsController extends Controller
{
    private GetMostUsedDomainsControllerApi $getMostUsedDomainsController;

    public function __construct(GetMostUsedDomainsControllerApi $getMostUsedDomainsController)
    {
        $this->getMostUsedDomainsController = $getMostUsedDomainsController;
    }
}
