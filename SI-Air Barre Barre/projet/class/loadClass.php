<?php
    spl_autoload_register(function ($class){

        $file_name = $_SERVER['DOCUMENT_ROOT'].'/TPArchitecture/class/'.$class .'.php'; // get all class

        if( is_readable( $file_name ) ) {

            require_once($file_name);

        }else{
            var_dump(E_WARNING);
            exit('ERROR');

        }

    });
?>
