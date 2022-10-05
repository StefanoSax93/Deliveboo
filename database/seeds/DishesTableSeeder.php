<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [

            [
                "user_id" => "1",
                "name" => "Spaghetti di riso saltati",
                "description" => "Gli spaghetti di riso saltati sono un piatto tipico cinese,La ricetta che vi proponiamo prevede l’utilizzo dei gamberetti, è possibile variare questa preparazione anche con l’utilizzo della carne di pollo o di maiale, a seconda della preferenza. Utilizzate della salsa di soia e del peperoncino piccante per completare la preparazione di questo piatto.",
                "slug" => "Spaghetti di riso saltati",
                "price" => 10.00,
                "dish_img" => "cucina-italiana.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Lasagne alla Bolognese",
                "description" => "Le lasagne alla bolognese sono un primo piatto tradizionale emiliano,Tre le preparazioni base necessarie alla realizzazione di questo piatto: la pasta fresca all'uovo agli spinaci, il ragù bolognese e la besciamella.",
                "slug" => "Lasagne alla Bolognese",
                "price" => 10.00,
                "dish_img" => "cucina-italiana.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Tempura",
                "description" => "una frittura di verdure o pesce realizzata con una pastella leggera a base di farina di riso",
                "slug" => "Tempura",
                "price" => 10.00,
                "dish_img" => "cucina-giapponese.png",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Insalata Greca",
                "description" => "l’insalata greca, a base di pomodori, olive e cetrioli, molto diffusa soprattutto nel periodo estivo",
                "slug" => "Insalata Greca",
                "price" => 10.00,
                "dish_img" => "cucina-greco.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Cheese naan",
                "description" => "Il pane indiano per eccellenza. Questa è la ricetta classica, senza il ripieno cremoso di formaggio",
                "slug" => "Cheese naan",
                "price" => 10.00,
                "dish_img" => "cucina-indiana.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Paella",
                "description" => "La paella è un piatto tradizionale della cucina spagnola a base di riso, zafferano, verdure, carne o frutti di mare.",
                "slug" => "Paella",
                "price" => 10.00,
                "dish_img" => "ciao",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Hamburger",
                "description" => "Fra i più noti piatti da fast food del mondo, è composto da un bun, un hamburger propriamente detto, salse e condimenti.Fra gli ingredienti addizionali che vengono usati per insaporire l'hamburger vi sono formaggio, lattuga, pomodoro, cipolla, sottaceti, pancetta, peperoncino, o salse come ketchup, senape e maionese.",
                "slug" => "Hamburger",
                "price" => 10.00,
                "dish_img" => "fast-food.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Tiramisù",
                "description" => "Il tiramisù classico è il dessert italiano per eccellenza, uno dei più golosi e conosciuti al mondo. Crema al mascarpone e savoiardi al caffè.",
                "slug" => "Tiramisù",
                "price" => 10.00,
                "dish_img" => "dolci-dessert.jpg",
                "availability" => 1
            ],
            [
                "user_id" => "1",
                "name" => "Pizza Margherita",
                "description" => "La pizza è un prodotto gastronomico salato che consiste in un impasto a base di farina, acqua e lievito che viene spianato e condito tipicamente con pomodoro, mozzarella e altri ingredienti e cotto in un forno a legna.",
                "slug" => "Pizza Margherita",
                "price" => 10.00,
                "dish_img" => "cucina-pizza.jpg",
                "availability" => 1
            ]
        ];

        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
    }
}
