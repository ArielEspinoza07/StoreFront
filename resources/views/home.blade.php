@extends('layouts.main-layout')
@section('content')
    <div id="app" class="container" style="margin-top: 20px">

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
                <template slot="actions">
                    <a :href="'/store/'+store.id"><i class="tiny material-icons left">store</i>Show Store</a>
                </template>
            </store-component>
        </div>

        <div class="fixed-action-btn click-to-toggle">
            <a class="btn-floating btn-large teal lighten-1" >
                <i class="large material-icons">store</i>
            </a>
            <ul>
                <li><a class="btn-floating green lighten-1" href="#create-store"><i class="material-icons">insert_invitation</i></a></li>
                {{--<li><a class="btn-floating teal lighten-1" href="#create-article"><i class="material-icons">note_add</i></a></li>--}}
                {{--<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>--}}
                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
            </ul>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(".button-collapse").sideNav();
        $('#create-store').modal();
    </script>
@endsection