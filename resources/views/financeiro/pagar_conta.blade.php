@extends('layout.master')

@section('title', 'Listagem dos pagarContas')

@section('content')

    <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class="text-center mt-2">
        <h4 >CONTAS A PAGAR</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fornecedor</th>                
                    <th scope="col">Valor Pagar</th>
                    <th scope="col">Valor em Aberto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data da Compra</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($pagarContas as $pagarConta)
                        <tr> 
                            @if($pagarConta->status == 1)                      
                                <td>{{$pagarConta->id}}</td>
                                <td>{{$pagarConta->compra->fornecedor->fornecedor_nome}}</td>                                 
                                <td>{{ 'R$ '. number_format( $pagarConta->valor_pagar, 2, ",", ".") }}</td>
                                <td>{{ 'R$ '. number_format( $pagarConta->valor_aberto, 2, ",", ".") }}</td>
                                <td>{{$pagarConta->status == 1 ? 'Devendo' : 'Pago' }} </td>
                                <td>{{ date_format($pagarConta->pagar_conta_data, 'd-m-Y') }}</td>               
                                <td><a class="btn btn-success" href="/Pagar-Conta/edit/{{ $pagarConta->id}}">Pagamento</a> </td>
                            @endif   
                        </tr>
                     @endforeach                     
                </tbody>
            </table>  

        </div>

     </div>

     <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class="text-center mt-2">
        <h4 >CONTAS PAGAS</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fornecedor</th>                
                    <th scope="col">Valor Pagar</th>
                    <th scope="col">Valor em Aberto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($pagarContas as $pagarConta)
                        <tr> 
                            @if($pagarConta->status == 0)                      
                                <td>{{$pagarConta->id}}</td>
                                <td>{{$pagarConta->compra->fornecedor->fornecedor_nome}}</td>                                 
                                <td>{{ 'R$ '. number_format( $pagarConta->valor_pagar, 2, ",", ".") }}</td>
                                <td>{{ 'R$ '. number_format( $pagarConta->valor_aberto, 2, ",", ".") }}</td>
                                <td>{{$pagarConta->status == 1 ? 'Devendo' : 'Pago' }} </td>             
                                <td><a class="btn btn-success" href="/Pagar-Conta/edit/{{ $pagarConta->id}}">Pagamento</a> </td>
                            @endif   
                        </tr>
                     @endforeach                     
                </tbody>
            </table>  

        </div>

     </div>
    
  
    
@endsection