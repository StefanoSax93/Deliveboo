@component('mail::message')
    Congratulazioni <strong>{{ $order->user->name }} !</strong>,

    Hai ricevuto un nuovo ordine!

    Ecco i dettagli del tuo ordine:

    N° ordine: {{$order->code}} 

    Nome:{{ $order->name }}

    Cognome: {{$order->surname}} 

    Importo Totale: {{$order->total_price}} € 

    Cordiali saluti,
    Deliveboo Team 2
@endcomponent
