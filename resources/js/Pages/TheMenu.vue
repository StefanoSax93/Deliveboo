<template>
    <div class="bg-light">
        <div id="modal-cart" style="z-index: 5" tabindex="-1"
            class="modal-bg position-fixed top-0 bottom-0 end-0 start-0 d-none align-items-center justify-content-center px-3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg_secondary rounded-top p-3">
                        <h5 class="modal-title text-danger fw-bold">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>Attenzione!
                        </h5>
                    </div>
                    <div class="modal-body bg_primary rounded-bottom p-3 fw-bold">
                        <p>Hai degli elementi nel carrello. <br>
                            Per accedere ad un altro ristorante bisogna
                            svuotare il carrello.
                        </p>

                        <div class="modal-footer">
                            <!-- button to close the modal -->
                            <button class="btn btn-success text-white" @click="closeModalCart()">
                                Continua sulla pagina
                            </button>

                            <button class="btn btn-danger ms-3 text-white" @click="removeAllFromSession()">
                                Svuota carrello
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div>
            <!-- info ristorante -->
            <div class="container py-5">
                <div class="row">
                    <div class="col-4">
                        <img class="top-img" :src="restaurant.restaurant_img" alt="">
                    </div>
                    <div class="col-8">
                        <h1 class="text-uppercase fw-bold">{{restaurant.name}}</h1>
                        <span class="me-2" v-for="category in restaurant.categories">&#9679;{{category.name}}</span>
                        <h5 class="my-3"><strong>Email:</strong> {{restaurant.email}}</h5>
                        <h5 class="my-3"><strong>Telefono:</strong> {{ restaurant.phone }}</h5>
                        <h5><strong>Indirizzo:</strong> {{restaurant.address}}</h5>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container py-5">
                <div class="fs-2 text-uppercase fw-bold mb-3">Scegli i tuoi Piatti</div>
                <div class="row g-4">
                    <!-- lista piatti -->
                    <div class="col-lg-7 col-xl-8 col-12">
                        <div class="row g-3 dish-list">
                            <div class="col-6 col-md-4 col-xl-3" v-for="dish in restaurant.dishes" :key="dish.id">
                                <div class="card" style="height:350px">
                                    <img class="card-img-top restaurant-img" :src="'Storage/' + dish.dish_img"
                                        :alt="dish.name" style="min-height:150px">
                                    <div class="card-body overflow-auto">
                                        <h5 class="card-title">{{ dish.name }}</h5>
                                        <p class="card-text mt-3"><strong>Prezzo:</strong> {{dish.price }}€</p>
                                        <p class="card-text mt-3"><strong>Descrizione:</strong> {{dish.description}}</p>
                                    </div>
                                    <div class="p-3">
                                        <span class="border border-2 border-dark rounded p-1 me-1"
                                            @click="addToCart(dish)"><i class="fa-solid fa-plus"></i></span>
                                        <span class="border border-2 border-dark rounded p-1"
                                            @click="removeOneFromCart(dish)"><i class="fa-solid fa-minus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carrello -->
                    <div class="col-lg-5 col-xl-4 col-12">
                        <div class="pt-3 my-cart border border-1">
                            <h1 class="text-center text-uppercase fw-bold">Il tuo carrello</h1>
                            <div v-for="dish in cart" :key="dish.id" class="row my-3 px-3">
                                <div class="col-3">
                                    <img :src="'Storage/' + dish.dish_img" :alt="dish.name"
                                        class="img-thumbnail img-dish-cart" />
                                </div>

                                <div class="col-9 ">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <!-- title and price -->
                                        <div>
                                            <p class="fw-bold text-uppercase">{{ dish.name }}</p>
                                            <p>
                                                <span>Totale:</span> {{ dish.price * dish.quantity}}€
                                            </p>
                                            <div>
                                                <span>Quantità:</span> {{ dish.quantity }}
                                            </div>
                                        </div>
                                        <div>
                                            <a class="text-decoration-none" href="http://"
                                                @click="removeAllFromCart(dish)"><i
                                                    class="fa-solid fa-trash text-danger"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Checkout -->
                            <div class="mt-4 p-3">
                                <h1 class="text-center">
                                    <i class="fa-solid fa-cart-shopping me-3"></i>Checkout
                                </h1>
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <div class="fs-5">Total price</div>
                                    <div class="fs-5">{{ partialTotal }}€</div>
                                </div>

                                <button type="button" class="btn btn-success text-center w-100 fw-bold text-white"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Vai al pagamento
                                </button>
                                <!-- Payment modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-uppercase" id="staticBackdropLabel">
                                                    Inserisci i tuoi dati
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="pt-3 text-shadow text-uppercase">Metodo di pagamento</h2>
                                                <div id="dropin-container">
                                                </div>
                                                <button id="submit-button"
                                                    class="button button--small button--green w-100"
                                                    @click="purchase">Inserisci la tua carta</button>

                                                <div class=" mb-3 container checkout-open mt-3">
                                                    <h2 class="pt-3 text-shadow text-uppercase">Dati personali</h2>
                                                    <form action="" method="post" enctype="multipart/form-data"
                                                        @submit.prevent="onFormSubmit">
                                                        <div class="form-group my-3">
                                                            <label
                                                                class="fw-semibold text-orange fs-5 pb-1">Nome</label>
                                                            <input type="text" name="name" class="form-control" required
                                                                minlength="1" maxlength="25" v-model="client.name" />
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label
                                                                class="fw-semibold text-orange fs-5 pb-1">Cognome</label>
                                                            <input type="text" name="surname" class="form-control"
                                                                required minlength="1" maxlength="25"
                                                                v-model="client.surname" />
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label
                                                                class="fw-semibold text-orange fs-5 pb-1">Indirizzo</label>
                                                            <input type="text" name="address" class="form-control"
                                                                required minlength="5" maxlength="70"
                                                                v-model="client.address" />
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label class="fw-semibold text-orange fs-5 pb-1">Indirizzo
                                                                e-mail</label>
                                                            <input type="email" name="mail" class="form-control"
                                                                required maxlength="255" v-model="client.mail" />
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <label class="fw-semibold text-orange fs-5 pb-1">Numero di
                                                                telefono</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                required pattern="[0-9]{10}" v-model="client.phone" />
                                                        </div>
                                                        <div id="dropin-container"></div>
                                                        <button id="submit-button" class="btn btn-warning">
                                                            Conferma pagamento
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- <div v-else class="container py-5 my-5">
            <div class="py-5 my-5 text-center display-1 text-uppercase fw-bold">
                questo ristorante non esiste
            </div>
        </div> -->

