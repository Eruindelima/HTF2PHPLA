@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">{{ Auth::user()->name}}</h3>
</div>
<div class="card-footer py-4">
    <form method="POST" action="">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <label for="name" class="form-control-label pt-4">{{ __('Nome') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{!empty($profile->name) ? $profile->name : '' }}" required autocomplete="name" autofocus>
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


        <div class="row">
            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('CPF') }}</label>
                <input type="text" id="inputCPF" class="form-control" placeholder="000.000.000-00" name="cpf" required="required">
            </div>

            <div class="col-lg-6">
                <label for="input-address" class="form-control-label pt-4">{{ __('Endereço') }}</label>
                <input id="input-address" class="form-control @error('password') is-invalid @enderror" name="address" placeholder="Rua: Direita, n° 88 , casa 4" type="text" required="required">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="input-neighborhood" class="form-control-label pt-4">{{ __('Bairro') }}</label>
                <input type="text" id="input-neighborhood" class="form-control @error('password') is-invalid @enderror" placeholder="Santo Euardo" name="neighborhood" required="required">
            </div>

            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('CEP') }}</label>
                <input type="number" id="inputCEP" class="form-control" placeholder="00000-000" name="cep" required="required">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="input-city" class="form-control-label pt-4">{{ __('Cidade') }}</label>
                <input type="text" id="input-city" class="form-control" placeholder="Taboão da serra" name="city" required="required">
            </div>

            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('Estado') }}</label>
                <input type="text" id="input-state" class="form-control" placeholder="São paulo" name="state" required="required">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="example-tel-input" class="form-control-label pt-4">{{ __('Telefone') }}</label>
                <input class="form-control" type="tel" placeholder="(11)-9.5050-5050" id="example-tel-input" name="phone" required="required">
            </div>
        </div>

        <div class="form-group row mt-4">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Salvar Edição') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection