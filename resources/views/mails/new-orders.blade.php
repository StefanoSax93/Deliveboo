@component('mail::message')
    Gentile <strong>{{ $order->name }} {{$order->surname}}</strong>,

    Siamo lieti di dirti che abbiamo ricevuto il tuo ordine!

    Ecco i dettagli del tuo ordine:

    N° ordine: {{$order->code}} 

    Nome:{{ $order->name }}

    Cognome: {{$order->surname}} 

    Importo Totale: {{$order->total_price}} € 

    Cordiali saluti, 
    Deliveboo Team 2
@endcomponent
