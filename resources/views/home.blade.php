@extends('layouts.main-layout')
@section('content')
    <div id="app" class="container">
        <a class="btn btn-primary" data-toggle="modal" href="#create-store">Create Store</a>
        <div class="modal fade" role="dialog" id="create-store">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Crate Store</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <ul v-for="store in stores">
                <li>@{{ store.name }}</li>
            </ul>
        </div>
    </div>
@endsection
@section('js')


@endsection