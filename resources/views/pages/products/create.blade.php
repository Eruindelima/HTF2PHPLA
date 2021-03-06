@extends('layouts.app')


@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">{{!empty($product) ? 'Editar Produto': 'Incluir Produto' }}</h3>
</div>
<div class="card-footer py-4">
    <form action="{{!empty($product) ? route('product.update', $product->prod_id) : route('product.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label">Nome do Produto</label>
                    <input class="form-control" type="text" name="name_prod" value="{{!empty($product->name_prod) ? $product->name_prod : '' }}" placeholder = "Digite aqui o nome do produto" required="required">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label">Tipo do produto</label>
                    <select class="form-control" name="type_prod" required="required" >
                        @foreach ($category as $item)
                            <option value="{{$item->id}}" {{!empty($product) ? ($item->id == $product->category_id ? 'selected' : '')   : ''}} >{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label">Quantidade de caixas</label>
                    <input class="form-contro" name="qtd_box" type="number" value="{{!empty($product->qtd_box) ? $product->qtd_box : '' }}" value="0" id="example-number-input" required="required">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="example-date-input" class="form-control-label">Data De Validade do Produto</label>
                    <input class="form-control" type="date" name="validate_prod" value="{{!empty($product->validate_prod) ? $product->validate_prod : '' }}" id="example-date-input">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image" class="form-control-label">Selecione somente uma imagem da doação </label>
                        <input type="file" id="image" name="image" class="custom-file-input">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição Do produto</label>
                    <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3" required="required">{{!empty($product->description) ? $product->description : ''}}</textarea>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-success">{{!empty($product) ? 'Atualizar': 'Salvar' }}</button>
        <a type="button" class="btn btn-danger" href="{{route('product.index')}}">Sair</a>
    </form>
</div>
@endsection
