
@extends('layout.master')

@section('title', 'Pagar Receber')

@section('content')



<div class="container">

  <div class="row">
    <div class="col-md-6 py-2 mt-3 bg-light border border-dark opacity-75 rounded-4">

      <div class="text-center py-2">
        <h4>PAGAR RECEBER</h4>
      </div>
  
      <form class="form-horizontal" action="/Receber-Conta/update/{{$receberConta->id}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')  
        
        <div class="form-group ">
          <div class="col-md-8 offset-md-2 py-2">
                <label>CLIENTE:</label>
                <input class="form-control border border-dark " value="{{$receberConta->venda->cliente->cliente_nome}}" id="fornecedor_id" name="fornecedor_id" disabled>                      
            </div>
        </div>
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
              <label>VALOR EM ABERTO:</label>
            <input class="form-control border border-dark" type="text"  value="{{ 'R$ '. number_format( $receberConta->valor_aberto, 2, ",", ".") }}"  id="valor_aberto"  name="valor_aberto" disabled>
          </div>
        </div> 
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2">
              <label>DESCONTAR</label>
            <input class="form-control border border-dark" type="text" maxlength="10" name="recebimento_valor" placeholder="ex: 999.99"  required>
          </div>
        </div> 
  
        <div class="form-group">
          <div class="col-md-8 offset-md-2 py-2" >
            <label> FORMA DE PAGAMENTO | Não tem? <a href="{{route('formaPag.create')}}">Adicionar</a></label>
            <select class="form-select border border-dark" id="forma_pagamento_id" name="forma_pagamento_id" required> 
              <option selected> Selecione uma </option>    
                @foreach ($formaPags as $formaPag)
              <option  value="{{$formaPag->id}}">{{$formaPag->forma_pagamento}} </option>              
              @endforeach                        
            </select>   
          </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 offset-md-2 py-1">
                <label>DATA DO PAGAMENTO:</label>
              <input class="form-control col-md-8 border border-dark" type="date" name="recebimento_data" required>
            </div>
          </div> 
   
        
        <div class="form-group">
          <div class="col-md-3 offset-md-2 py-2">
              <label> STATUS: </label>
            <select class="form-select border border-dark" name="status" id="status" disabled>
              <option value="0">Pago</option> 
              <option value="1" {{ $receberConta->status == 1 ? "selected= 'selected'" : ""}}>Devendo</option>                  
            </select>   
          </div>  
        </div>
  
        <div class="form-group text-center">
          <div class=" py-2">
            <button class="btn btn-success  col-md-2 rounded"  type="submit">Pagar</button>&nbsp;
            <a class="btn btn-dark col-md-2" href="{{route('financeiro.allReceber')}}" >Voltar</a>  
          </div>
        </div>     
  
      </form>

    </div>

    <div class="col-md-6 py-1 mt-3 opacity-75 rounded-4">
        
      <div class="table-responsive bg-light border border-dark rounded-4 ">
        <h4 class="text-center p-2">VALORES PAGOS</h4>
        <table class="table table-danger text-center table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">recebimento</th> 
              <th scope="col">Forma de recebimento</th>
              <th scope="col">Data</th>
            </tr>
          </thead>

          <tbody>
            @foreach($receberConta->recebimentos as $recebimento) 
              <tr>  
                <td>{{$recebimento->id}}</td>                    
                <td>{{ 'R$ '.number_format($recebimento->recebimento_valor, 2, ",", ".") }}</td>
                <td>{{$recebimento->forma_pagamento->forma_pagamento}}</td> 
                <td>{{ date_format($recebimento->recebimento_data, 'd/m/Y') }}</td>                 
              </tr>
            @endforeach                     
          </tbody>        
        </table> 
      </div>
    </div>

  </div>  
   

</div>




@endsection
