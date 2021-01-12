@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Produtos</h3>
</div>
<div class="card-footer py-4">
    @if(count($products) >= 1)
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
                            {{substr($product->description, 0, 30)}}...
                        </td>
                        <td>
                            {{$product->validate_prod}}
                        </td>
                        <td>
                            @if(Auth::user()->is_donor)
                                <a class="btn btn-outline-danger btn-sm" href="{{route('product.delete', $product->id)}}"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-outline-success btn-sm" href="{{route('product.edit', $product->id)}}"><i class="fa fa-edit"></i></a>
                            @else
                                <button type="button" class="btn btn-success">Quero </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                Ainda não há produtos cadastrados
            </div>
        </div>
    @endif
</div>
@endsection
