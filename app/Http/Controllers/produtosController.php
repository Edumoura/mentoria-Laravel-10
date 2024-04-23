<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use Illuminate\Http\Request;
use App\Models\Produto;

class produtosController extends Controller
{

	public function __construct(Produto $produto){

		$this->produto = $produto;

	}


    public function index(Request $request)
    {

    	$pesquisar = $request->pesquisar;

    	// dd($request);

    	// $findProduto = $produto::all();

    	$findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

    	//dd() siginifica debud day
    	//dd($findProduto);

    	return view('pages.produtos.paginacao', compact('findProduto'));

    	// return 'produtos';

    }

    public function delete(Request $request)
    {

        try {

            $id            = $request->id;
            $buscaRegistro = Produto::find($id);

            if($buscaRegistro->delete()){

                return response()->json(['success' => true]);

            }else{

                return response()->json(['success' => false]);
            }  

            
            
        } catch (\Exception $e) {

            return response()->json(['success' => false]);
            
        }        

    }

    public function cadastrarProduto(FormRequestProduto $request)
    {

        if($request->method() == 'POST'){

            //cria os dados
            // dd($request);
            $data = $request->all();
            Produto::create($data);

            return redirect()->route('produto.index');

        } 

        return view('pages.produtos.creat');

    }
}