</template>

<script>
import axios from 'axios';

export function round(number, precision) {
    "use strict";
    precision = precision ? +precision : 0;
    var sNumber = number + "",
        periodIndex = sNumber.indexOf("."),
        factor = Math.pow(10, precision);
    if (periodIndex === -1 || precision < 0) {
        return Math.round(number * factor) / factor;
    }
    number = +number;
    // sNumber[periodIndex + precision + 1] is the last digit
    if (sNumber[periodIndex + precision + 1] >= 5) {
        // Correcting float error
        // factor * 10 to use one decimal place beyond the precision
        number += (number < 0 ? -1 : 1) / (factor * 10);
    }
    return +number.toFixed(precision);
}

export default {
    data() {
        return {
            restaurant: {},
            cart: {},
            quantity: 1,
            partialTotal: 0,
            total: 0,
            client: {
                name: "",
                surname: "",
                mail: "",
                phone: "",
                address: "",
            },
        }
    },
    mounted() {
        axios.get("/api/" + this.$route.params.slug)
            .then((resp) => {
                this.restaurant = resp.data
                console.log(this.restaurant)
            }),
            this.cart = JSON.parse(localStorage.getItem("cart"));
        this.partialTotal = JSON.parse(localStorage.getItem("partialTotal"));
        this.total = JSON.parse(localStorage.getItem("total"));
    },
    methods: {
        makeCode(length) {
            let result = '';
            let characters = '0123456789';
            let charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        },
        onFormSubmit() {
            let order_client = {
                name: this.client.name,
                surname: this.client.surname,
                address: this.client.address,
                phone: this.client.phone,
                mail: this.client.mail,
                code: this.makeCode(3) + '-' + this.makeCode(7) + '-' + this.makeCode(7),
                total_price: this.total,
                user_id: this.restaurant.id,
            };
            
            let dishes = [];
            this.cart.forEach((dish) => {
                dishes.push({
                    quantity: dish.quantity,
                    subtotal: round(dish.price * dish.quantity, 2),
                    dish_id: dish.id,
                });
            });
            axios.post("/api/orders", { dishes: dishes, ...order_client })
                .then(resp => {
                    this.removeAllFromSession();
                    window.location.href = "http://127.0.0.1:8000/success"
                })
        },
        // queste due funzioni danno errore se cerchiamo di selezionare dei piatti diversi da ristoranti diversi
        showDetails(id) {
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-none", "d-flex");
        },
        hideDetails(id) {
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-flex", "d-none");
        },

        // this function add dishes to cart
        addToCart(dish) {
            if (localStorage.getItem("cart") != null) {
                if (this.cart[0].user_id != this.restaurant.id) {
                    this.checkCart();
                    this.addToCart().preventDefault();
                }
            }
            if (localStorage.getItem("cart") == null) {
                localStorage.setItem("cart", JSON.stringify([]));
            }
            let cart = JSON.parse(localStorage.getItem("cart"));
            let index = cart.findIndex((item) => item.id == dish.id);
            if (index == -1) {
                dish.quantity = 1;
                cart.push(dish);
            } else {
                cart[index].quantity++;
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            this.cart = JSON.parse(localStorage.getItem("cart"));
            this.partialTotal = round(
                this.cart.reduce(
                    (acc, dish) => acc + dish.price * dish.quantity,
                    0
                ),
                2
            );
            localStorage.setItem(
                "partialTotal",
                JSON.stringify(this.partialTotal)
            );
            this.total = this.partialTotal;
            localStorage.setItem("total", JSON.stringify(this.total));
        },
        //check if the dish user_id has the same id of the restaurant, if not, 
        //show a popup with a button that allow to empty the cart and another button that allow to go back to the restaurant page
        checkCart() {
            if (this.cart.length > 0) {
                if (this.cart[0].user_id != this.restaurant.id) {
                    let modal = document.getElementById("modal-cart");
                    modal.classList.replace("d-none", "d-flex");
                }
            }
        },

        closeModalCart() {
            let modal = document.getElementById("modal-cart");
            modal.classList.replace("d-flex", "d-none");
        },


        removeAllFromSession() {
            localStorage.removeItem("cart");
            localStorage.removeItem("partialTotal");
            localStorage.removeItem("total");
            this.cart = [];
            this.partialTotal = 0;
            this.total = 0;
            this.closeModalCart();

        },
        removeOneFromCart(dish) {
            if (this.cart && this.cart.length > 0) {
                let cart = JSON.parse(localStorage.getItem("cart"));
                let index = this.cart.findIndex((item) => item.id == dish.id);
                if (index !== -1) {
                    cart[index].quantity--;
                    if (cart[index].quantity == 0) {
                        cart.splice(index, 1);
                    }
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                this.cart = JSON.parse(localStorage.getItem("cart"));
                this.partialTotal = round(
                    this.cart.reduce(
                        (acc, dish) => acc + dish.price * dish.quantity,
                        0
                    ),
                    2
                );
                localStorage.setItem(
                    "partialTotal",
                    JSON.stringify(this.partialTotal)
                );
                this.total = this.partialTotal + this.restaurant.delivery_price;
                localStorage.setItem("total", JSON.stringify(this.total));
                if (this.cart.length == 0) {
                    localStorage.removeItem("cart");
                    localStorage.removeItem("partialTotal");
                    localStorage.removeItem("total");
                    this.partialTotal = 0;
                    this.total = 0;
                }
            }

        },
        removeAllFromCart(dish) {
            let cart = JSON.parse(localStorage.getItem("cart"));
            let index = cart.findIndex((item) => item.id == dish.id);
            if (index !== -1) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            this.cart = JSON.parse(localStorage.getItem("cart"));
            this.partialTotal = round(
                this.cart.reduce(
                    (acc, dish) => acc + dish.price * dish.quantity,
                    0
                ),
                2
            );
            localStorage.setItem(
                "partialTotal",
                JSON.stringify(this.partialTotal)
            );
            this.total = this.partialTotal;
            localStorage.setItem("total", JSON.stringify(this.total));
            if (this.cart.length == 0) {
                localStorage.removeItem("cart");
                localStorage.removeItem("partialTotal");
                localStorage.removeItem("total");
                this.partialTotal = 0;
                this.total = 0;
            }
        },
        purchase() {
            var button = document.querySelector('#submit-button');

            braintree.dropin.create({
                authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
                selector: '#dropin-container'
            }, function (err, instance) {
                if (err) {
                    // An error in the create call is likely due to
                    // incorrect configuration values or network issues
                    return;
                }

                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                        if (err) {
                            // An appropriate error will be shown in the UI
                            return;
                        }

                        // Submit payload.nonce to your server
                    });
                })
            });
        },
    }
}
</script>


