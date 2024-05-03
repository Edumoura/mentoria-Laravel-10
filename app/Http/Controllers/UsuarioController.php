<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    
    
   public function __construct(User $User){

		$this->user = $User;

	}


    public function index(Request $request)
    {

    	$pesquisar = $request->pesquisar;

    	// dd($request);

    	// $findProduto = $produto::all();

    	$findUser = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

    	//dd() siginifica debud day
    	//dd($findProduto);

    	return view('pages.usuario.paginacao', compact('findUser'));

    	// return 'produtos';

    }

    public function delete(Request $request)
    {

        try {

            $id            = $request->id;
            $buscaRegistro = User::find($id);

            if($buscaRegistro->delete()){

                return response()->json(['success' => true]);

            }else{

                return response()->json(['success' => false]);
            }  

            
            
        } catch (\Exception $e) {

            return response()->json(['success' => false]);
            
        }        

    }

    
    public function cadastrarUser(UsuarioFormRequest $request)
    {



        if($request->method() == 'POST'){

            //cria os dados
           // dd($request);
            $data             = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('usuario.index');

        } 

        return view('pages.usuario.creat');

    }

    public function atualizarUser(UsuarioFormRequest $request, $id)
    {

        //dd($id);

        if($request->method() == 'PUT'){

            //atualiza os dados
            // dd($request);
            $data             = $request->all();
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro    = User::find($id);

            $buscaRegistro->update($data);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('usuario.index');

        } 

        $findUser = User::where('id', '=', $id)->first();
        //$findProduto = Produto::find($id);

        //dd($findProduto);

        return view('pages.usuario.atualiza', compact('findUser'));

    }
}
