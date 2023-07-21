<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
      
    </head>
    <body class="myBackground ">

     

        <nav class="navbar bg-danger navbar-dark navbar-expand-sm py-3 sticky-top ">
          <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-stripe" viewBox=" 0 0 16 19">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm6.226 5.385c-.584 0-.937.164-.937.593 0 .468.607.674 1.36.93 1.228.415 2.844.963 2.851 2.993C11.5 11.868 9.924 13 7.63 13a7.662 7.662 0 0 1-3.009-.626V9.758c.926.506 2.095.88 3.01.88.617 0 1.058-.165 1.058-.671 0-.518-.658-.755-1.453-1.041C6.026 8.49 4.5 7.94 4.5 6.11 4.5 4.165 5.988 3 8.226 3a7.29 7.29 0 0 1 2.734.505v2.583c-.838-.45-1.896-.703-2.734-.703Z"/>
            </svg> almo 23</a>

            <button class="navbar-toggler" type="button" 
              data-bs-toggle="collapse" 
              data-bs-target="#menuNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuNavbar">
              <div class="navbar-nav ms-auto">
                <a href="{{route('home.index')}}"  class="nav-link active">Home</a>

                <div class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">Cadastrar
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="{{route('cliente.create')}}" class="dropdown-item">Cliente</a></li>
                    <li><a href="{{route('compra.create')}}" class="dropdown-item">Compra</a></li>
                    <li><a href="{{route('fornecedor.create')}}" class="dropdown-item">Fornecedor</a></li> 
                    <li><a href="{{route('venda.create')}}" class="dropdown-item">Venda</a></li>                   
                    <li><a href="{{route('vendedor.create')}}" class="dropdown-item">Vendedor</a></li>                        
                  </ul>
                </div>

                {{-- Envolceu o link 'listagens' por uma div com a class dropdown--}}
                <div class="dropdown">
                  {{-- Adicionou a class dropdown toggle que colocou a seta para baixo--}}
                  <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">Listagens
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="{{route('cliente.all')}}" class="dropdown-item">Clientes</a></li>
                    <li><a href="{{route('compra.Completas')}}" class="dropdown-item">Compras Completas</a></li>
                    <li><a href="{{route('compra.Incompletas')}}" class="dropdown-item">Compras Incompletas</a></li>
                    <li><a href="{{route('fornecedor.all')}}" class="dropdown-item">Fornecedores</a></li>
                    <li><a href="{{route('financeiro.allLucro')}}" class="dropdown-item">Lucros</a></li>  
                    <li><a href="{{route('venda.all')}}" class="dropdown-item">Vendas</a></li> 
                    <li><a href="{{route('vendedor.all')}}" class="dropdown-item">Vendedores</a></li>                   
                  </ul>
                </div>

                   
                <div class="dropdown">
                  {{-- Adicionou a class dropdown toggle que colocou a seta para baixo--}}
                  <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">Financeiro
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">                   
                    <li><a href="{{route('financeiro.allPagar')}}" class="dropdown-item">Compras a Pagar</a></li> 
                     <li><a href="{{route('financeiro.ContasPagas')}}" class="dropdown-item">Compras Pagas</a></li> 
                     <li><a href="{{route('financeiro.allReceber')}}" class="dropdown-item">Vendas a Receber</a></li>                                        
                    <li><a href="{{route('financeiro.ContasRecebidas')}}" class="dropdown-item">Vendas Recebidas</a></li>   
                    <li><a href="{{route('vendedor.allLucroTotal')}}" class="dropdown-item">Lucros Totais</a></li>                                                         
                  </ul>
                </div>

                <div class="dropdown">
                  {{-- Adicionou a class dropdown toggle que colocou a seta para baixo--}}
                  <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">Opções
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="#" class="dropdown-item">Ex: Email Logado</a></li>
                    <li><a href="{{route('logout')}}" class="dropdown-item">Sair</a></li>
                                 
                  </ul>
                </div>

                
                
                
              </div>

            </div>
            {{-- <form action="" class="d-flex">
              <div class="input-group">
                <input type="search" name="" id="" 
                class="form-control" 
                placeholder="Buscar...">
                <button type="submit" class="btn 
                btn-danger">Buscar
                </button>
              </div>
            </form>--}}
          </div>
        </nav>

        <div>

          <main >      
            <div class="row align-items-center text-center rounded-4">
              @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
              @elseif(session('red-msg'))
                <p class="red-msg">{{ session('red-msg') }}</p>
              @endif       
            </div> 
              @yield('content')
          </main>

        </div>

       
        <footer class="bg-danger text-center opacity-75 text-md-start fixed-bottom">
          <!-- Copyright -->
          <div class="text-center text-light">
            
            <a> Corretagem Salmo 23 </a>
          </div>
          <!-- Copyright -->
        </footer>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    </body>
</html>
