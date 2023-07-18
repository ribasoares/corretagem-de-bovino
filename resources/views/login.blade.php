<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
      
    </head>
    <body class="myBackground ">     

      <nav class="navbar bg-danger navbar-dark navbar-expand-sm py-3 sticky-top ">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-stripe" viewBox=" 0 0 16 19">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm6.226 5.385c-.584 0-.937.164-.937.593 0 .468.607.674 1.36.93 1.228.415 2.844.963 2.851 2.993C11.5 11.868 9.924 13 7.63 13a7.662 7.662 0 0 1-3.009-.626V9.758c.926.506 2.095.88 3.01.88.617 0 1.058-.165 1.058-.671 0-.518-.658-.755-1.453-1.041C6.026 8.49 4.5 7.94 4.5 6.11 4.5 4.165 5.988 3 8.226 3a7.29 7.29 0 0 1 2.734.505v2.583c-.838-.45-1.896-.703-2.734-.703Z"/>
          </svg> almo 23</a>
      </nav>

      <div class="container ">
        <div class="row-login row justify-content-center align-items-center">
          <div class="col-auto border border-dark col-md-5 p-4 bg-light opacity-75 rounded-4">
            <div class=" text-center mt-3">
                <h4 >LOGIN</h4>
            </div>                
            <form class="form-horizontal" method="post"  action="{{route('logado')}}">
              @csrf
      
              <div class="form-group">
                <div class="col-md-8 offset-md-2 py-2">
                    <label>EMAIL:</label>
                    <input class="form-control col-md-8 border border-dark" type="email" name="login"  placeholder="exemplo@hotmail.com">
                </div>
                <div class="text-center text-danger">
                    {{ $errors ->first('login')}}
                </div> 

              </div>     
                 
                      
              <div class="form-group">
                <div class="col-md-8 offset-md-2 py-2">
                    <label>SENHA:</label>
                    <input class="form-control col-md-8 border border-dark" type="password" Minlength="8" name="senha"  placeholder="Sua Senha">
                </div>
                <div class="text-center text-danger">
                    {{ $errors ->first('senha')}}
                </div> 
              </div>   
              
              <div class="form-group">
                <div class="col-md-8 offset-md-3 py-2">
                    <label> Não tem Conta? <a href="{{route('user.create')}}">Cadastrar</a></label>
                </div>               
              </div>                    
      
              <div class="form-group">
                <div class="text-center py-3">
                    <button class="btn btn-outline-success col-md-3 rounded" type="submit">ENTRAR</button>&nbsp;
                    
                </div>
              </div>  
        
            </form>

          </div>
        </div>             
      </div>

        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      

    </body>
</html>
