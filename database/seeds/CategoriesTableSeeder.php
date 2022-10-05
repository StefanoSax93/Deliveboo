<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "Cinese",
                "img" => "cucina-cinese.jpg",
                "description" => "La cucina cinese rappresenta la somma di cucine regionali anche molto diverse e si è evoluta anche in altre parti del mondo con caratteristiche diverse dall'Asia orientale al Nord America, dall'Australia all'Europa occidentale. Si possono distinguere otto cucine regionali: Anhui, Cantonese, Fujian, Hunan, Jiangsu, Shandong, Sichuan e Zhejiang."
            ],
            [
                "name" => "Italiano",
                "img" => "cucina-italiana.jpeg",
                "description" => "La cucina italiana è l'espressione dell'arte culinaria sviluppatasi in Italia,È conosciuta come classico esempio di dieta mediterranea, riconosciuta come patrimonio immateriale dell'umanità dall'UNESCO nel 2010. Inoltre, si tratta di una delle gastronomie più note e apprezzate a livello globale; l'Italia è anche rinomata per la produzione di olio d'oliva, formaggi, salumi, vini, frutta e dolci, che figurano tra gli oltre 5.300 prodotti delle tradizioni regionali."
            ],
            [
                "name" => "Giapponese",
                "img" => "cucina-giapponese.png",
                "description" => "La cucina giapponese è l'espressione dell'arte culinaria sviluppata in Giappone.Uno degli ingredienti principali è il riso, ma sono diffusi anche pasta, pesce, verdure e legumi, conditi solitamente con le varie spezie locali. La carne è generalmente assente dalla cucina tradizionale, ma presente in alcuni piatti di origine straniera come ad esempio il tonkatsu. I piatti più conosciuti sono il sushi, il sashimi, ma anche ramen, udon e soba, oltre a piatti a base di tofu e nattō. Tra le bevande sono diffuse il sakè e il tè verde ed esiste una buona varietà di dolci (wagashi)."
            ],
            [
                "name" => "Greco",
                "img" => "cucina-greco.jpg",
                "description" => "La cucina greca comprende una serie di piatti tipici, vini e dolci diffusi in tutta la Grecia e spesso presenti, con poche variazioni, nei paesi del bacino del MediterraneoLa Grecia vanta una storia plurisecolare che tocca numerosi aspetti della cultura. Uno di essi è proprio la sua tradizione gastronomica, che ha influenzato le culture vicine e ne è stata influenzata sia nell'antichità sia in tempi più recenti."
            ],
            [
                "name" => "Indiano",
                "img" => "cucina-indiana.jpg",
                "description" => "La cucina indiana è l'espressione dell'arte culinaria sviluppata in India. È nota soprattutto per il grande uso che fa di spezie, latte e latticini. Si differenzia in numerose varietà regionali, comunque riferibili a due grandi gruppi: la cucina dell'India del nord, che fa uso di carni ed è meno speziata, e quella del sud, vegetariana e più speziata."
            ],
            [
                "name" => "Spagnola",
                "img" => "cucina-spagnola.jpg",
                "description" => "La cucina spagnola è fortemente radicata nelle tradizioni più antiche e ha il merito di aver promosso dall'inizio del XVI secolo l'ingresso di prodotti nuovi in Europa (patata, pomodoro, mais, cacao, fagioli, ecc.) provenienti dalle Americhe.
                                I piatti tipici sono la paella (riso, zafferano con frutti di mare o carne) e il gazpacho (zuppa fredda)."
            ],
            [
                "name" => "Fast-Food",
                "img" => "fast-food.jpg",
                "description" => "Il fast food è un tipo di ristorazione originatasi nei paesi anglosassoni, veloce da cucinare, consumare, economica e con servizio ridotto al minimo, Si possono incontrare anche fast food ambulanti ovvero cibo di strada."
            ],    
            [
                "name" => "Dolci&Dessert",
                "img" => "dolci-dessert.jpg",
                "description" => "Saper preparare un buon dolce non è cosa da poco, ed il bravo pasticcere è un artista che riesce ad ingolosire, anche i palati più fini, con un'esplosione di sapori ed odori sublimi."
            ],
            [
                "name" => "Pizzeria",
                "img" => "cucina-pizza.jpg",
                "description" => "Specialità gastronomica simbolo della tradizione culinaria italiana, con la sua apparente semplicità la pizza richiede in sede di preparazione maestria e accuratezza estrema nella scelta degli ingredienti."
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
