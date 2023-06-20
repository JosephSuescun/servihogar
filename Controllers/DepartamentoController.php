<?php
require_once "Models/DepartamentoModel.php";

class DepartamentoController
{
    function listDepartamento()
    {
        $Connection = new Connection('sel');
        $DepartamentoModel = new DepartamentoModel($Connection);

        $Departamento = $_POST['pais'];
        $arreglo_departamento = $DepartamentoModel->listDepartamento($Departamento);

        if (!$arreglo_departamento) {
            $response = ["message" => 'LOS DEPARTAMENTOS SOLICITADAS NO SE ENCUENTRAN DISPONIBLES'];
            exit(json_encode($response));
        }

        echo (json_encode($arreglo_departamento));
    }
}
