
@extends('layout.master')

@section('title', 'Listagem dos Vendedores')

@section('content')


  <div class="container border border-dark col-md-9 mt-3 bg-light opacity-75 rounded-4"> 
    <div class="text-center mt-2">
      <h4 >VENDEDORES CADASTRADOS</h4>
      </div>

      <div class="table-responsive">

        <table class="table table-danger table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Vendedor</th>                
              <th scope="col">Descrição</th>
              <th scope="col">Status</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>

          <tbody>
              @foreach($vendedores as $vendedor) 
            <tr>                       
              <td>{{$vendedor->id}}</td>
              <td>{{$vendedor->vendedor_nome}}</td>                
              <td>{{$vendedor->descricao}}</td>   
              <td>{{$vendedor->status == 1 ? 'Ativo' : 'Não Ativo' }} </td>                  
              <td><a href="#">Atualizar</a></td>  
              <td><a class="btn btn-danger" href='/vendedor/del/{{$vendedor->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td> 
            </tr>
            @endforeach                     
          </tbody>
      </table>  


    </div>

  </div>
    
  
  
    
@endsection