@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Creazione nuovo piatto</h1>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <line x1="20" y1="12" x2="4" y2="12"></line>
                            <polyline points="10 18 4 12 10 6"></polyline>
                        </svg> <span class="d-none d-md-inline">Torna ai piatti</span>
                    </a>
                </div>

                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- nome piatto --}}
                    <div class="mb-3">
                        <label class="form-label">Nome piatto</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Inserisci il nome del piatto" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- immagine piatto --}}
                    <div class="mb-3">
                        <label for="dish_img" class="form-label">Immagine piatto</label>
                        <div class="d-flex">
                            <input type="file" name="dish_img"
                                class="form-control @error('dish_img') is-invalid @enderror" id="dish_img"
                                value="{{ old('dish_img') }}">
                        </div>
                        @error('dish_img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- prezzo piatto --}}
                    <div class="mb-3">
                        <label class="form-label">Prezzo piatto</label>
                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- descrizione piatto --}}
                    <div class="mb-3">
                        <label class="form-label">Descrizione piatto</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10"
                            placeholder="Inizia a scrivere qualcosa..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg> Crea piatto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection