function deleteRegistroPaginacao( route_url, id_registro ) {   

    if(confirm('Deseja confirmar a exclusão?')){
        $.ajax({
            url: route_url,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                id: id_registro,
            },
            beforeSend: function() {
                $.blockUI({                    
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },

        }).done(function(data) {
            $.unblockUI();
            if(data.success) {
                window.location.reload();
            }else {
                alert('Não foi possível excluir!');
            }
            console.log(data);

        }).fail(function(data) {
            console.log(data)
            $.unblockUI();
            alert('Não foi possivel buscar os dados!');

        });
    }

}