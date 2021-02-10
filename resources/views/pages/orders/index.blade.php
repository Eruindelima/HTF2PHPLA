@extends('layouts.app')

@section('content')

@if(isset($isSuccessFull) && $isSuccessFull)
<div class="alert alert-success">Pedido concluído com sucesso!</div>
@endif

<div class="card-header border-0">
    <h3 class="mb-0">{{$label ?? 'Pedidos'}}</h3>
</div>
<div class="card-footer py-4">
    @if(count($orders) >= 1)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Produto
                </th>
                <th>
                    Quantidade
                </th>
                <th>
                    Doador
                </th>
                <th>
                    Donatário
                </th>
                <th>
                    Status
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>
                    {{$order->order}}
                </td>
                <td>
                    {{$order->name_prod}}
                </td>
                <td>
                    {{$order->qtd_box}}
                </td>
                <td>
                    {{$order->doador}}
                </td>
                <td>
                    {{$order->donatario}}
                </td>
                <td>
                    @if($order->pendant)
                    <div class="badge badge-danger">Pendente</div>
                    @else
                    <div class="badge badge-success">Concluído</div>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline-primary btn-sm"
                        href="{{route('product.client.productDetails', $order->order)}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    @if($order->pendant)
                    <a class="btn btn-success btn-sm"
                        href="{{route('product.client.approve', ['order' => $order->order])}}">Aprovar</a>
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
