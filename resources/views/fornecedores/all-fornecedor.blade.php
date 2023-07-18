@extends('layout.master')

@section('title', 'Listagem dos Fornecedores')

@section('content')


<div class="container border border-dark col-md-9 mt-3 bg-light opacity-75 rounded-4"> 
  <div class=" text-center mt-2">
    <h4 >FORNECEDORES CADASTRADOS</h4>
    </div>

    <div class="table-responsive">

      <table class="table table-danger table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fornecedor</th>                
            <th scope="col">Cidade</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ação</th>
            <th scope="col">Excluir</th>
          </tr>
        </thead>

        <tbody>
            @foreach($fornecedores as $fornecedor) 
          <tr>                       
            <td>{{$fornecedor->id}}</td>
            <td>{{$fornecedor->fornecedor_nome}}</td>                
            <td>{{$fornecedor->dado_fornecedor->fornecedor_cidade}}</td>   
            <td>{{$fornecedor->dado_fornecedor->fornecedor_cpf}}</td>   
            <td>{{$fornecedor->dado_fornecedor->fornecedor_phone}}</td> 
            <td>{{$fornecedor->dado_fornecedor->fornecedor_address}}</td> 
            
            <td><a href="#">Editar</a></td>   
            <td><a  href='/fornecedor/del/{{$fornecedor->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td> 
          </tr>
          @endforeach                     
        </tbody>
    </table>  

    </div>
  </div>
    
  
  
    
@endsection