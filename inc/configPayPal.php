<?php 

require 'paypal/autoload.php';

//MODIFICAR A LA URL DE LA PAGINA ORIGINAL
define('URL_SITIO', 'http://localhost/prueba3'); //URL es para redireccionar en pagar.php

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfT_EZWn0ANKJlqe_F7q9l6MbFOuzgjVFKWA3bgLFfaDsr1kFcxerafXpqS6ht5kwGEi8YzyqDeC30qK', //CienteID 
        'ECQAJTIzwcAXwn1HuFakiwK_rE3wA5ZOD2b3jPQgvcKl7sPox7MJXeIMn9We8wKPOe2KDlYxrzrc1-PX'  // Secret
    )
);

