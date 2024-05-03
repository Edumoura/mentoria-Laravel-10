@extends('index')
@section('content')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
        
</div>
<div>

	<form action="{{route('usuario.index')}} "method="get">
		<input type="text" name="pesquisar" placeholder="Digite o nome">
		<button>Pesquisar</button>
		<a type="button" href="{{route('cadastrar.usuario')}}" class="btn btn-success float-end">Incluir Usuário</a>
	</form>
	<div class="table-responsive small">

		@if($findUser->isEmpty())

		  <p>Não existe dados para o valor pesquisado</p>

		@else
			<table class="table table-striped table-sm">

			 	<thead>
		            <tr>
		              <th >Nome</th>
		              <th >E-mail</th>
		              <th >Ações</th>	              
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($findUser as $usuario)
		            <tr>
		              <td>{{ $usuario->name }}</td>
		              <td>{{ $usuario->email }}</td>
		              <td>
		              	<a type="button" href="{{ route('atualizar.usuario', $usuario->id) }}" class="btn btn-light btn-sm">Editar</a>
		              	
		              	<meta name="csrf-token" content="{{ csrf_token() }}">
		              	<a type="button" onclick="deleteRegistroPaginacao('{{route('usuario.delete')}}', {{$usuario->id}} )" class="btn btn-danger btn-sm">Excluir</a>
		              </td>          
		            </tr>
		            @endforeach
			    </tbody>
			 </table>

		@endif	 
		
	</div>
	
</div>
@endsection