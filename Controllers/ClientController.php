<?php

require_once "Models/ClientModel.php";
require_once "Views/ClientView.php";

class ClientController
{
    function paginateClient()
    {
        require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $PaisModel = new PaisModel($Connection);
        $ClientView = new ClientView();

        $array_client = $ClientModel->listClient();
        //$array_pais = $PaisModel->listPais();
        $ClientView->paginateClient($array_client);
    }

    function insertClient()
    {
        require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $PaisModel = new PaisModel($Connection);
        $ClientView = new ClientView();

        $clie_documento = $_POST['clie_documento'];
        $clie_nombre1 = $_POST['clie_nombre1'];
        $clie_nombre2 = $_POST['clie_nombre2'];
        $clie_apellido1 = $_POST['clie_apellido1'];
        $clie_apellido2 = $_POST['clie_apellido2'];
        $clie_direccion = $_POST['clie_direccion'];
        $clie_sexo = $_POST['clie_sexo'];
        $clie_celular = $_POST['clie_celular'];
        $clie_email = $_POST['clie_email'];
        //$clie_pais = $_POST['clie_pais'];
        //$clie_departamento = $_POST['clie_departamento'];
        //$clie_ciudad = $_POST['clie_ciudad'];

        if (empty($clie_documento)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if ($clie_documento<= 0) {
            $response = ["message" => 'EL DOCUMENTO NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }

        if (!(filter_var($clie_email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }
        if (empty($clie_nombre1)) {
            $response = ["message" => 'FALTA POR LLENAR EL PRIMER NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($clie_apellido1)) {
            $response = ["message" => 'FALTA POR LLENAR EL PRIMER APELLIDO'];
            exit(json_encode($response));
        }
        
        if (empty($clie_direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($clie_sexo)) {
            $response = ["message" => 'FALTA POR LLENAR SEXO'];
            exit(json_encode($response));
        }
        /*if (empty($clie_pais)) {
            $response = ["message" => 'FALTA POR  LLENAR PAIS'];
            exit(json_encode($response));
        }

        if (empty($clie_departamento)) {
            $response = ["message" => 'FALTA POR  LLENAR DEPARTAMENTO'];
            exit(json_encode($response));
        }

        if (empty($clie_ciudad)) {
            $response = ["message" => 'FALTA POR  LLENAR CIUDAD'];
            exit(json_encode($response));
        }*/

        if (empty($clie_celular)) {
            $response = ["message" => 'FALTA POR  LLENAR EL CELULAR'];
            exit(json_encode($response));
        }

        /*$array_clients = $ClientModel->consultDocumentClient($clie_documento);
        if ($array_clients) {
            $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
            exit(json_encode($response));
        }*/
        

        $ClientModel->insertClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email);
        $array_client = $ClientModel->listClient();
        $ClientView->paginateClient($array_client);
    }

    function showClient()
    {
        require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $PaisModel = new PaisModel($Connection);
        $ClientView = new ClientView();

        $clie_documento = $_POST['id'];
        $array_client = json_decode($ClientModel->selectClient($clie_documento));
        //$array_pais = $PaisModel->listPais();
        $ClientView->showClient($array_client);
    }

    function updateClient()
    {
        require_once "Models/PaisModel.php";
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $PaisModel = new PaisModel($Connection);
        $ClientView = new ClientView();

        $clie_documento = $_POST['clie_documento'];
        $clie_nombre1 = $_POST['clie_nombre1'];
        $clie_nombre2 = $_POST['clie_nombre2'];
        $clie_apellido1 = $_POST['clie_apellido1'];
        $clie_apellido2 = $_POST['clie_apellido2'];
        $clie_direccion = $_POST['clie_direccion'];
        $clie_sexo = $_POST['clie_sexo'];
        $clie_celular = $_POST['clie_celular'];
        $clie_email = $_POST['clie_email'];

        if (empty($clie_documento)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if ($clie_documento<= 0) {
            $response = ["message" => 'EL DOCUMENTO NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }

        if (empty($clie_nombre1)) {
            $response = ["message" => 'FALTA POR LLENAR EL PRIMER NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($clie_apellido1)) {
            $response = ["message" => 'FALTA POR LLENAR EL PRIMER APELLIDO'];
            exit(json_encode($response));
        }
        
        if (empty($clie_direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (!(filter_var($clie_email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }

        if (empty($clie_sexo)) {
            $response = ["message" => 'FALTA POR LLENAR SEXO'];
            exit(json_encode($response));
        }
        if (empty($clie_email)) {
            $response = ["message" => 'FALTA POR LLENAR EL CORREO'];
            exit(json_encode($response));
        }
        
        /*if (empty($clie_ciudad)) {
            $response = ["message" => 'FALTA POR  LLENAR CIUDAD'];
            exit(json_encode($response));
        }

        if (empty($clie_pais)) {
            $response = ["message" => 'FALTA POR  LLENAR PAIS'];
            exit(json_encode($response));
        }

        if (empty($clie_departamento)) {
            $response = ["message" => 'FALTA POR  LLENAR DEPARTAMENTO'];
            exit(json_encode($response));
        }

        if (empty($clie_ciudad)) {
            $response = ["message" => 'FALTA POR  LLENAR CIUDAD'];
            exit(json_encode($response));
        }*/

        if (empty($clie_celular)) {
            $response = ["message" => 'FALTA POR  LLENAR EL CELULAR'];
            exit(json_encode($response));
        }
        
        $ClientModel->UpdateClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email);
        $array_client = $ClientModel->listClient();
        //$array_pais = $PaisModel->listpais();
        $ClientView->paginateClient($array_client);
    }
}
