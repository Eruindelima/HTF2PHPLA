@extends('layouts.app')

@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Pedidos</h3>
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
                        Donatário
                    </th>

                    <th>
                        E-mail
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
                            {{$order->name}}
                        </td>
                        <td>
                            {{$order->email}}
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
