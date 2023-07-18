@extends('layout.master')

@section('title', 'Compra - Mais Detalhes')

@section('content')

    <div class="container border border-dark col-md-9 mt-3 bg-light opacity-75 rounded-4"> 
        <div class="text-center mt-2">
            <h4 >COMPRAS - MAIS DETALHES</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>               
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço (kg)</th>
                        <th scope="col">Falta Adicionar</th>
                        <th scope="col">Valor em Aberto</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data da Compra</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <tbody>                    
                    <tr>                       
                        <td>{{$compra->id}}</td>              
                        <td>{{$compra->compra_quantidade}} Gado(s)</td> 
                        <td>{{ number_format( $compra->compra_valor_kg, 2, ",", ".")}}</td>    
                        <td>{{ $compra->compra_estoque == null ? '0' : $compra->compra_estoque }} Gado(s)</td>                  
                        <td>{{ 'R$ '. number_format( $compra->compra_totalPagar, 2, ",", ".") }}</td> 
                        <td>{{$compra->status == 1 ? 'Incompleto' : 'Completo' }} </td>             
                        <td>{{ date_format($compra->compra_data, 'd/m/Y') }}</td>
                        <td><a class="btn btn-primary"  href="/compra/edit/{{ $compra->id}}">Atualizar</a> </td>
                        </td>   
                    </tr>                                    
                </tbody>
            </table>            
        </div>
        <div class="col-md-6 offset-md-8 text-center p-1">
            <a class="btn btn-dark col-md-2" href="{{{route('compra.all')}}}" >Voltar</a>  
        </div>
    </div>
    
  
    
@endsection