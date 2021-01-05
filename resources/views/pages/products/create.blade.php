@extends('layouts.app')


@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Incluindo um Produto</h3>
</div>
<div class="card-footer py-4">
    <form action="{{route('save.product')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="example-number-input" class="form-control-label">Nome do Produto</label>
            <input class="form-control" type="text" name="name_prod" placeholder="Digite aqui o nome do produto">
        </div>
        <div class="form-group">
            <label for="example-number-input" class="form-control-label">Tipo do produto</label>
            <input class="form-control" type="text" name="type_prod" placeholder="Digite aqui o tipo do produto">
        </div>
        <div class="form-group">
            <label for="example-number-input" class="form-control-label">Quantidade de caixas</label>
            <input class="form-control" type="number" name="qtd_box" value="0" id="example-number-input">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição Do produto</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="example-date-input" class="form-control-label">Data De Calidade</label>
            <input class="form-control" type="date" name="validate_prod" value="2020-08-15" id="example-date-input">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-danger">Sair</button>
    </form>
</div>
@endsection
