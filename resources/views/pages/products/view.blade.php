@extends('layouts.app')

@section('content')
<div class="card-profile">
    <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
                <a href="#">
                    <img src="{{url('assets/img/productimage', $product->image)}}" class="img-fluid" style="max-width: 150px;">
                </a>
            </div>
        </div>
    </div>
    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info  mr-4 ">Quero</a>
            <a href="#" class="btn btn-sm btn-default float-right">Voltar</a>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="row">
            <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                        <span class="heading">223894723892</span>
                        <span class="description">Caixas</span>
                    </div>


                </div>
            </div>
        </div>
        <div class="text-center">
            <h5 class="h3">
                {{$product->name_prod}}
            </h5>
            <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Tipo do produto
            </div>

            <div>
                <i class="ni education_hat mr-2"></i>Descrição do produto
            </div>
        </div>
    </div>
</div>
@endsection