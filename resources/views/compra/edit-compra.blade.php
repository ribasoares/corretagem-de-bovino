
@extends('layout.master')

@section('title', 'Pagar Compra')

@section('content')



<div class="container">

  <div class="row">

    <div class="col-md-6 py-1 mt-3 bg-light border border-dark opacity-75 rounded-4">

      <div class="text-center py-2">
        <h4>COMPRA</h4>
      </div>
        
        <div class="form-group ">
          <div class="col-md-8 offset-md-2 py-2">
                <label>FORNECEDOR:</label>
                <input class="form-control border border-dark " value="{{$compra->fornecedor->fornecedor_nome}}" id="fornecedor_id" name="fornecedor_id" disabled>                      
            </div>
        </div>
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
                <label> DATA DA COMPRA:</label>
                <input class="form-control border border-dark" value="{{ date_format($compra->compra_data, 'd/m/Y') }}" name="compra_data" disabled>                     
            </div>
        </div>
  
      
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
              <label>VALOR A PAGAR:</label>
            <input class="form-control border border-dark" type="text"  value="{{ 'R$ '. number_format( $compra->compra_totalPagar, 2, ",", ".") }}"  id="valor_aberto"  name="valor_aberto" disabled>
          </div>
        </div> 
   
        
        <div class="form-group">
          <div class="col-md-3 offset-md-2 py-2">
              <label> STATUS: </label>
            <select class="form-select border border-dark" name="status" id="status" disabled>
              <option value="0">Completo</option> 
              <option value="1" {{ $compra->status == 1 ? "selected= 'selected'" : ""}}>Incompleto</option>                  
            </select>   
          </div>  
        </div>    
  

    </div>


    <div class="col-md-6 py-1 mt-3 bg-light border border-dark opacity-75 rounded-4">

      <div class="text-center py-2">
        <h4>ATUALIZAR COMPRA</h4>
      </div>
        
      <form class="form-horizontal" action="/compra/update/{{$compra->id}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')  
        
        <div class="form-group ">
          <div class="col-md-8 offset-md-2 py-2">
                <label>QNT. GADO:</label>
                <input class="form-control border border-dark" name="quantidade" placeholder="ex: 1">                      
            </div>
        </div>
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
              <label>PESO:</label>
            <input class="form-control border border-dark" type="text" name="peso_total" placeholder="ex: 999.99">
          </div>
        </div> 
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
              <label>VALOR POR KG</label>
            <input class="form-control border border-dark" type="text" maxlength="10" name="valor_kg" placeholder="ex: 19.99">
          </div>
        </div> 

        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-1">
              <label>DATA:</label>
            <input class="form-control col-md-8 border border-dark" type="date"  name="atualizar_compra_data"  placeholder="17.50" required>
          </div>
        </div> 
   
  
        <div class="form-group text-center">
          <div class=" py-4">
            <button class="btn btn-outline-success  col-md-2 rounded"  type="submit">Adicionar</button>&nbsp;
            <a class="btn btn-outline-dark col-md-2" href="{{route('compra.all')}}" >Voltar</a>  
          </div>
        </div>     
  
      </form>
    </div>

    <div class="col-md-8 offset-md-2 mt-3 p-1 opacity-75 rounded-4">
        
      <div class="table-responsive bg-light border border-dark rounded-4 ">
        <h4 class="text-center p-2">VALORES PAGOS</h4>
        <table class="table table-danger text-center table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Quantidade</th> 
              <th scope="col">Peso</th>
              <th scope="col">Valor por KG</th>
              <th scope="col">Valor a Pagar</th>
              <th scope="col">Data</th>
            </tr>
          </thead>

          <tbody>
            @foreach($compra->atualizar_compras as $atualizar_compra) 
              <tr> 
                <td>{{$atualizar_compra->id}}</td>  
                <td>{{$atualizar_compra->quantidade}} Gado</td>  
                <td>{{ number_format($atualizar_compra->peso_total, 2, ".") }} kg</td>   
                <td>{{ 'R$ '. number_format($atualizar_compra->valor_kg, 2, ",", ".") }}</td> 
                <td>{{ 'R$ '. number_format($atualizar_compra->valor_pagar, 2, ",", ".") }}</td> 
                <td>{{ date_format($atualizar_compra->atualizar_compra_data, 'd/m/Y') }}</td>
                     
              </tr>
            @endforeach                     
          </tbody>        
        </table> 
      </div>
    </div>

  </div>  
   

  </div>  
   

</div>




@endsection
