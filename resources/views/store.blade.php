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
                                    <p>{{isset($article) ? $article->description : 'N/A'}}</p>
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
    </div>
@endsection
@section('js')
    <script>
        $(".button-collapse").sideNav();
        $('#create-store').modal();
    </script>
@endsection