<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pagamento;
use App\Models\Recebimento;

use App\Contracts\VendaRepoInterface;
use App\Contracts\ClienteRepoInterface;
use App\Contracts\FornecedorRepoInterface;
use App\Contracts\CompraRepoInterface;


use Auth;
Use Hash;

class LoginController extends Controller
{

    private $vendaRepo;
    private $clienteRepo;
    private $compraRepo;
    private $fornecedorRepo;

    public function __construct(VendaRepoInterface $vendaRepo, ClienteRepoInterface $clienteRepo, 
    FornecedorRepoInterface $fornecedorRepo, CompraRepoInterface $compraRepo, ) 
    {
        $this->vendaRepo = $vendaRepo;
        $this->clienteRepo = $clienteRepo;
        $this->compraRepo = $compraRepo;
        $this->fornecedorRepo = $fornecedorRepo;

    }

    public function form() {

        $vendas = $this->vendaRepo->allVenda();
        $compras = $this->compraRepo->allCompra();
        $clientes = $this->clienteRepo->allCliente();
        $fornecedores = $this->fornecedorRepo->allFornecedor();
        $pagamentos = Pagamento::all();
        $recebimentos = Recebimento::all();
        
      
        if(Auth::user()) {

            return view('home', compact('vendas', 'compras', 'clientes', 'fornecedores', 'pagamentos', 'recebimentos'));
        }
        
        return view('login');
        
    }


    // Obriga o usuario fornecer email e senha.
    public function login(Request $request) {
                
        $request->validate([

            'login' => 'required',
            'senha' => 'required'

           

        ]);

        
        // Se request 'lembrar' estiver vazio, retorne falso, senão, retorne verdadeiro(Operador ternario).
       

        $usuario = User::where('user_email', $request->login)->first();

       if($usuario && Hash::check($request->senha, $usuario->user_senha)) {
            Auth::loginUsingId($usuario->id);

       }

     return redirect()->action([LoginController::class, 'form']);
        
        

    }

    // obs: verificar melhor depois
    public function logout(Request $request) {    
       //Auth::logout();
      //return redirect()->action([LoginController::class, 'form']);

       // dd(Auth::logout());

        Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');


    }





}

?>
