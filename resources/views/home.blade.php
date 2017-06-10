@extends('layouts.main-layout')
@section('content')
    <div id="app" class="container">

        <a class="waves-effect waves-light btn" href="#create-store">Create Store</a>

        <div id="create-store" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h6>Create Store </h6>
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

        <div class="row">
            <store-component v-for="store in stores" :key="store.id">
                <template slot="name">@{{ store.name }}</template>
                <template slot="address">@{{ store.address }}</template>
                <template slot="id">@{{ store.id }}</template>
            </store-component>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(".button-collapse").sideNav();
        $('#create-store').modal();
    </script>
@endsection