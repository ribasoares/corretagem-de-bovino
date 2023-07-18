
@extends('layout.master')

@section('title', 'Add-Vendedor')

@section('content')

  <div class="container border border-dark col-md-4 mt-3 p-1 bg-light opacity-75 rounded-4">
    
    <div class=" text-center mt-3">
      <h4 >CADASTRAR VENDEDOR</h4>
    </div>

    <form class="form-horizontal" method="post"  action="{{route('vendedor.store')}}">
      @csrf
      
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> NOME:</label>
          <input type="text" class="form-control border border-dark" id="vendedor_nome" name="vendedor_nome" placeholder="Nome do vendedor" required="" >    
        </div>
      </div>    
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> DESCRIÇÃO:</label>
          <input class="form-control border border-dark" type="text" name="descricao"  placeholder="Qualquer descrição">
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
          <a class="btn btn-outline-dark col-md-3 rounded" href="{{route('vendedor.all')}}" >Vendedores</a> 
        </div>
      </div>    

    </form>

   
 
  </div>
  

@endsection
