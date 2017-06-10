<?php

namespace App\Http\Controllers;

use App\Util\GuzzleHelper;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public $guzzle;

    public function __construct(GuzzleHelper $guzzleHelper)
    {
        $this->guzzle   =   $guzzleHelper;
    }
}
