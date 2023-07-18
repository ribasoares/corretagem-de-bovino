@extends('layout.master')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="row col-10 m-auto">

            <div class="col-md-3 mt-4 opacity-75 ">
                <div class="card text-bg-light mb-3 border-3 border-dark" style="max-width: 18rem;">                   
                    <div class="card-header"> @if($fornecedores->count() <= 1)<h5>Fornecedor</h5>@endif @if($fornecedores->count() >= 2)<h5>Fornecedores</h5>@endif</div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{$fornecedores->count()}}</h4>                      
                    </div>
                </div>    
            </div>                 
        </div>

        <div class="row col-10 m-auto">

            <div class="col-md-3 m-auto  opacity-75 ">
                <div class="card text-bg-info mb-3 border-3 border-dark" style="max-width: 18rem;">                   
                    <div class="card-header"> @if($compras->count() <= 1)<h5>Qnt. Gado Comprado</h5>@endif @if($compras->count() >= 2)<h5>compras</h5>@endif</div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{number_format($compras->sum('compra_quantidade'))}}</h4>                    
                    </div>
                </div>    
            </div>  
            
            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-warning mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Total Comprado</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($compras->sum('valor_pagar'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>

            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-success mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Pagamentos</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($pagamentos->sum('pagamento_valor'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>

            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-danger mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Falta Pagar</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($compras->sum('valor_aberto'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>

        </div>


        <div class="row col-10 m-auto">

            <div class="col-md-3 mt-4 opacity-75 ">
                <div class="card text-bg-light text-dark mb-3 border-3 border-dark" style="max-width: 18rem;">                
                    <div class="card-header"> @if($clientes->count() <= 1)<h5>Cliente</h5>@endif @if($clientes->count() >= 2)<h5>Clientes</h5>@endif</div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{$clientes->count()}}</h4>                      
                    </div>
                </div>    
            </div>

        </div>


        <div class="row col-10 m-auto"> 

            <div class="col-md-3 m-auto  opacity-75 ">
                <div class="card text-bg-info mb-3 border-3 border-dark" style="max-width: 18rem;">                   
                    <div class="card-header"> @if($vendas->count() <= 1)<h5>Qnt. Gado Vendido</h5>@endif @if($vendas->count() >= 2)<h5>vendas</h5>@endif</div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{number_format($vendas->sum('venda_quantidade'))}}</h4>                    
                    </div>
                </div>    
            </div>
            
            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-warning mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Total Vendido</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($vendas->sum('valor_receber'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>

            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-success mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Recebimentos</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($recebimentos->sum('recebimento_valor'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>

            <div class="col-md-3 m-auto opacity-75 ">
                <div class="card text-bg-danger mb-3 border-3 border-dark" style="max-width: 18rem;">
                    <div class="card-header"><h5>Falta Receber</h5></div>
                    <div class="card-body">
                      <h4 class="card-title text-center">{{'R$ '.number_format($vendas->sum('valor_aberto'), 2, ",", ".")}}</h4>                      
                    </div>
                </div>    
            </div>
        </div>
      
      
    </div>


@endsection