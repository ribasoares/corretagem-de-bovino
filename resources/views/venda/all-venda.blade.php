@extends('layout.master')

@section('title', 'Listagem dos Vendas')

@section('content')

    <div class="container border border-dark col-md-9 mt-3 bg-light opacity-75 rounded-4">       
        <div class=" text-center mt-2">
        <h4 >VENDAS EFETUADAS</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fornecedor</th>                
                    <th scope="col">Quantidade</th>
                    <th scope="col">Peso Total (Liquido)</th>
                    <th scope="col">Valor por KG</th>
                    <th scope="col">Valor a Pagar</th>
                    <th scope="col">Data da venda</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($vendas as $venda) 
                <tr>                       
                    <td>{{$venda->id}}</td>
                    <td>{{$venda->cliente->cliente_nome}}</td>                
                    <td>{{$venda->venda_quantidade}} Gado</td>   
                    <td>{{ number_format( $venda->venda_peso, 2, ".") .' kg'}}</td> 
                    <td>{{ 'R$ '. number_format( $venda->venda_valor_kg, 2, ",", ".") }}</td> 
                    <td>{{ 'R$ '. number_format( $venda->valor_receber, 2, ",", ".") }}</td>             
                    <td>{{ date_format($venda->venda_data, 'd-m-Y') }}</td>
                    
                    <td><a class="btn btn-dark" href="/venda/edit/{{ $venda->id}}">Pagamento</a> </td>
                    <td><a class="btn btn-danger" href='/venda/del/{{$venda->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td> 
                </tr>
                @endforeach                     
                </tbody>
            </table>  

        </div>
    </div>
    
  
    
@endsection