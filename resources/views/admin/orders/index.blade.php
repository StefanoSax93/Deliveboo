@extends('layouts.app')

@section('content')
<div class="container p-3">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="title-order" >Tutti gli ordini</h1>
        </div>
        <table class="table">
          <thead>
            <tr>
              {{-- <th>ID</th>
              <th>user_id</th> --}}
              <th>codice</th>
              <th>nome</th>
              <th>cognome</th>
              <th>email</th>
              <th>indirizzo</th>
              <th>telefono</th>
              <th>prezzo totale</th>
              <th>Dettagli ordine</th>
              <th>data ordine</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                {{-- <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td> --}}
                <td>{{ $order->code }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->surname }}</td>
                <td>{{ $order->mail }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->total_price }} €</td>
                
                <td>
                  @foreach($order->dishes as $dish)
                  <div class="mb-3">
                    {{ $dish->name }}: {{$dish->price}} €
                  </div>
                  @endforeach
                </td>
                
                <td>{{ $order->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{$orders->links()}}
      </div>
    </div>
  </div>
@endsection