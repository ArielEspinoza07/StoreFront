@extends('layouts.main-layout')
@section('content')
    <div id="app" class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col s12 m12 cyan darken-1 card" >
                <h3 class="">{{ isset($store) ? $store->name : 'N/A' }}</h3>
                <p>{{isset($store) ? $store->address : 'N/A'}}</p>
                <div class="row">
                    @if(isset($store) && isset($store->articles) && count($store->articles) > 0)
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
                                        <a href="#update-article-{{$article->id}}"><i class="material-icons">create</i></a>
                                        <div id="update-article-{{$article->id}}" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h6>Create Article </h6>
                                                <div class="row">
                                                    <form action="/store/{{$store->id}}/article/{{$article->id}}" method="post">
                                                        <div class="input-field col s12">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="store_id" value="{{$store->id}}">
                                                            <input  id="name" type="text" name="name" value="{{$article->name}}"  class="validate" >
                                                            <label for="name">Name</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <input id="description" type="text" name="description" value="{{$article->description}}"  class="validate" >
                                                            <label for="description">Description</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <input id="price" type="number" min="1" name="price" value="{{$article->price}}"  class="validate" >
                                                            <label for="price">Price</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <input id="total_in_shelf" type="number" min="1" value="{{$article->total_in_shelf}}" name="total_in_shelf"  class="validate" >
                                                            <label for="total_in_shelf">Total in shelf</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <input id="total_in_vault" type="number"min="1" value="{{$article->total_in_vault}}" name="total_in_vault"  class="validate" >
                                                            <label for="total_in_vault">Total in vault</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red lighten-4">Close</a>
                                            </div>
                                        </div>
                                        <a href="/store/{{$store->id}}/article/{{$article->id}}/delete"><i class="material-icons">delete</i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="center">The store do not have articles</h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="fixed-action-btn click-to-toggle">
            <a class="btn-floating btn-large teal lighten-1" >
                <i class="large material-icons">store</i>
            </a>
            <ul>
                <li><a class="btn-floating yellow  lighten-1" href="#edit-store"><i class="material-icons">create</i></a></li>
                <li><a class="btn-floating green  lighten-1" href="#create-article"><i class="material-icons">insert_invitation</i></a></li>
                <li><a href="/store/{{$store->id}}/delete" class="btn-floating red  lighten-1"><i class="material-icons">delete</i></a></li>
                <li><a href="/" class="btn-floating grey   lighten-1"><i class="material-icons">reply</i></a></li>
            </ul>
        </div>

        <div id="edit-store" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h6>Edit Store </h6>
                <div class="row">
                    <form action="/store/{{$store->id}}" method="post">
                        <div class="input-field col s12">
                            {{csrf_field()}}
                            <input  id="name" type="text" name="name"  class="validate" value="{{$store->name}}">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="address" type="text" name="address"  class="validate" value="{{$store->address}}">
                            <label for="address">Address</label>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red lighten-4">Close</a>
            </div>
        </div>

        <div id="create-article" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h6>Create Article </h6>
                <div class="row">
                    <form action="/store/{{$store->id}}/article" method="post">
                        <div class="input-field col s12">
                            {{csrf_field()}}
                            <input type="hidden" name="store_id" value="{{$store->id}}">
                            <input  id="name" type="text" name="name"  class="validate" >
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="description" type="text" name="description"  class="validate" >
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="price" type="number" min="1" name="price"  class="validate" >
                            <label for="price">Price</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="total_in_shelf" type="number" min="1" name="total_in_shelf"  class="validate" >
                            <label for="total_in_shelf">Total in shelf</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="total_in_vault" type="number"min="1" name="total_in_vault"  class="validate" >
                            <label for="total_in_vault">Total in vault</label>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red lighten-4">Close</a>
            </div>
        </div>
    </div>
@endsection
@section('footer-content')
    <h5 class="white-text">{{ isset($store) ? $store->name : 'N/A' }}</h5>
    <p class="grey-text text-lighten-4">{{isset($store) ? $store->address : 'N/A'}}</p>
@endsection
@section('footer-link')@endsection
@section('footer-copyright')
    © 2017 Copyright Text
@endsection
@section('js')
    <script>
        $(".button-collapse").sideNav();
        $('#create-article').modal();
        $('#edit-store').modal();

        @if(isset($store) && isset($store->articles) && count($store->articles) > 0)
            @foreach($store->articles as $article)
                $('#update-article-{{$article->id}}').modal();
            @endforeach
        @endif
    </script>
@endsection