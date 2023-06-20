<?php
require_once "Models/ProviderModel.php";
require_once "Views/ProviderView.php";

class ProviderController
{
    function paginateProvider()
    {
        //require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ProviderModel = new ProviderModel($Connection);
        //$PaisModel = new PaisModel($Connection);
        $ProviderView = new ProviderView();

        $array_provider = $ProviderModel->listProvider();
        //$array_pais = $PaisModel->listPais();
        $ProviderView->paginateProvider($array_provider);
    }

    function showProvider()
    {
        //require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ProviderModel = new ProviderModel($Connection);
        //$PaisModel = new PaisModel($Connection);
        $ProviderView = new ProviderView();

        $nit = $_POST['id'];
        $array_provider = json_decode($ProviderModel->selectProvider($nit));
        //$array_pais = $PaisModel->listPais();
        $ProviderView->showProvider($array_provider);
    }

    function insertProvider()
    {
        //require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ProviderModel = new ProviderModel($Connection);
        //$PaisModel = new PaisModel($Connection);
        $ProviderView = new ProviderView();

        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $celular = $_POST['celular'];
       // $cod_pais = $_POST['cod_pais'];
        //$cod_departamento = $_POST['cod_departamento'];
        //$cod_ciudad = $_POST['cod_ciudad'];

        if (empty($nit)) {
            $response = ["message" => 'FALTA POR LLENAR EL NIT'];
            exit(json_encode($response));
        }

        if (empty($nombre)) {
            $response = ["message" => 'FALTA POR LLENAR EL  NOMBRE'];
            exit(json_encode($response));
        }

        if (empty($direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($celular)) {
            $response = ["message" => 'FALTA POR LLENAR EL CELULAR'];
            exit(json_encode($response));
        }

        /*if (empty($cod_pais)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO DEL PAIS'];
            exit(json_encode($response));
        }

        if (empty($cod_departamento)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO DEL DEPARTAMENTO'];
            exit(json_encode($response));
        }

        if (empty($cod_ciudad)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO DE LA CIUDAD'];
            exit(json_encode($response));
        }*/

        if ($nit<= 0) {
            $response = ["message" => 'EL NIT NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }

        if ($celular<= 0) {
            $response = ["message" => 'EL CELULAR NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }

        $ProviderModel->insertProvider($nit,$nombre,$direccion,$celular);
        $array_provider = $ProviderModel->listProvider();
        //$array_pais = $PaisModel->listPais();
        $ProviderView->paginateProvider($array_provider);
    }

    function updateProvider()
    {
        //require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ProviderModel = new ProviderModel($Connection);
        //$PaisModel = new PaisModel($Connection);
        $ProviderView = new ProviderView();

        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $celular = $_POST['celular'];

        $ProviderModel->updateProvider($nit,$nombre,$direccion,$celular);
        $array_provider = $ProviderModel->listProvider();
        //$array_pais = $PaisModel->listPais();
        $ProviderView->paginateProvider($array_provider);
    }
}
