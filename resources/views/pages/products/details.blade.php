@extends('layouts.app')

@section('content')
<div class="card-profile">
    <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
                <a href="#">
                    <img src="{{url('assets/img/productimage', $product->image)}}" class="img-fluid" style="max-width: 200px;">
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                    <h3 class="text-center">{{$product->name_prod}}</h3>
                    <div class="text-center">
                        <h3 class="heading">Quantidade de caixas</h3>
                        <p> {{$product->qtd_box}} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                    <h3 class="heading">Tipo do produto</h3>
                    <p class="m-1">{{$product->type_prod}}</p>
                <div class="text-center">
                    <h3>Descrição do produto</h3>
                    <p class="m-2">{{$product->description}}</p>
                </div>
            </div>
        </div>

    </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-default float-right" href="{{route('product.index')}}">Voltar</a>
        </div>
    </div>
</div>
@endsection
