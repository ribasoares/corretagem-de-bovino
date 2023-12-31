
@extends('layout.master')

@section('title', 'Listagem dos Clientes')

@section('content')


  <div class="container border border-dark col-md-7 mt-3 bg-light opacity-75 rounded-4"> 
    <div class="text-center mt-2">
      <h4 >CLIENTES CADASTRADOS</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-danger text-center table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>                
              <th scope="col">Estabelecimento</th>
              <th scope="col">CPF</th>
              <th scope="col">Telefone</th>
          
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>

          <tbody>
              @foreach($clientes as $cliente) 
            <tr>                       
              <td>{{$cliente->id}}</td>
              <td>{{$cliente->cliente_nome}}</td>                
              <td>{{$cliente->dado_cliente->cliente_estabelecimento}}</td>   
              <td>{{$cliente->dado_cliente->cliente_cpf}}</td>   
              <td>{{$cliente->dado_cliente->cliente_phone}}</td> 
          
              
              <td><a class="btn btn-primary"  href="#">Atualizar</a></td>  
              <td><a class="btn btn-danger"  href='/cliente/del/{{$cliente->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td> 
            </tr>
            @endforeach                     
          </tbody>
      </table>  


    </div>

  </div>

  <div class="container col-md-1 mt-2 opacity-75 rounded-4">
    {{ $clientes->links('pagination::bootstrap-4') }}    
  </div>

    
  
  
    
@endsection