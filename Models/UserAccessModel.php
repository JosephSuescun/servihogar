<?php

class UserAccessModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listUserAccess()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("employees");

            $documents = [];

            foreach ($result as $document) {
                $documents[] = $document;
            }

            if(is_null($documents)){
                exit("SIN DATOS");
            }

            return $documents;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function insertUserAccess($emp_documento,$nombre,$email,$telefono,$tipo,$direccion, $acce_usuario, $acce_contrasena)
    {
        $connection = new Connection();

        $json = json_encode([
            'emp_document' =>"$emp_documento",
            'emp_name' =>"$nombre",
            'emp_email' =>"$email",
            'emp_phone' =>"$telefono",
            'emp_type' =>"$tipo",
            'emp_address'=>"$direccion",
            'access'=>[
                'username'=>"$acce_usuario",
                'password'=>"$acce_contrasena"
            ]
        ]);

        $connection->queryCreate("employees",json_decode($json));
    }

    function consultDocumentUserAccess($emp_documento)
    {
        $sql = "SELECT * FROM distribuidora.acceso WHERE emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }



    function selectAccessModel($emp_documento)
    {
        $connection = new Connection();

        $json = [
            'emp_document'=>"$emp_documento"
        ];

        $connection->queryDelete("employees",$json);
    }

    function updateDocumentUserAccessRepeat($emp_documento)
    {
        $sql = "SELECT * FROM distribuidora.acceso WHERE emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateUserAccess($emp_documento, $emp_documento1, $acce_usuario, $acce_contrasena)
    {
        $sql = "UPDATE distribuidora.acceso SET
        
            acce_usuario = '$acce_usuario',
            acce_contrasena = '$acce_contrasena'
            WHERE emp_documento = '$emp_documento1'
            ";
        $this->Connection->query($sql);
    }


}
