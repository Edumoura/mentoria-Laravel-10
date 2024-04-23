function deleteRegistroPaginacao(rotaURL, idRegistro){
	

	if(confirm('Deseja confirmar a exclusão')){

		$.ajax({
			url: rotaURL,
			method:'DELETE',
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data:{
				id : idRegistro,
			},
			beforeSend: function () {

				$.blockUI({

					message: 'Carregando...',
					time: 2000,

				});
			},

		}).done(function (data) {

			$.unblockUI();
			console.log(data);
			if(data.success){

				window.location.reload();

			}else{

				alert('Não foi possível excluir');

			}

		}).fail(function (data) {

			$.unblockUI();
			alert('Não foi possível buscar os dados');

		});

	}

}