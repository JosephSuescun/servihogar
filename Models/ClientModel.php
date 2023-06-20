<?php

class ClientModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listClient()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("customer");

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

  

    function insertClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email)
    {
        $connection = new Connection();

        $json = json_encode([
            'nombre1' =>"$clie_nombre1",
            'nombre2' =>"$clie_nombre2",
            'apellido1' =>"$clie_apellido1",
            'apellido2' =>"$clie_apellido2",
            'documento' =>"$clie_documento",
            'sexo'=>"$clie_sexo",
            'telefono'=>"$clie_celular",
            'correo'=>"$clie_email",
            'direccion'=>"$clie_direccion"
        ]);

        $connection->queryCreate("customer",json_decode($json));
    }

    function selectClient($clie_documento)
    {
        try {
            $connection = new Connection();

            $filtro =[
                'documento'=>"$clie_documento"
            ];

            $result = $connection->query("customer",$filtro);

            foreach($result AS $document){
                $salida = json_encode($document->jsonSerialize());
            }

            if(is_null($salida)){
                exit("SIN DATOS");
            }

            return $salida;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function UpdateClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email)
    {
        $connection = new Connection();

        $primary = [
            'documento'=>"$clie_documento"
        ];

        $actualizar = [
            '$set'=>[
                'nombre1'=>"$clie_nombre1",
                'nombre2'=>"$clie_nombre2",
                'apellido1'=>"$clie_apellido1",
                'apellido2'=>"$clie_apellido2",
                'documento'=>"$clie_documento",
                'sexo'=>"$clie_sexo",
                'telefono'=>"$clie_celular",
                'correo'=>"$clie_email",
                'direccion'=>"$clie_direccion"
            ]
        ];

        $connection->queryUpdate("customer",$primary,$actualizar);
    }

    function consultDocumentClient($clie_documento)
    {
        $sql = "SELECT * FROM distribuidora.cliente WHERE clie_documento='$clie_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    
}
