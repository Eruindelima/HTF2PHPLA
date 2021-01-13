@extends('layouts.login')

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Nova Conta</h1>
                        <p class="text-lead text-white">Seja bem vindo ao <strong>HotFood</strong>! A sua plataforma de
                            doações.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-control-label pt-4">{{ __('Nome') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="email" class="form-control-label pt-4">{{ __('E-Mail') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="password" class="form-control-label pt-4">{{ __('Senha') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="password-confirm" class="form-control-label pt-4">{{ __('Confirme a Senha') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label pt-4" for="input-address">Endereço</label>
                                    <input id="input-address" class="form-control" placeholder="Home Address" value="Rua: Direita, n° 88 , casa 4" type="text">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-control-label pt-4" for="input-neighborhood">Bairro</label>
                                    <input type="text" id="input-neighborhood" class="form-control" placeholder="neighborhood" value="Vila Guilherme">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label pt-4" for="input-country">CEP</label>
                                    <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-control-label pt-4" for="input-city">Cidade</label>
                                    <input type="text" id="input-city" class="form-control" placeholder="City" value="Taboão da Serra">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="input-country">Estado</label>
                                    <input type="text" id="input-state" class="form-control" placeholder="state" value="São Paulo">
                                </div>

                                <div class="col-lg-6">
                                    <label for="example-tel-input" class="form-control-label">Telefone</label>
                                    <input class="form-control" type="tel" value="(11) 9 5050-5050" id="example-tel-input">
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
