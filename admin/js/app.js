$(document).ready(function() {

  let primer_password;
  let segundo_password;

    $('#crear_registro_admin').attr('disabled', true).addClass('opaco');  // Deshabilita el boton AÑADIR hasta que sean iguales las contraseñas

    $('#repetir_password').on('input', function() {  // Para valida el password si es igual o no
      
      segundo_password = $('#password').val();

      if($(this).val() === segundo_password ) {
        $('#resultado_password').text('Correcto !!');    // se pinta de color verde el padre al ser iguales y manda mensaje de correcto
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false).removeClass('opaco'); // Habilita el boton AÑADIR cuando son iguales las contraseñas
      } else {
        $('#resultado_password').text('No son iguales.');    // se pinta de color rojo el padre al no ser iguales y manda mensaje de No son iguales
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true).addClass('opaco'); // Deshabilita el boton AÑADIR hasta que sean iguales las contraseñas
      } 
    });
    
    $('#password').on('input', function() {  // Para valida el password si es igual o no
      
      primer_password = $('#repetir_password').val();

      if($(this).val() === primer_password ) {
        
        $('#passwordOrigin').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false).removeClass('opaco'); // Habilita el boton AÑADIR cuando son iguales las contraseñas

      } else {

        $('#passwordOrigin').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true).addClass('opaco'); // Deshabilita el boton AÑADIR hasta que sean iguales las contraseñas
      } 
    });


    $('#mostrar_contrasena').click(function () {
      if ($('#mostrar_contrasena').is(':checked')) {
        $('#password').attr('type', 'text'); // al seleccionar el check el atributo se convierte en texto
      } else {
        $('#password').attr('type', 'password'); // al deseleccionar el check el atributo se convierte en password
      }
    });

})