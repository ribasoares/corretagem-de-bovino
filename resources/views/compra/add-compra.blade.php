
@extends('layout.master')

@section('title', 'Add-Compra')

@section('content')



  <div class="container border border-dark col-md-4 mt-3 p-1 bg-light opacity-75 rounded-4">
      
    <div class=" text-center mt-3">
      <h4 >CADASTRAR COMPRA</h4>
    </div>

    <form class="form-horizontal" method="post"  action="{{route('compra.store')}}">
      @csrf
      

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label>FORNECEDOR | Não tem? <a href="{{route('fornecedor.create')}}">Adicionar</a></label>
          <select class="form-select border border-dark" id="fornecedor_id" name="fornecedor_id" required> 
            <option selected>Selecione um fornecedor</option>   
            @foreach ($fornecedores as $fornecedor)
            <option value="{{$fornecedor->id}}">{{$fornecedor->fornecedor_nome}}</option>              
            @endforeach                            
          </select>   
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label> QUANTIDADE DE GADOS:</label>
          <input class="form-control col-md-8 border border-dark" type="text" name="compra_quantidade"  placeholder="ex: 8" required>
        </div>
      </div>   

              
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label> PESO TOTAL (Liquido):</label>
          <input class="form-control col-md-8 border border-dark" type="text" maxlength="8" name="compra_pesoTotal" placeholder="ex: 3500.00">
        </div>
      </div>     
            
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label>PREÇO DO KG:</label>
          <input class="form-control col-md-8 border border-dark" type="text" name="compra_valor_kg"  placeholder="17.50" required>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label>DATA:</label>
          <input class="form-control col-md-8 border border-dark" type="date"  name="compra_data" required>
        </div>
      </div> 

      <div class="form-group">
        <div class="col-md-4 offset-md-2 py-1">
            <label> STATUS: </label>
          <select  class="form-select border border-dark" name="status" id="status">
            <option value="1">Incompleto</option>
            <option value="0">Completo</option>                  
          </select>   
        </div>  
      </div>

      <div class="form-group">
        <div class="text-center py-3">
          <button class="btn btn-outline-success  col-md-3 rounded" type="submit">Cadastrar</button>&nbsp;
          <a class="btn btn-outline-dark col-md-3 rounded" href="{{route('compra.all')}}" >Compras</a> 
        </div>
      </div>     

    </form>

  </div>



@endsection
