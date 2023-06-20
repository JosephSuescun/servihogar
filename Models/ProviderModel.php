<?php

class ProviderModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listProvider()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("provider");

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

    function selectProvider($nit)
    {
        try {
            $connection = new Connection();

            $filtro =[
                'nit'=>"$nit"
            ];

            $result = $connection->query("provider",$filtro);

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

    function insertProvider($nit, $nombre, $direccion, $celular)
    {
        $connection = new Connection();

        $json = json_encode([
            'nit' =>"$nit",
            'nombre' =>"$nombre",
            'telefono'=>"$celular",
            'direccion'=>"$direccion"
        ]);

        $connection->queryCreate("provider",json_decode($json));
    }

    function updateProvider($nit, $nombre, $direccion, $celular)
    {
        $connection = new Connection();

        $primary = [
            'nit'=>"$nit"
        ];

        $actualizar = [
            '$set'=>[
                'nit' =>"$nit",
                'nombre' =>"$nombre",
                'telefono'=>"$celular",
                'direccion'=>"$direccion"
            ]
        ];

        $connection->queryUpdate("provider",$primary,$actualizar);
    }
}
