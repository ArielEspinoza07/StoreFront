<template>
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title"><slot name="name"></slot></span>
                <p><slot name="address"></slot></p>
            </div>
            <div class="card-action">
                <a href="#update-store"  >Update Store</a>
                <a href="#">Articulos</a>
            </div>
        </div>
    </div>
</template>
