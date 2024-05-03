<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

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
            $data          = $request->all();
            $componntes    = new Componentes();
            $data['valor'] = $componntes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');

        } 

        return view('pages.produtos.creat');

    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {

        //dd($id);

        if($request->method() == 'PUT'){

            //atualiza os dados
            // dd($request);
            $data          = $request->all();
            $componntes    = new Componentes();

            $data['valor'] = $componntes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);

            $buscaRegistro->update($data);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');

        } 

        $findProduto = Produto::where('id', '=', $id)->first();
        //$findProduto = Produto::find($id);

        //dd($findProduto);

        return view('pages.produtos.atualiza', compact('findProduto'));

    }
}
