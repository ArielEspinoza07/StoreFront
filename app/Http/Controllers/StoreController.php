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

    public function store(Request $request)
    {
        $formRequest    =   $request->except('_token');

        return response()->json($this->saveStores($formRequest));
    }

    public function show($id)
    {
        return response()->json($this->showStore($id));
    }

    public function update(Request $request,$id)
    {
        $formRequest    =   $request->except('_token');

        return response()->json($this->updateStores($id,$formRequest));
    }

    public function delete($id)
    {
        return response()->json($this->deleteStore($id));
    }

    public function showStore($id)
    {
        $store  =   $this->showStoreArticles($id);

        return view('store')->with(compact('store'));
    }
}
