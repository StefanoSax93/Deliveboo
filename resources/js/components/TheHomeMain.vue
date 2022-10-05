<template>
    <div>
        <div class="categories-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col pb-4">
                        <h2 class="text-center">Scegli il tipo di cucina che preferisci</h2>
                    </div>
                </div>
                <div class="row">
                    


                    <div class="col-xs-12 pb-4 col-md-4 pb-md-3 ps-3" @click='setCategory(category)'
                        v-for="category in categories"
                        :key="category.id">

                        

                        <a href="#restaurants-section">
                            <div :class="selectedCategory == category.name ? 'cardActive' : '' " class="card-categories overlay">
                                
                                <img class="w-100" v-if="category.img" :src="category.img">
                                <img v-else src="img/placeholder.jpg">
                                <div class="restaurant-details">
                                    <span>{{ category.name }}</span>
                                    <p>Scopri ristoranti {{ category.name}} <i class="fa-solid fa-arrow-right"></i></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="restaurants-section" class="bg-dark text-white" :class="clicked == true ? 'py-5' : '' ">
            <div class="container">
                <div class="fw-bold text-uppercase mb-3">
                    <h2 v-if='onSearch==false && clicked==false'></h2>
                    <h2 v-if='onSearch==false && clicked==true'>Tutti i nostri ristoranti con categoria <span class="text-success">{{selectedCategory}}</span></h2>

                    <!-- da vedere insieme oggi pomeriggio -->
                    <!-- <div v-if="filteredCategory > 0 && onSearch==false" v-for="category in restaurants.categories" :key="category.id"> Hai scelto di vedere: {{category.name}}</div> -->
                    <!-- <div v-for="category in categories">

                        <span v-if="onSearch == false && clicked == true">
                            &#9679;Hai scelto la categoria: <span class="text-success">{{category.name}}</span>
                        </span>
                    </div> -->
                    

                    <h2 v-if='onSearch==true'>Non ci sono ristoranti per questa categoria</h2>
                </div>

                <div class="restaurant-container">
                    <div class="row g-4">
                        <!-- Tutti i ristoranti filtrati -->
                        <div class="col-12 col-md-6 col-lg-4" v-if='filteredRestaurant.length > 0 && onSearch==false' v-for="restaurant in filteredRestaurant">
                            <div class="card" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="100">
                                <router-link :to="{ name: 'TheMenu', params: { slug: restaurant.slug } }" class="text-dark text-decoration-none">
                                    <img class="card-img-top restaurant-img" :src="'Storage/' + restaurant.restaurant_img"
                                        :alt="restaurant.name">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ restaurant.name }}</h5>
                                        <p class="card-text mt-3"><i class="fas fa-map-marker-alt"></i>
                                            {{restaurant.address }}</p>
                                        <span v-for="category in restaurant.categories">&#9679;
                                            {{category.name }} </span>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "TheHomeMain",
    data() {
        return {
            selectedCategory: "all",
            restaurants: [],
            categories: [],
            filteredRestaurant: [],
            onSearch: false,
            clicked: false,
            name:'',
        }
    },
    methods: {
        getCategories() {

            axios
                .get("/api/categories")
                .then((response) => {
                    this.categories = response.data;
                })
        },

        getRestaurants() {

            axios
                .get("/api/restaurants")
                .then((response) => {
                    this.onSearch = false;
                    this.restaurants = response.data;
                })
        },

        filterCategory: function () {
            if (this.selectedCategory == "all") {
                axios
                    .get('/api/restaurants')
                    .then((response) => {
                        this.onSearch = false;
                        this.filteredRestaurant = response.data;
                    });

            } else {
                axios
                    .get('/api/filtered/' + this.selectedCategory)
                    .then((response) => {
                        this.onSearch = false;
                        if (response.data.length > 0) {
                            this.filteredRestaurant = response.data;
                            // console.log(response.data);
                        } else {
                            this.onSearch = true;
                        }
                    });
            }
        },
        setCategory: function (category) {
            this.clicked = true;
            if (this.selectedCategory == 'all') {
                this.selectedCategory = category.name;
                this.filterCategory();
            } else if (this.selectedCategory != 'all' || this.selectedCategory != category.name) {
                this.selectedCategory = category.name;
                this.filterCategory();
            } else if (this.selectedCategory == category.name) {
                this.selectedCategory = 'all';
                this.filterCategory();
            }
        }
    },
    mounted() {
        this.getCategories();
        this.getRestaurants();
    }
}
</script>

<style lang="scss" scoped>
.categories-section {
    background: rgb(255, 234, 228);

    .row {

        .col-xs-12.col-md-4 {
            padding-left: 0;
            padding-right: 0;

            a {
                text-decoration: unset;
                color: white;

                .card-categories {
                    height: 12.5rem;
                    position: relative;
                    display: block;
                    transition: 0.5s;
                    border-radius: .625rem;
                    overflow: hidden;
                    margin-right: 15px;

                    img {
                        height: 100%;
                        object-fit: cover;
                    }

                    .restaurant-details {
                        position: absolute;
                        font-size: 1.5625rem;
                        font-weight: 500;
                        z-index: 20;
                        bottom: 0.125rem;
                        padding: 0 0.5rem;
                        margin-bottom: 0rem;

                        p {
                            font-size: .9375rem;
                            text-decoration: underline;
                        }

                        .fa-arrow-right {
                            margin-left: .4375rem;
                        }
                    }

                    &:hover {
                        opacity: 0.7;
                    }

                }

                .overlay::after {
                    content: "";
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    position: absolute;
                    background: linear-gradient(transparent, #525252);
                    opacity: .8;
                }
            }
        }
    }
}
.cardActive{
    border: 5px solid #00CCBC;
    border-radius: 1rem;
    box-shadow: 1px 2px 10px 5px #00CCBC
}

.restaurant-img {
    height: 220px;
    object-fit: cover;
}
</style>