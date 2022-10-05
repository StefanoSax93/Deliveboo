<template>

    <div class="section-slider pb-5 position-relative">
      <div class="container my-container">
        <div>
          <h3 class="text-success pb-5 text-center">
            SCOPRI CON NOI LA STORIA DELLE CUCINE DEL MONDO
          </h3>
        </div>
        <div class="container">
          <div class="rounded mx-auto d-block">
            <div v-for="i in [currentIndex]" :key="i">
              <img class="my-img rounded mx-auto d-block" :src="currentImg" style="height:400px" data-aos="fade-left" data-aos-duration="1000" />
            </div>
          </div>
          <div class="prev" @click="prev" href="#">&#10094;</div>
          <div class="next" @click="next" href="#">&#10095;</div>
        </div>
    
        <div class="container pt-3">
          <div class="rounded mx-auto d-block bg-black">
            
            <div class="bg-black my-text" v-for="index in [currentIndexStory]" :key="index">
              <p class="text-white  padding-x py-3 px-5" data-aos="fade-in" data-aos-duration="2000">{{currentStory}}</p>
            </div>
            
          </div>
        </div>

      </div>
    </div>
    </template>
    
    <script>
    export default {
      name: "PlateInfo",
      data() {
        return {
          images: [
            "https://www.kikkoman.it/fileadmin/_processed_/d/0/csm_Italien_0525c8ba3c.jpg", //italiana
            "https://www.sfizioso.it/wp-content/uploads/2021/06/piatti-tipici-greci.jpg", //greca
            "https://wips.plug.it/cips/buonissimo.org/cms/2013/05/strumenti-cucina-cinese.jpg", //cinese
            "https://www.bioimis.it/resize_image?id=e4cd7759-dfd7-47ed-9aa9-19234f952c59&w=791&h=500", // Iberica
            "https://s3-eu-west-1.amazonaws.com/fratelliorsero/wp-content/uploads/2019/11/25120833/shutterstock_648560977-1.jpg", //giapponese
            "https://blog.giallozafferano.it/viaggiandomangiando/wp-content/uploads/2019/11/shutterstock_649541308.jpg", //Indiana
            "https://s3.eu-de.cloud-object-storage.appdomain.cloud/pro-strapi-media-library/web_alimentos_ultraprocesados2_f215d111af", //fast-food
            "https://static2-viaggi.corriereobjects.it/wp-content/uploads/2021/09/214892655_6035116193228248_5179461785950087407_n-1080x720.jpeg?v=449399" // Pizza
            ],
            story: [
            " La cucina Italiana è l espressione dell'arte culinaria sviluppatasi in Italia, comprendente tradizioni fortemente radicate e comuni a tutto il paese, nonché l'insieme di tutte le gastronomie regionali, in uno scambio continuo: molti piatti italiani che una volta erano conosciuti solo nelle regioni di provenienza col tempo si sono diffusi in tutto il paese. È conosciuta come classico esempio di dieta mediterranea, riconosciuta come patrimonio immateriale dell'umanità dall'UNESCO nel 2010. Inoltre, si tratta di una delle gastronomie più note e apprezzate a livello globale. Una delle caratteristiche principali della cucina italiana è la sua semplicità, con molti piatti composti da pochi ingredienti: i cuochi italiani fanno affidamento sulla qualità degli ingredienti, piuttosto che sulla complessità di preparazione.",
            "La cucina Greca comprende una serie di piatti tipici, vini e dolci diffusi in tutta la Grecia e spesso presenti, con poche variazioni, nei paesi del bacino del Mediterraneo.Le fonti storiche e archeologiche suggeriscono che la cucina in Grecia antica fosse più articolata in quanto a tecniche e abbinamenti delle sue vicine già prima di Alessandro Magno.l pasto greco si apre con una serie di antipasti detti mezédes (μεζέδες) oppure orektiká (ορεκτικά). Segue un piatto principale che può essere a base di carne o pesce, spesso cucinati alla griglia o alla piastra, oppure un'insalata e formaggi. Seguono i dolci che possono essere al macino forno o al cucchiaio. Onnipresente è l'olio d'oliva, solitamente di alta qualità, che viene impiegato senza risparmio.",
            "La cucina Cinese rappresenta la somma di cucine regionali anche molto diverse e si è evoluta anche in altre parti del mondo con caratteristiche diverse dall'Asia orientale al Nord America, dall'Australia all'Europa occidentale. Si possono distinguere otto cucine regionali: Anhui, Cantonese, Fujian, Hunan, Jiangsu, Shandong, Sichuan e Zhejiang. Nel paleolitico, gli antenati dei cinesi, in particolare l'uomo di Pechino, in base agli scavi e ai resti nel complesso di grotte di Zhōukǒudiàn (周口店), si cibavano prevalentemente di piccoli animali come roditori, chirotteri, insettivori e invertebrati di vario tipo, ma non mancavano anche grandi animali come il mammut, cervidi, bufali, grandi carnivori e tanti altri, la Cina è uno di quei punti del mondo dove è nata l'agricoltura. Intorno al 5400 a.C. I cinesi compensavano il basso consumo di carne con legumi, panico e miglio, ricchi di acidi grassi e proteine, oltre che di carboidrati. Infatti, a differenza della cucina occidentale che usa grassi animali come il burro, ancora oggi i cinesi si servono di olii di semi, come ad esempio olio di semi di soia, di arachidi, di mais ecc.",
            "La cucina Spagnola è fortemente radicata nelle tradizioni più antiche e ha il merito di aver promosso dall'inizio del XVI secolo l'ingresso di prodotti nuovi in Europa (patata, pomodoro, mais, cacao, fagioli, ecc.) provenienti dalle Americhe. I piatti tipici sono la paella (riso, zafferano con frutti di mare o carne) e il gazpacho (zuppa fredda).I piatti, nel peridoo medievale, si dividevano in pietances, piatti a base di carne e pesce di consistenza piuttosto solida, tra cui arrosti, bolliti e empanadas, e cuines, piatti di consistenza pastosa o liquida da bere in ciotole o scodelle e si suddividevano a loro volte in cuines mangiate con il pane e cuines da mangiare con il cucchiaio come le zuppe. Oggi la cucina spagnola è divisa tra i grandi cuochi spagnoli che hanno avuto un riconoscimento internazionale come Ferran Adrià e Santi Santamaria che hanno portato alla ribalta i loro ristoranti: il Bulli, il Racò de Can Fabes e l'attenzione alle cucine regionali grazie alla forte autonomia politica di cui godono le comunità autonome (il corrispettivo delle regioni italiane) che incoraggiano la gastronomia locale o in caso non esista creano una tradizione fenomenale",
            "La storia della cucina giapponese ha inizio nel periodo preistorico (periodo Jōmon) con i primi insediamenti neolitici giapponesi che basavano la loro alimentazione sul riso e sui frutti di mare fin dai primi tempi. Sul periodo Kofun (III-VII secolo) regna l'incertezza. Alcune fonti suggeriscono un quadro di abitudini alimentari ben definito solo a partire dal momento della formazione della dinastia Yamato. Quando il buddismo divenne pratica comune, venne introdotto il divieto di consumazione della carne, che resterà in vigore fino alle Restaurazione Meiji. Durante il periodo Heian, i documenti sull'alimentazione dei giapponesi divennero più numerosi, permettendo di fare un elenco degli ingredienti utilizzati e dei metodi preparazione. Una volta che il Giappone entrò nel periodo Edo, venne introdotta una ricca varietà di cibi e specialità culinarie, la quale andrà a comporre la cucina tradizionale giapponese. Nel periodo Meiji, con l'abolizione del sakoku, diverse specialità straniere andranno a complementare la già ricca lista di piatti giapponesi.",
            "La cucina indiana è l'espressione dell'arte culinaria sviluppata in India. È nota soprattutto per il grande uso che fa di spezie, latte e latticini. Si differenzia in numerose varietà regionali, comunque riferibili a due grandi gruppi: la cucina dell'India del nord, che fa uso di carni ed è meno speziata, e quella del sud, vegetariana e più speziata. La cucina, soprattutto nei Aristotele, viene anche classificata in cucina non vegetariana (indicata da cartelli con la scritta non veg), latto-ovo-vegetariana (veg, senza carni), e latto-vegetariana, detta quasi vegana (pure veg che non fa uso di uova). Praticamente inesistente la cucina vegana propriamente detta, cioè senza neanche latte e latticini.",
            "Il fast food (espressione inglese, letteralmente cibo veloce, in italiano è anche detta ristorazione rapida) è un tipo di ristorazione originatasi nei paesi anglosassoni, veloce da cucinare, consumare, economica e con servizio ridotto al minimo. Si possono incontrare anche fast food ambulanti ovvero cibo di strada, che forniscono cibi rapidi economici e standardizzati. Il pasto veloce offerto con un sistema di ristorazione industriale a partire dagli anni ottanta ha registrato una vasta diffusione a livello mondiale. Il primo ristorante di fish & chips fu aperto nel 1860 in Inghilterra.",
            "Una storia spesso raccontata sostiene che l'11 giugno 1889, in onore della regina consorte d'Italia, Margherita di Savoia, il pizzaiolo napoletano Raffaele Esposito creò la Pizza Margherita, una pizza guarnita con pomodori, mozzarella e basilico, per rappresentare il colori nazionali dell'Italia come sulla bandiera dell'Italia. In realtà, la Margherita esisteva già da diverse decenni: viene descritta in un libro del 1866 insieme alla Marinara (cibo preferito dai pescatori al rientro dal lavoro) e al Calzone e in un’altra pubblicazione del 1830 si parla di una pizza condita con pomodoro, mozzarella e basilico. Nella Napoli del XVI secolo, una focaccia di galette veniva comunemente chiamata pizza. Conosciuto come il piatto per i poveri, veniva venduto per strada e conobbe in fretta un gran successo, fino a diventare un piatto amato anche dai nobili borbonici.",
            ],
          timer: null,
          currentIndex: 0,
          currentIndexStory: 0,
        }
      },
      
        mounted: function() {
          this.startSlide();
        },
      
        methods: {
          startSlide: function() {
            this.timer = setInterval(this.next, 20000);
          },
      
      
          next: function() {
            this.currentIndex += 1
          },
          prev: function() {
            this.currentIndex -= 1
          }
        },
      
        computed: {
          currentImg: function() {
            return this.images[Math.abs(this.currentIndex) % this.images.length];
          },
          currentStory: function(){
            return this.story[Math.abs(this.currentIndex) % this.story.length];
          },
        }
      
    }
    </script>
    
  <style>
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: rgb(0, 0, 0);
  font-weight: bold;
  font-size: 18px;
  transition: 0.7s ease;
  border-radius: 0 4px 4px 0;
  text-decoration: none;
  user-select: none;
} 
/* Position the "next button" to the right */
.next {
  right: 0px;
  transition-delay:0.2s;
}
.prev {
  left: 0px;
  transition-delay:0.2s;

}
/* On hover, add a black background color with a little bit see-through */
/* .prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.9);
}  */
  </style>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped lang="scss">
  h3 {
    margin: 40px 0 0;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  a {
    color: #42b983;
  }
  .my-img{
    object-fit: contain;
    max-width: 50%;

    transition-delay:1s;
  }
  .my-text{
    transition-delay: 1s ;
  }
  </style>
  