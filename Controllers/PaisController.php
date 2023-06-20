<?php

require_once "Models/PaisModel.php";

class PaisController
{
    function showPais()
    {

        $Connection = new Connection('sel');
        $PaisModel = new PaisModel($Connection);

        $pais = $_POST['pais'];

        $arreglo_pais = $PaisModel->listPais1($pais);

        if (!$arreglo_pais) {
            $response = ["message" => 'ERROR LOS PAISES NO SE ENCUENTRAN DISPONIBLES'];
            exit(json_encode($response));
        }
        echo (json_encode($arreglo_pais));
    }
}
