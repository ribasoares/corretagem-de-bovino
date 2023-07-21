@extends('layout.master')

@section('title', 'Contas a Receber')

@section('content')

    <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class="text-center mt-2">
        <h4 >VENDAS A RECEBER</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>   
                    <th scope="col">Peso</th>             
                    <th scope="col">Valor Receber</th>
                    <th scope="col">Valor em Aberto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                <tbody>                                         
                    @foreach($receberContas as $receberConta) 
                    <tr>   
                        @if($receberConta->status == 1)
                            <td>{{$receberConta->id}}</td>
                            <td>{{$receberConta->venda->cliente->cliente_nome}}</td>
                            <td>{{ number_format( $receberConta->venda->venda_peso, 2, ",", ".") }} Kg</td>
                            <td>{{ 'R$ '. number_format( $receberConta->valor_receber, 2, ",", ".") }}</td>
                            <td>{{ 'R$ '. number_format( $receberConta->valor_aberto, 2, ",", ".") }}</td>
                        
                            <td>{{$receberConta->status == 1 ? 'Devendo' : 'Pago' }} </td> 
                            <td>{{ date_format($receberConta->receber_conta_data, 'd/m/Y') }}</td>              
                            <td><a class="btn btn-success" href="/Receber-Conta/edit/{{ $receberConta->id}}">Pagar</a> </td> 
                        @endif                                 
                    </tr>
                   @endforeach                                    
                 </tbody>
            </table>  

        </div>
     </div>

     <div class="container col-md-1 mt-2 opacity-75 rounded-4">
        
        {{ $receberContas->links('pagination::bootstrap-4') }}
         
          
    </div> 

    
@endsection