<?php
require_once "Models/CiudadModel.php";

class CiudadController
{
    function listCiudad()
    {
        $Connection = new Connection('sel');
        $CiudadModel = new CiudadModel($Connection);

        $ciudad = $_POST['ciudad'];
        $array_ciudad = $CiudadModel->listCiudad($ciudad);

        if (!$array_ciudad) {
            $response = ["message" => 'LAS CIUDADES SOLICITADAS NO SE ENCUENTRAN DISPONIBLES'];
            exit(json_encode($response));
        }

        echo (json_encode($array_ciudad));
    }
}
