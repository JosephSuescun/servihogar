<?php
require_once "Models/UserAccessModel.php";
require_once "Views/UserAccessView.php";

class UserAccessController
{
    function paginateUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }

    function insertUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $emp_documento = $_POST['emp_documento'];
        $nombre = $_POST['emp_nombre'];
        $email = $_POST['emp_email'];
        $telefono = $_POST['emp_telefono'];
        $tipo = $_POST['emp_tipo'];
        $direccion = $_POST['emp_direccion'];
        $acce_usuario = $_POST['acce_usuario'];
        $acce_contrasena = $_POST['acce_contrasena'];
        $acce_contrasena1 = $_POST['acce_contrasena1'];


        


        if (empty($emp_documento)) {
            $response = ["message" => 'FALTA EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($nombre)) {
            $response = ["message" => 'FALTA EL NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($email)) {
            $response = ["message" => 'FALTA EL EMAIL'];
            exit(json_encode($response));
        }
        if (empty($telefono)) {
            $response = ["message" => 'FALTA EL TELEFONO'];
            exit(json_encode($response));
        }
        if (empty($tipo)) {
            $response = ["message" => 'FALTA EL TIPO EMPLEADO'];
            exit(json_encode($response));
        }
        if($emp_documento <= 0) {
            $response = ["message" => 'EL DOCUMENTO NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }
        if(!(($tipo=="ADMINISTRADOR") OR ($tipo=="VENDEDOR") OR ($tipo=="MANAGER"))) {
            $response = ["message" => 'TIPO DE EMPLEADO NO ENCONTRADO'];
            exit(json_encode($response));
        }
        /*$array_user_access = $UserAccessModel->consultDocumentUserAccess($emp_documento);
        if($array_user_access){
            $response = ["message" => 'EL DOCUMENTO SE ENCUENTRA REGISTRADO EN LA TABLA DE ACCESO'];
            exit(json_encode($response));
          
        }*/

        if ($acce_contrasena != $acce_contrasena1) {
            $response = ["message" => 'LAS CONTRASEÑAS NO COINCIDEN'];
            exit(json_encode($response));
        }


        $UserAccessModel->insertUserAccess($emp_documento,$nombre,$email,$telefono,$tipo,$direccion, $acce_usuario, $acce_contrasena);
        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }

    function showUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();
        $emp_documento = $_POST['id'];
        $array_user_access = $UserAccessModel->selectAccessModel($emp_documento);
        $this->paginateUserAccess();
        //$UserAccessView->showUserAccess($array_user_access);
    }

    function updateUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $emp_documento = $_POST['emp_documento'];
        $emp_documento1 = $_POST['emp_documento1'];
        $acce_usuario = $_POST['acce_usuario'];
        $acce_contrasena = $_POST['acce_contrasena'];

        if (empty($emp_documento) or empty($acce_usuario) or empty($acce_contrasena)) {
            $response = ["message" => 'FALTAN CAMPOS POR LLENAR'];
            exit(json_encode($response));
        }

        if ($emp_documento != $emp_documento1) {
            $array_user_access = $UserAccessModel->updateDocumentUserAccessRepeat($emp_documento);
            if ((($array_user_access))) {
                $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
                exit(json_encode($response));
            }
        }

       

        $array_user_access = $UserAccessModel->updateUserAccess($emp_documento, $emp_documento1, $acce_usuario, $acce_contrasena);
        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }
}
