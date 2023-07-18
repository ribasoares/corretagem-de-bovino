
@extends('layout.master')

@section('title', 'Add-Forma-Pag')

@section('content')

  <div class="container col-md-6 py-1 mt-3 bg-light border border-dark opacity-75 rounded-4">
    
    <div class="text-center mt-3">
      <h4>Cadastrar</h4>
    </div>

    <form class="form-horizontal" method="post"  action="{{route('formaPag.store')}}">
      @csrf            
        
      <div class="form-group">
        <div class="col-md-6 offset-md-3 py-1">
            <label>Forma de Pagamento:</label>
          <input class="form-control border border-dark" type="text" id="forma_pagamento"  name="forma_pagamento"  placeholder="ex: Dinheiro" required>
        </div>
      </div>    

      <div class="form-group">
        <div class="text-center py-3">
          <button class="btn btn-outline-success col-md-2 rounded" type="submit">Cadastrar</button>&nbsp;         
        </div>
      </div>   
    </form>
 
  </div>


  <div class="col-md-6 offset-md-3 mt-5 p-1 opacity-75 rounded-4">
        
    <div class="table-responsive bg-light border border-dark rounded-4 ">
      <h4 class="text-center p-2"></h4>
      <table class="table table-danger table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Forma de Pagamento</th> 
            <th scope="col">Ação</th>
          </tr>
        </thead>

        <tbody>
          @foreach($formaPags as $formaPag) 
            <tr>                       
              <td>{{$formaPag->id}}</td>
              <td>{{$formaPag->forma_pagamento}}</td>                
              <td><a class="btn btn-outline-danger" href='/formaPag/del/{{$formaPag->id}} 'onclick="return confirm('Realmente deseja Excluir?')">Deletar</a></td>   
              </td>   
            </tr>
          @endforeach                     
        </tbody>       
      </table> 
    </div>
  </div>


@endsection
