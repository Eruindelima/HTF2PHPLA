@extends('layouts.login')

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary py-5 py-lg-8 pt-lg-8">
        <div class="container">
            <div class="header-body text-center mb-1">
                <div class="imagem-logo">
                    <img src="{{asset('storage/logosf.png')}}" style="width: 150px; heigth: 150px;">
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-1">
                        <p class="text-lead text-white">Seja bem vindo ao <strong>HotFood</strong>!
                        </br>A sua plataforma de doações.</p>
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
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="post" action="{{route('login')}}">
                            @csrf
                            @error('email')
                            <div class="alert alert-danger">
                                E-mail ou senha inválidos!
                            </div>
                            @enderror
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" id="email" name="email"
                                        value="{{old('email')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Senha" type="password" id="password"
                                        name="password" required>
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="remember" type="checkbox" id="remember"
                                    name="remember">
                                <label class="custom-control-label" for="remember">
                                    <span class="text-muted">Lembrar-me</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Acessar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="#" class="text-light"><small>Esqueceu a senha ?</small></a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('register')}}" class="text-light"><small>Cadastre-se agora mesmo!</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
