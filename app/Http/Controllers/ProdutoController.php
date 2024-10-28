<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function salvar(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'estoque'=> 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }
    
        $customer = Produto::create($request->all());
        return ApiResponse::ok('Produto salvo com sucesso', $customer);
       
    }

  

    public function excluir(int $id)
    {
        $customer = Produto::findOrFail($id);
        $customer->delete();  
        return ApiResponse::ok('produto removido com sucesso');      
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
           'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'estoque'=> 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }
        $customer = Produto::findOrFail($id);
        $customer->update($request->all());
        return ApiResponse::ok('produto atualizado com sucesso', $customer); 
    }  

    public function listar()
    {
        $customers = Produto::all();
        return ApiResponse::ok('Lista de produtos', $customers);    
    }

    public function listarPeloID(int $id)
    {
        $customer = Produto::findOrFail($id);
        return ApiResponse::ok('produto a ser listado.', $customer);  
    } 
}

