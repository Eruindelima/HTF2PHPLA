@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Produto disponível para doação</h3>
</div>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>
                Nome do Produto
            </th>
            <th>
                Tipo
            </th>
            <th>
                Quantidade de caixas
            </th>
            <th>
                Descrição
            </th>
            <th>
                Data de validade
            </th>
            <th>
                Ações
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{$product->name_prod}}
            </td>
            <td>
                {{$product->type_prod}}
            </td>
            <td>
                {{$product->qtd_box}}
            </td>
            <td>
                {{$product->description}}
            </td>
            <td>
                {{$product->validate_prod}}
            </td>
            <td>
                {{$product->image}}
            </td>
            <td>
                <a class="btn btn-success btn-sm" href="{{route('product.client.order', $product->id)}}">Quero</button></a>
                <a class="btn btn-secondary btn-sm" href="{{route('product.index')}}">Voltar</button></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
