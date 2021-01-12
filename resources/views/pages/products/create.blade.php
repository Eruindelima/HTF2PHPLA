@extends('layouts.app')


@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">{{!empty($product) ? 'Editar Produto': 'Incluir Produto' }}</h3>
</div>
<div class="card-footer py-4">
    <form action="{{!empty($product) ? route('product.update', $product->id) : route('product.save')}}" method="post">
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
                    <input class="form-control" type="text" name="type_prod" value="{{!empty($product->type_prod) ? $product->type_prod : '' }}"  placeholder="Digite aqui o tipo do produto" required="required">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="example-number-input" class="form-control-label">Quantidade de caixas</label>
                    <input class="form-control" type="number" name="qtd_box" value="{{!empty($product->qtd_box) ? $product->qtd_box : '' }}" value="0" id="example-number-input" required="required">
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
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição Do produto</label>
                    <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3" required="required">{{!empty($product->description) ? $product->description : ''}}</textarea>
                </div>
            </div>
        </div>

        
        
        <button type="submit" class="btn btn-success">{{!empty($product) ? 'Atualizar': 'Salvar' }}</button>
        <button type="button" class="btn btn-danger">Sair</button>
    </form>
</div>
@endsection
