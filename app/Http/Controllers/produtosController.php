<?php

namespace App\Http\Controllers;

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

    	



    }
}