<style lang="scss" scoped>
.button {
    cursor: pointer;
    font-weight: 500;
    left: 3px;
    line-height: inherit;
    position: relative;
    text-decoration: none;
    text-align: center;
    border-style: solid;
    border-width: 1px;
    border-radius: 3px;
    -webkit-appearance: none;
    -moz-appearance: none;
    display: inline-block;
}

.button--small {
    padding: 10px 20px;
    font-size: 0.875rem;
}

.button--green {
    outline: none;
    background-color: #64d18a;
    border-color: #64d18a;
    color: white;
    transition: all 200ms ease;

    &:hover {
        background-color: #8bdda8;
        color: white;
    }
}

.top-img {
    width: 100%;
    min-height: 120px;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

.dish-list {
    max-height: 640px;
    overflow-x: hidden;
    overflow-y: auto;
    scrollbar-width: auto;
    scrollbar-color: transparent;

    /* Chrome, Edge, and Safari */
    &::-webkit-scrollbar {
        width: 0px;
    }

    &::-webkit-scrollbar-track {
        background: #ffffff;
    }

    &::-webkit-scrollbar-thumb {
        background-color: #00ccbc;
        border-radius: 10px;
        border: 3px solid #ffffff;
    }
}

.my-card {
    width: 100%;
    height: 200px;
}

.restaurant-img {
    height: 150px;
    object-fit: cover;
}

.img-dish-cart {
    height: 100px;
    width: 100%;
    object-fit: cover;
}

.my-cart {
    max-height: 400px;
    background-color: white;
    overflow-x: hidden;
    overflow-y: auto;
    scrollbar-width: auto;
    scrollbar-color: #00ccbc #ffffff;

    /* Chrome, Edge, and Safari */
    &::-webkit-scrollbar {
        width: 16px;
    }

    &::-webkit-scrollbar-track {
        background: #ffffff;
    }

    &::-webkit-scrollbar-thumb {
        background-color: #00ccbc;
        border-radius: 10px;
        border: 3px solid #ffffff;
    }
}

.card-body {

    
    scrollbar-width: auto;
    scrollbar-color: #D0EB99 #ffffff;
    
    &::-webkit-scrollbar {
        width: 16px;
    }

    &::-webkit-scrollbar-track {
        background: #ffffff;
    }

    &::-webkit-scrollbar-thumb {
        background-color: #D0EB99;
        border-radius: 10px;
        border: 3px solid #ffffff;
    }
}
</style>