<?php
require_once "Models/EmpleadoModel.php";
require_once "Views/EmpleadoView.php";

class EmpleadoController
{
    function paginateEmpleado()
    {
        require_once "Models/RolModel.php";
        $Connection = new Connection('sel');
        $EmpleadoModel = new EmpleadoModel($Connection);
        $RolModel = new RolModel($Connection);
        $EmpleadoView = new EmpleadoView();
        $array_empleado = $EmpleadoModel->listEmpleado();
        $array_rol = $RolModel->listRol();
        $EmpleadoView->paginateEmpleado($array_empleado, $array_rol);
    }

    function insertEmpleado()
    {
        require_once "Models/RolModel.php";
        $Connection = new Connection('sel');
        $EmpleadoModel = new EmpleadoModel($Connection);
        $RolModel = new RolModel($Connection);
        $EmpleadoView = new EmpleadoView();

        $emp_documento = $_POST['emp_documento'];
        $emp_codigo = $_POST['emp_codigo'];
        $emp_nombre1 = $_POST['emp_nombre1'];
        $emp_nombre2 = $_POST['emp_nombre2'];
        $emp_apellido1 = $_POST['emp_apellido1'];
        $emp_apellido2 = $_POST['emp_apellido2'];
        $emp_direccion = $_POST['emp_direccion'];
        $emp_sexo = $_POST['emp_sexo'];
        $emp_celular = $_POST['emp_celular'];
        $emp_email = $_POST['emp_email'];
        $tipo_id = $_POST['tipo_id'];
       
       
        if (empty($emp_documento)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($emp_codigo)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO'];
            exit(json_encode($response));
        }

        if (empty($emp_nombre1)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE 1'];
            exit(json_encode($response));
        }

        if (empty($emp_apellido1)) {
            $response = ["message" => 'FALTA POR LLENAR EL APELLIDO 1'];
            exit(json_encode($response));
        }

        if (empty($emp_direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($emp_celular)) {
            $response = ["message" => 'FALTA POR LLENAR EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($emp_email)) {
            $response = ["message" => 'FALTA POR LLENAR EL EMAIL'];
            exit(json_encode($response));
        }

        if (empty($tipo_id)) {
            $response = ["message" => 'FALTA POR LLENAR EL TIPO'];
            exit(json_encode($response));
        }

        if (empty($emp_documento) or empty($emp_codigo) or empty($emp_nombre1) or empty($emp_apellido1) or empty($emp_direccion) or empty($emp_sexo) or empty($emp_celular) or empty($emp_email) or empty($tipo_id)) {
            $response = ["message" => 'FALTAN CAMPOS POR LLENAR'];
            exit(json_encode($response));
        }
        if (!(filter_var($emp_email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }
        $array_empleado = $EmpleadoModel->consultDocumentEmp($emp_documento);
        if ($array_empleado) {
            $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
            exit(json_encode($response));
        }
        
        if ($emp_documento<= 0) {
            $response = ["message" => 'EL DOCUMENTO NO PUEDE SER MENOR QUE 0'];
            exit(json_encode($response));
        }
        $array_empleado = $EmpleadoModel->consultCodEmp($emp_codigo);
        if ($array_empleado) {
            $response = ["message" => 'CODIGO YA REGISTRADO'];
            exit(json_encode($response));
        }

        $EmpleadoModel->insertEmpleado($emp_documento, $emp_codigo, $emp_nombre1, $emp_nombre2, $emp_apellido1, $emp_apellido2, $emp_direccion, $emp_sexo, $emp_celular, $emp_email, $tipo_id);
        $array_empleado = $EmpleadoModel->listEmpleado();
        $array_rol = $RolModel->listRol();
        $EmpleadoView->paginateEmpleado($array_empleado, $array_rol);
    }

    function showEmpleado()
    {
        require_once "Models/RolModel.php";
        $Connection = new Connection('sel');
        $EmpleadoModel = new EmpleadoModel($Connection);
        $RolModel = new RolModel($Connection);
        $EmpleadoView = new EmpleadoView();

        $emp_documento = $_POST['id'];
        $array_empleado = $EmpleadoModel->selectEmpleado($emp_documento);
        $array_rol = $RolModel->listRol();
        $EmpleadoView->showEmpleado($array_empleado, $array_rol);
    }

    function updateEmpleado()
    {
        require_once "Models/RolModel.php";
        $Connection = new Connection('sel');
        $EmpleadoModel = new EmpleadoModel($Connection);
        $RolModel = new RolModel($Connection);
        $EmpleadoView = new EmpleadoView();

        $emp_documento = $_POST['emp_documento'];
        $emp_codigo = $_POST['emp_codigo'];
        $emp_nombre1 = $_POST['emp_nombre1'];
        $emp_nombre2 = $_POST['emp_nombre2'];
        $emp_apellido1 = $_POST['emp_apellido1'];
        $emp_apellido2 = $_POST['emp_apellido2'];
        $emp_direccion = $_POST['emp_direccion'];
        $emp_sexo = $_POST['emp_sexo'];
        $emp_celular = $_POST['emp_celular'];
        $emp_email = $_POST['emp_email'];
        $tipo_id = $_POST['tipo_id'];

        // --- VALIDACIONES ----

        if (empty($emp_documento)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($emp_codigo)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO'];
            exit(json_encode($response));
        }

        if (empty($emp_nombre1)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE 1'];
            exit(json_encode($response));
        }

        if (empty($emp_apellido1)) {
            $response = ["message" => 'FALTA POR LLENAR EL APELLIDO 1'];
            exit(json_encode($response));
        }

        if (empty($emp_direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($emp_celular)) {
            $response = ["message" => 'FALTA POR LLENAR EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($emp_email)) {
            $response = ["message" => 'FALTA POR LLENAR EL EMAIL'];
            exit(json_encode($response));
        }

        if (empty($tipo_id)) {
            $response = ["message" => 'FALTA POR LLENAR EL TIPO'];
            exit(json_encode($response));
        }
    
      
        // --- FIN VALIDACIONES ----

        $array_empleado = $EmpleadoModel->updateEmpleado($emp_documento,$emp_codigo,$emp_nombre1,$emp_nombre2,$emp_apellido1,$emp_apellido2,$emp_direccion,$emp_sexo,$emp_celular,$emp_email,$tipo_id);
        $array_empleado = $EmpleadoModel->listEmpleado();
        $array_rol = $RolModel->listRol();
        $EmpleadoView->paginateEmpleado($array_empleado, $array_rol);

    }
}
