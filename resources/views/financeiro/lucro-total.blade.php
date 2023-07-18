
@extends('layout.master')

@section('title', 'Lucros dos Vendedores')

@section('content')


  <div class="container border border-dark col-md-9 mt-3 bg-light opacity-75 rounded-4"> 
    <div class="text-center mt-2">
      <h4 >LUCROS DOS VENDEDORES</h4>
      </div>

      <div class="table-responsive">

        <table class="table table-danger text-center table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Vendedor</th>                
              <th scope="col">Lucro Total</th>
              <th scope="col">Lucro a Receber</th>
              
            </tr>
          </thead>

          <tbody>
              @foreach($vendedores as $vendedor) 
            <tr>                       
              <td>{{$vendedor->id}}</td>
              <td>{{$vendedor->vendedor_nome}}</td>  
              <td>{{ 'R$ '. number_format( $vendedor->lucro_total, 2, ",", ".") }}</td>         
              <td>{{ 'R$ '. number_format( $vendedor->lucro_total_aberto, 2, ",", ".") }}</td>              
                                
        
            </tr>
            @endforeach                     
          </tbody>
      </table>  


    </div>

  </div>
    
  
  
    
@endsection