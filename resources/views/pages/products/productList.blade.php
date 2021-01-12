@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Lista de produtos disponiveis para doação</h3>
</div>
<div class="card-footer py-4">
    <table class="table table-bordered">
        <tr>
            <td>
                Nome do Produto
            </td>

            <td>
                Tipo
            </td>

            <td>
                Quantidade de caixas
            </td>

            <td>
                Descrição
            </td>

            <td>
                Data de validade
            </td>
        </tr>
        <tbody>
            @foreach ($products as $product)
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
                        <button type="button" class="btn btn-success">Quero </button>
                        {{-- <a class="btn btn-outline-danger btn-sm" href="{{route('product.delete', $product->id)}}"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-outline-success btn-sm" href="{{route('product.edit', $product->id)}}"><i class="fa fa-edit"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
