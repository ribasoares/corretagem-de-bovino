<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\FormaPagController;
use App\Http\Controllers\FinanceiroController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Rota atual 


Route::get('/', [LoginController::class, 'form'])->name('home.index');
Route::post('/logado', [LoginController::class, 'login'])->name('logado');

Route::get('/user-add', [UserController::class, 'create'])->name('user.create');
Route::post('/user-add', [UserController::class, 'store'])->name('user.store');


// Tem que ta logado.
Route::group(['middleware' => ['auth']], function() {

    //Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 

    Route::get('/all-fornecedores', [FornecedorController::class, 'all'])->name('fornecedor.all');
    Route::get('/add-fornecedor', [FornecedorController::class, 'create'])->name('fornecedor.create');
    Route::post('/add-fornecedor', [FornecedorController::class, 'store'])->name('fornecedor.store');
    Route::get('/fornecedor/del/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');

    Route::get('/all-clientes', [ClienteController::class, 'all'])->name('cliente.all');
    Route::get('/add-cliente', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/add-cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/del/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    Route::get('/all-vendedores', [VendedorController::class, 'all'])->name('vendedor.all');
    Route::get('/Vendedores/Lucros', [VendedorController::class, 'allLucroTotal'])->name('vendedor.allLucroTotal');
    Route::get('/add-vendedor', [VendedorController::class, 'create'])->name('vendedor.create');
    Route::post('/add-vendedor', [VendedorController::class, 'store'])->name('vendedor.store');
    Route::get('/vendedor/del/{id}', [VendedorController::class, 'destroy'])->name('vendedor.destroy');

    Route::get('/all-compras', [CompraController::class, 'all'])->name('compra.all');
    Route::get('/add-compra', [CompraController::class, 'create'])->name('compra.create');
    Route::post('/add-compra', [CompraController::class, 'store'])->name('compra.store');
    Route::get('/compra/show/{id}', [CompraController::class, 'show'])->name('compra.show');
    Route::get('/compra/edit/{id}', [CompraController::class, 'edit'])->name('compra.edit');
    Route::put('/compra/update/{id}', [CompraController::class, 'update'])->name('compra.update');
    Route::get('/compra/del/{id}', [CompraController::class, 'destroy'])->name('compra.destroy');

    Route::get('/all-vendas', [VendaController::class, 'all'])->name('venda.all');
    Route::get('/add-venda', [VendaController::class, 'create'])->name('venda.create');
    Route::post('/add-venda', [VendaController::class, 'store'])->name('venda.store');
    Route::get('/venda/edit/{id}', [VendaController::class, 'edit'])->name('venda.edit');
    Route::put('/venda/update/{id}', [VendaController::class, 'update'])->name('venda.update');
    Route::get('/venda/del/{id}', [VendaController::class, 'destroy'])->name('venda.destroy');

    Route::get('/all-Pagar-Contas', [FinanceiroController::class, 'allPagar'])->name('financeiro.allPagar');
    Route::get('/Pagar-Conta/edit/{id}', [FinanceiroController::class, 'editPagar'])->name('financeiro.editPagar');
    Route::put('/Pagar-Conta/update/{id}', [FinanceiroController::class, 'updatePagar'])->name('financeiro.updatePagar');
    
    Route::get('/all-Receber-Contas', [FinanceiroController::class, 'allReceber'])->name('financeiro.allReceber');
    Route::get('/Receber-Conta/edit/{id}', [FinanceiroController::class, 'editReceber'])->name('financeiro.editReceber');
    Route::put('/Receber-Conta/update/{id}', [FinanceiroController::class, 'updateReceber'])->name('financeiro.updateReceber');

    Route::get('/all-Lucro-Contas', [FinanceiroController::class, 'allLucro'])->name('financeiro.allLucro');
    Route::put('/Pagar-Lucro/update/{id}', [FinanceiroController::class, 'updateLucro'])->name('financeiro.updateLucro');

    Route::get('/add-formaPag', [FormaPagController::class, 'create'])->name('formaPag.create');
    Route::post('/add-formaPag', [FormaPagController::class, 'store'])->name('formaPag.store');
    Route::get('/formaPag/del/{id}', [FormaPagController::class, 'destroy'])->name('formaPag.destroy');


  


});


/*



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\FormaPagController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/all-fornecedores', [FornecedorController::class, 'all'])->name('fornecedor.all');
Route::get('/add-fornecedor', [FornecedorController::class, 'create'])->name('fornecedor.create');
Route::post('/add-fornecedor', [FornecedorController::class, 'store'])->name('fornecedor.store');

Route::get('/all-clientes', [ClienteController::class, 'all'])->name('cliente.all');
Route::get('/add-cliente', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/add-cliente', [ClienteController::class, 'store'])->name('cliente.store');

Route::get('/all-compras', [CompraController::class, 'all'])->name('compra.all');
Route::get('/add-compra', [CompraController::class, 'create'])->name('compra.create');
Route::post('/add-compra', [CompraController::class, 'store'])->name('compra.store');
Route::get('/compra/show/{id}', [CompraController::class, 'show'])->name('compra.show');
Route::get('/compra/edit/{id}', [CompraController::class, 'edit'])->name('compra.edit');
Route::put('/compra/update/{id}', [CompraController::class, 'update'])->name('compra.update');


Route::get('/all-vendas', [VendaController::class, 'all'])->name('venda.all');
Route::get('/add-venda', [VendaController::class, 'create'])->name('venda.create');
Route::post('/add-venda', [VendaController::class, 'store'])->name('venda.store');
Route::get('/venda/edit/{id}', [VendaController::class, 'edit'])->name('venda.edit');
Route::put('/venda/update/{id}', [VendaController::class, 'update'])->name('venda.update');

Route::get('/add-formaPag', [FormaPagController::class, 'create'])->name('formaPag.create');
Route::post('/add-formaPag', [FormaPagController::class, 'store'])->name('formaPag.store');
Route::get('/formaPag/del/{id}', [FormaPagController::class, 'destroy'])->name('formaPag.destroy');


*/

