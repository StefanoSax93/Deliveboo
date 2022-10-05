@extends('layouts.app')

@section('content')
    @if ($dish->user->id === Auth::user()->id)
        <div class="container p-4">

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="fw-bold text-uppercase"> {{ $dish->name }}</h1>
                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <line x1="20" y1="12" x2="4" y2="12"></line>
                                <polyline points="10 18 4 12 10 6"></polyline>
                            </svg> <span class="d-none d-md-inline">Torna ai piatti</span>
                        </a>
                    </div>

                    @if (session()->get('message'))
                        <div class="alert alert-success mb-3">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="row mb-3 g-3">
                        <div class="col-12 col-md">
                            @if ($dish->dish_img)
                                <img class="img-fluid rounded w-100" src="{{ asset('storage/' . $dish->dish_img) }}"
                                    style="height: 450px;object-fit: cover">
                            @else
                                <img class="img-fluid rounded" src="{{ asset('img/placeholder.jpg') }}" alt="">
                            @endif

                        </div>
                        <div class="col-12 col-md">
                            <dl>
                                <dt>Nome piatto</dt>
                                <dd>{{ $dish->name }}</dd>
                                <dt>Slug</dt>
                                <dd>{{ $dish->slug }}</dd>
                                <dt>Descrizione</dt>
                                <dd>{{ $dish->description }}</dd>
                                <dt>Prezzo</dt>
                                <dd>{{ $dish->price . '€' }}</dd>
                                <dt>Disponibile</dt>
                                <dd>
                                    @if ($dish->availability === 1)
                                        SI
                                    @else
                                        NO
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>

                    @if ($dish->trashed())
                        <a href="{{ url('admin/restore/' . $dish->slug) }}" class="btn btn-info">
                            <i class="fa-solid fa-lg fa-recycle align-middle"></i> Ripristina</a>
                    @else
                        <a href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                                <line x1="3" y1="22" x2="21" y2="22"></line>
                            </svg> Modifica
                        </a>
                    @endif
                    <form class="d-inline-block" action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                            Elimina
                        </button>

                        @if ($dish->trashed())
                            <!-- Modal piatto cestinato -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg_primary">
                                        <div class="modal-header bg_secondary">
                                            <h5 class="modal-title text-danger" id="staticBackdropLabel"><i
                                                    class="fa-solid fa-triangle-exclamation me-2"></i>Attenzione!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body fw-bold">
                                            Sei sicuro di voler eliminare definitivamente questo elemento?
                                            Ricorda che non potrai più recuperarlo in seguito
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success text-white"
                                                data-bs-dismiss="modal">Chiudi</button>
                                            <button type="submit" class="btn btn-danger text-white">Conferma</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Modal piatto esistente -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg_primary">
                                        <div class="modal-header bg_secondary">
                                            <h5 class="modal-title text-danger" id="staticBackdropLabel"><i
                                                    class="fa-solid fa-triangle-exclamation me-2"></i>Attenzione!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body fw-bold">
                                            Sei sicuro di voler cancellare questo elemento? Potrai comunque recuperarlo
                                            successivamente dalla sezione cestino
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success text-white"
                                                data-bs-dismiss="modal">Chiudi</button>
                                            <button type="submit" class="btn btn-danger text-white">Conferma</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="ms-3 mt-3">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-activity">
                    <line x1="20" y1="12" x2="4" y2="12"></line>
                    <polyline points="10 18 4 12 10 6"></polyline>
                </svg> <span class="d-none d-md-inline">Torna ai piatti</span>
            </a>
        </div>
        <div class="container h-100">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="fs-2 fw-bold text-uppercase">Ops! siamo spiacenti ma non puoi accedere a questa pagina</div>
            </div>
        </div>
    @endif
@endsection
