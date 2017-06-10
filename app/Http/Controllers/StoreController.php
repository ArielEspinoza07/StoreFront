<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Traits\StoreTrait;

class StoreController extends Controller
{
    use StoreTrait;

    public function index()
    {
        return response()->json($this->getStores(),200);
    }
}
