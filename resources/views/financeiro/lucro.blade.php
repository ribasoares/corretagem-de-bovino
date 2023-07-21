@extends('layout.master')

@section('title', 'Listagem dos Compras')

@section('content')

    <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class=" text-center mt-2">
        <h4 >LUCROS A PAGAR</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">Vendedor</th>    
                    <th scope="col">Venda</th>   
                    <th scope="col">Peso</th>            
                    <th scope="col">Lucro por KG</th>
                    <th scope="col">Lucro Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                  
                    <th scope="col">Editar</th>
                </tr>
                </thead>

                <tbody>
                   @foreach($lucros as $lucro) 
                    <tr>                                              
                        @if($lucro->status == 1)
                        <td>{{$lucro->vendedor->vendedor_nome}}</td> 
                        <td>{{$lucro->venda->id}}</td> 
                        <td>{{ number_format( $lucro->venda->venda_peso, 2, ",", ".")}} KG</td>
                        <td>{{ 'R$ '. number_format( $lucro->lucro_KG, 2, ",", ".") }}</td>         
                        <td>{{ 'R$ '. number_format( $lucro->lucro_total, 2, ",", ".") }}</td>
                        <td>{{$lucro->status == 1 ? 'Devendo' : 'Pago' }} </td> 
                        <td>{{ date_format($lucro->lucro_data, 'd/m/Y') }}</td> 
                        <td> 
                            <form method="post" action="/Pagar-Lucro/update/{{ $lucro->id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                 
                                <button class="btn btn-success" type="submit"><i></i>Pagar</button>            
                            </form> 
                        @endif               
                        </td>                       
                    </tr>
                    @endforeach                     
                </tbody>
            </table>  
        </div>
     </div>

     <div class="container col-md-1 mt-2 opacity-75 rounded-4">
        {{ $lucros->links('pagination::bootstrap-4') }}
        
    </div>


     <div class="container border border-dark col-md-9 mt-5 bg-light opacity-75 rounded-4">       
        <div class=" text-center mt-2">
        <h4 >LUCROS PAGOS</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-danger text-center table-striped">

                <thead>
                <tr>
                    <th scope="col">Vendedor</th>    
                    <th scope="col">Venda</th>   
                    <th scope="col">Peso</th>            
                    <th scope="col">Lucro por KG</th>
                    <th scope="col">Lucro Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                  
                    <th scope="col">Editar</th>
                </tr>
                </thead>

                <tbody>
                   @foreach($lucros as $lucro) 
                    <tr>                                              
                        @if($lucro->status == 0)
                        <td>{{$lucro->vendedor->vendedor_nome}}</td> 
                        <td>{{$lucro->venda->id}}</td> 
                        <td>{{ number_format( $lucro->venda->venda_peso, 2, ",", ".")}} KG</td>
                        <td>{{ 'R$ '. number_format( $lucro->lucro_KG, 2, ",", ".") }}</td>         
                        <td>{{ 'R$ '. number_format( $lucro->lucro_total, 2, ",", ".") }}</td>
                        <td>{{$lucro->status == 1 ? 'Devendo' : 'Pago' }} </td> 
                        <td>{{ date_format($lucro->lucro_data, 'd/m/Y') }}</td> 
                        <td> 
                            <form method="post" action="/Pagar-Lucro/update/{{ $lucro->id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                 
                                <button class="btn btn-success" type="submit"><i></i>Pagar</button>            
                            </form> 
                        @endif               
                        </td>                       
                    </tr>
                    @endforeach                     
                </tbody>
            </table>  
        </div>
     </div>



    
    
  
    
@endsection