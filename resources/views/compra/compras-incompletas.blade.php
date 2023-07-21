@extends('layout.master')

@section('title', 'Compras Incompletas')

@section('content')

    <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class=" text-center mt-2">
        <h4 >COMPRAS - INCOMPLETAS</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fornecedor</th>                
                    <th scope="col">Quantidade</th>
                    <th scope="col">Peso Total (Liquido)</th>
                    <th scope="col">Valor a Pagar</th>                    
                    <th scope="col">Status</th>    
                    <th scope="col">Data</th>                 
                    <th scope="col">Informações</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                </thead>

                <tbody>
                   @foreach($compras as $compra) 
                    <tr>                                             
                        <td>{{$compra->id}}</td>
                        <td>{{$compra->fornecedor->fornecedor_nome}}</td>                
                        <td>{{$compra->compra_quantidade}} gado(s)</td>   
                        <td>{{ number_format( $compra->compra_pesoTotal, 2, '.', '') .' kg'}}</td>                  
                        <td>{{ 'R$ '. number_format( $compra->compra_totalPagar, 2, ",", ".") }}</td>                        
                        <td>{{$compra->status == 1 ? 'Incompleto' : 'Completo' }} </td>             
                        <td>{{ date_format($compra->compra_data, 'd/m/Y') }}</td>

                        <td><a href="/compra/show/{{ $compra->id}}">Detalhes</a> </td>
                        <td><a class="btn btn-primary" href="/compra/edit/{{ $compra->id}}">Atualizar</a> </td>
                        <td><a class="btn btn-danger" href='/compra/del/{{$compra->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td> 
                    </tr>
                    @endforeach                     
                </tbody>
            </table>  
        </div>
    </div>

    <div class="container col-md-1 mt-2 opacity-75 rounded-4">
        {{ $compras->links('pagination::bootstrap-4') }}    
    </div>
    

    
@endsection