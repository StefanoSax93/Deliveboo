<template>
    <!-- nav-section -->
    <div class="my-nav">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-logo text-decoration-none" href="/">
                    <!-- deliveboo logo -->
                    <img class="logo" src="img/unnamed.png" alt="deliveboo logo">
                    <span class="fw-bold text-white">deliveBoo</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav ms-auto">
                        <div class="d-flex justify-content-end mt-3">
                            <div v-if="user">
                                <a href="/admin" class="btn btn-light text-decoration-none">Admin</a>
                            </div>

                            <div v-else>
                                <a href="/login" class="btn btn-light text-decoration-none">Accedi al tuo ristorante</a>
                                <a href="/register" class="btn btn-light ms-3 text-decoration-none">Registra un nuovo
                                    ristorante</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

import Axios from 'axios';

export default {
    name: "TheNavbar",
    data() {
        return {
            user: null
        }
    },
    mounted() {
        Axios.get("/api/user")
            .then(resp => {
                this.user = resp.data
            })
    }
}
</script>

<style>
.container {
    min-width: 300px;
}

.logo {
    width: 50px;
    height: 50px;
}

.my-nav {
    background-color: #00CCBC;
}

.search-title {
    color: #440263;
}

.search-btn {
    background-color: #00CCBC;
}

.signin {
    color: #00CCBC;
}

.search {
    height: 170px;
    min-width: 300px;
}

.form-control {
    min-width: 100px;
    margin-right: 10px;
}
</style>