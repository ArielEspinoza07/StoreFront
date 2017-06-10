@extends('layouts.main-layout')
@section('content')
    <div id="app" class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col s12 m12 cyan darken-1 card" >
                <h3 class="">{{ isset($store) ? $store->name : 'N/A' }}</h3>
                <p>{{isset($store) ? $store->address : 'N/A'}}</p>
                <div class="row">
                    @foreach($store->articles as $article)
                        <div class="col s12 m4">
                            <div class="card small blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">{{ isset($article) ? $article->name : 'N/A' }}</span>
                                    <p>Description: {{isset($article) ? $article->description : 'N/A'}}</p>
                                    <p>Price: {{isset($article) ? $article->price : 'N/A'}}</p>
                                    <p>Total in shelf: {{isset($article) ? $article->total_in_shelf : 'N/A'}}</p>
                                    <p>Total in vault: {{isset($article) ? $article->total_in_vault : 'N/A'}}</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">This is a link</a>
                                    <a href="#">This is a link</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal lighten-1" href="#create-article">
                <i class="large material-icons">mode_edit</i>
            </a>
        </div>

        <div id="create-article" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h6>Create Article </h6>
                <div class="row">
                    <div class="input-field col s12">
                        <input  id="name" type="text" v-model="newStore.name" class="validate">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="address" type="text" v-model="newStore.address" class="validate">
                        <label for="address">Address</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" @click="saveStore">Submit</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red lighten-4">Close</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(".button-collapse").sideNav();
        $('#create-article').modal();
    </script>
@endsection