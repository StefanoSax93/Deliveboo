@extends('layouts.app')

@section('content')
    <div class="container p-3 h-100">
        <h1 class="mb-5">
            Benvenuto <strong>{{ Auth::user()->name }}</strong>

            <div class="my-3">
                @foreach (Auth::user()->categories as $category)
                    {{ $category->name }}
                    @if (!$loop->last)
                        <span class="mx-1">-</span>
                    @endif
                @endforeach
            </div>

        </h1>

        <div class="row h-75 g-3">
            <div class="col-12 col-sm-6">
                <a href="{{ route('admin.dishes.index') }}" class="text-uppercase">
                    <div class="card position-realtive h-100 x overflow-hidden">
                        <img src="{{ asset('img/dishes.jpg') }}" alt="" class="w-100 rounded">
                        <h2>
                            Piatti
                        </h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6">
                <a href="" class="text-uppercase">
                    <a href="{{ route('admin.orders.index') }}" class="text-uppercase">
                        <div class="card position-realtive h-100 x overflow-hidden">
                                <img src="{{ asset('img/orders.jpg') }}" alt="" class="w-100 rounded">
                                <h2>
                                    Ordini
                                </h2>
                        </div>
                    </a>
                </a>
            </div>

        </div>


    </div>
@endsection
