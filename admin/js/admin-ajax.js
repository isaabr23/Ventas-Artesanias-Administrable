

$(document).ready(function() {
    $('#guardar-producto').on('submit', function(e) {
        e.preventDefault();
        //console.log('agregando admin...');

        var datos = $(this).serializeArray();
        // console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                var resultado = data;

                if (resultado.respuesta == 'pass') {
                    alert('Password debíl');
                } else {

                if (resultado.respuesta == 'usuario repetido') {
                    swal(
                            'Upss',
                            'El usuario ya existe intenta con otro nombre!',
                            'warning'
                        )
                } else {

                    if(resultado.respuesta == 'exito') {
                        swal(
                            'Correcto',
                            'Se guardo correctamente',
                            'success'
                        ) 

                        // jQuery('[data-id="'+resultado.id_admin+'"]').parents('tr').remove();
                        
                    } else {
                        
                    swal(
                            'Error',
                            'Hubo un error',
                            'error'
                        )
                    } 
                }
            }
        }})
    });

////////////// Se ejecuta cuando haya una imagen a subir //////////////

$('#guardar-producto-archivo').on('submit', function(e) {   // id="guardar-producto-archivo" de crear-invitado.php
    e.preventDefault();
    //console.log('agregando admin...');

    var datos = new FormData(this);     // Se agregan para formulario con imagenes
    //console.log(datos);
    $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        contentType: false,         // Se agregan para formulario con imagenes
        processData: false,         // Se agregan para formulario con imagenes
        async: true,                // Se agregan para formulario con imagenes
        cache: false,               // Se agregan para formulario con imagenes
        success: function(data) {
            console.log(data);
            var resultado = data;
            if(resultado.respuesta == 'exito') {
                swal(
                    'Correcto',
                    'Se guardo correctamente',
                    'success'
                )
            } else {
            swal(
                    'Error',
                    'Hubo un error',
                    'error'
                )
            }
        }
    })
});    

// // Eliminar un registro
$('.borrar_registro').on('click', function(e) {
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    console.log("ID:" + id);

    swal({
        title: 'Estás Seguro?',
        text: "Esto no se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!!',
        cancelButtonText: 'No, Cancelar',
    }).then((result) => {
        if (result.value) {
        $.ajax({
            type: 'post',
            data: {
                'id' : id,
                'registro' : 'eliminar'
            },
            url: 'modelo-'+tipo+'.php',
            success:function(data) {
            //console.log(data); // String json
            var resultado = JSON.parse(data); // Convierte string en objeto js
            //console.log(resultado); // string objeto
            if(resultado.respuesta == 'exito') {
                    swal(
                        'Eliminado!',
                        'Se eliminó el administrador.',
                        'success'
                    )
                    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                }                       
            }
        })
        } else if (result.dismiss === 'cancel') {
            swal(
            'Cancelado',
            'No se eliminó el registro',
            'error'
            )
        }   
    })   
});


});