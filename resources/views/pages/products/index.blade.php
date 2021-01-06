@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Produtos</h3>
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
    </table>
</div>
@endsection
