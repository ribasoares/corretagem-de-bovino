
@extends('layout.master')

@section('title', 'Add-Cliente')

@section('content')

  <div class="container border border-dark col-md-4 mt-3 p-1 bg-light opacity-75 rounded-4">
    
    <div class=" text-center mt-3">
      <h4 >CADASTRAR CLIENTE</h4>
    </div>

    <form class="form-horizontal" method="post"  action="{{route('cliente.store')}}">
      @csrf
      
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> NOME:</label>
          <input type="text" class="form-control border border-dark" name="cliente_nome" placeholder="Nome do Cliente" required="" >    
        </div>
      </div>    
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> CPF:</label>
          <input class="form-control border border-dark" type="text" autocomplete="off" maxlength="14" id="cpf" name="cliente_cpf"  placeholder="000.000.000-00" required>
        </div>
      </div>   
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> TELEFONE:</label>
          <input class="form-control border border-dark" type="text" maxlength="15" id="phone" name="cliente_phone"  placeholder="(00) 00000-0000" required>
        </div>
      </div>     
            
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label>ENDEREÇO:</label>
          <input class="form-control border border-dark" type="text" id="cliente_address"  name="cliente_address"  placeholder="Endereço Completo" required>
        </div>
      </div>   

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label>AÇOUGUE:</label>
          <input class="form-control border border-dark" type="text" id="cliente_estabelecimento" name="cliente_estabelecimento"  placeholder="Nome do Estabelecimento" required>
        </div>
      </div>  
      
      <div class="form-group">
        <div class="col-md-3 offset-md-2 py-1">
          <label> STATUS: </label>
          <select  class="form-select border border-dark" name="status" id="status">
            <option value="1">Ativo</option>
            <option value="0">Não Ativo</option>                  
          </select>   
        </div>  
      </div>

      <div class="form-group">
        <div class="text-center py-3">
          <button class="btn btn-outline-success  col-md-3 rounded" type="submit">Cadastrar</button>&nbsp;
          <a class="btn btn-outline-dark col-md-3 rounded" href="{{route('cliente.all')}}" >Clientes</a> 
        </div>
      </div>    

    </form>

   
 
  </div>
  

@endsection




