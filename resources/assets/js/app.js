
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
// require('./axios');
window.Vue      = require('vue');
window.axios    = require('axios');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
var storeComponent = Vue.component('store-component', require('./components/store.vue'));

const app = new Vue({
    el: '#app',

    data:{
        stores:[],
        newStore:{}
    },

    created:function(){
        this.getStoresApi();
    },

    methods : {
        getStoresApi:function () {
            axios.get('/stores')
                .then(function (response) {
                    app.stores  =   response.data.stores;
                    console.log('Successfully');
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        saveStore:function () {
            var dataRequest = {
                name:app.newStore.name,
                address:app.newStore.address
            };
            console.log(dataRequest);
            axios.post('/stores',dataRequest)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            app.newStore={};
            this.getStoresApi();
        }
    },

    mounted:function(){

    },
    components:{
        storeComponent
    }
});


