@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg_primary">
                    <div class="card-header bg_secondary">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Restaurant-name --}}

                            <div class="form-group row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }} <span
                                        class="ms-2 text-danger"><i class="fa-solid fa-pizza-slice"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span
                                        class="ms-2 text-muted"><i class="fa-solid fa-envelope"></i></span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                    <span class="ms-2 text-success"><i class="fa-solid fa-key"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- confirm password --}}

                            <div class="form-group row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span
                                        class="ms-2 text-success"><i class="fa-solid fa-key"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- address --}}

                            <div class="form-group row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}
                                    <span class="ms-2 text-dark"><i class="fa-solid fa-building"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- phone --}}

                            <div class="form-group row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}
                                    <span class="ms-2 text-secondary"><i class="fa-solid fa-phone"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- vat --}}

                            <div class="form-group row mb-3">
                                <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('VAT') }}
                                    <span class="ms-2 text-warning"><i class="fa-solid fa-percent"></i></span> </label>

                                <div class="col-md-6">
                                    <input id="vat" type="text"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" required autocomplete="vat" autofocus>

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="form-group row mb-3">
                                <label for="restaurant_img_file"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Image') }}
                                    <span class="ms-2 text_secondary"><i class="fa-solid fa-image"></i></span> </label>
                                </label>

                                <div class="col-md-6">
                                    <input type="file" name="restaurant_img"
                                        class="form-control @error('restaurant_img') is-invalid @enderror"
                                        id="restaurant_img_file" value="{{ old('restaurant_img') }}">
                                </div>
                                @error('restaurant_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- categories --}}

                            <div class="form-group margin row mb-3">
                                <label for="categories"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}
                                    <span class="ms-2 text-info"><i class="fa-solid fa-cat"></i></span> </label>
                                </label>

                                <div class="border border-2 rounded border-light text-center py-3 col-md-6">
                                    @foreach ($categories as $category)
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input"
                                                id="category-{{ $category->id }}" name="categories[]"
                                                value="{{ $category->id }}">
                                            <label class="form-check-label"
                                                for="category-{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary text-light">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
