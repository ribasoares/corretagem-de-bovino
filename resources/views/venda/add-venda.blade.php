
@extends('layout.master')

@section('title', 'Add-Venda')

@section('content')

  <div class="container border border-dark col-md-4 mt-3 bg-light opacity-75 rounded-4">
    
    <div class=" text-center mt-3">
      <h4 >CADASTRAR VENDA</h4>
    </div>

    <form class="form-horizontal" method="post"  action="{{route('venda.store')}}">
      @csrf
      
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label>CLIENTE | Não tem? <a href="{{route('cliente.create')}}">Adicionar</a></label>
          <select class="form-select border border-dark" id="cliente_id" name="cliente_id" required>             
            <option selected>Selecione um cliente</option>        
            @foreach ($clientes as $cliente)        
              <option value="{{$cliente->id}}">{{$cliente->cliente_nome}}</option>                        
            @endforeach                        
          </select>   
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label> GADO DISPONÍVEL - FORNECEDOR:</label>
          <select class="form-select border border-dark" id="estoque_id" name="estoque_id" required> 
            <option selected>Selecione um estoque</option>   
            @foreach ($estoques as $estoque)
              @if ($estoque->quant_disponivel > 0)
                <option value="{{$estoque->id}}">{{$estoque->quant_disponivel}} gado(s) - {{$estoque->compra->fornecedor->fornecedor_nome}}</option>               
              @endif    
            @endforeach                        
          </select>   
      </div>
      </div>
    
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label> QUANTIDADE DE GADO:</label>
          <input class="form-control col-md-8 border border-dark" type="text" maxlength="3" id="venda_quantidade" name="venda_quantidade"  placeholder="ex: 8" required>
        </div>
      </div>   
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label> PESO TOTAL (Liquido):</label>
          <input class="form-control col-md-8 border border-dark" type="text" minlength="2" maxlength="3"id="venda_peso" name="venda_peso"  placeholder="ex: 3500" required>
        </div>
      </div>        
        
      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label>PREÇO DO KG:</label>
          <input class="form-control border border-dark" type="text" id="venda_valor_kg" maxlength="5" name="venda_valor_kg"  placeholder="18.50" required>
        </div>
      </div>  

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
            <label>DATA:</label>
          <input class="form-control col-md-8 border border-dark" type="date" name="venda_data"  required>
        </div>
      </div> 

      <div class="form-group">
        <div class="col-md-8 offset-md-2 py-1">
          <label>VENDEDOR | Não tem? <a href="{{route('vendedor.create')}}">Adicionar</a></label>
          <select class="form-select border border-dark" id="vendedor_id" name="vendedor_id" required>             
            <option selected>Selecione um vendedor</option>        
            @foreach ($vendedores as $vendedor)        
              <option value="{{$vendedor->id}}">{{$vendedor->vendedor_nome}}</option>                        
            @endforeach                        
          </select>   
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 offset-md-2 py-1">
            <label>LUCRO POR KG:</label>
          <input class="form-control border border-dark" type="text" name="lucro_KG"  placeholder="0.50" required>
        </div>
      </div> 
 

      <div class="form-group">
        <div class="text-center py-3">
          <button class="btn btn-outline-success  col-md-3 rounded" type="submit">Cadastrar</button>&nbsp;
          <a class="btn btn-outline-dark col-md-3 rounded" href="{{route('venda.all')}}" >Vendas</a>  
        </div>
      </div>     

    </form>
 
  </div>

  



@endsection
