
    document.getElementById('div1').style.display = 'none';
    document.getElementById("EmailContact").addEventListener('click', function (event) {
        if (event.target && event.target.matches("input[type='radio']")) {
            var valor = $(event.target).val();
            if(valor === "1"){
                document.getElementById('div1').style.display = 'block';
            } else if (valor == "2") {
                document.getElementById('div1').style.display = 'none';
            } else { 
                document.getElementById('div1').style.display = 'none';
            }
        }
    });

    document.getElementById("TelContact").addEventListener('click', function (event) {
        if (event.target && event.target.matches("input[type='radio']")) {
            var valor = $(event.target).val();
            if(valor === "1"){
                document.getElementById('div1').style.display = 'block';
            } else if (valor == "2") {
                document.getElementById('div1').style.display = 'none';
            } else { 
                document.getElementById('div1').style.display = 'none';
            }
        }
    });

    $(document).ready(function() {
        // console.log('HOLA');
        $('#cliente').on('submit', function(e) {  // $('#login').on('submit', function(e) {
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
                    var respuesta = data;
                    console.log(respuesta);
                    if(respuesta.respuesta == 'exito') {
                        swal(
                            'Usuario Registrado',
                            'Gracias ' + ' !! ',
                            'success'
                        )
                    } else {
                    swal(
                            'Error',
                            'Debe llenar todos los datos !',
                            'error'
                        )
                    }
                }
            }); 
        });
    });
