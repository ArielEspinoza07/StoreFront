<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Traits\StoreTrait;

class StoreController extends Controller
{
    use StoreTrait;

    public function index()
    {
        return response()->json($this->getStoresTrait(),200);
    }

    public function store(Request $request)
    {
        $formRequest    =   $request->except('_token');

        return response()->json($this->saveStoresTrait($formRequest));
    }

    public function show($id)
    {
        return response()->json($this->showStore($id));
    }

    public function update(Request $request,$id)
    {
        $formRequest    =   $request->except('_token');

        return response()->json($this->updateStoresTrait($id,$formRequest));
    }

    public function delete($id)
    {
        return response()->json($this->deleteStoreTrait($id));
    }

    public function articlesStore($id)
    {
        return response()->json($this->showStoreArticlesTrait($id));
    }

    public function showStore($id)
    {
        $store  =   $this->showStoreArticlesTrait($id);

        return view('store')->with(compact('store'));
    }

    public function updateStore(Request $request,$id)
    {
        $formRequest    =   $request->except('_token');
        $this->updateStoresTrait(intval($id),$formRequest);

        return redirect()->route('storesBack.show',['id'=>$id]);
    }

    public function deleteStore($id)
    {
        $this->deleteStoreTrait(intval($id));

        return view('home');
    }

    public function addArticleStore(Request $request)
    {
        $formRequest    =   $request->except('_token');
        $this->addArticleStoresTrait($formRequest);

        return redirect()->route('storesBack.show',['id'=>$formRequest['store_id']]);
    }

    public function updateArticleStore(Request $request,$id,$articleId)
    {
        $formRequest    =   $request->except('_token');
        $this->updateArticleStoresTrait(intval($articleId),$formRequest);

        return redirect()->route('storesBack.show',['id'=>$id]);
    }

    public function deleteArticleStore($id,$articleId)
    {

        $this->deleteArticleStoreTrait($articleId);

        return redirect()->route('storesBack.show',['id'=>$id]);
    }
}
