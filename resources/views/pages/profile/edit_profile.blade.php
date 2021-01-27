@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">{{ Auth::user()->name}}</h3>
</div>
<div class="card-footer py-4">
    <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{!empty($profile->email) ? $profile->email : ''}}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="password" class="form-control-label pt-4">{{ __('Digite sua nova senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="password-confirm" class="form-control-label pt-4">{{ __('Confirme nova Senha') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('CPF') }}</label>
                <input type="text" id="inputCPF" class="form-control"  name="cpf" value="{{!empty($profile->cpf) ? $profile->cpf : ''}}" required autocomplete="cpf" autofocus>
            </div>
            <div class="col-lg-6">
                <label for="input-address" class="form-control-label pt-4">{{ __('Endereço') }}</label>
                <input id="input-address" class="form-control @error('password') is-invalid @enderror" name="address"  value="{{!empty($profile->address) ? $profile->address : '' }}" required autocomplete="address" >
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
                <input type="text" id="input-neighborhood" class="form-control @error('password') is-invalid @enderror" name="neighborhood" value="{{!empty($profile->neighborhood) ? $profile->neighborhood : ''}}" required autocomplete="neighborhood" autofocus>
            </div>

            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('CEP') }}</label>
                <input type="number" id="inputCEP" class="form-control" name="cep" value="{{!empty($profile->cep) ? $profile->cep : ''}}" required autocomplete="cep" autofocus>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="input-city" class="form-control-label pt-4">{{ __('Cidade') }}</label>
                <input type="text" id="input-city" class="form-control" name="city" value="{{!empty($profile->city) ? $profile->city : ''}}" required autocomplete="city" autofocus>
            </div>

            <div class="col-lg-6">
                <label for="input-country" class="form-control-label pt-4">{{ __('Estado') }}</label>
                <input type="text" id="input-state" class="form-control" name="state" value="{{!empty($profile->state) ? $profile->state : ''}}" required autocomplete="state" autofocus>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="example-tel-input" class="form-control-label pt-4">{{ __('Telefone') }}</label>
                <input class="form-control" type="tel"  id="example-tel-input" name="phone" value="{{!empty($profile->phone) ? $profile->phone : ''}}" required autocomplete="phone" autofocus>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-4">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{url('assets/img/profile', Auth::user()->image)}}">
                        </span>
                    </div>

                    <div class="col-8">
                        <label for="image" class="form-control-label">{{ Auth::user()->name}} {{ __('Coloque uma foto em seu perfil') }}</label>
                        <input type="file" id="image" name="image" class="custom-file-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Atualizar Cadastro') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

