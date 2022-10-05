<template>
    <div class="nav-section">
        <div class="container">
            <div class="row">
            <div class="col" data-aos="fade-right">
                <div class="team-2 fs-2 fw-bold">#A casa tua con deliveBoo By Team 2</div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div class="search-section" style="z-index:10">
                        <div class="fs-1 fw-bold mb-4" data-aos="fade-down">I piatti che ami, a domicilio.</div>
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid bg-home my-5 position-relative" src="img/bg-home.svg" alt="" style="z-index:10" data-aos="fade-left">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'HomeJumbotron'
    }
</script>

<style>

    .nav-section {
        position: relative;
        background-color: #D0EB99;
        z-index: -1;
    }

    .nav-section::before {
    content: "";
    width: 100%;
    height: 280px;
    position: absolute;
    right: 0;
    background-color: #00ccbc;
    transform: skewY(-4deg);
    transform-origin: left;
    }

    .team-2 {
        position: relative;
        transform: rotate(-4deg);
        top: 300px;
        min-width: 50px;
        max-width: 500px;
    }
    
    .bg-home {
        min-width: 100px;
        max-height: 400px;
    }
</style>