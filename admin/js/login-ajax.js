
$(document).ready(function() {
    // console.log('HOLA');
    $('#login-admin').on('submit', function(e) {  // $('#login').on('submit', function(e) {
        e.preventDefault();
        // console.log('agregando admin...');

        var datos = $(this).serializeArray();
        // console.log(datos);
        $.ajax({ 
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),        //url: "login-admin.php",
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito') {
                    swal(
                        'Login Correcto',
                        'Bienvenio@ '+ resultado.usuario +' !! ',
                        'success'
                    )
                    setTimeout(function(){
                        window.location.href = 'administrador.php';
                    }, 2000);
                } else {
                swal(
                        'Error',
                        'Usuario o Password Incorrectos !',
                        'error'
                    )
                }
            }
        }); 
        //console.log(datos);
    });
});